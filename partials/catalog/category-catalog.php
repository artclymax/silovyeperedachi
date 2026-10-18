<?php
$term = get_queried_object();
$title = get_field('category_catalog_title', $term) ?? '';
$descr = get_field('category_catalog_descr', $term) ?: 'Выберите подходящую модель или обратитесь к специалистам для подбора системы под вашу технику.';
$btn = get_field('category_catalog_btn', $term) ?: ['url' => '#modal-call', 'title' => 'Помощь с выбором'];
$limit = (int) (get_field('category_catalog_limit', $term) ?? 12);

$current_cat_id = is_tax('product_cat') ? $term->term_id : 0;

$products_args = [
	'post_type' => 'product',
	'posts_per_page' => $limit,
	'post_status' => 'publish',
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'tax_query' => $current_cat_id ? [
		[
			'taxonomy' => 'product_cat',
			'field' => 'term_id',
			'terms' => $current_cat_id,
		],
	] : [],
];
$products_query = new WP_Query($products_args);
?>

<?php if (($products_query && $products_query->have_posts())): ?>
	<section class="section-full category-catalog" id="category-catalog">
		<div class="container category-catalog__container section-gap">
			<div class="category-catalog__header">
				<div class="category-catalog__header-content">
					<?php if ($title): ?>
						<h2 class="category-catalog__title title-2 title-decor">
							<?php echo esc_html($title); ?>
						</h2>
					<?php endif; ?>

					<?php if ($descr): ?>
						<div class="category-catalog__descr descr">
							<?php echo wp_kses_post($descr); ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if (!empty($btn['url'])): ?>
					<a class="category-catalog__btn btn-link" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($btn['title']); ?>
					</a>
				<?php endif; ?>
			</div>

			<?php if ($products_query && $products_query->have_posts()): ?>
				<div class="category-catalog__grid grid">
					<?php while ($products_query->have_posts()):
						$products_query->the_post();
						$product_id = get_the_ID();
						$product_title = get_the_title();
						$product_link = get_permalink();
						$product_power = get_field('product_power', $product_id) ?? '';
						$thumbnail_id = get_post_thumbnail_id($product_id);
						$thumbnail_url = $thumbnail_id ? wp_get_attachment_image_url($thumbnail_id, 'large') : '';

						if ($thumbnail_id):
							?>
							<a class="category-catalog__item product-card" href="<?php echo esc_url($thumbnail_url); ?>"
								data-fancybox="catalog" data-caption="<?php echo esc_attr($product_title); ?>">
								<div class="product-card__image image-box">
									<?php echo wp_get_attachment_image(
										$thumbnail_id,
										'large',
										false,
										[
											'class' => 'img',
											'alt' => $product_title,
											'loading' => 'lazy'
										]
									); ?>
								</div>
								<div class="product-card__content">
									<h3 class="product-card__title title-3">
										<?php echo esc_html($product_title); ?>
									</h3>
									<?php if ($product_power): ?>
										<div class="product-card__power">
											Мощность <?php echo esc_html($product_power); ?>
										</div>
									<?php endif; ?>
								</div>
							</a>
						<?php else: ?>
							<a class="category-catalog__item product-card" href="<?php echo esc_attr($btn['url']); ?>">
								<div class="product-card__image image-box">

								</div>
								<div class="product-card__content">
									<h3 class="product-card__title title-3">
										<?php echo esc_html($product_title); ?>
									</h3>
									<?php if ($product_power): ?>
										<div class="product-card__power">
											Мощность <?php echo esc_html($product_power); ?>
										</div>
									<?php endif; ?>
								</div>
							</a>
						<?php endif;
					endwhile;
					wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php else: ?>
	<section class="section-full category-catalog" id="category-catalog">
		<div class="container category-catalog__container section-gap">
			<h2 class="category-catalog__title title-2 title-decor">
				Товары не найдены
			</h2>
			<a class="category-catalog__btn btn" href="<?php echo esc_url(home_url('/shop/'))?>">Вернуться в каталог</a>
		</div>
	</section>
<?php endif; ?>