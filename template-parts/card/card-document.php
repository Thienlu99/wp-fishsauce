<?php $placeholder = get_field('logo', 'option');
$url = wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail');
if (!$url) {
    $url = $placeholder;
}
?>
<div class="card-post">
    <div class="card-wrap">
        <div class="title-doc">
            <?php the_title(); ?>
        </div>
        <div class="img-wrap">
            <img src="<?php echo $url; ?>" alt="">
        </div>
        <div class="card-info">
            <?php $subTitle = get_field('sub_title');
            if ($subTitle): ; ?>
                <div class="sub-title">
                    <div class="title-post">
                        <?php echo $subTitle; ?>
                    </div>
                </div>
            <?php endif; ?>


        </div>
        <div class="card-info doc">
            <?php $document = get_field('document');
            if ($document): ; ?>
                <a href="<?php echo $document; ?>" class="sub-title" download="<?php the_title(); ?>">
                    <?php $downloadText = get_field('download_text');
                    if ($downloadText): ; ?>
                        <div class="title-post">
                            <?php echo $downloadText; ?>
                        </div>
                    <?php endif; ?>
                </a>
            <?php endif; ?>

        </div>

    </div>
</div>
