<?php //$count = 0; 
?>
<!-- viet code -->
<!-- <li data-target="#carouselExampleIndicators" data-slide-to="<?php //echo $count; 
                                                            ?>" class="<?php //if ($count == 0) {
                                                                                            //echo "active";
                                                                                            //} 
                                                                                       ?>"></li> -->
<?php //$count++; 
?>



<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- get active cho hình -->
        <?php $getposts = new WP_query();
        // hàm lấy catogary
        $getposts->query('post_status=publish&showposts=1&post_type=acf-slider'); ?>
        <?php global $wp_query;
        $wp_query->in_the_loop = true; ?>
        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
            <!-- // tạo biến để lấy url img -->
            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <!-- viet code -->
            <div class="carousel-item active">
                <img class="d-block w-100" style="height: 432px;" src="<?php echo $featured_img_url ?>" alt="<?php the_title() ?>">
            </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
        <!-- hinh 2...3..4 -->
        <?php $getposts = new WP_query();
        // hàm lấy catogary
        $getposts->query('post_status=publish&showposts=3&post_type=acf-slider&offset=1'); ?>
        <?php global $wp_query;
        $wp_query->in_the_loop = true; ?>
        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
            <!-- // tạo biến để lấy url img -->
            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <!-- viet code -->
            <div class="carousel-item">
                <img class="d-block w-100" style="height: 432px;" src="<?php echo $featured_img_url ?>" alt="<?php the_title() ?>">
            </div>
        <?php endwhile;
        wp_reset_postdata(); ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>