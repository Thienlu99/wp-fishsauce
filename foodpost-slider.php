<div class="container">
    <h2 class="text-center">
        <div class="title-thc">
            Các món ăn với nước mắm Tùng Vân
        </div>
    </h2>
</div>
<div class="image-slider">
    <!-- Get post News Query -->
    <?php $getposts = new WP_query();
    $getposts->query('post_status=publish&showposts=10&post_type=post'); ?>
    <?php global $wp_query;
    $wp_query->in_the_loop = true; ?>
    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
        <!-- khao báo biến img -->
        <?php $url = wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail'); ?>
        <div class="image-item">
            <div class="card-post">
                <div class="card-wrap">
                    <div class="image">
                        <a href="<?php the_permalink(); ?>" class="img-wrap thumbnail-wrapper">
                            <img src="<?php echo $url; ?>" alt="" class="thumbnail">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-info">
                <h3 class="image-title">
                    <div class="title-post">
                        <?php the_title(); ?>
                    </div>
                </h3>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
    <!-- Get post News Query -->

    <!-- <div class="image-item">
        <div class="image">
            <img src="https://images.unsplash.com/photo-1482049016688-2d3e1b311543?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=710&q=80" alt="" />
        </div>
        <h3 class="image-title">This is demo title</h3>
    </div>
    <div class="image-item">
        <div class="image">
            <img src="https://images.unsplash.com/photo-1484723091739-30a097e8f929?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=749&q=80" alt="" />
        </div>
        <h3 class="image-title">This is demo title</h3>
    </div>
    <div class="image-item">
        <div class="image">
            <img src="https://images.unsplash.com/photo-1467003909585-2f8a72700288?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=687&q=80" alt="" />
        </div>
        <h3 class="image-title">This is demo title</h3>
    </div>
    <div class="image-item">
        <div class="image">
            <img src="https://images.unsplash.com/photo-1511690656952-34342bb7c2f2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=928&q=80" alt="" />
        </div>
        <h3 class="image-title">This is demo title</h3>
    </div> -->
</div>