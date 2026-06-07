<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/bilder/favicon.jpg" type="image/jpeg">
    
    <?php wp_head(); ?> </head>
    
<body <?php body_class(); ?>>

    <header class="main-header">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/bilder/logotyp.png" alt="Yoga Studio Hälsocenter" class="logo-img">
                <span class="logo-text">Yoga Studio Hälsocenter</span>
            </a>
        </div>
        
        <nav class="main-nav">
            <div class="menu-toggle">☰</div>
            <?php
            // Krav: Dynamisk meny hanterad från WordPress admin
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container'      => false,
                'menu_class'     => 'nav-links',
            ));
            ?>
        </nav>
    </header>