<?php
/**
 * ★ このファイルは tools/build_theme.py が作っています。直接編集しないこと。
 *   直すのは静的版の index.html。index.html → build_theme.py → ここ、の順で流れます。
 */
defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める
?>
<?php $tu = get_stylesheet_directory_uri(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
/* タイトルは WordPress（title-tag）、説明文と OGP は inc/head-meta.php が wp_head で出す。
   検索避け（noindex）は「設定 → 表示設定」で切り替える。テーマには書かない。 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;500;700&family=Inter:wght@400;500;600&family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> ontouchstart="">
<?php wp_body_open(); ?>
<div style="overflow-x:hidden;position:relative;background:#fff">
<header style="position:fixed;top:0;left:0;right:0;z-index:30;display:flex;align-items:stretch;justify-content:space-between;gap:16px;background:rgba(255,255,255,.9);backdrop-filter:blur(12px);border-bottom:1px solid rgba(13,78,89,.08)">
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#top" style="display:flex;align-items:center;gap:12px;padding:12px 0 12px clamp(18px,3vw,44px)"><img src="<?php echo esc_url( $tu ); ?>/assets/img/soramado_logo_color.svg" alt="ソラマド" style="height:clamp(34px,4vw,44px);width:auto;display:block" /><span style="font:500 8px/1.6 Inter,sans-serif;letter-spacing:.22em;color:var(--color-text-sub)">CONSULTING<br>FOR SMALL SHOPS</span></a>
<nav style="display:flex;align-items:stretch;gap:clamp(12px,2.2vw,34px);flex-wrap:wrap;justify-content:flex-end;padding-left:12px"><div data-menu-panel id="menu-panel">
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#record" style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px"><span style="font:600 13.5px/1 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">実績</span><span style="font:400 9.5px/1 Inter,sans-serif;letter-spacing:.14em;color:var(--color-text-sub)">RECORD</span></a>
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#cases" style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px"><span style="font:600 13.5px/1 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">事例</span><span style="font:400 9.5px/1 Inter,sans-serif;letter-spacing:.14em;color:var(--color-text-sub)">CASES</span></a>
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#service" style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px"><span style="font:600 13.5px/1 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">サービス</span><span style="font:400 9.5px/1 Inter,sans-serif;letter-spacing:.14em;color:var(--color-text-sub)">SERVICE</span></a>
<a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#profile" style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px"><span style="font:600 13.5px/1 'Zen Kaku Gothic New',sans-serif;color:var(--color-heading)">代表</span><span style="font:400 9.5px/1 Inter,sans-serif;letter-spacing:.14em;color:var(--color-text-sub)">PROFILE</span></a>
</div><a href="<?php echo is_front_page() ? '' : esc_url( home_url( '/' ) ); ?>#contact" style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;background:linear-gradient(150deg,var(--brand-blue),var(--brand-deep));color:#fff;padding:0 clamp(18px,2.4vw,34px);min-width:96px"><span style="font:600 13.5px/1 'Zen Kaku Gothic New',sans-serif;color:#fff">お問い合わせ</span><span style="font:400 9.5px/1 Inter,sans-serif;letter-spacing:.16em;color:rgba(255,255,255,.72)">CONTACT</span></a>
</nav>
<button type="button" data-menu-toggle aria-expanded="false" aria-controls="menu-panel" aria-label="メニューを開く"><svg viewBox="0 0 28 18" width="28" height="18" aria-hidden="true" focusable="false"><rect data-l="1" x="0" y="0" width="28" height="3" rx="1.5"></rect><rect data-l="2" x="0" y="7.5" width="19" height="3" rx="1.5"></rect><rect data-l="3" x="0" y="15" width="28" height="3" rx="1.5"></rect></svg></button></header>
