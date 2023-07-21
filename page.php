<?php

/**
 * Template Name: Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @since 1.0.0
 */
get_header();

?>

<?php get_template_part('template-parts/components/component', 'breadcrumb'); ?>
<main class="pt-4">


    <?php //get_template_part('/template-parts/components/component', 'breadcrumb'); 
    ?>
    <section class="section-single">

        <div class="container">
            <?php //get_template_part('inc/extra-function/common'); 
            ?>
            <?php //thcmedia_breadcrumb() 
            ?>
            <?php //get_template_part('/template-parts/components/component', 'breadcrumb'); 
            ?>
         

            <div class="row">
                <div class="col-md-9">
                    <h1 class="title">
                        <?php the_title(); ?>
                    </h1>
                    <div class="content-post_single">
                        <?php the_content(); ?>
                    </div>

                </div>
                <div class="col-md-3">
                    <?php get_template_part("narbar") ?>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>