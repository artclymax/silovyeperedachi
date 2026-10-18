<?php
// Добавить в существующую группу или создать новую
acf_add_local_field_group([
	'key' => 'group_project_details_gallery',
	'title' => 'Галерея проекта (условия работы)',
	'fields' => [
		[
			'key' => 'field_project_gallery_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_project_gallery_title',
			'label' => 'Заголовок секции',
			'name' => 'project_gallery_title',
			'type' => 'text',
		],
		[
			'key' => 'field_project_gallery_descr',
			'label' => 'Описание',
			'name' => 'project_gallery_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_project_gallery_tab_images',
			'label' => 'Галерея изображений',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_project_gallery',
			'label' => 'Галерея',
			'name' => 'project_gallery',
			'type' => 'gallery',
		],
	],
	'location' => [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'project',
			],
		],
	],
]);

acf_add_local_field_group([
	'key' => 'group_project_big_slider',
	'title' => 'Большой слайдер проекта',
	'fields' => [
		[
			'key' => 'field_project_big_slider_title',
			'label' => 'Заголовок секции',
			'name' => 'project_big_slider_title',
			'type' => 'text',
		],
		[
			'key' => 'field_project_big_gallery',
			'label' => 'Галерея для большого слайдера',
			'name' => 'project_big_gallery',
			'type' => 'gallery',
		],
	],
	'location' => [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'project',
			],
		],
	],
]);

acf_add_local_field_group([
	'key' => 'group_project_install',
	'title' => 'Монтаж проекта',
	'fields' => [
		[
			'key' => 'field_project_install_title',
			'label' => 'Заголовок секции',
			'name' => 'project_install_title',
			'type' => 'text',
		],
		[
			'key' => 'field_project_install_gallery',
			'label' => 'Галерея монтажа',
			'name' => 'project_install_gallery',
			'type' => 'gallery',
		],
	],
	'location' => [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'project',
			],
		],
	],
]);

acf_add_local_field_group([
	'key' => 'group_project_description',
	'title' => 'Дополнительно описание',
	'fields' => [
		[
			'key' => 'field_project_description_text',
			'label' => 'Описание',
			'name' => 'project_description_text',
			'type' => 'wysiwyg',
		],
	],
	'location' => [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'project',
			],
		],
	],
]);