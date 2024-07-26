<?php 
if(!defined("ABSPATH")){
    die();
}
/* enregistrer le commentaire d'un blog */
function custom_insert_comment() {
    if (isset($_POST['submit_comment']) && isset($_POST['nonce']) && wp_verify_nonce($_POST['nonce'], 'submit_comment_nonce')) {
        $comment_data = array(
            'comment_post_ID' => intval($_POST['post_id']),
            'comment_author' => sanitize_text_field($_POST['name']),
            'comment_author_email' => sanitize_email($_POST['email']),
            'comment_content' => sanitize_textarea_field($_POST['message']),
            'comment_type' => '',
            'comment_date' => date('Y-m-d H:i:s'),
            'comment_date_gmt' => date('Y-m-d H:i:s'),
            'comment_approved' => 0
        );

        wp_insert_comment($comment_data);
        wp_redirect(get_permalink($comment_data['comment_post_ID']));
        exit;
    }
}
add_action('init', 'custom_insert_comment');

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
    }
    add_action('wp_enqueue_scripts', 'theme_entrainement_enqueue');
}
add_action('init', function(){
    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'Theme_Entrainement')
    ));

});
?>