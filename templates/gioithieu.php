<?php
/**
 * Template Name: Giao diện trang giới thiệu
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Baophuoc
 * @since 1.0.0
 */

get_header(); ?>
<?php //get_template_part('template-parts/breadcrumb'); ?>

<?php
$banner = get_field('banner');
?>
<?php
if ($banner):
    ?>
    <style>
        .banner-aboutus {
            background-image: linear-gradient(360deg, rgba(17, 17, 17, 0.6) 17.71%, rgba(0, 0, 0, 0) 34.17%),
            linear-gradient(180deg, rgba(18, 18, 18, 0.5) 11.73%, rgba(0, 0, 0, 0) 53.91%),
            url('<?php echo $banner['banner_img']; ?>');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <section class="section-banner banner-aboutus">
        <?php var_dump($banner["banner_img"]) ; ?>
        <div class="banner-wrap">
            <div class="img-wrap">
            <picture>
                        <source media="(max-width:768px)" srcset="<?php echo wp_get_attachment_image_src($banner['banner_img'], 'medium')[0]; ?>">
                        <source media="(max-width:1024px)" srcset="<?php echo wp_get_attachment_image_src($banner['banner_img'], 'large')[0];
                                                                    ?>">
                        <source media="(max-width:1200px)" srcset="<?php echo wp_get_attachment_image_src($banner['banner_img'], 'full')[0];
                                                                    ?>">
                        <img src="<?php echo wp_get_attachment_image_src($banner['banner_img'], 'full')[0];
                                    ?>">
                    </picture>
            </div>
        </div>
        <div class="banner-content-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12  aos-init" data-aos="fade-right" data-aos-easing="ease-in-sine">
                        <h1 class="title">
                            <?php echo $banner['title'] ?>
                        </h1>
                        <div class="text"><?php echo $banner['content'] ?></div>
                        <div class="numbers-wrap">
                            <?php //foreach ($banner['numbers'] as $numbers): ?>
                                <div>
                                    <div class="number">
                                        <?php //echo $numbers['number']; ?>
                                    </div>
                                    <div class="text">
                                        <?php //echo $numbers['content']; ?>
                                    </div>
                                </div>
                            <?php //endforeach; ?>
                        </div>
                    </div>
                    <?php $images = $banner['images']; ?>
                    <div class="col-lg-6 col-12 img_banner">
                        <?php if ($images['front_image']): ?>
                            <div class="img-front  aos-init" data-aos="fade-up" data-aos-easing="ease-in-sine"
                                 data-aos-delay="1000">
                                <!-- <img src="<?php echo $images['front_image'] ?>" alt=""> -->
                            </div>
                        <?php endif; ?>
                        <?php if ($images['back_image']): ?>
                            <div class="img-back aos-init" data-aos="fade-up" data-aos-easing="ease-in-sine"
                                 data-aos-delay="500">
                                <!-- <img src="<?php echo $images['back_image'] ?>" alt=""> -->
                            </div>
                        <?php endif; ?>
                        <style>
                            .img-front,
                            .img-back {
                                box-shadow: inset 0px 0px 10px 10px rgba(217, 217, 217, 0.06);
                                border-radius: 10px;
                            }

                            .img-front {
                                background: url('<?php echo $images['front_image'] ?>'), #D9D9D9;
                                background-attachment: unset;
                                background-position: center;
                                background-size: cover;
                                background-repeat: no-repeat;
                            }

                            .img-back {
                                background: url('<?php echo $images['back_image'] ?>'), #D9D9D9;
                                background-attachment: unset;
                                background-position: center;
                                background-size: cover;
                                background-repeat: no-repeat;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php
if (have_rows('content')) {
    while (have_rows('content')) {
        the_row();
        get_template_part('template-parts/components/component', get_row_layout());
    }
}
?>
<?php get_footer(); ?>
