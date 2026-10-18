<?php 
$exclude_ids = [];
$misc_term = get_term_by('slug', 'misc', 'product_cat');
if ($misc_term && !is_wp_error($misc_term)) {
	$exclude_ids[] = $misc_term->term_id;
}

$categories_args = [
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'parent' => 0,
	'exclude' => $exclude_ids,
];
$categories = get_terms($categories_args);
?>
<section class="section-full catalog-categories" id="catalog-categories">
	<h2 class="visually-hidden">
		<?php echo esc_html(get_the_archive_title() ?? get_the_title()); ?>
	</h2>
	<div class="container catalog-categories__container">
			<?php if (!is_wp_error($categories) && !empty($categories)): ?>
				<div class="categories__grid catalog-categories__grid grid">
					<?php foreach ($categories as $category):
						$term_id = $category->term_id;
						$term_name = $category->name;
						$term_link = get_term_link($category);
						$term_descr = $category->description ?? '';
						$thumbnail_id = get_term_meta($term_id, 'thumbnail_id', true);

						if (!$term_name) {
							continue;
						}
						?>
						<article class="categories__item category-card">
							<?php if (!empty($thumbnail_id)): ?>
								<div class="category-card__image image-box">
									<a href="<?php echo esc_url($term_link); ?>">
										<?php echo wp_get_attachment_image(
											$thumbnail_id,
											'large',
											false,
											[
												'class' => 'img',
												'alt' => $term_name,
												'loading' => 'lazy'
											]
										); ?>
									</a>
								</div>
							<?php endif; ?>

							<div class="category-card__content">
								<?php if ($term_name): ?>
									<h3 class="category-card__title title-3">
										<a href="<?php echo esc_url($term_link); ?>">
											<?php echo esc_html($term_name); ?>
										</a>
									</h3>
								<?php endif; ?>

								<?php if ($term_descr): ?>
									<div class="category-card__descr descr">
										<?php echo wp_kses_post($term_descr); ?>
									</div>
								<?php endif; ?>

								<a class="category-card__link link-arrow" href="<?php echo esc_url($term_link); ?>">
									Подробнее
								</a>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
	</div>
</section>