<?php
//Function load more news

add_action('wp_ajax_loadmore', 'get_post_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'get_post_loadmore');
function get_post_loadmore()
{
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0; // lấy dữ liệu phái client gởi
    $cat_ID = isset($_POST['cat_ID']) ? (int)$_POST['cat_ID'] : 0; // lấy dữ liệu phái client gởi
    $getposts = new WP_query();
    $getposts->query('post_status=publish&cat=' . $cat_ID . '&showposts=3&offset=' . $offset);
    global $wp_query;
    $wp_query->in_the_loop = true;
    while ($getposts->have_posts()) : $getposts->the_post(); ?>
        <div class="col-12 col-md-4 col-lg-4">
            <?php get_template_part('template-parts/card-post'); ?>
        </div>
    <?php endwhile;
    wp_reset_postdata();
    die();
}


add_action('wp_ajax_loadmoredoc', 'get_post_loadmoredoc');
add_action('wp_ajax_nopriv_loadmoredoc', 'get_post_loadmoredoc');
function get_post_loadmoredoc()
{
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0; // lấy dữ liệu phái client gởi
    $cat_ID = isset($_POST['cat_ID']) ? (int)$_POST['cat_ID'] : 0; // lấy dữ liệu phái client gởi
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'document',
        'showposts' => 3,
        'offset' => $offset,
        'tax_query' => array(
            array(
                'taxonomy' => 'document-cat',
                'field' => 'id',
                'terms' => $cat_ID
            )
        ),
        'suppress_filters' => false);
    $getposts = new WP_query($args);
    global $wp_query;
    $wp_query->in_the_loop = true;
    while ($getposts->have_posts()) : $getposts->the_post(); ?>
        <div class="col-12 col-md-4 col-lg-4">
            <?php get_template_part('template-parts/card-document'); ?>
        </div>
    <?php endwhile;
    wp_reset_postdata();
    die();
}
