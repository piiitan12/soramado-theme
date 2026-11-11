<?php
/**
 * ★ このファイルは tools/build_theme.py が作っています。直接編集しないこと。
 *   直すのは静的版の index.html。index.html → build_theme.py → ここ、の順で流れます。
 */
defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める

/**
 * CSS と JS の読み込み。
 *
 * ★ 動きのライブラリ 4 本（GSAP・ScrollTrigger・SplitType・Lenis）は同梱する（CDN から読まない）。
 *   オフラインでも同じ見え方にするため。jQuery は使わない。
 */

define( 'SORAMADO_VER', '20261112100000' );  // 静的版の書き出し日時。キャッシュ避けに使う

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
