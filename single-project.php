<?php
/*
Template Name: Проект - типовая страница
post type: project
*/
?>
<?php get_header();
get_template_part('partials/projects/hero-single-projects');
get_template_part('partials/projects/project-details-gallery');
get_template_part('partials/projects/project-big-slider');
get_template_part('partials/projects/project-install');
get_template_part('partials/projects/project-description');
get_template_part('partials/contacts-form');
get_footer(); ?>