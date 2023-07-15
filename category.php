<?php get_header(); ?>
<div class="module-news">
    <div class="container">
        <div class="bread-crumb">
           
            <?php get_template_part('template-parts/components/component', 'breadcrumb'); ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- Get post mặt định -->
                <?php if (have_posts()): ?>
                    <?php while (have_posts()):
                        the_post(); ?>
                        <!-- // tạo biến để lấy url img -->
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                        <div class="item-news">
                            <div class="row">
                                <div class="col-4 img">
                                    <a href="<?php the_permalink() ?>">
                                        <img class="img-fluid lh2-img" src="<?php echo $featured_img_url ?>"
                                            alt="<?php the_title() ?>">
                                    </a>
                                </div>
                                <div class="col-8 text">
                                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                    <p>
                                        <?php the_excerpt() ?>
                                    </p>
                                    <div class="lh2-date"><i class="fas fa-calendar-alt"></i>
                                        <?php echo get_the_date(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    ?>

                <?php endif; ?>
                <!-- Get post mặt định -->



                <!--  phân trang -->
                <div class="lh2-pagging col-12">
                    <?php if (paginate_links() != '') { ?>
                        <div class="quatrang" style="text-align: center;
    margin-bottom: 30px;">
                            <?php
                            global $wp_query;
                            $big = 999999999;
                            echo paginate_links(
                                array(
                                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                    'format' => '?paged=%#%',
                                    'prev_text' => __('«'),
                                    //thẻ a
                                    'next_text' => __('»'),
                                    //thẻ a
                                    'current' => max(1, get_query_var('paged')),
                                    'total' => $wp_query->max_num_pages
                                )
                            );
                            ?>
                        </div>
                    <?php } ?>

                    <?php //get_template_part("/template-parts/pagination")
                        ?>
                    <?php //get_template_part("template-parts/pagination")
                        ?>
                    <!-- <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-step-backward"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-step-forward"></i></a></li>
                    </ul> -->
                </div>

            </div>
            <!-- bên phải -->
            <div class="col-lg-3 d-none d-lg-block">
                <?php get_template_part("narbar") ?>

            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>