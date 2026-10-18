<?php
$page = $args['page'] ?? get_queried_object();
$default_page = get_page_by_path('home', OBJECT, 'page');
if (is_tax()) {
	$page = 'option';
}
$title = get_field('contact_form_title', $page) ?: get_field('contact_form_title', $default_page) ?? '';
$descr = get_field('contact_form_descr', $page) ?: get_field('contact_form_descr', $default_page) ?? '';
$note_title = get_field('contact_form_note_title', $page) ?: get_field('contact_form_note_title', $default_page) ?? '';
$note_descr = get_field('contact_form_note_descr', $page) ?: get_field('contact_form_note_descr', $default_page) ?? '';
$phone_label = get_field('contact_form_phone_label', $page) ?: get_field('contact_form_phone_label', $default_page) ?? '';
$phone = get_field('contact_form_phone', $page) ?: get_field('contact_form_phone', $default_page) ?? '';
$form_shortcode = get_field('contact_form_shortcode', $page) ?: get_field('contact_form_shortcode', $default_page) ?? '[contact-form-7 id="264205a" title="Форма связи"]';
$bg_image = get_field('contact_form_bg_image', $page) ?: get_field('contact_form_bg_image', $default_page) ?? null;


?>

<?php if ($title || $descr || $form_shortcode || ($bg_image && is_array($bg_image) && !empty($bg_image['ID']))): ?>
	<section class="section contacts-form" id="contacts-form">
		<div class="container contacts-form__container">
			<div class="contacts-form__content">
				<div class="contacts-form__info">
					<?php if ($title): ?>
						<h2 class="contacts-form__title title-2">
							<?php echo esc_html($title); ?>
						</h2>
					<?php endif; ?>

					<?php if ($descr): ?>
						<div class="contacts-form__descr descr">
							<?php echo wp_kses_post($descr); ?>
						</div>
					<?php endif; ?>
				</div>

				<?php if ($note_title || $note_descr): ?>
					<div class="contacts-form__note">
						<?php if ($note_title): ?>
							<h3 class="contacts-form__note-title title-4">
								<?php echo esc_html($note_title); ?>
							</h3>
						<?php endif; ?>

						<?php if ($note_descr): ?>
							<div class="contacts-form__note-descr descr">
								<?php echo wp_kses_post($note_descr); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($phone_label || $phone): ?>
					<div class="contacts-form__phone">
						<?php if ($phone_label): ?>
							<span class="contacts-form__phone-label title-4">
								<?php echo esc_html($phone_label); ?>
							</span>
						<?php endif; ?>

						<?php if ($phone): ?>
							<a class="contacts-form__phone-link title-2 link"
								href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>">
								<?php echo esc_html($phone); ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($form_shortcode): ?>
				<div class="contacts-form__form-box">
					<h3 class="contacts-form__form-title title-4">
						Передать исходные данные
					</h3>
					<div class="contacts-form__form">
						<?php echo do_shortcode($form_shortcode); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php if ($bg_image && is_array($bg_image) && !empty($bg_image['ID'])): ?>
			<div class="contacts-form__bg image-box">
				<?php echo wp_get_attachment_image(
					$bg_image['ID'],
					'large',
					false,
					[
						'class' => 'contacts-form__bg-img',
						'alt' => $bg_image['alt'] ?: $title,
						'loading' => 'lazy'
					]
				); ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>