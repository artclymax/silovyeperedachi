<?php
$page = get_queried_object();
$title = get_field('about_block_title', $page) ?? '';
$descr = get_field('about_block_descr', $page) ?? '';
$quote = get_field('about_block_quote', $page) ?? '';
$image_1 = get_field('about_block_image_1', $page) ?? null;
$image_2 = get_field('about_block_image_2', $page) ?? null;
?>

<?php if ($title || $descr || $quote || ($image_1 && !empty($image_1['ID'])) || ($image_2 && !empty($image_2['ID']))): ?>
	<section class="section about-block" id="about-block">
		<div class="container about-block__container">
			<div class="about-block__content">
				<?php if ($title): ?>
					<h2 class="about-block__title title-2 title-decor">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>

				<?php if ($descr): ?>
					<div class="about-block__descr descr">
						<?php echo wp_kses_post($descr); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if (($image_1 && !empty($image_1['ID'])) || ($image_2 && !empty($image_2['ID']))): ?>
				<div class="about-block__images">
					<?php if ($image_1 && is_array($image_1) && !empty($image_1['ID'])): ?>
						<div class="about-block__image about-block__image--1 image-box">
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
						<div class="about-block__image about-block__image--2 image-box">
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



			<?php if ($quote): ?>
				<blockquote class="about-block__quote descr">
					<?php echo wp_kses_post($quote); ?>
				</blockquote>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>