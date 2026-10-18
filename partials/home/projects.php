<?php
$page = get_queried_object();
$title = get_field('projects_title', $page) ?? 'Реализованные проекты';
$limit = (int) (get_field('projects_limit', $page) ?? 2);
$link = get_field('projects_link', $page) ?? '';

$projects_args = [
	'post_type' => 'project',
	'posts_per_page' => $limit,
];
$projects_query = new WP_Query($projects_args);
?>

<?php if ($title || ($projects_query && $projects_query->have_posts())): ?>
	<section class="section projects" id="projects">
		<div class="container projects__container section-gap">
			<?php if ($title): ?>
				<h2 class="projects__title title-2 title-decor title-decor--center">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if ($projects_query && $projects_query->have_posts()): ?>
				<div class="projects__grid grid">
					<?php while ($projects_query->have_posts()):
						$projects_query->the_post();
						$project_id = get_the_ID();
						$project_title = get_the_title();
						$project_excerpt = get_the_excerpt();
						$project_link = get_permalink();
						$thumbnail_id = get_post_thumbnail_id($project_id);
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
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>

			<?php if (!empty($link)): ?>
				<a class="projects__btn btn" href="<?= esc_attr($link['url']); ?>">
					<?php echo esc_html($link['title']); ?>
				</a>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>