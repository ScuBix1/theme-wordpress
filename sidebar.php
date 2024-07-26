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
    <div class="col-12"></div>
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