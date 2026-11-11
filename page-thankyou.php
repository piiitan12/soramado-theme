<?php
/**
 * Template Name: 送信完了
 *
 * お問い合わせフォーム（CF7）の送信後に表示するページ。
 * 固定ページを作り、テンプレートに「送信完了」を選ぶ。本文が空ならこの既定の文を出す。
 */

defined( 'ABSPATH' ) || exit;  // WordPress を通さずに直接開かれたら止める

get_header();
?>

<main class="page page--center">
	<div class="page__inner">
		<p class="page__en">THANK YOU</p>
		<h1 class="page__title">お問い合わせありがとうございます</h1>
		<div class="page__body">
			<?php
			while ( have_posts() ) :
				the_post();
				if ( '' !== trim( get_the_content() ) ) :
					the_content();
				else :
					?>
					<p>内容を確かめたうえで、担当者から 2 営業日以内にご連絡します。</p>
					<p>しばらく経っても返信が届かない場合は、お手数ですがお電話でお問い合わせください。</p>
					<?php
				endif;
			endwhile;
			?>
		</div>
		<p class="page__back"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="page__button">トップへ戻る</a></p>
	</div>
</main>

<?php
get_footer();
