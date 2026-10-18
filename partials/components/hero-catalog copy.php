<?php
$page = get_queried_object();
$class = $args['class'] ?? '';

if (!empty($args['page'])) {
	$page = get_page_by_path($args['page'], OBJECT, 'page');
}

if (is_archive()) {
	$archive_name = '';

	$queried = get_queried_object();
	$archive_name = is_string($queried->has_archive ?? null) ? $queried->has_archive : ($queried->name ?? '');


	$archive_page = $archive_name ? get_page_by_path($archive_name, OBJECT, 'page') : null;

	if ($archive_page) {
		$page = $archive_page;
	}
}
if (is_tax()) {
	$term = get_queried_object();
	if (!empty($args['page'])) {
		$term = get_page_by_path($args['page'], OBJECT, 'page');
	}
	$label = get_field('hero_subtitle', $term) ?: get_field('hero_product_cat_subtitle', 'option') ?? '';
	$title = get_field('hero_title', $term) ?? '';
	$descr = get_field('hero_descr', $term) ?: $term->description ?? '';
	$btn = get_field('hero_btn', $term) ?: get_field('hero_product_cat_btn', 'option') ?? '';
	$image = get_field('hero_image', $term) ?: get_field('hero_product_cat_image', 'option') ?? '';
	$image_mobile = get_field('hero_image_mobile', $term) ?: get_field('hero_product_cat_mobile', 'option') ?? '';

} else {
	$label = get_field('hero_subtitle', $page) ?? '';
	$title = get_field('hero_title', $page) ?? '';
	$descr = get_field('hero_descr', $page) ?? '';
	$btn = get_field('hero_btn', $page) ?? '';
	$image = get_field('hero_image', $page) ?? '';
	$image_mobile = get_field('hero_image_mobile', $page) ?? '';

}

if (!$title) {
	if (is_tax() || is_category() || is_tag()) {
		$title = single_term_title('', false);
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} else {
		$title = get_the_title();
	}
}



if ($title || $descr || ($image && is_array($image) && !empty($image['ID'])) || ($image_mobile && is_array($image_mobile) && !empty($image_mobile['ID']))):
	?>
	<section class="hero-page hero-catalog <?php echo esc_attr($class); ?>" id="hero-catalog">
		<div class="container hero-page__container">
			<div class="hero-page__wrapper">
				<div class="hero-page__breadcrumbs page-breadcrumbs">
					<?php if (function_exists('bcn_display')) {
						bcn_display();
					} ?>
				</div>
				<div class="hero-page__content">
					<?php if ($label): ?>
						<span class="hero-page__label label">
							<?php echo esc_html($label); ?>
						</span>
					<?php endif; ?>
					<?php if ($title): ?>
						<h1 class="hero-page__title title-1 descr">
							<?php echo wp_kses_post($title); ?>
						</h1>
					<?php endif; ?>
					<?php if ($descr): ?>
						<div class="hero-page__descr descr">
							<?php echo wp_kses_post($descr); ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if (!empty($btn)): ?>
					<a class="hero-page__btn btn" href="<?= esc_attr($btn['url']); ?>">
						<?php echo esc_html($btn['title']) ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<?php if (!empty($image) || !empty($image_mobile)): ?>
			<div class="hero-page__image image-box">
				<?php echo wp_get_attachment_image(
					$image['ID'],
					'full',
					false,
					array(
						'class' => 'img' . (!empty($image_mobile) ? ' hidden-mobile' : ''),
						'alt' => $image['alt'] ?: ''
					)
				); ?>
				<?php if (!empty($image_mobile)): ?>

					<?php echo wp_get_attachment_image(
						$image_mobile['ID'],
						'full',
						false,
						array(
							'class' => 'img' . (!empty($image) ? ' visible-mobile' : ''),
							'alt' => $image_mobile['alt'] ?: ''
						)
					); ?>
				<?php endif; ?>

			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>
