<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_category_catalog',
		'title' => 'Каталог товаров категории',
		'fields' => [
			[
				'key' => 'field_category_catalog_accordion',
				'label' => 'Каталог товаров категории',
				'name' => 'category_catalog_accordion',
				'type' => 'accordion',
			],
			[
				'key' => 'field_category_catalog_title',
				'label' => 'Заголовок секции',
				'name' => 'category_catalog_title',
				'type' => 'text',
				'instructions' => 'Если пусто, будет использовано название категории',
			],
			[
				'key' => 'field_category_catalog_descr',
				'label' => 'Описание',
				'name' => 'category_catalog_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_category_catalog_btn',
				'label' => 'Кнопка «Помощь с выбором»',
				'name' => 'category_catalog_btn',
				'type' => 'link',
			],
		],
		'location' => [
			[
				[
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'product_cat',
				],
			],
		],
		'menu_order' => 2,
	]);
}