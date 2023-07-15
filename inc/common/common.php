<?php


function get_default_style()
{
    $colors = get_field('color_theme', 'options');
    ?>
    <noscript>
        <style>
            .lazy {
                display: none !important
            }
        </style>
    </noscript>
    <style>
        :root {
        <?php  
            foreach( $colors as $name=> $color) {
                if($color) echo '--'.$name.':'.$color.';', PHP_EOL;
            }
        ?>
        }

        <?php
            foreach( $colors as $name=> $color) {
                if($color) {
                    echo '._bg-'.$name.'{background-color:var(--'.$name.') !important;}', PHP_EOL;
                    echo '._color-'.$name.'{color:var(--'.$name.') !important;}', PHP_EOL;
                }
            }
            for($i=10;$i<=50;$i++) {
                echo '._fs-'.$i.'{font-size:'.$i.'px !important;}', PHP_EOL;
            }
            for($i=10;$i<=50;$i++) {
                echo '._lh-'.$i.'{line-height:'.$i.'px !important;}', PHP_EOL;
            }
            for($i=100;$i<=900;$i+=100) {
                echo '._fw-'.$i.'{font-weight:'.$i.' !important;}', PHP_EOL;
            }
        ?>
    </style>
    <?php
}


function get_the_content_with_formatting($content)
{
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function get_customs_content($content)
{
    $DOM = new DOMDocument();
    $DOM->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
    $imgs = $DOM->getElementsByTagName('img');
    $count = 0;
    foreach ($imgs as $img) {
        $count++;
        $aos = $count % 2 == 0 ? 'left' : 'right';
        $class = $img->getAttribute('class');
        $scr = $img->getAttribute('src');
        $img->removeAttribute('src');
        $img->setAttribute('data-src', $scr);
        $img->setAttribute('class', 'lazy ' . $class);
        $img->setAttribute('data-aos', 'fade-' . $aos);

    }
    $content = $DOM->saveHTMl($DOM->documentElement);
    $content = get_the_content_with_formatting($content);
    //$content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
    return $content;
}

function phone_format($number)
{
    if (strlen($number) == '8') {
        $format = sprintf("%s.%s", substr($number, 0, 4),
            substr($number, 4, 4));
        return $format;
    } else {
        $format = sprintf("%s.%s.%s", substr($number, 0, 4),
            substr($number, 4, 3),
            substr($number, 7));
        return $format;
    }
}

function hotline_format($number)
{
    $format = sprintf("%s.%s", substr($number, 0, 4),
        substr($number, 4, 4));
    return $format;
}


function get_safe_image($img, $size, $label)
{
    /**
     * Content:
     * $img: là url/id của image
     * $size: kích thước image muốn lấy
     * $label: là nhãn của function có nghĩa là thông số $url truyền vào là id hay url
     * @creator Tuyên
     * @time 19/07/2022 16:04
     */
    $placeholder = get_field('logo', 'options');
    if ($label === 'id') {
        $image = wp_get_attachment_image_src($img, $size);
        if ($image[0]) {
            return $image[0];
        } else {
            return $placeholder;
        }

    } elseif ($label === 'url') {
        $image = $img;
        if ($image) {
            return $image;
        } else {
            return $placeholder;
        }
    }
}
/**
 * Chuyển đổi chuỗi kí tự thành dạng slug dùng cho việc tạo friendly url.
 * @access    public
 * @param string
 * @return    string
 */
if (!function_exists('create_slug')) {
    function create_slug($string, $delimiter = '-')
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', $delimiter, $string);
        $string = strtolower($string);
        return $string;
    }
}
// code lượt xem bài viết
function getPostViews($postID)
{ // hàm này dùng để lấy số người đã xem qua bài viết
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') { // Nếu như lượt xem không có
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0"; // giá trị trả về bằng 0
    }
    return $count; // Trả về giá trị lượt xem
}

function setPostViews($postID)
{// hàm này dùng để set và update số lượt người xem bài viết.
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++; // cộng đồn view
        update_post_meta($postID, $count_key, $count); // update count
    }
}

// Sản phẩm đã xem
function viewerProduct()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION["viewed"])) {
        $_SESSION["viewed"] = array();
    }
    if (is_singular('product')) {
        $_SESSION["viewed"][get_the_ID()] = get_the_ID();
    }
}

add_action('wp', 'viewerProduct');

