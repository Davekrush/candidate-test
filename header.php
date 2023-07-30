<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php
    // Get the site logo setting from the Customizer
    $site_logo = get_theme_mod('kdweb_site_logo', '');



    // Get the site logo position setting from the Customizer
    $site_logo_position = get_theme_mod('kdweb_site_logo_position', 'left');

        // Get the hero image setting from the Customizer
        $hero_image = get_theme_mod('kdweb_hero_image', '');

    // Get the custom text box content from the Customizer
    $custom_text_box = get_theme_mod('kdweb_custom_text_box', '');

    // Display the hero image if it's set
    if ($hero_image) :
    ?>
    <div class="hero-image" style="background-image: url('<?php echo esc_url($hero_image); ?>'); min-height: 617px; position: relative;">
        <?php if ($custom_text_box) : ?>
            <div class="custom-text-box"><?php echo wp_kses_post($custom_text_box); ?></div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <header <?php echo ($site_logo_position === 'right') ? 'class="site-logo-right"' : ''; ?>>
        <?php

        if ($site_logo) :
        ?>
        <div class="site-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($site_logo); ?>" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        <?php endif; ?>

        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>

        <button id="menu-toggle">&#9776;</button>
        
    
        <nav id="main-menu" class="mobile-menu">
            <?php
         
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => true,
            ));
            ?>
        </nav>
    </header>

