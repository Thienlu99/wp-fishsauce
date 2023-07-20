<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package THCmedia-company
 */
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta name="google-site-verification" content="cQKFErv8ugrk03IlFZUSnHHAqLipL6JUt0oLTPlZEOM" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php wp_head(); ?>
    <?php get_default_style() ?>
    <?php get_template_part('template-parts/style') ?>
</head>

<body <?php body_class('website-design-by-thcmedia'); ?>>

    <!--Header-->
    <header id="header">
        <div class="header-wrap">
            <div class="container">

                <div class="row header-inner">

                    <div class="mobile-menu-button responsive-menu-toggle thc_center_col">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <?php $logo = get_field('logo', 'options');
                    if ($logo) :; ?>
                        <div class="col-md-3">
                            <div class="logo" style=" max-width: 70px;margin: 0 30px;">
                                <a href="<?php echo get_home_url(); ?>">
                                    <div class="img-wrap">
                                        <picture>
                                            <source media="(max-width:768px)" srcset="<?php echo wp_get_attachment_image_src($logo, 'medium')[0]; ?>">
                                            <source media="(max-width:1024px)" srcset="<?php echo wp_get_attachment_image_src($logo, 'large')[0];
                                                                                        ?>">
                                            <source media="(max-width:1200px)" srcset="<?php echo wp_get_attachment_image_src($logo, 'full')[0];
                                                                                        ?>">
                                            <img style="max-width: 100%;height: auto;" src="<?php echo wp_get_attachment_image_src($logo, 'full')[0];
                                                                                            ?>">
                                        </picture>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- menu -->
                    <div class="col-md-9">
                        <div class="menu-header-wrap">
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    // function
                                    'menu' => 'primary',
                                    'menu_id' => 'menu-header',
                                    'menu_class' => 'menu-header',
                                    //ul
                                    'container_class' => 'menu-menu-chinh-container',
                                    //div
                                )
                            );
                            ?>
                        </div>
                    </div>
                    <!-- <?php //$social = get_field('social', 'option');
                            //if ($social) :; 
                            ?>
                        <div class="social-list">
                            <?php //foreach ($social as $item) : 
                            ?>
                                <div class="social-wrap"><a href="<?php //echo $item['link']['url']; 
                                                                    ?>"><?php //echo $item['icon'];
                                                                                                            ?></a></div>
                            <?php //endforeach; 
                            ?>

                        </div>
                    <?php //endif; 
                    ?> -->

                    <!-- form tìm kiếm -->





                </div>
            </div>
        </div>
    </header>