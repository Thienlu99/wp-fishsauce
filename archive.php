<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package
 */

get_header();

$category = get_the_category();
if ($category) {
    $firstCategory = $category[0]->cat_name;
    $category_link = get_category_link($category[0]->term_id);
}
?>
<main class="news-layout">
    <?php get_template_part('template-parts/breadcrumb'); ?>
    <?php get_template_part('template-parts/components/component', 'breadcrumb'); ?>
    <section class="full-page archive-post py-4">
        <div class="container news">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12 block__right">
                    <!-- <div class="wrapper-archive-post wrapper-bg-oleo mt-0">
                        <div class="list-new mb-30px">
                            <h1>
                                <div class="title-timi-1">
                                    <?php single_cat_title(); ?>
                                </div>
                            </h1>
                            <div class="row">
                                <?php
                                $cat_id = get_query_var('cat');
                                if (get_query_var('paged')) {
                                    $paged = get_query_var('paged');
                                } else if (get_query_var('page')) {
                                    $paged = get_query_var('page');
                                } else {
                                    $paged = 1;
                                }
                                $cat_id = get_query_var('cat');
                                $args = array(
                                    'post_status' => 'publish',
                                    // Chỉ lấy những bài viết được publish
                                    'post_type' => 'post',
                                    // Lấy những bài viết thuộc post, nếu lấy những bài trong 'trang' thì để là page
                                    'posts_per_page' => get_option('posts_per_page'),
                                    'paged' => $paged,
                                    'cat' => $cat_id,
                                    'suppress_filters' => false
                                );
                                $getposts = new WP_query($args);
                                global $wp_query;
                                $wp_query->in_the_loop = true;
                                while ($getposts->have_posts()) :
                                    $getposts->the_post();
                                ?>
                                    <div class="col-6 col-md-4 col-lg-4">
                                        <?php get_template_part('template-parts/card-post'); ?>
                                    </div>
                                    <?php
                                endwhile;
                                wp_reset_query();
                                    ?>
                            </div>
                        </div> -->


                    <!-- code copy -->
                    <!-- Get post mặt định -->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) :
                            the_post(); ?>
                            <!-- // tạo biến để lấy url img -->
                            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                            <div class="item-news">
                                <div class="row">
                                    <div class="col-4 img">
                                        <a href="<?php the_permalink() ?>">
                                            <img class="img-fluid lh2-img" src="<?php echo $featured_img_url ?>" alt="<?php the_title() ?>">
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

                    <!-- <div class="row">
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
                                    echo paginate_links(
                                        array(
                                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                            'format' => $format,
                                            'prev_text' => __('<span class="text-pagi-wrap"><i class="far fa-angle-left"></i></span>'),
                                            'next_text' => __('<span class="text-pagi-wrap"><i class="far fa-angle-right"></i></i></span>'),
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
                                        )
                                    );
                                    ?>
                                </a>
                            </ul>
                        </div>
                    </div> -->
                    <?php $descCategory = get_field('desc_category', get_queried_object());
                    if ($descCategory) :; ?>

                        <div class="content-entry">
                            <?php echo $descCategory; ?>
                        </div>
                    <?php endif; ?>



                </div>
                <!-- sibar -->
                <div class="col-lg-3 d-none d-lg-block">
                    <?php get_template_part("narbar") ?>

                </div>
            </div>


        </div>
        </div>
    </section>
</main>
<?php
get_footer();
