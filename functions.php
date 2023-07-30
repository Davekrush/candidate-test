<?php
// functions.php

function kdweb_enqueue_scripts() {
    // Enqueue the main stylesheet (style.css)
    wp_enqueue_style('kdweb-style', get_stylesheet_uri());

    // Enqueue the script.js file for handling the menu toggle
    wp_enqueue_script('kdweb-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'kdweb_enqueue_scripts');

function kdweb_theme_support() {
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'kdweb_theme_support');

function kdweb_register_menus() {
    register_nav_menus(array(
        'main-menu' => 'Main Menu',
        'footer-menu' => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'kdweb_register_menus');

// Add site logo function
function kdweb_customize_register($wp_customize) {
    // Add a section for the site logo
    $wp_customize->add_section('kdweb_site_logo_section', array(
        'title' => __('Site Logo', 'kdweb'),
        'priority' => 20,
    ));

    // Add setting for the site logo
    $wp_customize->add_setting('kdweb_site_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Add the control for the site logo setting
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kdweb_site_logo', array(
        'label' => __('Upload Site Logo', 'kdweb'),
        'section' => 'kdweb_site_logo_section',
        'settings' => 'kdweb_site_logo',
    )));

    // Add setting for site logo position
    $wp_customize->add_setting('kdweb_site_logo_position', array(
        'default' => 'left',
        'transport' => 'refresh',
    ));

    // Add the control for site logo position setting
    $wp_customize->add_control('kdweb_site_logo_position', array(
        'type' => 'radio',
        'section' => 'kdweb_site_logo_section',
        'label' => __('Site Logo Position', 'kdweb'),
        'choices' => array(
            'left' => __('Left', 'kdweb'),
            'right' => __('Right', 'kdweb'),
        ),
    ));
}

add_action('customize_register', 'kdweb_customize_register');


// Add hero image function
function kdweb_customize_register_hero($wp_customize) {
    // Add a section for the hero image
    $wp_customize->add_section('kdweb_hero_image_section', array(
        'title' => __('Hero Image', 'kdweb'),
        'priority' => 25, // Adjust the priority to control the order in the Customizer
    ));

    // Add setting for the hero image
    $wp_customize->add_setting('kdweb_hero_image', array(
        'default' => '',
        'transport' => 'refresh', // Can be 'refresh' or 'postMessage'
    ));

    // Add the control for the hero image setting
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kdweb_hero_image', array(
        'label' => __('Upload Hero Image', 'kdweb'),
        'section' => 'kdweb_hero_image_section',
        'settings' => 'kdweb_hero_image',
    )));
}

add_action('customize_register', 'kdweb_customize_register');
add_action('customize_register', 'kdweb_customize_register_hero');



function kdweb_allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'kdweb_allow_svg_upload' );


// Add custom text box function
function kdweb_customize_register_text_box($wp_customize) {
    // Add a section for the custom text box
    $wp_customize->add_section('kdweb_custom_text_box_section', array(
        'title' => __('Custom Text Box', 'kdweb'),
        'priority' => 30, // Adjust the priority to control the order in the Customizer
    ));

    // Add setting for the custom text box
    $wp_customize->add_setting('kdweb_custom_text_box', array(
        'default' => '',
        'transport' => 'refresh', // Can be 'refresh' or 'postMessage'
    ));

    // Add the control for the custom text box setting
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'kdweb_custom_text_box', array(
        'label' => __('Custom Text Box Content', 'kdweb'),
        'section' => 'kdweb_custom_text_box_section',
        'settings' => 'kdweb_custom_text_box',
        'type' => 'textarea',
    )));
}

add_action('customize_register', 'kdweb_customize_register_text_box');

function kdweb_add_editor_styles() {
    add_editor_style('custom-editor-styles.css');
}
add_action('admin_init', 'kdweb_add_editor_styles');
