<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_about_block',
		'title' => 'Блок "О компании"',
		'fields' => [
			[
				'key' => 'field_about_block_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_about_block_title',
				'label' => 'Заголовок',
				'name' => 'about_block_title',
				'type' => 'text',
			],
			[
				'key' => 'field_about_block_descr',
				'label' => 'Описание',
				'name' => 'about_block_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_about_block_quote',
				'label' => 'Цитата/выделение',
				'name' => 'about_block_quote',
				'type' => 'textarea',
				'rows' => 3,
			],
			[
				'key' => 'field_about_block_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_about_block_image_1',
				'label' => 'Изображение 1 (большое)',
				'name' => 'about_block_image_1',
				'type' => 'image',
			],
			[
				'key' => 'field_about_block_image_2',
				'label' => 'Изображение 2 (маленькое)',
				'name' => 'about_block_image_2',
				'type' => 'image',
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