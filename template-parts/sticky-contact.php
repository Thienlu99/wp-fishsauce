<?php
/**
 * Content: Giao diện sticky contact
 * @creator Tuyên
 * @time 27/02/2022 22:10
 */
if (wp_is_mobile()) {
    $app_mobile = 'mmt-app--mobile';
    $item_mobile = 'mmt-menu__item--mobile';
    $button_mobile = 'mmt-button--mobile';
}
else{
    $app_mobile = '';
    $item_mobile = '';
    $button_mobile = '';
}
?>
<?php $contactButton = get_field('contact_button', 'options');
if ($contactButton):
 if(wp_is_mobile()):; ?>

    <div id="thc">
        <div style="position: fixed; top: 0px; left: 0px; right: 0px; z-index: 999999;"></div>

        <div class="mmt-container mmt-container--full">
            <div class="mmt-app <?php echo $app_mobile; ?>">
                <div style="position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; background-color:var(--primary_color);
            opacity: 1; color: rgb(255, 255, 255); pointer-events: none; z-index: -1;"></div>
                <?php foreach ($contactButton as $item): ?>
                    <a rel="nofollow" target="_blank" href="<?php echo $item['link']; ?>">
                        <span id="<?php //echo $item['id']; ?>" class="mmt-menu__item <?php echo $item_mobile; ?>"
                              style="display: flex;">
                            <div class="mt-tooltip">
                            <span class="mmt-button <?php echo $button_mobile; ?>">
                                <div class="thc-contact-info">
                                     <img alt="url"
                                          src="<?php echo($item['image']); ?>"
                                          class="mmt-button__icon mmt-button__icon--motion svg">
                                <span class="mmt-button__label"
                                      style="color: rgb(255, 255, 255);"><?php echo $item['content']; ?></span>
                                </div>
                                <div class="live_person">
                                    <span class="live"></span> <?php echo $item['live_person']; ?>
                                </div>
                            </span>

                            <div class="mt-tooltip__text"><?php echo $item['tooltip']; ?></div>
                        </div>
                    </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php else:; ?>
     <div id="custom_html-17" class="widget_text col pb-0 widget widget_custom_html">
         <div class="textwidget custom-html-widget">
             <div class="btn-contact-bar1">
                 <?php foreach ($contactButton as $item):; ?>
                     <div id="social_btn" class="item-contact-box" style="background : <?php echo $item['color']; ?>;">
                         <a class="item-contact" rel="nofollow noopener" href="<?php echo $item['link']; ?>"
                            target="_blank">
                             <div class="icon-contact" style="background : <?php echo $item['color']; ?>;">
                                 <img class="tada" alt="url"
                                      src="<?php echo $item['image']; ?>">
                             </div>
                             <div class="content"> <?php echo $item['content']; ?></div>
                         </a>
                     </div>
                 <?php endforeach; ?>
             </div>
         </div>
     </div>
<?php endif; ?>
<?php endif; ?>


<!--<script>-->
<!--    document.querySelectorAll('img.svg').forEach(function (img) {-->
<!--        var imgID = img.id;-->
<!--        var imgClass = img.className;-->
<!--        var imgURL = img.src;-->
<!---->
<!--        fetch(imgURL).then(function (response) {-->
<!--            return response.text();-->
<!--        }).then(function (text) {-->
<!---->
<!--            var parser = new DOMParser();-->
<!--            var xmlDoc = parser.parseFromString(text, "text/xml");-->
<!---->
<!--            // Get the SVG tag, ignore the rest-->
<!--            var svg = xmlDoc.getElementsByTagName('svg')[0];-->
<!---->
<!--            // Add replaced image's ID to the new SVG-->
<!--            if (typeof imgID !== 'undefined') {-->
<!--                svg.setAttribute('id', imgID);-->
<!--            }-->
<!--            // Add replaced image's classes to the new SVG-->
<!--            if (typeof imgClass !== 'undefined') {-->
<!--                svg.setAttribute('class', imgClass + ' replaced-svg');-->
<!--            }-->
<!---->
<!--            // Remove any invalid XML tags as per http://validator.w3.org-->
<!--            svg.removeAttribute('xmlns:a');-->
<!---->
<!--            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.-->
<!--            if (!svg.getAttribute('viewBox') && svg.getAttribute('height') && svg.getAttribute('width')) {-->
<!--                svg.setAttribute('viewBox', '0 0 ' + svg.getAttribute('height') + ' ' + svg.getAttribute('width'))-->
<!--            }-->
<!---->
<!--            // Replace image with new SVG-->
<!--            img.parentNode.replaceChild(svg, img);-->
<!---->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->
