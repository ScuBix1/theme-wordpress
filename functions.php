<?php 
if(!defined("ABSPATH")){
    die();
}
if(!function_exists("post_thumbnails_add")){
    function post_thumbnails_add(){
        add_theme_support("post-thumbnails");
    }
    add_action("after_setup_theme", "post_thumbnails_add");
}
if(!function_exists("theme_entrainement_enqueue")){
    function theme_entrainement_enqueue(){
        wp_enqueue_style('bootstrapCss', get_stylesheet_uri('assets/css/bootstrap.min.css', __FILE__));
        wp_enqueue_script('bootstrapJs', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'));
        wp_enqueue_script('bootstrapJs', get_template_directory_uri().'/assets/js/functions.js');
    }
    add_action('wp_enqueue_scripts', 'theme_entrainement_enqueue');
}
add_action('init', function(){
    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'Theme_Entrainement')
    ));
});
?>