<section id="testimonial" class="testimonial">
    <div class="container">
        <?php $title = get_sub_field('title');
        if ($title): ?>
            <div class="title-thc">
                <?php echo $title; ?>
            </div>
        <?php endif; ?>
        <?php $list = get_sub_field('list');
        if ($list):; ?>
            <div class="row list-tes">
                <?php foreach ($list as $item): ?>
                    <div class="item-wrapper">
                        <div class="avatar">
                            <div class="img-wrap">
                                <img src="<?php echo $item['avatar']; ?>" alt="">
                            </div>
                            <div class="name">
                                <?php echo $item['name']; ?>
                            </div>
                        </div>
                        <div class="content-feed">
                            <?php echo $item['content']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
