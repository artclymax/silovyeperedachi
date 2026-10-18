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

$title = get_field('hero_title', $page) ?? '';
$descr = get_field('hero_descr', $page) ?? '';
$image = get_field('hero_image', $page) ?? '';


if (!$title) {
	if (is_tax() || is_category() || is_tag()) {
		$title = single_term_title('', false);
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} else {
		$title = get_the_title();
	}
}



if ($title || $descr || ($image && is_array($image) && !empty($image['ID']))):
	?>
	<section class="hero-page-projects hero-page-un-container <?php echo esc_attr($class); ?>" id="hero-page-projects">
		<div class="un-container un-container--reverse hero-page-projects__container">
			<div class="un-container__content hero-page-projects__wrapper">
				<div class="hero-page-projects__breadcrumbs page-breadcrumbs">
					<?php if (function_exists('bcn_display')) {
						bcn_display();
					} ?>
				</div>
				<div class="hero-page-projects__content">
					<?php if ($title): ?>
						<h1 class="hero-page-projects__title title-2 descr title-decor">
							<?php echo wp_kses_post($title); ?>
						</h1>
					<?php endif; ?>
					<?php if ($descr): ?>
						<div class="hero-page-projects__descr descr">
							<?php echo wp_kses_post($descr); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if (!empty($image)): ?>
				<div class="un-container__full hero-page-projects__image image-box">
					<?php echo wp_get_attachment_image(
						$image['ID'],
						'full',
						false,
						array(
							'class' => 'img',
							'alt' => $image['alt'] ?: ''
						)
					); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>