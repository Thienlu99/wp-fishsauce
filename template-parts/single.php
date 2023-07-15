<section class="section-single">
    <?php get_template_part('template-parts/breadcrumb'); ?>
    <div class="container">
        <div class=" block-new">
            <div class="block-content">
                <h1 class="title">
                    <?php the_title(); ?>
                </h1>
                <?php if (is_single()): ?>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="<?php echo is_checkout() || is_cart() ? 'col-12' : 'col-12 col-lg-8 col-md-12 block__right' ?>">
                    <!-- <div class="content-post_single <?php echo is_checkout() || is_cart() ? 'row' : '' ?>">
                        <?php
                    $content = get_the_content();
                    if ($content) {
                        echo get_customs_content($content);
                    }
                    ?>
                    </div> -->
                    <div class="content-post_single">
                        <?php the_content(); ?>
                    </div>
                    <?php if (is_single()): ?>

                        <?php if (function_exists('thcmedia_box_author')) thcmedia_box_author(); ?>
                        <?php if (function_exists('share_social_button')) share_social_button(); ?>
                        <?php // get_template_part('template-parts/sandbox'); ?>
                        <div class="comment">
                            <?php comments_template(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (!is_checkout() || !is_cart()): ?>
                    <div class="col-12 col-lg-4 col-md-12 block__left">
                        <?php get_template_part('template-parts/sidebar/sidebar', 'new'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
