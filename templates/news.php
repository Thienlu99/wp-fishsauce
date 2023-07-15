<?php

/**
 * Template Name: Giao diện Tin tức
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Baophuoc
 * @since 1.0.0
 */

get_header();
?>
<main class="news-layout">
    <?php get_template_part('template-parts/components/component', 'breadcrumb'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
            <h1>
            <div class="title-thc mb-4">
                <?php the_title(); ?>
            </div>
        </h1>
        <div class="row">
            <?php
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } else if (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'post',
                //                'category__not_in' => array($project_cat->term_id),
                'posts_per_page' => get_option('posts_per_page'),
                'suppress_filters' => false
            );
            $getposts = new WP_query($args);
            global $wp_query;
            $wp_query->in_the_loop = true;
            while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <div class="col-12 col-md-4 col-lg-4">
                    <?php get_template_part('template-parts/card/card-post'); ?>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>

        <!-- phaan trang -->
        <div class="row">
            <div class="col-12">
                <ul class="pagination">
                    <a>
                        <?php
                        if (!$current_page = get_query_var('paged')) {
                            $current_page = 1;
                        }
                        if (get_option('permalink_structure')) {
                            $format = 'pages%#%';
                        } else {
                            $format = '&pageds=%#%';
                        }
                        global $wp_query;
                        $big = 999999999;
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => $format,
                            'prev_text' => __('<span class="text-pagi-wrap"><i class="fa-solid fa-angle-left"></i></span>'),
                            'next_text' => __('<span class="text-pagi-wrap"><i class="fa-solid fa-angle-right"></i></i></span>'),
                            'current' => max(1, get_query_var('paged')),
                            'total' => $getposts->max_num_pages,
                            'show_all' => false,
                            'type' => 'plain',
                            'end_size' => 2,
                            'mid_size' => 1,
                            'prev_next' => true,
                            'add_args' => false,
                            'before_page_number' => '<span class="text-pagi-wrap">',
                            'after_page_number' => '</span>'
                        ));
                        ?>
                    </a>
                </ul>
            </div>
        </div>
            </div>
            <div class="col-md-3"><?php get_template_part("narbar") ?></div>
        </div>
      
    </div>
</main>


<?php get_footer(); ?>