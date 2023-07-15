<?php
/**
 * Template Name: Giao diện trang dịch vụ
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage THCmedia
 * @since 1.0.0
 */
get_header();
?>
<?php $banner = get_field('banner');
if ($banner): ; ?>
    <div class="banner">
        <div class="img-wrap">
            <img src="<?php echo $banner; ?>" alt="">
        </div>
    </div>
<?php endif; ?>



<?php get_template_part('template-parts/breadcrumb'); ?>
<div class="container">
    <h1>
        <div class="title-timi-1">
            <?php the_title(); ?>
        </div>
    </h1>
    <?php $listLink = get_field('list_link');
    if ($listLink): ; ?>
        <div class="row list_link">
            <?php foreach ($listLink as $key => $item): ?>
                <div class="button-timi-sec" data-aos="zoom-in"
                     data-aos-delay="<?php echo $key
                         * 300; ?>">
                    <a href="<?php echo $item['link']['url']; ?>"><?php echo $item['link']['title']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php $list = get_field('list');
    if ($list): ; ?>
        <div class="row">
            <?php foreach ($list as $key => $project):
                $post = $project['service'];
                setup_postdata($post); ?>
                <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up"
                     data-aos-delay="<?php echo $key
                         * 300; ?>">
                    <?php get_template_part('template-parts/card-post-1'); ?>
                </div>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>

    <div class="content-entry">
        <?php the_content(); ?>
    </div>
</div>

<?php get_footer(); ?>
