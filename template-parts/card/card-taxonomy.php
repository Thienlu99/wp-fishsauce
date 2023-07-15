<?php $placeholder = get_field('logo', 'option');
$cat_object = $args['cat_object'];
$catId = $cat_object->term_id;
$url_cat = get_term_link($catId);
$excerpt = term_description($cat_object);
$url = get_field('banner', $cat_object);
if (!$url) {
    $url = $placeholder;
}
?>
<div class="card-product card-hover">
    <div class="card-wrap">
        <a href="<?php echo $url_cat; ?>" class="img-wrap thumbnail-wrapper">
            <img src="<?php echo $url; ?>" alt="" class="thumbnail">
        </a>
        <div class="card-info">
            <div class="icon">
                <i class="fas fa-building"></i>
            </div>
            <a href="<?php echo $url_cat; ?>">
                <div class="title-post">
                    <?php echo $cat_object->name; ?>
                </div>
            </a>
            <div class="excerpt">
                <?php
                $excerpt = substr($excerpt, 0, 120);
                $result = substr($excerpt, 0, strrpos($excerpt, ' '));
                echo $result; ?>
            </div>
        </div>

    </div>
</div>
