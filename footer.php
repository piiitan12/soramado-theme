<?php
/**
 * ★ このファイルは tools/build_theme.py が作っています。直接編集しないこと。
 *   直すのは静的版の index.html。index.html → build_theme.py → ここ、の順で流れます。
 */
defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める
?>
<?php $tu = get_stylesheet_directory_uri(); ?>
<footer data-dark="1" data-footer style="background:var(--color-panel-deep);color:var(--off-white)">

<!-- ══ 4-1 巨大英字帯（濃ティール・全幅） ══════════════════════
     ★ **静止。マーキーにしない。**ページ内で動く英字は帯写真の2本で完結させ、
       フッターは止まって閉じる（動く要素は1画面に1つまで）。
     ★ 右端で断ち切れてよい。**断ち切りはフッター限定の署名**で、
       マーキー・ghost とは別語彙。他セクションへ流用しない。
     ★ 文言は「小さなお店と10年」の英語版。 -->
<div data-footer-band style="overflow:hidden;border-bottom:1px solid rgba(255,255,255,.25)">
<div style="max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px)">
<p data-footer-type style="margin:0;padding:clamp(52px,8vw,124px) 0 clamp(44px,6vw,92px);white-space:nowrap;font:600 clamp(52px,11vw,160px)/1.02 Inter,sans-serif;letter-spacing:-.03em;color:#FFFFFF">Ten years with small shops.<span data-footer-type2></span></p>
</div>
</div>

<!-- ══ 4-2 白の情報部（インナー1280基準の3カラム／SPは縦積み） ══════ -->

<div style="max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px)">
<div data-footer-cols style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,240px),1fr));gap:0;padding:clamp(36px,4vw,56px) 0;font:400 13px/1.9 'Noto Sans JP',sans-serif">

<div style="display:flex;flex-direction:column;gap:6px;padding-right:clamp(20px,3vw,44px)">
<span data-footer-logomark style="display:flex;width:280px;height:172px;margin:-63px 0 -49px -78px"><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="0" style="position:absolute;top:0;left:-0%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="1" style="position:absolute;top:0;left:-100%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="2" style="position:absolute;top:0;left:-200%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="3" style="position:absolute;top:0;left:-300%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="4" style="position:absolute;top:0;left:-400%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="5" style="position:absolute;top:0;left:-500%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="6" style="position:absolute;top:0;left:-600%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="7" style="position:absolute;top:0;left:-700%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="8" style="position:absolute;top:0;left:-800%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div><div style="position:relative;width:10%;height:100%;overflow:hidden"><div data-logo-slice="9" style="position:absolute;top:0;left:-900%;width:1000%;height:100%;background:#FFFFFF;-webkit-mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');mask-image:url('<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_white.svg');-webkit-mask-size:contain;mask-size:contain;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-position:center bottom;mask-position:center bottom;transform:translateY(105%)"></div></div></span>
<span style="font:500 15px/1.7 'Noto Sans JP',sans-serif;letter-spacing:.04em;color:#FFFFFF">株式会社ソラマド</span>
<span style="color:#FFFFFF">代表取締役 佐伯 直人　／　2021年設立</span>
<span style="color:#FFFFFF">〒000-0000　○○県○○市○○町1丁目2番3号<br><span style="white-space:nowrap">○○ビル2階</span></span>
</div>

<div data-footer-col style="display:flex;flex-direction:column;gap:16px;padding:0 clamp(20px,3vw,44px)">
<div style="display:flex;flex-direction:column;gap:6px">
<span style="font:500 10px/1 Inter,sans-serif;letter-spacing:.2em;color:rgba(255,255,255,.9)">TEL</span>
<a href="tel:00000000000" style="font:600 17px/1.4 Inter,sans-serif;color:#E4EBEC">000-0000-0000</a>
</div>
<div style="display:flex;flex-direction:column;gap:6px">
<span style="font:500 10px/1 Inter,sans-serif;letter-spacing:.2em;color:rgba(255,255,255,.9)">MAIL</span>
<a href="mailto:info@example.com" style="font:400 14px/1.6 Inter,sans-serif;color:#E4EBEC">info@example.com</a>
</div>
</div>

<nav data-footer-col data-footer-nav style="display:flex;flex-direction:column;gap:18px;padding-left:clamp(20px,3vw,44px)">
<div style="display:flex;flex-direction:column;gap:5px">
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#service" style="font:500 10px/1 Inter,sans-serif;letter-spacing:.2em;color:rgba(255,255,255,.9)">SERVICE</a>
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#service" style="color:rgba(255,255,255,.9)">地図・口コミ・予約の相談</a>
</div>
<div style="display:flex;flex-direction:column;gap:5px">
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#profile" style="font:500 10px/1 Inter,sans-serif;letter-spacing:.2em;color:rgba(255,255,255,.9)">PROFILE</a>
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#profile" style="color:rgba(255,255,255,.9)">代表紹介</a>
</div>
<div style="display:flex;flex-direction:column;gap:5px">
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#contact" style="font:500 10px/1 Inter,sans-serif;letter-spacing:.2em;color:rgba(255,255,255,.9)">CONTACT</a>
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#contact" style="color:rgba(255,255,255,.9)">お問い合わせ</a>
</div>
</nav>

</div>
</div>

<!-- ══ 4-3 最下段（白のまま） ═══════════════════════════ -->
<div style="max-width:1280px;margin:0 auto;padding:0 clamp(20px,4vw,60px)">
<div style="border-top:1px solid rgba(255,255,255,.25);padding:18px 0;display:flex;flex-wrap:wrap;gap:12px;justify-content:space-between;font:400 13px/1.8 'Noto Sans JP',sans-serif">
<span style="color:rgba(255,255,255,.9)">© 株式会社ソラマド</span>

<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>" style="color:#E4EBEC">プライバシーポリシー</a>
</div>
</div>

</footer>
</div><?php /* ★ body直下の包みを閉じる。header.php で開けている */ ?>
<?php wp_footer(); ?>
</body>
</html>
