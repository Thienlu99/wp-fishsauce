<?php
$placeholder = get_field('logo', 'options'); ?>

<div class="column-sidebar mb-30px">
    <div class="wrapper-column-sidebar">
        <div class="block-sidebar mb-4">
            <div class="title-sb sidebar-cate-title">
                Tìm kiếm
            </div>
            <div class="search-box">
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    
                    <input type="text" name="s" class="input-search" placeholder="Tìm bài viết bạn muốn đọc">
                    <button type="submit" style="border:none;background:none;"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="block-sidebar mb-4">
            <div class="title-sb sidebar-cate-title">
                Bài viết mới nhất
            </div>
            <div class="list-new-sb">
                <?php
                $args_cate = array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'showposts' => 5,
                    // 'cat' => $category,
                    'page_per_post' => 10,
                );
                ?>
                <?php $getposts = new WP_query($args_cate); ?>
                <?php global $wp_query;
                $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()):
                    $getposts->the_post(); ?>
                    <?php get_template_part('template-parts/components/component', 'card-new_sidebar'); ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="block-sidebar mb-4">
            <?php
            $dm_baiviet = get_field('dm_baiviet', 'option');
            $title = $dm_baiviet['title'];
            $list_dm = $dm_baiviet['list_dm_bv']; ?>
            <div class="title-sb sidebar-cate-title">
                Danh mục bài viết
            </div>

            <div class="list-cat">
                <?php
                foreach ($list_dm as $dm):
                    $term = $dm['dm_bv'];
                    // $term = get_term($dm, 'category');
                    // $term_link = get_term_link($term);
                    $banner = get_field('banner', $term);
                    ?>
                    <div class="item-cat">
                        <div class="img-wrap">
                            <img class="lazy" data-src="
                                        <?php
                                        if ($banner) {
                                            echo $banner;
                                        } else {
                                            echo $placeholder;
                                        }
                                        ?>" alt="">
                        </div>
                        <div class="title-cat">
                            <?php echo $term->name; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>