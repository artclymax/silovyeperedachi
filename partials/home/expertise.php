<?php
$page = get_queried_object();
$title = get_field('expertise_title', $page) ?? '';
$list = get_field('expertise_list', $page) ?? [];
?>

<?php if ($title || !empty($list)): ?>
	<section class="section expertise" id="expertise">
		<div class="container expertise__container section-gap">
			<?php if ($title): ?>
				<h2 class="expertise__title title-2 title-decor title-decor--center">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if (!empty($list)): ?>
				<ul class="expertise__grid grid">
					<?php foreach ($list as $item):
						$item_icon = $item['icon'] ?? null;
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';

						if (!$item_title && !$item_descr && (!$item_icon || empty($item_icon['ID']))) {
							continue;
						}
						?>
						<li class="expertise__item expertise-item">
							<?php if ($item_icon && is_array($item_icon) && !empty($item_icon['ID'])): ?>
								<div class="expertise-item__icon">
									<?php echo wp_get_attachment_image(
										$item_icon['ID'],
										'medium',
										false,
										[
											'class' => 'img',
											'alt' => $item_icon['alt'] ?: $item_title,
											'loading' => 'lazy'
										]
									); ?>
								</div>
							<?php endif; ?>

							<?php if ($item_title): ?>
								<h3 class="expertise-item__title title-4">
									<?php echo esc_html($item_title); ?>
								</h3>
							<?php endif; ?>

							<?php if ($item_descr): ?>
								<div class="expertise-item__descr descr">
									<?php echo wp_kses_post($item_descr); ?>
								</div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>