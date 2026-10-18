<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_home_about',
		'title' => 'О компании (Главная)',
		'fields' => [
			[
				'key' => 'field_home_about_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_home_about_title',
				'label' => 'Заголовок',
				'name' => 'home_about_title',
				'type' => 'text',
			],
			[
				'key' => 'field_home_about_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_home_about_image',
				'label' => 'Изображение',
				'name' => 'home_about_image',
				'type' => 'image',
			],
			[
				'key' => 'field_home_about_tab_list',
				'label' => 'Список преимуществ',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_home_about_list',
				'label' => 'Преимущества',
				'name' => 'home_about_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_home_about_item_title',
				'button_label' => 'Добавить преимущество',
				'sub_fields' => [
					[
						'key' => 'field_home_about_item_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					],
					[
						'key' => 'field_home_about_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					],
					[
						'key' => 'field_home_about_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					],
				],
			],
		],
		'location' => [
			[
				[
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php',
				],
			],
		],
	]);
}