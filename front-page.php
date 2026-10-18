<?php
/*
Template Name: Главная страница
*/
?>
<?php get_header(null, ['class' => 'header-home', 'is_dark' => false]);
get_template_part('partials/home/hero');
get_template_part('partials/home/home-about');
get_template_part('partials/home/expertise');
get_template_part('partials/home/section-categories');
get_template_part('partials/home/section-process');
get_template_part('partials/home/projects');
get_template_part('partials/contacts-form');
get_template_part('partials/home/section-contacts');
get_footer(); ?>