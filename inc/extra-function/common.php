<?php

/**
 * Content: Tùy chọn block editor
 * @creator Tuyên
 * @time 15/03/2022 14:48
 */
 //trình soạn thảo cũ
add_filter('use_block_editor_for_post_type', '__return_false');

/**
 * Content: H3 -> p comment title
 * @creator Tuyên
 * @time 15/03/2022 14:56
 */

add_filter('comment_form_defaults', 'custom_reply_title');
function custom_reply_title($defaults)
{
    $defaults['title_reply_before'] = '<span id="reply-title" class="h4 comment-reply-title">';
    $defaults['title_reply_after'] = '</span>';
    return $defaults;
}

/**
 * Content: canonical tùy chỉnh
 * @creator Tuyên
 * @time 25/05/2023 09:27
 */
add_filter('wpseo_canonical', '__return_false');
add_action('wp_head', 'canonical_func');
add_filter('rank_math/frontend/canonical', function ($canonical) {
    return false;
});
function canonical_func()
{
    if (is_archive() || is_category()) :
        $current_category = get_queried_object(); ?>
        <link class="thc" rel="canonical" href="<?php echo get_category_link($current_category->term_id); ?>">
    <?php else:
        $url = get_the_permalink(); ?>
        <link class="thc" rel="canonical" href="<?php echo $url; ?>">
    <?php endif;
}

function rel_next_prev()
{
    global $paged;

    if (get_previous_posts_link()) { ?>
        <link rel="prev" href="<?php echo get_pagenum_link($paged - 1); ?>" /><?php
    }

    if (get_next_posts_link()) { ?>
        <link rel="next" href="<?php echo get_pagenum_link($paged + 1); ?>" /><?php
    }

}

add_action('wp_head', 'rel_next_prev');


/**
 * Cấu hình breadcrumb
 *
 * Enqueue scripts and styles.
 */


/*=============================================
                BREADCRUMBS
=============================================*/
function normal_breadcrumb()
{
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '/'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 0; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
        }
    } else {
        echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . '' . single_cat_title('', false) . '' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</div>';
    }
}
function remove_shop_yoast(){
    add_filter('wpseo_breadcrumb_single_link' ,'remove_shop', 10 ,2);
    function remove_shop($link_output, $link ){
        if( $link['text'] == 'Shop' ) {
            $link_output ='';
        }
        return $link_output;
    }
}
function thcmedia_breadcrumb()
{
    if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();
//    $thc_breadcrumb = get_option('thc_breadcrumb');
//    if ($thc_breadcrumb === 'normal') {
//        normal_breadcrumb();
//    } elseif ($thc_breadcrumb === 'yoast') {
//        remove_shop_yoast();
//        if (function_exists('yoast_breadcrumb')) {
//            yoast_breadcrumb('<div id="breadcrumbs"><div class="container">', '</div></div>');
//        }
//    } elseif ($thc_breadcrumb === 'rankmath') {
//        if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();
//    }
}

function thcmedia_woo_breadcrumb()
{
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
    $thc_woo_breadcrumb = get_option('thc_woo_breadcrumb');
    if ($thc_woo_breadcrumb === 'normal') {
        normal_breadcrumb();
    } elseif ($thc_woo_breadcrumb === 'yoast') {
        remove_shop_yoast();
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs"><div class="container">', '</div></div>');
        }
    } elseif ($thc_woo_breadcrumb === 'rankmath') {
        if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();
    } elseif ($thc_woo_breadcrumb === 'woo') {
        echo woocommerce_breadcrumb();
    }
}






