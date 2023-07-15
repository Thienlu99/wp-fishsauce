<section id="register" class="register" style="background-image: url(<?php echo get_sub_field('background'); ?>)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <?php $ctf7 = get_sub_field('ctf7');
                if ($ctf7): ; ?>
                    <div class="ctf7">
                        <?php echo do_shortcode($ctf7); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <?php $title = get_sub_field('title');
                if ($title): ; ?>
                    <div class="title register"><?php echo $title; ?></div>
                <?php endif; ?>
                <?php $list = get_sub_field('list');
                if ($list):; ?>
                    <div class="row list">
                        <?php foreach ($list as $item): ?>
                            <div class="item-wrapper">
                                <div class="header">
                                    <?php echo $item['icon']; ?>
                                    <div class="title">
                                        <?php echo $item['title']; ?>
                                    </div>
                                    <i class="fa-sharp fa-solid fa-plus status"></i>
                                    <i class="fa-sharp fa-solid fa-minus status"></i>
                                </div>
                                <div class="content">
                                    <?php echo $item['content']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>
