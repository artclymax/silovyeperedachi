<?php
$page = get_queried_object();
$title = get_field('about_history_title', $page) ?? '';
$descr = get_field('about_history_descr', $page) ?? '';
$image_1 = get_field('about_history_image_1', $page) ?? null;
$image_2 = get_field('about_history_image_2', $page) ?? null;
$timeline = get_field('about_history_timeline', $page) ?? [];
$quote = get_field('about_history_quote', $page) ?? '';
?>

<?php if ($title || $descr || ($image_1 && !empty($image_1['ID'])) || ($image_2 && !empty($image_2['ID'])) || !empty($timeline) || $quote): ?>
	<section class="section about-history" id="about-history">
		<div class="container about-history__container">
			<div class="about-history__header">
				<div class="about-history__content">
					<?php if ($title): ?>
						<h2 class="about-history__title title-3">
							<?php echo esc_html($title); ?>
						</h2>
					<?php endif; ?>

					<?php if ($descr): ?>
						<div class="about-history__descr descr">
							<?php echo wp_kses_post($descr); ?>
						</div>
					<?php endif; ?>
				</div>

				<?php if (($image_1 && !empty($image_1['ID'])) || ($image_2 && !empty($image_2['ID']))): ?>
					<div class="about-history__images">
						<?php if ($image_1 && is_array($image_1) && !empty($image_1['ID'])): ?>
							<div class="about-history__image image-box">
								<?php echo wp_get_attachment_image(
									$image_1['ID'],
									'large',
									false,
									[
										'class' => 'img',
										'alt' => $image_1['alt'] ?: $title,
										'loading' => 'lazy'
									]
								); ?>
							</div>
						<?php endif; ?>

						<?php if ($image_2 && is_array($image_2) && !empty($image_2['ID'])): ?>
							<div class="about-history__image image-box">
								<?php echo wp_get_attachment_image(
									$image_2['ID'],
									'large',
									false,
									[
										'class' => 'img',
										'alt' => $image_2['alt'] ?: $title,
										'loading' => 'lazy'
									]
								); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if (!empty($timeline)): ?>
				<div class="about-history__timeline grid">
					<?php foreach ($timeline as $index => $item):
						$item_year = $item['year_label'] ?? '';
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';

						if (!$item_year && !$item_title && !$item_descr) {
							continue;
						}
						?>
						<div class="about-history__item timeline-item">
							<?php if ($item_year): ?>
								<div class="timeline-item__year">
									<?php echo esc_html($item_year); ?>
								</div>
							<?php endif; ?>

							<?php if ($item_title): ?>
								<h3 class="timeline-item__title title-4">
									<?php echo esc_html($item_title); ?>
								</h3>
							<?php endif; ?>

							<?php if ($item_descr): ?>
								<div class="timeline-item__descr descr">
									<?php echo wp_kses_post($item_descr); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ($quote): ?>
				<blockquote class="about-block__quote about-history__quote descr">
					<?php echo wp_kses_post($quote); ?>
				</blockquote>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>