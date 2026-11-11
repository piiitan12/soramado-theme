#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
静的版の LP（index.html）から、WordPress テーマの 4 ファイルと assets を作る。

なぜ手で写さないのか
  手で写すと必ずどこかがずれ、「静的版を直したのに WordPress 側が古い」が起きる。
  静的版が変わったらこれを回し直せば、テーマも必ず追いつく。

作るもの（このリポジトリの直下）
  header.php           … <head> ＋ ヘッダー
  front-page.php       … ヘッダーとフッターの間（＝ページ本体）
  footer.php           … フッター ＋ wp_footer
  inc/style-script.php … CSS・JS の読み込み
  assets/              … css / js / img をまるごと

★ 上の 4 ファイルと assets/ は生成物。直すなら静的版の index.html へ。
  functions.php・inc/setup.php・inc/head-meta.php・inc/acf-fields.php・page.php などは手で書いたもの。

使い方
  python3 tools/build_theme.py <静的版のフォルダ（index.html と assets/ があるところ）>
"""

import io, os, re, shutil, sys

DST = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
if len(sys.argv) < 2:
    sys.exit("使い方: python3 tools/build_theme.py <静的版のフォルダ>")
SRC = os.path.abspath(sys.argv[1])

BANNER = ("<?php\n"
          "/**\n"
          " * ★ このファイルは tools/build_theme.py が作っています。直接編集しないこと。\n"
          " *   直すのは静的版の index.html。index.html → build_theme.py → ここ、の順で流れます。\n"
          " */\n"
          "defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める\n"
          "?>\n")


def rewrite_assets(html):
    """assets/... を子テーマのURLに書き換える。

    HTMLの中では src="assets/…" / href="assets/…" / url(assets/…) の3通りで出てくる。
    front-page.php はサイトの入口として動くので、相対パスのままでは解決できない。
    """
    n = [0]

    def rep(m):
        n[0] += 1
        return m.group(1) + '<?php echo esc_url( $tu ); ?>/' + m.group(2)

    html = re.sub(r'((?:src|href)=")(assets/)', rep, html)
    html = re.sub(r'(url\(["\']?)(assets/)', rep, html)
    return html, n[0]


def rewrite_anchors(html):
    """ヘッダーとフッターの href="#…" を、LP 以外のページからも飛べる形にする。

    LP の上では "#contact" のまま（慣性スクロールの main.js が拾う）。
    プライバシーポリシーなどの上では "https://…/#contact" にして、LP の該当箇所へ戻す。
    """
    # サイト内の "/privacy/" なども、サブフォルダに入れたときに切れないよう home_url で組む
    html = re.sub(r'href="/([^"/][^"]*)"',
                  lambda m: 'href="<?php echo esc_url( home_url( \'/' + m.group(1) + '\' ) ); ?>"', html)
    return re.subn(r'href="#([^"]*)"',
                   lambda m: 'href="<?php echo is_front_page() ? \'\' : esc_url( home_url( \'/\' ) ); ?>#' + m.group(1) + '"',
                   html)


def main():
    src_html = os.path.join(SRC, "index.html")
    if not os.path.exists(src_html):
        sys.exit("実装が見つからない: " + src_html)
    s = io.open(src_html, encoding="utf-8").read()

    # ── ① 切り分け ────────────────────────────────
    #   このページは <header> … 中身 … <footer> の3つに素直に分かれている。
    hs, he = s.find("<header"), s.find("</header>") + len("</header>")
    fs, fe = s.find("<footer"), s.find("</footer>") + len("</footer>")
    if min(hs, he, fs, fe) < 0:
        sys.exit("header / footer が見つからない。実装の構造が変わった可能性がある。")
    site_header = s[hs:he]
    body_main = s[he:fs]
    site_footer = s[fs:fe]

    # ── ①-2 ★ ヘッダーとフッターを包んでいる箱を落とさない ─────────
    #   実装は <body> の直下で、全体をこの1枚で包んでいる：
    #     <div style="overflow-x:hidden;position:relative;background:#fff">
    #   ここには2つの役目がある。
    #     ・background:#fff  … body の背景（#004052）を隠す。自分の背景を持たない
    #                          セクション（SERVICE・PROFILE ほか）は、これが無いと
    #                          濃い色が透ける
    #     ・overflow-x:hidden … 横方向のはみ出しを抑える
    #   ★ 2026-08-12：最初これを落として作り、SERVICEの背景が濃くなった。
    #     header / main / footer だけを見て、その**外側**を見ていなかった。
    wrap = re.search(r'<body[^>]*>\s*(?:<!--.*?-->\s*)*(<div[^>]*>)\s*$',
                     s[:hs], re.S)
    if not wrap:
        sys.exit("包みの <div> が見つからない。実装の構造が変わった可能性がある。"
                 "落とすと背景が透けるので、確認せずに進めないこと。")
    wrap_open = wrap.group(1)
    print("①-2 包みを引き継いだ: %s" % wrap_open[:70])

    # ── ② Googleフォントの読み込み行だけ拾う ────────
    fonts = re.findall(r'<link[^>]+fonts\.(?:googleapis|gstatic)\.com[^>]*>', s)

    # ── ③ header.php ──────────────────────────────
    h, n1 = rewrite_assets(site_header)
    h, na1 = rewrite_anchors(h)
    header_php = BANNER + """<?php $tu = get_stylesheet_directory_uri(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
/* タイトルは WordPress（title-tag）、説明文と OGP は inc/head-meta.php が wp_head で出す。
   検索避け（noindex）は「設定 → 表示設定」で切り替える。テーマには書かない。 */
?>
""" + "\n".join(fonts) + """
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> ontouchstart="">
<?php wp_body_open(); ?>
""" + wrap_open + "\n" + h + "\n"

    # ── ③-2 ★ お問い合わせフォームを Contact Form 7 に差し替える ────
    #   実装のフォームは**見た目だけのモックアップ**（<form> が無く、
    #   ボタンも type="button"）。そのまま持ってきても送信できない。
    #   ラベルの文言と並びは CF7 側のフォーム定義で1:1に写してあるので、
    #   ここは器ごと入れ替える。見た目は form.css で合わせている。
    #
    #   ★ id ではなく title で呼ぶ。本番サーバーでは採番が変わるため。
    #     どのサイトでも同じ題名（ソラマド お問い合わせ）でフォームを作れば、そのまま動く。
    form_pat = re.compile(
        r'<div style="display:flex;flex-direction:column;gap:16px;min-width:0">'
        r'.*?</button>\s*</div>', re.S)
    body_main, n_form = form_pat.subn(
        '<div style="display:flex;flex-direction:column;gap:16px;min-width:0">\n'
        "<?php echo do_shortcode('[contact-form-7 title=\"ソラマド お問い合わせ\"]'); ?>\n"
        '</div>', body_main)
    if n_form != 1:
        sys.exit("お問い合わせフォームの置き換えに失敗（%d 箇所）。"
                 "実装のフォームの形が変わった可能性がある。" % n_form)
    print("③-2 フォームを CF7 に差し替えた")

    # ── ④ front-page.php ─────────────────────────
    m, n2 = rewrite_assets(body_main)
    front_php = BANNER + "<?php $tu = get_stylesheet_directory_uri(); ?>\n" \
                "<?php get_header(); ?>\n" + m.strip() + "\n<?php get_footer(); ?>\n"

    # ── ⑤ footer.php ─────────────────────────────
    f, n3 = rewrite_assets(site_footer)
    f, na3 = rewrite_anchors(f)
    footer_php = BANNER + "<?php $tu = get_stylesheet_directory_uri(); ?>\n" + f + """
</div><?php /* ★ body直下の包みを閉じる。header.php で開けている */ ?>
<?php wp_footer(); ?>
</body>
</html>
"""

    # ── ⑥ inc/style-script.php ───────────────────
    #   ★ design.css は単体で完結している。jQuery は読まない。
    #     jQuery はこのサイトで一度も使っていない（動きは GSAP と Lenis）。
    ver = re.search(r'design\.css\?v=(\d+)', s)
    ver = ver.group(1) if ver else "1"
    style_script = BANNER.replace("?>\n", "") + '''
/**
 * CSS と JS の読み込み。
 *
 * ★ 動きのライブラリ 4 本（GSAP・ScrollTrigger・SplitType・Lenis）は同梱する（CDN から読まない）。
 *   オフラインでも同じ見え方にするため。jQuery は使わない。
 */

define( 'SORAMADO_VER', '%(ver)s' );  // 静的版の書き出し日時。キャッシュ避けに使う

function soramado_assets() {
	$tu = get_stylesheet_directory_uri();

	wp_enqueue_style( 'soramado-design', $tu . '/assets/css/design.css', array(), SORAMADO_VER );

	foreach ( array( 'gsap.min', 'ScrollTrigger.min', 'split-type.min', 'lenis.min' ) as $lib ) {
		wp_enqueue_script( 'soramado-' . $lib, $tu . '/assets/js/' . $lib . '.js', array(), SORAMADO_VER, true );
	}
	wp_enqueue_script( 'soramado-main', $tu . '/assets/js/main.js',
		array( 'soramado-gsap.min', 'soramado-ScrollTrigger.min', 'soramado-split-type.min', 'soramado-lenis.min' ),
		SORAMADO_VER, true );
}
add_action( 'wp_enqueue_scripts', 'soramado_assets', 20 );

/** お問い合わせフォーム（CF7）と、LP 以外のページ（プライバシーポリシーなど）の見た目。どちらも手書き */
function soramado_extra_css() {
	$tu = get_stylesheet_directory_uri();
	wp_enqueue_style( 'soramado-form', $tu . '/form.css', array( 'soramado-design' ), SORAMADO_VER );
	if ( ! is_front_page() ) {
		wp_enqueue_style( 'soramado-page', $tu . '/page.css', array( 'soramado-design' ), SORAMADO_VER );
	}
}
add_action( 'wp_enqueue_scripts', 'soramado_extra_css', 21 );

/* CF7 は既定でフォームの中に <p> と <br> を足す。
   こちらは label を縦に並べて gap で間隔を作っているので、入ると隙間が二重になる。 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * WordPress が自前で足してくる CSS を外す。
 *
 *   静的 HTML には一つも入っていなかったものが、WordPress にすると 13KB 分入る。
 *   ブロックエディタ用の CSS・絵文字・theme.json から作られる変数など。
 *   このテーマはブロックを使っていないので、全部いらない。
 *   入れたままにすると、design.css と当たったところで見た目が静かにずれる。
 */
function soramado_strip_wp_defaults() {
	foreach ( array( 'wp-block-library', 'wp-block-library-theme', 'classic-theme-styles',
	                 'global-styles', 'wp-emoji-styles' ) as $h ) {
		wp_dequeue_style( $h ); wp_deregister_style( $h );
	}
}
add_action( 'wp_enqueue_scripts', 'soramado_strip_wp_defaults', 100 );

/* global-styles は上の wp_dequeue_style では消えない（別のフックから出ているため）。 */
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles_custom_css' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * 管理バーをサイト側に出さない。
 *
 *   ログイン中だけ画面の上に 32px の黒帯が出て、そのぶん html に margin-top が入る。
 *   ヘッダーは position:fixed の top:0 なので、帯の下に潜って見えなくなる。
 *   100vh の計算もずれて、ファーストビューの高さが変わる。訪問者には元々出ないもの。
 */
add_filter( 'show_admin_bar', '__return_false' );
''' % {"ver": ver}

    # ── ⑦ 書き出し ───────────────────────────────
    os.makedirs(os.path.join(DST, "inc"), exist_ok=True)
    out = [("header.php", header_php), ("front-page.php", front_php),
           ("footer.php", footer_php), ("inc/style-script.php", style_script)]
    for rel, txt in out:
        io.open(os.path.join(DST, rel), "w", encoding="utf-8").write(txt)
        print("① 書き出し: %-22s %5.1fKB" % (rel, len(txt) / 1024))

    # assets はまるごと入れ替える（消えた画像を残さないため）
    a_src, a_dst = os.path.join(SRC, "assets"), os.path.join(DST, "assets")
    if os.path.exists(a_dst):
        shutil.rmtree(a_dst)
    shutil.copytree(a_src, a_dst)
    cnt = sum(len(f) for _, _, f in os.walk(a_dst))
    print("② assets をコピー: %d ファイル" % cnt)
    print("③ パスの書き換え: header %d / 本体 %d / footer %d 箇所" % (n1, n2, n3))
    print("④ ページ内リンクの書き換え: header %d / footer %d 箇所" % (na1, na3))
    print("   版: %s" % ver)


if __name__ == "__main__":
    main()
