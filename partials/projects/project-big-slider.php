<?php
$page = get_queried_object();
$title = get_field('project_big_slider_title', $page) ?? '';
$gallery = get_field('project_big_gallery', $page) ?? [];
?>

<?php if ($title || !empty($gallery)): ?>
	<section class="section-half project-big-slider" id="project-big-slider">
		<div class="container project-big-slider__container section-gap-2">
			<?php if ($title): ?>
				<h2 class="project-big-slider__title title-3 title-decor">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if (!empty($gallery)): ?>
				<div class="project-big-slider__slider">
					<div class="swiper project-big-slider__swiper"
						data-swiper='{ "slidesPerView": 1, "spaceBetween": 20, "rewind": true}'>
						<div class="swiper-wrapper project-big-slider__wrapper">
							<?php foreach ($gallery as $index => $image):
								if (!is_array($image) || empty($image['ID'])) {
									continue;
								}
								?>
								<div class="swiper-slide project-big-slider__slide">
									<a class="project-big-slider__image image-box" data-fancybox="project-big-slider"
										href="<?= $image['url']; ?>">
										<?php echo wp_get_attachment_image(
											$image['ID'],
											'full',
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
							<button class="swiper-btn swiper-btn__prev" type="button" data-swiper-btn-prev=".project-big-slider__swiper"
								aria-label="Предыдущее изображение">
							</button>
							<button class="swiper-btn swiper-btn__next" type="button" data-swiper-btn-next=".project-big-slider__swiper"
								aria-label="Следующее изображение">
							</button>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

	</section>
<?php endif; ?>