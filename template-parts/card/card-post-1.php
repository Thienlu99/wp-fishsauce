<?php $placeholder = get_field('logo', 'option');
$url = wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail');
if (!$url) {
    $url = $placeholder;
}
?>
<div class="card-post style-1">
    <div class="card-wrap">
        <a rel="nofollow" href="<?php the_permalink(); ?>" class="img-wrap thumbnail-wrapper">
            <img src="<?php echo $url; ?>" alt="" class="thumbnail">
            <?php $info = get_field('info');
            if ($info): ; ?>
                <div class="list-info">
                    <?php foreach ($info as $item): ?>
                        <div class="item">
                            <div class="tieu-de">
                                <?php echo $item['title']; ?>
                            </div>
                            <div class="detail">
                                <?php echo $item['desc']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
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
