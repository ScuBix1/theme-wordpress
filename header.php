<?php
if (!defined('ABSPATH')) {
    die();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Description de la page">
    <meta name="author" content="Bastian Monnin">
    <title><?php bloginfo('name'); ?> <?php (!empty(wp_title())) ? '-' . wp_title() : '' ?></title>
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri()?>/assets/css/blog.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/js/functions.js"></script>
    <?php wp_head(); ?>
</head>

<body>
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="link-secondary" href="#">Subscribe</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="<?= get_site_url(); ?>">
                        <img src="<?= get_template_directory_uri() . '/assets/images/bastian.png'; ?>" alt="logo du site avec bastian écrit" width="100" height="auto">
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="link-secondary" href="#" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5"></circle>
                            <path d="M21 21l-5.2-5.2"></path>
                        </svg>
                    </a>
                    <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3 border-bottom">
            <!--<nav class="nav nav-underline justify-content-between">
                <a class="nav-item nav-link link-body-emphasis active" href="#">World</a>
            </nav>-->
            <?php /* wp_nav_menu(array(
                'theme location' => 'menu-principal',
                'container' => 'nav',
                'container_class' => 'nav nav-underline justify-content-between'
            )) */ ?>
            <nav class="nav nav-underline justify-content-between">
                <?php 
                echo strip_tags(wp_nav_menu(array(
                    "container" => false,
                    "echo" => false,
                    "items_wrap" => '%3$s',
                    'theme location' => 'menu-principal',
                )), '<a>')
                ?>
            </nav>
        </div>
    </div>