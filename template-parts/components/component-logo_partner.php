<section id="logo_partner" class="logo_partner">
    <div class="container">
        <?php $title = get_sub_field('title');
        if ($title):; ?>
            <div class="title-thc">
                <?php echo $title; ?>
            </div>
        <?php endif; ?>
        <?php $list = get_sub_field('list');
        if ($list):; ?>
            <div class="row brand-slider">
                <?php foreach ($list as $item): ?>
                    <div class="img-wrap">
                        <img src="<?php echo $item['image']; ?>" alt="">
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>
    </div>
</section>
