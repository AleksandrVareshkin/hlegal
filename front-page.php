<?php
/*
Template Name: Home
*/
$slogan = get_field('slogan');
$benefits_slider = get_field('benefits_slider');
$benefits_title = get_field('benefits_title');
$benefits_info = get_field('benefits_info');
$benefits_list_btn = get_field('benefits_list_btn');
$benefits_list_intro = get_field('benefits_list_intro');
$benefits_cards = get_field('benefits_cards');
$clients_list = get_field('clients_list');
$team_btn = get_field('team_btn');


get_header(); ?>

<main class="main">

    <?php the_content(); ?>

</main>

<?php get_footer(); ?>