<?php
$page = 'option';
$title = get_field('hero_title', $page) ?? get_the_title();
$descr = get_field('hero_descr', $page) ?? apply_filters('the_content', get_the_content()) ?? '';
$map = get_field('contacts_map', $page) ?? '';
$address = get_field('contacts_address', 'option') ?? '';
$time = get_field('contacts_time', 'option') ?? '';
?>
<section class="contacts-page" id="contacts-page">
	<h2 class="visually-hidden"><?php echo esc_html(get_the_title()) ?></h2>
	<div class="container contacts-page__container">
		<div class="contacts-page__breadcrumbs page-breadcrumbs">
			<?php if (function_exists('bcn_display')) {
				bcn_display();
			} ?>
		</div>
		<div class="contacts-page__wrapper">
			<div class="contacts-page__content">
				<div class="contacts-page__header">
					<h1 class="contacts-page__title title-2 title-decor">
						<?php echo esc_html($title) ?>
					</h1>
					<div class="contacts-page__descr descr">
						<?php echo wp_kses_post($descr) ?>
					</div>
				</div>
				<div class="contacts__info contacts-page__info">
					<div class="contacts__item contacts-page__item icon icon--phone">
						<?php get_template_part('partials/components/phones', null, [
							'class' => 'contacts__phones'
						]); ?>
					</div>
					<div class="contacts__item contacts-page__item icon icon icon--emails">
						<?php get_template_part('partials/components/emails', null, [
							'class' => 'contacts__emails'
						]); ?>
					</div>
					<div class="contacts__item contacts-page__item icon icon--address">
						<?php if ($address): ?>
							<?php get_template_part('partials/components/address', null, [
								'class' => 'contacts__address',
								'descr' => $address,
								'is_address' => true
							]); ?>
						<?php endif; ?>
					</div>
					<div class="contacts__item contacts-page__item icon icon--time">
						<?php if ($time): ?>
							<?php get_template_part('partials/components/address', null, [
								'class' => 'contacts__time',
								'descr' => $time,
								'is_address' => false
							]); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php if ($map): ?>
				<div class="contacts__map contacts-page__map">
					<?php echo wp_kses($map, [
						'iframe' => [
							'src' => true,
							'width' => true,
							'height' => true,
							'style' => true,
							'allowfullscreen' => true,
							'loading' => true,
						],
					]) ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>