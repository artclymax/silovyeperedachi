<?php
$page = get_queried_object();
$title = get_field('process_title', $page) ?? '';
$descr = get_field('process_descr', $page) ?? '';
$btn = get_field('process_btn', $page) ?? [];
$steps = get_field('process_steps', $page) ?? [];
?>

<?php if ($title || $descr || !empty($btn['url']) || !empty($steps)): ?>
	<section class="section section-process" id="section-process">
		<div class="container section-process__container">
			<div class="section-process__content">
				<?php if ($title): ?>
					<h2 class="section-process__title title-2">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>

				<?php if ($descr): ?>
					<div class="section-process__descr descr">
						<?php echo wp_kses_post($descr); ?>
					</div>
				<?php endif; ?>

			</div>

			<?php if (!empty($steps)): ?>
				<ul class="section-process__steps">
					<?php $index = 0; ?>
					<?php foreach ($steps as $step):
						$step_title = $step['step_title'] ?? '';
						$step_descr = $step['step_descr'] ?? '';

						if (!$step_title && !$step_descr) {
							continue;
						}
						$index++;
						$number = $index > 9 ? $index : '0' . $index;
						?>
						<li class="section-process__step process-step">
							<div class="process-step__number">
								<?php echo esc_html($number); ?>
							</div>
							<div class="process-step__content">
								<?php if ($step_title): ?>
									<h3 class="process-step__title title-4">
										<?php echo esc_html($step_title); ?>
									</h3>
								<?php endif; ?>

								<?php if ($step_descr): ?>
									<div class="process-step__descr descr">
										<?php echo wp_kses_post($step_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<?php if (!empty($btn['url'])): ?>

				<a class="section-process__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
					<?php echo esc_html($btn['title'] ?? 'Передать исходные данные'); ?>
				</a>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>