<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_product_specs',
		'title' => 'Характеристики товара',
		'fields' => [
			[
				'key' => 'field_product_power',
				'label' => 'Мощность',
				'name' => 'product_power',
				'type' => 'text',
				'instructions' => 'Укажите мощность с единицей измерения. Например: 63 кВт, 110 кВт',
			],
		],
		'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
				],
			],
		],

	]);
}