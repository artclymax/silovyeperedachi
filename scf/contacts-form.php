<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_contact_form',
		'title' => 'Секция "Форма обратной связи"',
		'fields' => [
			[
				'key' => 'field_contact_form_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_contact_form_title',
				'label' => 'Заголовок',
				'name' => 'contact_form_title',
				'type' => 'text',
			],
			[
				'key' => 'field_contact_form_descr',
				'label' => 'Описание',
				'name' => 'contact_form_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_contact_form_tab_note',
				'label' => 'Блок «Нет готового ТЗ?»',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_contact_form_note_title',
				'label' => 'Заголовок блока «Нет готового ТЗ?»',
				'name' => 'contact_form_note_title',
				'type' => 'text',
			],
			[
				'key' => 'field_contact_form_note_descr',
				'label' => 'Описание блока «Нет готового ТЗ?»',
				'name' => 'contact_form_note_descr',
				'type' => 'textarea',
				'rows' => 3,
				'new_lines' => 'wpautop',
			],
			[
				'key' => 'field_contact_form_phone_label',
				'label' => 'Подпись телефона',
				'name' => 'contact_form_phone_label',
				'type' => 'text',
			],
			[
				'key' => 'field_contact_form_phone',
				'label' => 'Номер телефона',
				'name' => 'contact_form_phone',
				'type' => 'text',
			],
			[
				'key' => 'field_contact_form_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_contact_form_bg_image',
				'label' => 'Фоновое изображение',
				'name' => 'contact_form_bg_image',
				'type' => 'image',
			],
			[
				'key' => 'field_contact_form_tab_form',
				'label' => 'Форма',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_contact_form_shortcode',
				'label' => 'Шорткод формы',
				'name' => 'contact_form_shortcode',
				'type' => 'text',
				'instructions' => 'Вставьте шорткод формы (например: [contact-form-7 id="123" title="Форма связи"])',
			],
		],
		'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				],
			],
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-page',
				],
			]
		],
	]);
}