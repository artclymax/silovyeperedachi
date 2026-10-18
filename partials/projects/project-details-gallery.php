<?php
$page = get_queried_object();
$title = get_field('project_gallery_title', $page) ?? '';
$descr = get_field('project_gallery_descr', $page) ?? '';
$gallery = get_field('project_gallery', $page) ?? [];
?>

<?php if ($title || $descr || !empty($gallery)): ?>
	<section class="section-half project-details-gallery" id="project-details-gallery">
		<div class="container project-details-gallery__container section-gap-2">
			<?php if ($title || $descr): ?>
				<div class="project-details-gallery__header">
					<?php if ($title): ?>
						<h2 class="project-details-gallery__title title-3 title-decor">
							<?php echo esc_html($title); ?>
						</h2>
					<?php endif; ?>

					<?php if ($descr): ?>
						<div class="project-details-gallery__descr descr">
							<?php echo wp_kses_post($descr); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if (!empty($gallery)): ?>
				<div class="project-details-gallery__slider">
					<div class="swiper project-details-gallery__swiper" data-swiper='{ 
  "slidesPerView": 1, 
  "spaceBetween": 20, 
  "rewind": true, 
  "breakpoints": { 
	 "768": { "slidesPerView": 2 }, 
	 "1024": { "slidesPerView": 3 } 
  } 
}'>
						<div class="swiper-wrapper project-details-gallery__wrapper">
							<?php foreach ($gallery as $index => $image):
								if (!is_array($image) || empty($image['ID'])) {
									continue;
								}
								?>
								<div class="swiper-slide project-details-gallery__slide">
									<a class="project-details-gallery__image image-box" data-fancybox="project-details-gallery-slider"
										href="<?= $image['url']; ?>">
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
							<button class="swiper-btn swiper-btn__prev" type="button"
								data-swiper-btn-prev=".project-details-gallery__swiper" aria-label="Предыдущее изображение">
							</button>
							<button class="swiper-btn swiper-btn__next" type="button"
								data-swiper-btn-next=".project-details-gallery__swiper" aria-label="Следующее изображение">
							</button>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>