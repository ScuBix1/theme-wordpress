<?php
if (!defined('ABSPATH')) {
    die();
}
get_header();
$comments = get_comments('post_id=' . get_the_ID());
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
                            <form method="POST" action="" name="form" class="comment-form" id="form">
                                <h3>Laisses un commentaire ! </h3>
                                <p>L'adresse email ne sera pas publiée</p>
                                <fieldset>
                                    <div class="row">
                                        <p>
                                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Votre pseudo..." required>
                                        </div>
                                        </p>
                                        <p>
                                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Votre email..." required>
                                        </div>
                                        </p>
                                        <p>
                                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                            <textarea id="message" name="message" class="form-control" placeholder="Votre commentaire..." required></textarea>
                                        </div>
                                        </p>
                                    </div>
                                </fieldset>
                                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('submit_comment_nonce'); ?>">
                                <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
                                <button type="submit" name="submit_comment" class="btn btn-primary">Envoyer</button>
                            </form>
                            <h3><?= sizeof($comments) ?> Commentaire(s)</h3>
                            <?php foreach ($comments as $comment) { ?>
                                <div class="card bg-light bg-gradient my-3">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex align-items-center gap-2"><i class="fa-solid fa-user"></i><?= ' ' . $comment->comment_author ?> </h5>
                                        <p>Publié le <?= date('Y-m-d', strtotime($comment->comment_date)) ?></p>
                                        <p class="card-text"><?= $comment->comment_content ?></p>
                                    </div>
                                </div>
                            <?php } ?>
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