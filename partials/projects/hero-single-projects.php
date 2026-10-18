<?php
$btn = get_field('hero_projects_btn') ?: ['url' => '#modal-call', 'title' => 'Обсудить похожую задачу'];
$content = apply_filters('the_content', get_the_content()) ?: get_the_excerpt();
?>
<section class="hero-single-projects" id="hero-single-projects">
	<div class="un-container un-container--reverse hero-single-projects__container">
		<div class="un-container__content hero-single-projects__content">
			<div class="hero-single-projects__breadcrumbs page-breadcrumbs">
				<?php if (function_exists('bcn_display')) {
					bcn_display();
				} ?>
			</div>
			<h1 class="hero-single-projects__title title-2 title-decor">
				<?php the_title() ?>
			</h1>
			<div class="hero-single-projects__descr descr">
				<?php echo wp_kses_post($content) ?>
			</div>
			<?php if (!empty($btn)): ?>
				<a class="hero-single-projects__btn btn" href="<?= esc_attr($btn['url']) ?>">
					<?php echo esc_html($btn['title']) ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="un-container__full image-box hero-single-projects__image">
			<?php the_post_thumbnail('full'); ?>
		</div>
	</div>
</section>