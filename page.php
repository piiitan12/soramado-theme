<?php
/**
 * 固定ページ（プライバシーポリシーなど）。
 * 本文は管理画面のエディタで書く。テーマに文言を持たないので、文言の直しにテーマの更新が要らない。
 */

defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める

get_header();
?>

<main class="page">
	<div class="page__inner">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="page__title"><?php the_title(); ?></h1>
			<div class="page__body">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</main>

<?php
get_footer();
