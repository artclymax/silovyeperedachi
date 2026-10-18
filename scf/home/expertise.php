<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_expertise',
		'title' => 'Секция "Компетенции"',
		'fields' => [
			[
				'key' => 'field_expertise_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_expertise_title',
				'label' => 'Заголовок',
				'name' => 'expertise_title',
				'type' => 'text',
			],
			[
				'key' => 'field_expertise_tab_list',
				'label' => 'Список',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_expertise_list',
				'label' => 'Карточки компетенций',
				'name' => 'expertise_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_expertise_item_title',
				'button_label' => 'Добавить компетенцию',
				'sub_fields' => [
					[
						'key' => 'field_expertise_item_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					],
					[
						'key' => 'field_expertise_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					],
					[
						'key' => 'field_expertise_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 4,
						'new_lines' => 'wpautop',
					],
				],
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php',
				],
			],
		],
	]);
}