<?php $placeholder = get_field('logo', 'option');
$url = wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail');
if (!$url) {
    $url = $placeholder;
}
?>
<div class="card-project">
    <div class="card-wrap">
        <a rel="nofollow" href="<?php the_permalink(); ?>" class="img-wrap thumbnail-wrapper">
            <img src="<?php echo $url; ?>" alt="" class="thumbnail">
        </a>
        <div class="card-info">
            <a rel="nofollow" href="<?php the_permalink(); ?>">
                <div class="title-post">
                    <?php the_title(); ?>
                </div>
            </a>
        </div>

    </div>
</div>
