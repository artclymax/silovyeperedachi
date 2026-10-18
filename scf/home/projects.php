<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_projects_section',
		'title' => 'Секция "Реализованные проекты"',
		'fields' => [
			[
				'key' => 'field_projects_title',
				'label' => 'Заголовок секции',
				'name' => 'projects_title',
				'type' => 'text',
			],
			[
				'key' => 'field_projects_limit',
				'label' => 'Количество проектов',
				'name' => 'projects_limit',
				'type' => 'number',
				'default_value' => 2,
				'min' => 1,
				'step' => 1,
			],
			[
				'key' => 'field_projects_link',
				'label' => 'Кнопка',
				'name' => 'projects_link',
				'type' => 'link',
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