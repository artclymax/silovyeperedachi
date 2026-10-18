<?php
$header_class = $args['class'] ?? '';
$is_dark = $args['is_dark'] ?? true;

$menu_bg_array = get_field('header_menu_bg', 'option') ?? [];
$menu_bg = $menu_bg_array['url'] ?? '';
$btn = get_field('header_btn', 'option') ?? [];
$logo_dark = get_field('header_logo_dark', 'option') ?? [];
$phone = get_field('header_phone', 'option') ?? '';
$email = get_field('header_email', 'option') ?? '';
?>

<header class="header <?php echo esc_attr($header_class); ?>" data-auto-calc="header, height">
	<div class="header__container container">
		<!-- logo -->
		<div class="header__logo logo">
			<?php
			if (function_exists('mx_logo')) {
				if ($is_dark) {
					mx_logo('', $logo_dark);
				} else {
					mx_logo();
				}
			}
			?>
		</div>

		<!-- menu -->
		<nav class="header__menu header-menu"
			style="<?php if ($menu_bg): ?>--bg-image: url('<?php echo esc_url($menu_bg); ?>');<?php endif; ?>">
			<div class="header-menu__main-menu">
				<?php
				wp_nav_menu([
					'theme_location' => 'header-menu',
					'container' => false,
					'menu_class' => 'header-menu__list',
					'fallback_cb' => false,
					'depth' => 1,
				]);
				?>
			</div>


			<div class="header-menu__box visible-tablet">
				<?php if (!empty($btn['url'])): ?>
					<a class="header-menu__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>
						aria-label="<?php echo esc_attr($btn['title']); ?>">
						<?php echo esc_html($btn['title']); ?>
					</a>
				<?php endif; ?>

				<?php if ($phone): ?>
					<a class="header-menu__phone link" href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>"
						aria-label="Телефон: <?php echo esc_attr($phone); ?>">
						<?php echo esc_html($phone); ?>
					</a>
				<?php endif; ?>

				<?php if ($email): ?>
					<a class="header-menu__email link" href="mailto:<?php echo esc_attr($email); ?>"
						aria-label="Email: <?php echo esc_attr($email); ?>">
						<?php echo esc_html($email); ?>
					</a>
				<?php endif; ?>
			</div>
		</nav>

		<!-- phone -->
		<?php if ($phone): ?>
			<a class="header-menu__phone link hidden-tablet" href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>"
				aria-label="Телефон: <?php echo esc_attr($phone); ?>">
				<?php echo esc_html($phone); ?>
			</a>
		<?php endif; ?>

		<!-- burger-btn -->
		<button class="header__burger-btn burger-btn visible-tablet" type="button" aria-label="Открыть или закрыть меню">
			<span></span>
		</button>
	</div>
</header>