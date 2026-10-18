<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_home_hero',
		'title' => 'Первый экран',
		'fields' => [
			[
				'key' => 'field_home_hero_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_home_hero_title',
				'label' => 'Заголовок',
				'name' => 'home_hero_title',
				'type' => 'text',
			],
			[
				'key' => 'field_home_hero_descr',
				'label' => 'Описание',
				'name' => 'home_hero_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_home_hero_scroll_link',
				'label' => 'Ссылка для прокрутки',
				'name' => 'home_hero_scroll_link',
				'type' => 'text',
				'instructions' => 'Якорная ссылка для кнопки прокрутки вниз (по умолчанию: #home-about)',
				'default_value' => '#home-about',
			],
			[
				'key' => 'field_home_hero_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_home_hero_media',
				'label' => 'Фоновое изображение/видео',
				'name' => 'home_hero_media',
				'type' => 'file',
				'instructions' => 'Загрузите изображение (JPG, PNG) или видео (MP4). Видео будет воспроизводиться автоматически без звука.',
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