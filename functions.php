<?php

// Add Theme Support
define('portfolio', 1.0);


// Create navigation
function register_menus() {
    register_nav_menus(
        array(
            'main-nav' => __('Main Nav')
        )
    );
}
add_action('init', 'register_menus');


// Load Scripts
function site_scripts() {		
	wp_enqueue_style('site-style', get_stylesheet_directory_uri() . '/style.css', '1.0', 'all');
    wp_enqueue_script('site-functions', get_template_directory_uri() . '/js/portfolio-functions.js', array('jquery'), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );


// Make Wordpress Admin content area use theme stylesheet
add_editor_style('style.css');


// Dont Add pTags around images in Text Editor 
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


// Dont Remove Span Tags in Text Editor
function myextensionTinyMCE($init) {
    // Command separated string of extended elements
    $ext = 'span[id|name|class|style|onclick],div[id|name|class|style|onclick]';

    // Add to extended_valid_elements if it alreay exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    return $init;
}
add_filter('tiny_mce_before_init', 'myextensionTinyMCE' );


// Don't Add p Tags automatically in ACF Text Editor
function acf_wysiwyg_remove_wpautop() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');


// Move the Yoast SEO Admin Menu to the Bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


// Register Widgets
function register_widgets() {

    register_sidebar( array(
        'name'          => 'General Sidebar',
        'id'            => 'general_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'register_widgets' );