<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_process',
		'title' => 'Секция "Процесс работы"',
		'fields' => [
			[
				'key' => 'field_process_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_process_title',
				'label' => 'Заголовок',
				'name' => 'process_title',
				'type' => 'text',
			],
			[
				'key' => 'field_process_descr',
				'label' => 'Описание',
				'name' => 'process_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_process_btn',
				'label' => 'Кнопка',
				'name' => 'process_btn',
				'type' => 'link',
			],
			[
				'key' => 'field_process_tab_list',
				'label' => 'Список',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_process_steps',
				'label' => 'Шаги процесса',
				'name' => 'process_steps',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_process_step_title',
				'button_label' => 'Добавить шаг',
				'sub_fields' => [
					[
						'key' => 'field_process_step_title',
						'label' => 'Заголовок шага',
						'name' => 'step_title',
						'type' => 'text',
					],
					[
						'key' => 'field_process_step_descr',
						'label' => 'Описание шага',
						'name' => 'step_descr',
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
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php',
				],
			],
		],
	]);
}