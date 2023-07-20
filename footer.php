<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package THCmedia-company
 */
$locations = get_nav_menu_locations();
$menu_2 = '';
$menu_3 = '';
if (isset($locations['menu-footer-2'])) {
    $menu_2 = wp_get_nav_menu_object($locations['menu-footer-2']);
}
if (isset($locations['menu-footer-3'])) {

    $menu_3 = wp_get_nav_menu_object($locations['menu-footer-3']);
}

?>
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
     It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides.
        PhotoSwipe keeps only 3 of them in the DOM to save memory.
        Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <!---->
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>
</div>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <?php $logo = get_field('logo', 'options');
                if ($logo) :; ?>

                    <div class="logo" style=" max-width: 150px;margin: 0 30px;">
                        <a href="<?php echo get_home_url(); ?>">
                            <div class="img-wrap">
                                <picture>
                                    <source media="(max-width:768px)" srcset="<?php echo wp_get_attachment_image_src($logo, 'medium')[0]; ?>">
                                    <source media="(max-width:1024px)" srcset="<?php echo wp_get_attachment_image_src($logo, 'large')[0];
                                                                                ?>">
                                    <source media="(max-width:1200px)" srcset="<?php echo wp_get_attachment_image_src($logo, 'full')[0];
                                                                                ?>">
                                    <img src="<?php echo wp_get_attachment_image_src($logo, 'full')[0];
                                                ?>">
                                </picture>
                            </div>
                        </a>
                    </div>

                <?php endif; ?>


                <?php $companyName = get_field('company_name', 'option');
                if ($companyName) :; ?>
                    <div class="title-footer">
                        <?php echo $companyName; ?>
                    </div>
                <?php endif; ?>
                <?php $footerDesc = get_field('footer_des', 'option');
                if ($footerDesc) :; ?>
                    <div class="footer_des">
                        <?php echo $footerDesc; ?>
                    </div>
                <?php endif; ?>


                <?php $formFooter = get_field('form_footer', 'option');
                if ($formFooter) :; ?>
                    <div class="dang-ky-bao-gia">
                        <?php echo do_shortcode($formFooter); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <?php if ($menu_2) : ?>
                    <div class="title-footer"><?php echo wp_kses_post($menu_2->name); ?></div>
                    <?php wp_nav_menu(
                        array(
                            'menu' => wp_kses_post($menu_2->name),
                            'menu_id' => 'menu-footer-2',
                            'menu_class' => 'menu-class',
                        )
                    ); ?>
                <?php endif; ?>

                <!-- map và fanpage -->
                <div class="row">
                    <div class="col-md-6">
                        <?php $googlemap = get_field('google_map', 'option');
                        if ($googlemap) :; ?>
                            <div class="googlemap">
                                    <?php echo $googlemap?>                        
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- fanpage -->
                    <div class="col-md-6">
                        <?php $fanpage = get_field('fanpage', 'option');
                        if ($googlemap) :; ?>
                            <div class="fanpage">
                                    <?php echo $fanpage?>                        
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>





            <div class="contact-wrap">
                <?php $linkChuyenGia = get_field('link_chuyen_gia', 'option');
                if ($linkChuyenGia) :; ?>
                    <div class="info">
                        <?php $iconChuyenGia = get_field('icon_chuyen_gia', 'option');
                        if ($iconChuyenGia) :; ?>
                            <?php echo $iconChuyenGia; ?><?php echo get_field('label_chuyen_gia', 'option'); ?><a href="<?php echo $linkChuyenGia['url']; ?>"><?php echo $linkChuyenGia['title']; ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>


                <?php $address = get_field('address', 'option');
                if ($address) :; ?>
                    <div class="info">
                        <?php $iconAddress = get_field('icon_address', 'option');
                        if ($iconAddress) :; ?>
                            <?php echo $iconAddress; ?>
                        <?php endif; ?>
                        <?php echo $address; ?>
                    </div>
                <?php endif; ?>
                <!-- <?php //$telephone = get_field('telephone', 'option');
                        //if ($telephone): ; 
                        ?>
                        <div class="info">
                            <?php //$icon_phone = get_field('icon_phone', 'option');
                            //if $icon_phone): ; 
                            ?>
                                <?php //echo $icon_phone; 
                                ?>
                            <?php //endif; 
                            ?>
                            <?php //foreach ($telephone as $phone): 
                            ?>
                                <span><?php //echo phone_format($phone['number']); 
                                        ?></span>
                            <?php //endforeach; 
                            ?>
                        </div>
                    <?php //endif; 
                    ?> -->
                <?php $mail = get_field('mail', 'option');
                if ($mail) :; ?>
                    <div class="info">

                        <?php $iconMail = get_field('icon_mail', 'option');
                        if ($iconMail) :; ?>
                            <?php echo $iconMail; ?>
                        <?php endif; ?>
                        <?php echo $mail; ?>
                    </div>
                <?php endif; ?>


                <?php $website = get_field('website', 'option');
                if ($website) :; ?>
                    <div class="info">
                        <?php $icon_website = get_field('icon_website', 'option');
                        if ($icon_website) :; ?>
                            <?php echo $icon_website; ?>
                        <?php endif; ?>

                        <?php echo $website; ?>
                    </div>
                <?php endif; ?>


            </div>
        </div>
        <!-- end -->


        <div class="col-12 col-md-3 col-lg-3">
            <?php if ($menu_3) : ?>
                <div class="title-footer"><?php echo wp_kses_post($menu_3->name); ?></div>
                <?php wp_nav_menu(
                    array(
                        'menu' => wp_kses_post($menu_3->name),
                        'menu_id' => 'menu-footer-3',
                        'menu_class' => 'menu-class',
                    )
                ); ?>
            <?php endif; ?>


         







        </div>

        <div class="col-12 col-md-3 col-lg-3">
            
            <?php $col4Footer = get_field('col4_footer', 'option');
            if ($col4Footer) :; ?>
                <div class="title-footer"><?php echo $col4Footer['title']; ?></div>
                <div class="extra_info"><?php echo $col4Footer['extra_info']; ?></div>
            <?php endif; ?>


            <?php $map = get_field('map', 'option');
            if ($map) :; ?>
                <div class="map">
                    <?php echo $map; ?>
                </div>
            <?php endif; ?>

            <!-- <?php $social = get_field('social', 'option');
                    if ($social) :; ?>
                    <div class="social-wrap">
                        <?php foreach ($social as $item) : ?>
                            <a href="<?php echo $item['link']['url']; ?>" class="social" style="background-color: <?php
                                                                                                                    echo
                                                                                                                    $item['color']; ?>">
                                <?php echo $item['icon']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> -->
        </div>
    </div>

</footer>


<?php if (get_field('scroll_to_top', 'option')) : ?>
    <div class="scrollToTop">
        <i class="fa-solid fa-arrow-up"></i>
    </div>
<?php endif ?>
<?php get_template_part('template-parts/sticky-contact'); ?>

<?php wp_footer(); ?>
<div id="Side_slide" class="right light" data-width="250">
    <div class="close-wrapper"><a href="#" class="close"><i class="fa fa-times" aria-hidden="true"></i></a>
    </div>
    <div class="menu_wrapper">
        <nav id="menu">
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu' => 'primary',
                    'menu_id' => 'menu-danh-muc-san-pham-2',
                    'menu_class' => 'list-menu-product',
                )
            ); ?>
        </nav>
    </div>
</div>
<div id="body_overlay"></div>
</body>

</html>