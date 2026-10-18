<?php
function register_cpt_project()
{
	$labels = [
		'name' => 'Проекты',
		'singular_name' => 'Проект',
		'menu_name' => 'Проекты',
		'add_new' => 'Добавить проект',
		'add_new_item' => 'Добавить новый проект',
		'edit_item' => 'Редактировать проект',
		'new_item' => 'Новый проект',
		'view_item' => 'Посмотреть проект',
		'search_items' => 'Найти проект',
		'not_found' => 'Проекты не найдены',
		'not_found_in_trash' => 'В корзине проектов не найдено',
	];

	$args = [
		'labels' => $labels,
		'public' => true,
		'has_archive' => 'projects',
		'menu_icon' => 'dashicons-portfolio',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'projects'],
		'menu_position' => 10,
	];

	register_post_type('project', $args);
}
add_action('init', 'register_cpt_project');