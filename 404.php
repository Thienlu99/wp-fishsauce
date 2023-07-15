<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package THCmedia-company
 */

get_header();
?>

<div class="page-404">
<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
<?php get_template_part('template-parts/components/component', 'breadcrumb'); ?>
    <div class="container">
        <div class="title-error text-center">404</div>
        <div class="desc text-center">TRANG NÀY KHÔNG TÌM THẤY.</div>
        <p class="text-center">Chúng tôi không thể tìm thấy những gì bạn đang tìm kiếm.</p>
        <p class="text-center">Vui lòng tìm kiếm bài viết khác hoặc quay lại trang chủ!</p>
    </div>
    <section id="main-menu-404">
            <div class="row">
                <div class="col-lg-4 item-pd">
                    <?php wp_nav_menu(
                        array(
                            'menu' => '404 menu',
                            'menu_id' => 'menu-id',
                            'menu_class' => 'menu-404',
                        )
                    ); ?>
                </div>
            </div>
        </section>
</div>

<?php
get_footer();
