<?php

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'kopa_shortcode_gallery');

/**
 * 
 *
 * @package Kopa
 * @subpackage Core
 * @author thethangtran <tranthethang@gmail.com>
 * @since 1.0.0
 *      
 */
function kopa_shortcode_gallery($atts) {
    extract(shortcode_atts(array("ids" => ''), $atts));
    $output = '';

    if (isset($atts['ids'])) {
        $ids = explode(',', $atts['ids']);
        if ($ids) {
            $output .= '<div class="fotorama" data-loop="true" data-thumbheight="98" data-nav="thumbs" data-width="100%" data-ratio="16/9" data-max-width="100%" data-allowfullscreen="true">';
            foreach ($ids as $id) {
                $image_obj = wp_get_attachment_image_src($id, 'full');
                $image_src = $image_obj[0];
                $output .= sprintf('<img src="%s" data-caption="%s" alt="%s">', $image_src, get_post_field('post_excerpt', $id), get_post_field('post_title', $id));
            }

            $output.= '</div>';
        }
    }

    return apply_filters('kopa_shortcode_gallery', force_balance_tags($output), $atts);
}
