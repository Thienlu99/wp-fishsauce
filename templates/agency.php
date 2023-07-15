<?php
/**
 * Template Name: Giao diện trang đại lý
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage THCmedia
 * @since 1.0.0
 */
get_header();
?>
<main>
    <div class="">
        <div class="container">
            <?php if (function_exists('thcmedia_breadcrumb')) thcmedia_breadcrumb(); ?>
        </div>
    </div>
    <section id="agency-page" class="agency-page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 col-lg-3">
                    <?php $title = get_field('title');
                    if ($title): ; ?>
                        <h1 class="title-maq-1"><?php echo $title; ?></h1>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-md-9 col-lg-9">
                    <?php $map = get_field('map');
                    if ($map): ; ?>
                        <div class="map" style="background-image: url(<?php echo $map; ?>)">
                            <?php $list = get_field('list');
                            if ($list): ; ?>
                                <div class="list-agency">
                                    <?php foreach ($list as $key => $item): ?>
                                        <button class="card card_right map__card card_<?php echo $key; ?>"
                                                style="top: <?php echo $item['x']; ?>px; left:<?php echo $item['y'];
                                                ?>px">
                                            <div class="card__mark wow zoomIn"></div>
                                            <div class="h3 card__h3 wow fadeInUp">
                                                <?php echo $item['location']; ?>
                                                <div class="info-agency">
                                                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                                                    <div class="title">
                                                        <?php echo $item['title']; ?>
                                                    </div>
                                                    <div class="desc">
                                                        <?php echo $item['desc']; ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </button>

                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>


                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="background background_1" style="background-image: url(<?php echo get_field('background_1'); ?>)">

        </div>
        <div class="background background_2" style="background-image: url(<?php echo get_field('background_2'); ?>)">

        </div>
        <div class="background background_3" style="background-image: url(<?php echo get_field('background_3'); ?>)">

        </div>
    </section>

</main>


<?php get_footer(); ?>
