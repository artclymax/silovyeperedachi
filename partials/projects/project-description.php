<?php
$descr = get_field('project_description_text', $page) ?? '';
?>
<?php if (!empty($descr)): ?>

	<div class="section-half project-description" id="project-description">
		<div class="container project-description__container">
			<div class="project-description__content descr title-2">
				<?php echo wp_kses_post($descr); ?>
			</div>
		</div>
	</div>
<?php endif; ?>