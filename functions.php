<?php
/**
 * テーマの入口。中身は inc/ の 4 ファイルに分けている。
 *
 *   setup.php        … テーマの初期設定（タイトル・アイキャッチ・HTML5 の出し方）
 *   head-meta.php    … 説明文と OGP（<head> に出す）
 *   style-script.php … CSS・JS の読み込み（tools/build_theme.py の生成物）
 *   acf-fields.php   … ACF の項目（ページの説明文）
 */

defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める

require get_stylesheet_directory() . '/inc/setup.php';
require get_stylesheet_directory() . '/inc/head-meta.php';
require get_stylesheet_directory() . '/inc/style-script.php';
require get_stylesheet_directory() . '/inc/acf-fields.php';
