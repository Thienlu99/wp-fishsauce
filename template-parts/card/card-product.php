<?php $placeholder = get_field('logo', 'option');
$url = wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail');
if (!$url) {
    $url = $placeholder;
}
?>
<div class="card-post">
    <div class="card-wrap">
        <a href="<?php the_permalink(); ?>" class="img-wrap thumbnail-wrapper">
            <img src="<?php echo $url; ?>" alt="" class="thumbnail">
        </a>
        <div class="card-info">
            <a href="<?php the_permalink(); ?>">
                <h3>
                    <div class="title-post">
                        <?php the_title(); ?>
                    </div>
                </h3>

            </a>
            <div class="desc">
                <?php
                $excerpt = get_the_excerpt();
                $excerpt = substr($excerpt, 0, 200);
                $result = substr($excerpt, 0, strrpos($excerpt, ' '));
                echo $result; ?>
            </div>
        </div>

    </div>
</div>
