<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_about_history',
		'title' => 'История компании',
		'fields' => [
			[
				'key' => 'field_about_history_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_about_history_title',
				'label' => 'Заголовок',
				'name' => 'about_history_title',
				'type' => 'text',
			],
			[
				'key' => 'field_about_history_descr',
				'label' => 'Описание',
				'name' => 'about_history_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_about_history_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_about_history_image_1',
				'label' => 'Изображение 1',
				'name' => 'about_history_image_1',
				'type' => 'image',
			],
			[
				'key' => 'field_about_history_image_2',
				'label' => 'Изображение 2',
				'name' => 'about_history_image_2',
				'type' => 'image',
			],
			[
				'key' => 'field_about_history_tab_timeline',
				'label' => 'Таймлайн',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_about_history_timeline',
				'label' => 'Этапы развития',
				'name' => 'about_history_timeline',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_about_history_item_year',
				'button_label' => 'Добавить этап',
				'sub_fields' => [
					[
						'key' => 'field_about_history_item_year',
						'label' => 'Год/период',
						'name' => 'year_label',
						'type' => 'text',
						'instructions' => 'Например: 2020, сегодня, опыт работы с BERMA',
					],
					[
						'key' => 'field_about_history_item_title',
						'label' => 'Заголовок этапа',
						'name' => 'title',
						'type' => 'text',
					],
					[
						'key' => 'field_about_history_item_descr',
						'label' => 'Описание этапа',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					],
				],
			],
			[
				'key' => 'field_about_history_tab_quote',
				'label' => 'Цитата',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_about_history_quote',
				'label' => 'Ключевая мысль',
				'name' => 'about_history_quote',
				'type' => 'textarea',
				'rows' => 2,
				'new_lines' => 'wpautop',
				'instructions' => 'Текст в выделенном блоке внизу секции',
			],
		],
		'location' => [
			[
				[
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-about.php',
				],
			],
		],
	]);
}