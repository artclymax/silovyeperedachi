<?php

$page_footer = 'option';
$page_contacts = 'option';

$footer_descr = get_field('footer_descr', $page_footer) ?? '';
$footer_company = get_field('footer_company', $page_footer) ?: get_bloginfo('name');
$footer_copy = get_field('footer_copy', $page_footer) ?? '';
$footer_links = get_field('footer_links', $page_footer) ?? [];

$address = get_field('contacts_address', $page_contacts) ?? '';
?>

<footer class="footer" id="footer">
	<div class="container footer__container">
		<div class="footer__top">
			<div class="footer__info">
				<div class="footer__logo logo">
					<?php mx_logo(); ?>
				</div>
				<?php if ($footer_descr): ?>
					<div class="footer__descr descr">
						<?php echo wp_kses_post($footer_descr); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="footer__nav footer-col">
				<h3 class="footer-col__title title-decor">
					Навигация
				</h3>
				<?php wp_nav_menu([
					'theme_location' => 'footer-menu',
					'container' => false,
					'menu_class' => 'footer-menu',
					'depth' => 1,
					'fallback_cb' => false,
				]) ?>
			</div>
			<div class="footer__catalog footer-col">
				<h3 class="footer-col__title title-decor">
					Системы и услуги
				</h3>
				<?php wp_nav_menu([
					'theme_location' => 'catalog-menu',
					'container' => false,
					'menu_class' => 'footer-menu catalog-menu',
					'depth' => 1,
					'fallback_cb' => false,
				]) ?>
			</div>
			<div class="footer__contacts footer-col">
				<h3 class="footer-col__title title-decor">
					Контакты
				</h3>
				<div class="footer__contacts-box">
					<?php get_template_part('partials/components/phones'); ?>
					<?php get_template_part('partials/components/emails'); ?>
					<?php get_template_part('partials/components/address', null, ['descr' => $address]); ?>
				</div>
			</div>
		</div>

		<div class="footer__bottom">
			<div class="footer__bottom-links">
				<?php if (!empty($footer_links)): ?>
					<?php foreach ($footer_links as $item):
						$link = $item['footer_links_link'] ?? [];
						if (empty($link['url']))
							continue;
						?>

						<a class="footer__bottom-link" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?>target="
				<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
							<?php echo esc_html($link['title']); ?>
						</a>
					<?php endforeach; ?>
				<?php endif; ?>

				<div class="footer__copy">
					&copy;
					<?php echo esc_html($footer_company) . ', ' . date('Y') . '.'; ?>
					<?php if ($footer_copy): ?>
						<?php echo esc_html($footer_copy); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
</footer>