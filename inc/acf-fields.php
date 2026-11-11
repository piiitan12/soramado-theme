<?php
/**
 * ACF の項目定義（PHP で持つ）。
 *
 * ★ なぜ管理画面で作らないのか
 *   管理画面で項目を作ると、その定義はデータベースにしか残らない。
 *   別のサイトに入れるたびに同じ手作業をやり直すことになり、抜けると
 *   「説明文が空のまま公開」が静かに起きる。
 *   ここに書いておけば、テーマを有効にした時点で必ず出る。
 *
 * ★ 名前は 'page-description'。inc/head-meta.php がこの名前で読んでいる。
 */

defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group( array(
		'key'    => 'group_soramado_page',
		'title'  => 'ページの説明文',
		'fields' => array(
			array(
				'key'           => 'field_soramado_page_description',
				'label'         => 'ページの説明文（description）',
				'name'          => 'page-description',
				'type'          => 'textarea',
				'rows'          => 3,
				'new_lines'     => '',
				'instructions'  => '検索結果とSNSで出る紹介文。全角60〜80文字くらい。'
				                   . '空にすると description と og:description が空のまま公開されます。',
				'maxlength'     => 200,
			),
		),
		'location' => array(
			array(
				array( 'param' => 'post_type', 'operator' => '==', 'value' => 'page' ),
			),
		),
		'position'              => 'normal',
		'style'                 => 'default',
		'hide_on_screen'        => array(),
		'active'                => true,
		'show_in_rest'          => false,
		'description'           => 'テーマが読む項目。定義はテーマの inc/acf-fields.php にある。',
	) );
}
