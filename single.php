<?php
if (!defined('ABSPATH')) {
    die();
}
get_header();
if(isset($_POST['nonce'])){
    wp_insert_comment(array(
        'comment_post_ID' => get_the_ID(),
        'comment_author' => sanitize_text_field($_POST['name']),
        'comment_author_email' => sanitize_email($_POST['mail']),
        'comment_author_url' => '',
        'comment_content' => sanitize_textarea_field($_POST['message']),
        'comment_author_IP' => '127.0.0.1',
        'comment_agent' => $_SERVER['HTTP_USER_AGENT'],
        'comment_type' => '',
        'comment_date' => date('Y-m-d H:i:s'),
        'comment_date_gmt' => date('Y-m-d H:i:s'),
        'comment_approuved' => 0,
    ));
?>
<script type="text/javascript">
    window.location = location.href;
</script>
<?php
}
while (have_posts()) {
    the_post();
?>
    <main class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= get_site_url(); ?>">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="<?= get_site_url(); ?>/blog">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
            <div class="col-8">
                <h1><?php the_title(); ?></h1>
                <div class="card mb-3 blog-container">
                    <?php the_post_thumbnail('full', array('class' => 'img-fluid img-blog-grande')) ?>
                    <div class="card-body">
                        <p>
                            <?= the_category(' '); ?> | <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | <?= get_the_date('Y-m-d'); ?>
                        </p>
                        <p>
                            <?= the_content(); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <section class="content-item">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <form action="" id="formulaire" method="POST" name="comment-form" class="comment-form  needs-validation" novalidate>
                                <h3>Donnes nous ton avis !</h3>
                                <p>Ton adresse mail ne sera pas publiée.</p>
                                <fieldset>
                                    <div class="row">
                                        <p>
                                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Prénom" value=''>
                                        </div>
                                        </p>
                                        <p>
                                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                            <input type="text" name="mail" id="mail" class="form-control" placeholder="Adresse mail">
                                        </div>
                                        </p>
                                        <p>
                                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                            <textarea name="message" id="message" class="form-control" placeholder="Tapez votre commentaire..."></textarea>
                                        </div>
                                        </p>
                                    </div>
                                </fieldset>
                                <input type="hidden" name="nonce" value="<?= wp_create_nonce(); ?>">
                                <button type="button" class="btn btn-primary" onclick="confirmationSubmit()">Publier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<?php
}
get_footer();
?>