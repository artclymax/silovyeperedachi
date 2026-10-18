<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_categories_section',
		'title' => 'Секция "Системы внесения"',
		'fields' => [
			[
				'key' => 'field_categories_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_categories_title',
				'label' => 'Заголовок секции',
				'name' => 'categories_title',
				'type' => 'text',
				'default_value' => 'Системы внесения',
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