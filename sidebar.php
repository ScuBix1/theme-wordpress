<?php
if (!defined('ABSPATH')) {
    die();
}
$categories = get_categories(array(
    'taxomany' => 'category',
    'orderby' => 'id'
));
?>
<div class="row">
    <div class="col-12">
        <h3>Rechercher</h3>
        <?php //get_search_form(); ?>
        <form action="" method="GET" name="search">
            <div class="input-group mb-3">
                <input type="text" name="s" id="s" id="form-control" placeholder="Rechercher..." value="<?php sanitize_text_field($_GET['s'])?>">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2" title="Rechercher" onclick="searchArticle()">Rechercher</button>
            </div>
        </form>
    </div>
    <div class="col-12">
        <h3>Catégories</h3>
        <div class="list-group">
            <?php
            foreach ($categories as $key => $category) {
            ?>
                <a class="list-group-item list-group-item-action" href="<?= get_category_link($category->term_id) ?>" title="<?= $category->name ?>"><?= $category->name ?></a>
            <?php } ?>
        </div>
    </div>
</div>