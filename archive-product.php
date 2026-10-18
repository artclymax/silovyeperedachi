<?php
/*
Template Name: Системы внесения
*/
?>
<?php get_header();
get_template_part('partials/components/hero-catalog');
get_template_part('partials/catalog/catalog-categories');
get_template_part('partials/contacts-form', null, ['page' => 'shop']);
get_footer(); ?>