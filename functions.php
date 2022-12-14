<?php
add_action('wp_enqueue_scripts', 'add_scripts_and_styles');
add_action('after_setup_theme', 'add_features');
add_action('after_setup_theme', 'add_menu');


/*************Register Block**************/

add_action('init', 'register_acf_blocks');
function register_acf_blocks()
{
    register_block_type(__DIR__ . '/blocks/testimonial');
    register_block_type(__DIR__ . '/blocks/services');
    register_block_type(__DIR__ . '/blocks/benefits');
    register_block_type(__DIR__ . '/blocks/team-slider');
    register_block_type(__DIR__ . '/blocks/clients');
    register_block_type(__DIR__ . '/blocks/about-intro');
    register_block_type(__DIR__ . '/blocks/about-baner');
    register_block_type(__DIR__ . '/blocks/text-block');
    register_block_type(__DIR__ . '/blocks/achievements');
    register_block_type(__DIR__ . '/blocks/intro-block');
    register_block_type(__DIR__ . '/blocks/publications-block');
    register_block_type(__DIR__ . '/blocks/contact');
    register_block_type(__DIR__ . '/blocks/team-block');
}

// include custom jQuery
function shapeSpace_include_custom_jquery()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');


function add_scripts_and_styles()
{
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/style.css');
    wp_enqueue_script('swiper_js', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', false, null,);
    wp_enqueue_style('swiper_css', 'https://unpkg.com/swiper@8/swiper-bundle.min.css');
}
add_action('wp_footer', 'scripts_theme');


function scripts_theme()
{
    wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.js');
    wp_enqueue_script('burger', get_template_directory_uri() . '/js/burger.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');
}
function add_features()
{
}
function add_menu()
{
    register_nav_menu('header_menu', 'Header menu');
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}
add_theme_support('post-thumbnails');


/***********<?php echo '<pre>' . var_export($home_header_fb, true) . '</pre>';?>**********/


/**************** AJAX *****************/
function true_loadmore_scripts()
{
    wp_enqueue_script('jquery'); // скорее всего он уже будет подключен, это на всякий случай
    wp_enqueue_script('loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'true_loadmore_scripts');


function true_load_posts()
{

    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    // обычно лучше использовать WP_Query, но не здесь
    query_posts($args);
    // если посты есть
    if (have_posts()) :

        // запускаем цикл
        while (have_posts()) : the_post();

            get_template_part('template-parts/post/content', get_post_format());

        endwhile;

    endif;
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
