<?php
$page = get_queried_object();
$title = get_field('home_hero_title', $page) ?? '';
$descr = get_field('home_hero_descr', $page) ?? '';
$media = get_field('home_hero_media', $page) ?? null;
$scroll_link = get_field('home_hero_scroll_link', $page) ?? '#home-about';

$is_video = false;
$video_url = '';
if ($media && is_array($media)) {
	if (!empty($media['url']) && pathinfo($media['url'], PATHINFO_EXTENSION) === 'mp4') {
		$is_video = true;
		$video_url = $media['url'];
	}
}
?>

<?php if ($title || $descr || ($media && !empty($media['ID'])) || ($is_video && $video_url)): ?>
	<section class="home-hero" id="home-hero">
		<div class="container home-hero__container">
			<div class="home-hero__content">
				<?php if ($title): ?>
					<h1 class="home-hero__title title-1">
						<?php echo esc_html($title); ?>
					</h1>
				<?php endif; ?>

				<?php if ($descr): ?>
					<div class="home-hero__descr descr">
						<?php echo wp_kses_post($descr); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($scroll_link): ?>
				<a class="home-hero__scroll-down" href="<?php echo esc_url($scroll_link); ?>">
					<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
						aria-hidden="true">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M14 18.7573L32 36.7573L50 18.7573L54.2426 23L32 45.2426L9.75732 23L14 18.7573Z" fill="currentColor" />
					</svg>
					<span class="visually-hidden">Прокрутить вниз</span>
				</a>
			<?php endif; ?>
		</div>

		<div class="home-hero__media image-box">
			<?php if ($is_video && $video_url): ?>
				<video class="home-hero__video" autoplay muted loop playsinline poster="">
					<source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
				</video>
			<?php elseif ($media && is_array($media) && !empty($media['ID'])): ?>
				<?php echo wp_get_attachment_image(
					$media['ID'],
					'full',
					false,
					[
						'class' => 'home-hero__image',
						'alt' => $media['alt'] ?: $title,
						'loading' => 'eager'
					]
				); ?>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>