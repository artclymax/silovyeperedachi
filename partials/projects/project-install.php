<?php
$page = get_queried_object();
$title = get_field('project_install_title', $page) ?? '';
$gallery = get_field('project_install_gallery', $page) ?? [];
?>

<?php if ($title || !empty($gallery)): ?>
	<section class="section-half project-install" id="project-install">
		<div class="container project-install__container section-gap-2">
			<?php if ($title): ?>
				<h2 class="project-install__title title-3 title-decor">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if (!empty($gallery)): ?>
				<div class="project-install__slider">
					<div class="swiper project-install__swiper"
						data-swiper='{ "slidesPerView": 1, "spaceBetween": 20, "rewind": true, "breakpoints": { "768": { "slidesPerView": 2} } }'>
						<div class="swiper-wrapper project-install__wrapper">
							<?php foreach ($gallery as $index => $image):
								if (!is_array($image) || empty($image['ID'])) {
									continue;
								}
								?>
								<div class="swiper-slide project-install__slide">
									<a class="project-install__image image-box" data-fancybox="project-install"
										href="<?php echo esc_url($image['url']); ?>">
										<?php echo wp_get_attachment_image(
											$image['ID'],
											'large',
											false,
											[
												'class' => 'img',
												'alt' => $image['alt'] ?: $title,
												'loading' => $index === 0 ? 'eager' : 'lazy'
											]
										); ?>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<?php if (count($gallery) > 1): ?>
						<div class="swiper-btn-box">
							<button class="swiper-btn swiper-btn__prev" type="button" data-swiper-btn-prev=".project-install__swiper"
								aria-label="Предыдущее изображение">
							</button>
							<button class="swiper-btn swiper-btn__next" type="button" data-swiper-btn-next=".project-install__swiper"
								aria-label="Следующее изображение">
							</button>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>