<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package THCmedia-company
 */

get_header();
$placeholder = get_field('logo', 'option');
$url = wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail');
?>

<main class="single-layout">
<?php get_template_part('template-parts/breadcrumb'); ?>
    <?php $banner = get_field('banner_default', 'option');
    if ($banner) :; ?>
        <div class="banner">
            <div class="img-wrap">
                <img src="<?php echo $banner; ?>" alt="<?php the_title() ?>">
            </div>
        </div>
    <?php endif; ?>
    <div class="container ">
        <?php if (function_exists('thcmedia_breadcrumb')) thcmedia_breadcrumb(); ?>
        <?php //if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        <?php //get_template_part('template-parts/breadcrumb'); ?>
        <?php //get_template_part('/template-parts/breadcrumb'); ?>
        <?php //get_template_part('template-parts/components/component', 'breadcrumb'); ?>
        <?php //get_template_part('template-parts/components/component-breadcrumb'); ?>
        <div class="row">
            <div class="col-12 col-md-9 col-lg-9">
                <div class="content-wrap">
                    <div class="header-wrapper">
                        <?php $listImage = get_field('list_image');
                        if ($listImage) :; ?>
                            <div class="list_image">
                                <div class="image-product product image-product-single">
                                    <div class="image-big">
                                        <?php
                                        foreach ($listImage as $item) :; ?>
                                            <div class="img-wrap">
                                                <img id="thumb" src="<?php echo $item['image']; ?>" alt="" class="thumbnail">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="image-small">
                                        <?php
                                        foreach ($listImage as $item) :; ?>
                                            <div class="item-small">
                                                <img src="<?php echo $item['image']; ?>" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="info">
                            <h1 class="title">
                                <?php echo the_title(); ?>
                            </h1>

                            <div class="meta-box d-flex">
                                <div class="count_views mr-4">
                                    <i class="far fa-eye"></i>
                                    <?php $viewNumber = get_field('view_number');
                                    if ($viewNumber) :
                                        echo $viewNumber;
                                    else :
                                        echo getPostViews(get_the_ID()); ?>

                                    <?php endif; ?> lượt xem
                                </div>
                                <div class="date mr-4">
                                    <i class="fa-regular fa-calendar-days mr-2"></i> <?php echo get_the_date('d/m/Y'); ?>
                                </div>
                                <div class="time">
                                    <i class="fa-regular fa-clock mr-2"></i> <?php echo get_post_time('g:i'); ?>
                                </div>
                            </div>
                            <?php $info = get_field('info');
                            if ($info) :; ?>
                                <div class="info-list">
                                    <?php foreach ($info as $item) : ?>
                                        <div class="item">
                                            <div class="title">
                                                <?php echo $item['title']; ?>
                                            </div>
                                            <div class="desc">
                                                <?php echo $item['desc']; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="call-to-action">
                                    <?php $hotline = get_field('hotline', 'option');
                                    if ($hotline) :; ?>
                                        <div class="button-timi-pri">
                                            <a href="tel:<?php echo $hotline; ?>"><?php _e('Hotline', 'hotline'); ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php $quoteForm = get_field('quote_form', 'option');
                                    if ($quoteForm) :; ?>
                                        <div class="button-timi-pri">
                                            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter"><?php _e('Nhận báo giá', 'nhận_báo_giá'); ?></button>

                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade call_to_action" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="title">
                                                            Thông tin đặt hàng
                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="ctf7">
                                                            <?php echo do_shortcode($quoteForm); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>



                                </div>
                            <?php endif; ?>


                        </div>

                    </div>

                    <div class="content-entry">
                        <?php echo the_content(); ?>
                        <?php //echo share_social_button(); 
                        ?>
                    </div>
                    <div id="cm-timi" class="timi-comment">
                        <?php comments_template(); ?>
                    </div>
                </div>
            </div>
            <!-- end bai viet -->

            <!-- navsidebar -->
            <div class="col-lg-3 d-none d-lg-block">
                <?php get_template_part("narbar") ?>

            </div>
        </div>


        <div class="title-thc mb-4">
            <!-- bài viết liên -->
            <?php _e('Bài viết liên quan', 'bài_viết_liên_quan'); ?>
        </div>
        <div class="row">
            <?php
            global $post;
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'order' => 'DESC',
                'post__not_in' => array(get_the_ID()),
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();
                    global $product;
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID), 'single-post-thumbnail');
            ?>
                    <div class="col-12 col-md-4 col-lg-4">
                        <?php get_template_part('template-parts/card/card-post'); ?>
                    </div>
            <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>
    </div>
</main>
<?php
setPostViews(get_the_ID());
get_footer(); ?>
<?php get_footer();
