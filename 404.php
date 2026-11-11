<?php
/**
 * 404（ページが見つからないとき）。
 */

defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める

get_header();
?>

<main class="page page--center">
	<div class="page__inner">
		<p class="page__en">404 NOT FOUND</p>
		<h1 class="page__title">ページが見つかりません</h1>
		<div class="page__body">
			<p>お探しのページは、移動または削除された可能性があります。</p>
		</div>
		<p class="page__back"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="page__button">トップへ戻る</a></p>
	</div>
</main>

<?php
get_footer();
