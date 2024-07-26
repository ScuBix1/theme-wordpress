<?php
if (!defined('ABSPATH')) {
    die();
}
get_header();
?>
<main class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= get_site_url(); ?>">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-8">
            <h1>Bienvenue sur mon blog</h1>
            <h3>Il y a <?= wp_count_posts()->publish; ?> Publication(s)</h3>
            <?php
            while (have_posts()) {
                the_post();
            ?>
                <div class="card mb-3 blog-container">
                    <?php the_post_thumbnail('full', array('class' => 'img-fluid img-blog-grande')) ?>
                    <div class="card-body">
                        <div class="card-title">
                            <p>
                                <?= the_category(' '); ?> | <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | <?= get_the_date('Y-m-d'); ?>
                            </p>
                        </div>
                        <hr>
                        <a href="<?php the_permalink(); ?>" class="blog-titre">
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-4">
            <?= get_sidebar(); ?>
        </div>
    </div>
</main>
<?php
get_footer();
?>