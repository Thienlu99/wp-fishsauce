<?php 

add_action('wp_ajax_filter_action', 'get_post_filter_results');
add_action('wp_ajax_nopriv_filter_action', 'get_post_filter_results');

function get_post_filter_results() {
    $post_type = isset($_POST['post_type'])?$_POST['post_type']:null;
    $cat = isset($_POST['cat'])?$_POST['cat']:null;
    $after = isset($_POST['after'])?$_POST['after']:null;
    $before = isset($_POST['before'])?$_POST['before']:null;
    $base = isset($_POST['base'])?$_POST['base']:null;
    $key_word = isset($_POST['key_word'])?$_POST['key_word']:null;
    $tax_query = $cat?array(
        array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $cat,
            'operator' => 'IN'
        ),
    ):null;
    ?>
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
                'post_type' => $post_type,
                'posts_per_page' => 9,
                'paged' => $paged,
                's'=>$key_word,
                'tax_query' => $tax_query,
                'date_query' => array(
                    array(
                        'after' => $after,
                        'before' => $before,
                        'inclusive' => true,
                    ),
                ),
                'suppress_filters' => false);
            $getposts = new WP_query($args);
            global $wp_query;
            $wp_query->in_the_loop = true;
            if($getposts->have_posts()){
                while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <?php get_template_part('template-parts/components/component' , 'card_news');?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            } else { ?>
                <div class="col">
                    <h2 class="text-center" style='font-weight:bold;color:#000'>Nothing Found</h2>
                    <div class="alert alert-info">
                        <p>Sorry, but nothing matched your filter request. Please try again with different filter option.</p>
                    </div>
                </div>
            <?php } ?>
    </div>
    <?php get_template_part('template-parts/pagination',null,array('get_post'=>$getposts,'base'=>$base)) ?>
<?php
    die();
}