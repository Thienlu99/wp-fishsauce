<section id="header_slide" class="header_slide">
    <div class="image-slider">
        <?php $list = get_sub_field('list');
        if ($list):
            foreach ($list as $item):?>
                <?php $image = $item['image'];
                if (!$image){
                    $image = 'http://via.placeholder.com/1900x500';
                };?>
                <div class="img-wrap">
                    <img src="<?php echo $image; ?>" alt="">
                </div>
            <?php endforeach;
        endif;
        ?>
    </div>
</section>
