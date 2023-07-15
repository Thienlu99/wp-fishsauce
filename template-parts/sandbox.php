<?php
/**
 * Content: Giao diện box tác giả
 * @creator Tuyên
 * @time 21/02/2022 15:58
 */
$boxAuthor = get_field('box_author', 'options'); ?>
<div class="author-box-wrap" itemtype="http://schema.org/Person" itemscope="" itemprop="author">
    <div class="author-box-tab">
        <div class="author-box-gravatar">
            <img src="<?php echo $boxAuthor['image']; ?>"
                 width="100" height="100" alt="" itemprop="image">
        </div>
        <div class="author-box-authorname">
            <a href="<?php echo $boxAuthor['link']; ?>"
               class="vcard author"
               rel="author"
               itemprop="url">
                <span class="fn" itemprop="name"><?php echo $boxAuthor['name']; ?></span>
            </a>
        </div>
        <div class="author-box-desc">
            <div itemprop="description">
                <p><?php echo $boxAuthor['description']; ?></p>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="author-box-socials ">
            <?php //$social = $boxAuthor['social'];
//            var_dump($social);
            //foreach ($social as $item):?>
                <a target="_self"
                   href="<?php //echo $item['link']; ?>"
                   rel="nofollow noopener"
                   class="author-box-icon-grey">

                    <i class="<?php //echo $item['icon']; ?>"></i>
                </a>
            <?php // endforeach; ?>
        </div>
    </div>
</div>
