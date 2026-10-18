<?php
$page = 'option';
$title = get_field('contacts_title', $page) ?? 'Контакты';
$page_title = get_field('contacts_page_title', $page) ?? 'Свяжитесь с нами';
$page_descr = get_field('contacts_page_descr', $page) ?? '';
$map = get_field('contacts_map', $page) ?? '';
$address = get_field('contacts_address', 'option') ?? '';
$time = get_field('contacts_time', 'option') ?? '';

?>

<?php if ($page_title || $page_descr || $map || $address || $time): ?>
	<section class="section contacts" id="contacts">
		<div class="container contacts__container section-gap">
			<?php if ($title): ?>
				<h2 class="contacts__title title-2 title-decor title-decor--center">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>
			<div class="contacts__wrapper">

				<div class="contacts__content">
					<?php if ($page_title): ?>
						<h3 class="contacts__sub-title title-2">
							<?php echo esc_html($page_title); ?>
						</h3>
					<?php endif; ?>

					<?php if ($page_descr): ?>
						<div class="contacts__descr descr">
							<?php echo wp_kses_post($page_descr); ?>
						</div>
					<?php endif; ?>
					<div class="contacts__info">
						<div class="contacts__item icon icon--phone">
							<?php get_template_part('partials/components/phones', null, [
								'class' => 'contacts__phones'
							]); ?>
						</div>
						<div class="contacts__item icon icon icon--emails">
							<?php get_template_part('partials/components/emails', null, [
								'class' => 'contacts__emails'
							]); ?>
						</div>
						<div class="contacts__item icon icon--address">
							<?php if ($address): ?>
								<?php get_template_part('partials/components/address', null, [
									'class' => 'contacts__address',
									'descr' => $address,
									'is_address' => true
								]); ?>
							<?php endif; ?>
						</div>
						<div class="contacts__item icon icon--time">
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
					<div class="contacts__map">
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
<?php endif; ?>