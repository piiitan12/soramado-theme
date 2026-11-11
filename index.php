<?php
/**
 * 一覧の受け皿（WordPress がテーマに必ず求めるファイル）。
 * このサイトは LP（front-page.php）と固定ページ（page.php）だけで、投稿は使わない。
 * 投稿や一覧の URL を開かれたときに崩れないよう、題名と本文を並べるだけにしている。
 */

defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める

get_header();
?>

<main class="page">
	<div class="page__inner">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="page__article">
					<h1 class="page__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<div class="page__body"><?php the_content(); ?></div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<h1 class="page__title">ページが見つかりません</h1>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
