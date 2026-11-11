<?php
/**
 * 説明文（description）と OGP を <head> に出す。
 *
 * 説明文は、各ページの ACF「ページの説明文」（inc/acf-fields.php）を使う。
 * 空なら「設定 → 一般」のキャッチフレーズを使う。どちらも空なら出さない。
 * OGP の画像は、アイキャッチがあればそれ、なければテーマの screenshot.png（assets/ は生成物で入れ替わるため、そこには置かない）。
 */

defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める

function soramado_description() {
	$desc = '';
	if ( is_singular() && function_exists( 'get_field' ) ) {
		$desc = (string) get_field( 'page-description' );
	}
	if ( '' === $desc ) {
		$desc = get_bloginfo( 'description' );
	}
	return trim( wp_strip_all_tags( $desc ) );
}

function soramado_head_meta() {
	$desc  = soramado_description();
	$title = wp_get_document_title();
	$url   = is_singular() ? get_permalink() : home_url( '/' );
	$image = get_stylesheet_directory_uri() . '/screenshot.png';
	if ( is_singular() && has_post_thumbnail() ) {
		$image = get_the_post_thumbnail_url( null, 'large' );
	}

	if ( '' !== $desc ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
		printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $desc ) );
	}
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:type" content="%s">' . "\n", is_front_page() ? 'website' : 'article' );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $url ) );
	printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $image ) );
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( get_bloginfo( 'name' ) ) );
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
}
add_action( 'wp_head', 'soramado_head_meta', 1 );
