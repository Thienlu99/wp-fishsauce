<?php

function project_post_type()
{

    /**
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        'name' => 'Các dự án', //Tên post type dạng số nhiều
        'singular_name' => 'Dự án', //Tên post type dạng số ít
        'add_new_item' => 'Thêm thông tin dự án',
        'add_new' => 'Tạo dự án mới',
    );

    /**
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Nơi lưu trữ thông tin dự án', //Mô tả của post type
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'trackbacks',
            'revisions',
            'custom-fields'
        ), //Các tính năng được hỗ trợ trong post type
        'taxonomies' => array('project_cat'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
//        'rewrite' => array('slug' => '/')
    );

    register_post_type('project', $args);

}

/* Kích hoạt hàm tạo custom post type */
add_action('init', 'project_post_type');


/**
 * Content: Loại dự án
 * @creator Tuyên
 * @time 22/02/2022 18:30
 */

function project_cat_taxonomies()
{

    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
     */
    $labels = array(
        'name' => 'Loại dự án',
        'singular' => 'Phân loại các dự án',
        'menu_name' => 'Các loại dự án'
    );

    /* Biến $args khai báo các tham số trong custom taxonomy cần tạo
     */
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'query_var' => true,

    );

    /* Hàm register_taxonomy để khởi tạo taxonomy
     */
    register_taxonomy('project_cat', 'project', $args);

}

// Hook into the 'init' action
add_action('init', 'project_cat_taxonomies', 0);

function ah_remove_custom_post_type_slug( $post_link, $post, $leavename ) {

    if ( ! in_array( $post->post_type, array( 'project' ) ) || 'publish' != $post->post_status )
        return $post_link;

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'ah_remove_custom_post_type_slug', 10, 3 );

function ah_parse_request_tricksy( $query ) {

    if ( ! $query->is_main_query() )
        return;

    if ( 2 != count( $query->query )
        || ! isset( $query->query['page'] ) )
        return;

    if ( ! empty( $query->query['name'] ) )
        $query->set( 'post_type', array( 'post', 'project', 'page' ) );
}
add_action( 'pre_get_posts', 'ah_parse_request_tricksy' );
