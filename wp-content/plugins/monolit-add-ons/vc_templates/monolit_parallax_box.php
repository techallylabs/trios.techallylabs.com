<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $parallax_value
 * @var $css
 * @var $box_pos
 * @var $content
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Parallax_Box
 */
$el_class = $parallax_value = $css = $box_pos = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if(empty($parallax_value)){
    $parallax_value = 0;
}

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
if($box_pos == 'right'){
	$css_class .= ' r-align';
}elseif($box_pos == 'center'){
	$css_class .= ' r-center';
}
?>
<div class="parallax-box <?php echo esc_attr($el_class ); ?> <?php echo esc_attr($css_class ); ?>" data-top-bottom="transform: translateY(<?php echo 0-$parallax_value;?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr($parallax_value);?>px);">
    <?php echo wpb_js_remove_wpautop($content,true);?>
</div>