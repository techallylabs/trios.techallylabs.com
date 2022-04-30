<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $map_lat
 * @var $map_long
 * @var $map_address
 * @var $map_zoom
 * @var $map_marker
 * @var $parallax_value
 * @var $default_style
 * @var $map_height
 * Shortcode class
 * @var $this WPBakeryShortCode_Cth_Gmap
 */
$el_class = $map_lat = $map_long = $map_address = $map_zoom = $map_marker = $parallax_value = $default_style = $map_height = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_script("monolitgmap", "https://maps.google.com/maps/api/js?key=".monolit_global_var('gmap_api_key'),array(),false,true);
wp_enqueue_script("monolitgmap-js", get_template_directory_uri() . "/assets/js/map.js", array('jquery'), false, true);
if(!empty($map_marker)){
	$map_marker = wp_get_attachment_url($map_marker );
}
?>
<div class="map-box <?php echo esc_attr($el_class ); ?>" 
	<?php if($parallax_value!=''):?>
      data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value );?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_value;?>px);"
    <?php endif;?>
    <?php if($map_height != '400'):?>
	  style="height:<?php echo esc_attr($map_height );?>px" 
    <?php endif;?>
    >
        <div class="map-canvas" data-latitude="<?php echo esc_attr($map_lat );?>" data-longitude="<?php echo esc_attr($map_long );?>" data-location="<?php echo esc_attr($map_address );?>" data-zoom="<?php echo esc_attr($map_zoom );?>"  data-marker="<?php echo esc_url($map_marker );?>" data-dfstyle="<?php echo esc_attr($default_style );?>" 
        <?php if($map_height != '400'):?>
		  style="height:<?php echo esc_attr($map_height );?>px" 
	    <?php endif;?>
    ></div>
</div>