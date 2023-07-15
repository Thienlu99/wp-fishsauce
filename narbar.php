<div class="sidebar">
<div class="widget" style="   margin-bottom: 30px;">
        <h3 style="background: #fd4549;color: #fff;font-size: 15px;text-transform: uppercase;padding: 10px;font-weight: 600;margin-bottom: 0px;">Tìm kiếm</h3>
    <div class="content search">
        <form action="<?php bloginfo('url') ?>" class="form-inline" method="GET" role="form">

            <input name="s" type="search" class="form-control input-search" placeholder="tìm kiếm">
            <button type="submit" class="btn btn-success">Tìm kiếm</button>

        </form>
    </div>
    </div>
    <div class="widget" style="   margin-bottom: 30px;">
        <h3 style="background: #fd4549;color: #fff;font-size: 15px;text-transform: uppercase;padding: 10px;font-weight: 600;margin-bottom: 0px;">Chuyên mục</h3>
        <div class="content-w" style="border: 1px solid #ededed;">
            <ul style="list-style: none;">
                <?php
                $args = array(
                    'child_of'  => 0,
                    '<strong>orderby</strong>'    => 'id',
                );
                $categories = get_categories($args);
                foreach ($categories as $category) { ?>
                    <li style="padding: 8px 20px;">
                        <a href="<?php echo get_term_link($category->slug, 'category'); ?>">
                            <span><?php echo $category->name; ?></span>
                            (<?php echo $category->count; ?>)
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <!-- <li><a href="#">Học wordpress <span>(152)</span></a></li> -->

        </div>
    </div>
    <div class="widget">
        <h3 style="background: #fd4549;
    color: #fff;
    font-size: 15px;
    text-transform: uppercase;
    padding: 10px;
    font-weight: 600;	
    margin-bottom: 0px;">Bài viết mới</h3>
        <div class="content-new">
            <ul style="list-style: none;">
                <!-- Get post News Query -->
                <?php $getposts = new WP_query();
                $getposts->query('post_status=publish&showposts=5&post_type=post'); ?>
                <?php global $wp_query;
                $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <!-- bỏ vào đây -->
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_id(), 'full', array('class' => 'thumnail')); ?></a>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div class="meta"><span>Ngày đăng: <?php echo get_the_date() ?></span></div>
                        <div class="clear"></div>
                    </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
                <!-- Get post News Query -->

            </ul>
        </div>
    </div>
    <div class="widget" style="   margin-bottom: 30px;">
        <h3 style="background: #fd4549;
    color: #fff;
    font-size: 15px;
    text-transform: uppercase;
    padding: 10px;
    font-weight: 600;	
    margin-bottom: 0px;">Bài viết xem nhiều</h3>
        <div class="content-mostv">
            <ul style="list-style: none;">
                <?php $i = 1; ?>
                <?php $getposts = new WP_query();
                $getposts->query('post_status=publish&showposts=8&post_type=post&meta_key=views&orderby=meta_value_num'); ?>
                <?php global $wp_query;
                $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <li>
                        <span><?php echo $i; ?></span>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    </li>
                    <?php $i++ ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
    <!-- <div class="widget">
            <h3>Quảng cáo</h3>
            <div class="content-wc">
                <a href="#"><img src="images/qc.jpg" alt=""></a>
            </div>
        </div> -->

    <!-- <div class="widget">
            <h3>Bạn bè</h3>
            <div class="content-w">
                <ul>
                    <li><a href="http://huykira.net">Huy Kira</a></li>
                    <li><a href="http://huykira.net">Blog Huy Kira</a></li>
                </ul>
            </div>
        </div> -->

</div>