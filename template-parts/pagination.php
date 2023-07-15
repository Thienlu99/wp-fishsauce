<?php $getposts = $args['get_post'] ?>

<div class="row">
    <div class="col-12">
        <ul class="pagination">
            <?php
                global $wp_query;
                $big = 999999999;
            ?>
            <input type="hidden" name="base" value="<?php echo $args['base']?$args['base']:get_pagenum_link($big); ?>"/>
            <a>
                <?php
                    if (!$current_page = get_query_var('paged')) {
                        $current_page = 1;
                    }
                    if (get_option('permalink_structure')) {
                        $format = 'pages%#%';
                    } else {
                        $format = '&pageds=%#%';
                    }
                    $fallback_base = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );
                    $base = $args['base'] ?  str_replace( $big, '%#%',esc_url( $args['base'])) : $fallback_base;
                    echo paginate_links(array(
                        'base' => $base,
                        'format' => $format,
                        'prev_text' => __('<span class="text-pagi-wrap"><i class="far fa-long-arrow-left"></i></span>'),
                        'next_text' => __('<span class="text-pagi-wrap"><i class="far fa-long-arrow-right"></i></span>'),
                        'current' => max(1, get_query_var('paged')),
                        'total' => $getposts->max_num_pages,
                        'show_all' => false,
                        'type' => 'plain',
                        'end_size' => 2,
                        'mid_size' => 1,
                        'prev_next' => true,
                        'add_args' => false,
                        'before_page_number' => '<span class="text-pagi-wrap">',
                        'after_page_number' => '</span>'
                    ));
                    ?>
            </a>
        </ul>
    </div>
</div>