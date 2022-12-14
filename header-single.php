<?php

$logo_1 = get_field('logo_1', 'option');
$logo_2 = get_field('logo_2', 'option');
$address = get_field('address', 'option');
$phone = get_field('phone', 'option');
$social_link = get_field('social_link', 'option');
$social_icon = get_field('social_icon', 'option');
$e_mail = get_field('e-mail', 'option');


$logo_settings = get_field('logo_settings');
$show_current_page = get_field('show_current_page');
$current_page_color = get_field('current_page_color');
$page_bg_color = get_field('page_bg_color');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <title>
        <?php if (is_404()) {
            echo 'Erorr404';
        } else {
            the_title();
        }
        ?>
    </title>
    <?php wp_head(); ?>
</head>

<body style="background-color:<?php echo $page_bg_color; ?>">
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header__subheader">
                        <div class="header__lang">
                            <a href="#">ук</a>
                            <a href="#">ру</a>
                            <a href="#">en</a>
                        </div>
                        <div class="header__contact">
                            <?php if ($address) : ?>
                                <div class="header__address">
                                    <?php echo $address; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($phone) : ?>
                                <div class="header__phone">
                                    <a href="tel:<?php echo $phone; ?>">
                                        <?php echo $phone; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($social_icon) : ?>
                                <div class="header__fb">
                                    <a class="header__fb-link" href="<?php echo $social_link['url']; ?>">
                                        <?php echo file_get_contents($social_icon['url']) ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="header__logo">
                        <a href="<?php echo get_home_url(); ?>" class="header__logo-link">
                            <?php echo file_get_contents($logo_2['url']) ?>
                        </a>
                        <div class="header__logo-slash">
                            <svg width="12" height="47" viewBox="0 0 21 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1752 0H21L5.82482 47H0L15.1752 0Z" fill="#F0145A" />
                            </svg>
                        </div>
                        <div class="header__current-page">
                            <span style="color: <?php echo $current_page_color; ?>"><?php the_title() ?></span>
                        </div>

                    </div>
                    <div class="header__menu-btn">
                        <svg width="32" height="32" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 10.5H25" stroke="white" stroke-width="2" />
                            <path d="M7 16.5H25" stroke="white" stroke-width="2" />
                            <path d="M7 22.5H25" stroke="white" stroke-width="2" />
                        </svg>
                    </div>

                    <?php
                    wp_nav_menu([
                        'theme_location'  => 'header_menu',
                        'container'       => 'nav',
                        'container_class' => 'header__nav',
                        'menu'            => 'Header menu',
                        'menu_class'      => 'header__nav-list',
                        'menu_id'         => 'header__nav-list',
                        'echo'            => true,
                        'walker'          => '',
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                    ]);
                    ?>
                </div>
            </div>

            <?php
            wp_nav_menu([
                'theme_location'  => 'header_menu',
                'container'       => 'div',
                'container_class' => 'menu',
                'menu'            => '',
                'menu_class'      => 'header__nav-list',
                'menu_id'         => 'header__nav-list',
                'echo'            => true,
                'walker'          => '',
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
            ]);
            ?>
        </header>