<?php
/**
 * テーマの初期設定。
 */

defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める

function soramado_setup() {
	// <title> は WordPress に出させる（header.php に書かない）
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'soramado_setup' );

/** タイトルの区切りを「｜」にする（例：プライバシーポリシー｜ソラマド） */
function soramado_title_separator() {
	return '｜';
}
add_filter( 'document_title_separator', 'soramado_title_separator' );
