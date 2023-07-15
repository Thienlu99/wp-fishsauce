<?php
/**
 * Template Name: Giao diện flexible content
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Baophuoc
 * @since 1.0.0
 */

get_header(); ?>
<main>
    <?php
    if(have_rows('content')) {
    while(have_rows('content')) {
    the_row();
    $aos = get_row_index()%2==0?'left':'right';
    if(get_row_layout()=='content_editor'):?>
    <section class="block-content container" data-aos="fade-<?php echo $aos ?>">
        <div class="content-post_single">
            <?php
            $content = get_sub_field('text_editor');
            echo get_customs_content($content);
            ?>
        </div>
    </section>
    <?php endif;
        get_template_part('template-parts/components/component' , get_row_layout(),array('aos'=>$aos));
    }
}
    ?>
</main>
<?php get_footer();?>

