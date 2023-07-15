<?php

/**
 * Template Name: Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @since 1.0.0
 */
get_header();

?>


<main class="pt-4">


    <?php //get_template_part('/template-parts/components/component', 'breadcrumb'); 
    ?>
    <section class="section-single">

        <div class="container">
            <?php //get_template_part('inc/extra-function/common'); 
            ?>
            <?php //thcmedia_breadcrumb() 
            ?>
            <?php //get_template_part('/template-parts/components/component', 'breadcrumb'); 
            ?>
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>

            <div class="row">
                <div class="col-md-9">
                    <h1 class="title">
                        <?php //the_title(); ?>
                    </h1>
                    <div class="content-post_single">
                        <?php the_content(); ?>
                    </div>

                    <div class="block-product">
                        <div class="container">
                            <h2 class="lh2-title text-center mt-5"> <?php the_title(); ?></h2>
                            <div class="row">

                                <!-- Get post News Query -->
                                <?php $getposts = new WP_query();
                                $getposts->query('post_status=publish&showposts=10&post_type=san-pham'); ?>
                                <?php global $wp_query;
                                $wp_query->in_the_loop = true; ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                    <!-- // tạo biến để lấy url img -->
                                    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                    <!-- code -->
                                    <div class="item-product col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="bg">
                                            <div class="img-height" style="width: 250px;">
                                                <a class="img" href="<?php the_permalink(); ?>">
                                                    <img class="img-fluid lh2-img" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                                                </a>
                                            </div>
                                            <div class="info-product">
                                                <a class="name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <p class="price"> <b><i class="fas fa-tag"></i>Giá:</b><?php the_field("gia_san_pham") ?></p>

                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                                <!-- Get post News Query -->
                                <!-- end item -->



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php get_template_part("narbar") ?>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>