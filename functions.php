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
?>