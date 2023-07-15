<?php

/**
 * Template Name: Giao diện trang liên hệ
 * Template Post Type: post, page
 *
 * @package WordPress
 * @since 1.0.0
 */
get_header();

?>

<main class="bg-color-pri">
<?php get_template_part('template-parts/components/component', 'breadcrumb'); ?>
    <section class="contact">

        <!-- duoi -->
        <div class="container content-wrapper">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <h1 class="title-heading">
                        <?php the_title(); ?>
                    </h1>
                    <!-- form -->
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name" class="h4">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email" class="h4">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="h4 ">Message</label>
                        <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
                    <div id="msgSubmit" class="h3 text-center hidden">Thông tin liên hệ</div>
                    <div class="">
                        <div class="contact-wrap">
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
                            <?php //$telephone = get_field('telephone', 'option');
                                //if ($telephone):
                            ; ?>
                            <div class="info">
                                <?php //$icon_phone = get_field('icon_phone', 'option');
                                    //if ($icon_phone):
                                ; ?>
                                <?php //echo $icon_phone; 
                                ?>
                                <?php //endif; 
                                ?>
                                <?php //foreach ($telephone as $phone): 
                                ?>
                                <span>
                                    <?php //echo phone_format($phone['number']); 
                                    ?>
                                </span>
                                <?php //endforeach; 
                                ?>
                            </div>
                            <?php //endif; 
                            ?>
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
                    <?php $map = get_field('map', 'option');
                    if ($map) :; ?>
                        <div class="map">
                            <?php echo $map; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <!-- img -->
                    <?php $image = get_field('image');
                    if ($image) :; ?>
                        <div class="img-wrap">
                            <picture>
                                <source media="(max-width:768px)" srcset="<?php echo wp_get_attachment_image_src($image, 'medium')[0]; ?>">
                                <source media="(max-width:1024px)" srcset="<?php echo wp_get_attachment_image_src($image, 'large')[0];
                                                                            ?>">
                                <source media="(max-width:1200px)" srcset="<?php echo wp_get_attachment_image_src($image, 'full')[0];
                                                                            ?>">
                                <img src="<?php echo wp_get_attachment_image_src($image, 'full')[0];
                                            ?>">
                            </picture>
                        </div>
                    <?php endif; ?>
                    <?php $ctf7 = get_field('ctf7');
                    if ($ctf7) :; ?>
                        <div class="ctf7">
                            <?php echo do_shortcode($ctf7); ?>
                        </div>
                    <?php endif; ?>


                </div>
            </div>

        </div>
    </section>
</main>


<?php get_footer(); ?>