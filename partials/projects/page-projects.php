<?php
$posts_per_page = (int) get_option('posts_per_page');
if ($posts_per_page <= 0)
	$posts_per_page = 6; // Фоллбэк

$paged = 1;

$projects_args = [
	'post_type' => 'project',
	'posts_per_page' => $posts_per_page,
	'post_status' => 'publish',
	'paged' => $paged,
	'orderby' => 'date',
	'order' => 'DESC',
];
$projects_query = new WP_Query($projects_args);
?>
<section class="section-full projects-page" id="projects-page">
	<h2 class="visually-hidden">
		<?php post_type_archive_title(); ?>
	</h2>
	<div class="container projects-page__container section-gap">

		<?php if ($projects_query && $projects_query->have_posts()): ?>
			<div class="projects-page__grid grid" id="projects-grid">
				<?php while ($projects_query->have_posts()):
					$projects_query->the_post();
					get_template_part('partials/projects/project-card', null, [
						'project_id' => get_the_ID(),
						'project_title' => get_the_title(),
						'project_excerpt' => get_the_excerpt(),
						'project_link' => get_permalink(),
						'thumbnail_id' => get_post_thumbnail_id(),
					]);
				endwhile;
				wp_reset_postdata(); ?>
			</div>

			<?php
			$total_pages = $projects_query->max_num_pages;
			?>
			<?php if ($total_pages > 1): ?>
				<div class="projects-page__load-more">
					<button class="btn btn--outline" id="load-more-btn" data-page="2"
						data-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
						Показать еще
					</button>
				</div>
			<?php endif; ?>

		<?php else: ?>
			<p class="projects-page__empty">Проекты пока не добавлены.</p>
		<?php endif; ?>
	</div>
</section>