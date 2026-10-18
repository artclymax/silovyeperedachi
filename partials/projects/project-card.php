<?php
/**
 * Component: Project Card
 * 
 * @param int    $project_id       ID проекта.
 * @param string $project_title    Заголовок проекта.
 * @param string $project_excerpt  Краткое описание.
 * @param string $project_link     Ссылка на проект.
 * @param int    $thumbnail_id     ID миниатюры.
 */

$project_id = $args['project_id'] ?? get_the_ID();
$project_title = $args['project_title'] ?? get_the_title($project_id);
$project_excerpt = $args['project_excerpt'] ?? get_the_excerpt($project_id);
$project_link = $args['project_link'] ?? get_permalink($project_id);
$thumbnail_id = $args['thumbnail_id'] ?? get_post_thumbnail_id($project_id);
?>

<article class="projects__item category-card">
	<?php if (!empty($thumbnail_id)): ?>
		<div class="category-card__image image-box">
			<a href="<?php echo esc_url($project_link); ?>">
				<?php echo wp_get_attachment_image(
					$thumbnail_id,
					'large',
					false,
					[
						'class' => 'img',
						'alt' => $project_title,
						'loading' => 'lazy'
					]
				); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="category-card__content">
		<?php if ($project_title): ?>
			<h3 class="category-card__title title-4">
				<a href="<?php echo esc_url($project_link); ?>">
					<?php echo esc_html($project_title); ?>
				</a>
			</h3>
		<?php endif; ?>

		<?php if ($project_excerpt): ?>
			<div class="category-card__descr descr">
				<?php echo wp_kses_post($project_excerpt); ?>
			</div>
		<?php endif; ?>

		<a class="category-card__link link-arrow" href="<?php echo esc_url($project_link); ?>">
			Смотреть проект
		</a>
	</div>
</article>