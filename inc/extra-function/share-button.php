<?php

//function enqueue_styles_scripts_share()
//{
//    wp_enqueue_style('share-style', plugin_dir_url(__DIR__) . 'assets/css/share-button-social.css', array(), _S_VERSION);
//    wp_enqueue_script('share-button-social-script', plugin_dir_url(__DIR__) . 'assets/js/share-button-social.js', array(), _S_VERSION,
//        true);
//}
//
//add_action('wp_enqueue_scripts', 'enqueue_styles_scripts_share');
function share_social_button
()
{
    if (is_page() || is_single() && !is_404()) { ?>
        <section class="section-social">
            <div class="l-container">
                <div class="share-social">
                    <div class="text">Chia sẻ:</div>
                    <div class="box-ic">
                        <ul>
                            <li>
                                <a class="ic-facebook"
                                   rel="nofollow"
                                   href="javascript:fbShare('<?php echo urlencode(get_permalink()) ?>', 'FbShare', 'Facebook share popup', 'http://goo.gl/dS52U', 520, 350)"><i
                                        class="fab fa-facebook-f"></i><span> Facebook</span></a>
                            </li>
                            <li>
                                <a class="ic-email" rel="nofollow" href="javascript:email('<?php echo urlencode
                                (get_permalink())
                                ?>', '<?php echo get_the_title(); ?>', '<?php echo get_the_author(); ?>', '', 520, 350)"><i
                                        class="fas fa-envelope"></i><span> Email</span></a>
                            </li>
                            <li>
                                <a rel="nofollow" class="ic-pinterest" href="javascript:pinterestShare('<?php
                                echo urlencode
                                (get_permalink()) ?>','<?php echo get_the_title(); ?>', '<?php echo urlencode(wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail')); ?>', '', 520, 350)"><i
                                        class="fab fa-pinterest-p"></i><span> Pinterest</span></a>
                            </li>
                            <li>
                                <a rel="nofollow" class="ic-twitter"
                                   href="javascript:twitterShare('<?php echo urlencode(get_permalink()) ?>','<?php echo get_the_title(); ?>', '<?php echo get_the_author(); ?>', '', 520, 350)"><i
                                        class="fab fa-twitter"></i><span> Twitter</span></a>
                            </li>
                            <li>
                                <a rel="nofollow" class="ic-linkedin"
                                   href="javascript:linkedinShare('<?php echo urlencode(get_permalink())
                                   ?>', '<?php echo get_the_title(); ?>', '<?php echo get_the_author(); ?>', '', 520, 350)"><i
                                        class="fab fa-linkedin-in"></i><span> Linkedin</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    <?php }
}
