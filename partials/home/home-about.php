<?php
$page = get_queried_object();
$title = get_field('home_about_title', $page) ?? '';
$image = get_field('home_about_image', $page) ?? null;
$list = get_field('home_about_list', $page) ?? [];
?>

<?php if ($title || ($image && is_array($image) && !empty($image['ID'])) || !empty($list)): ?>
	<section class="section home-about" id="home-about">
		<div class="un-container home-about__container">
			<?php if ($title): ?>
				<h2 class="home-about__title title-2 visible-mobile">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if ($image && is_array($image) && !empty($image['ID'])): ?>
				<div class="un-container__full home-about__image image-box">
					<?php echo wp_get_attachment_image(
						$image['ID'],
						'large',
						false,
						[
							'class' => 'img',
							'alt' => $image['alt'] ?: $title,
							'loading' => 'lazy'
						]
					); ?>
				</div>
			<?php endif; ?>

			<div class="un-container__content home-about__content">
				<?php if ($title): ?>
					<h2 class="home-about__title title-2 hidden-mobile">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>

				<?php if (!empty($list)): ?>
					<ul class="home-about__list">
						<?php foreach ($list as $item):
							$item_icon = $item['icon'] ?? null;
							$item_title = $item['title'] ?? '';
							$item_descr = $item['descr'] ?? '';

							// Пропускаем пустые элементы
							if (!$item_title && !$item_descr && (!$item_icon || empty($item_icon['ID']))) {
								continue;
							}
							?>
							<li class="home-about__item home-about-item">
								<?php if ($item_icon && is_array($item_icon) && !empty($item_icon['ID'])): ?>
									<div class="home-about-item__icon">
										<?php echo wp_get_attachment_image(
											$item_icon['ID'],
											'large',
											false,
											[
												'class' => 'img',
												'alt' => $item_icon['alt'] ?: $item_title,
												'loading' => 'lazy'
											]
										); ?>
									</div>
								<?php endif; ?>

								<div class="home-about-item__content">
									<?php if ($item_title): ?>
										<h3 class="home-about-item__title title-4">
											<?php echo esc_html($item_title); ?>
										</h3>
									<?php endif; ?>

									<?php if ($item_descr): ?>
										<div class="home-about-item__descr descr">
											<?php echo wp_kses_post($item_descr); ?>
										</div>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>