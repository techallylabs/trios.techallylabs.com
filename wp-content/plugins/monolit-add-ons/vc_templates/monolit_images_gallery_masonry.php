<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $css
 * @var $el_class
 * @var $galleryimgs
 * @var $columns
 * @var $spacing
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Images_Gallery_Masonry
 */
$css = $el_class = $galleryimgs = $columns = $spacing = $disable_title = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if(!empty($galleryimgs)){
    $images = explode(",", $galleryimgs);

    if(!empty($images)) : 
        $imgatts = array('class'=>'respimg');
        

    ?>
    <div class="gallery-items <?php echo esc_attr($columns );?>-columns grid-<?php echo esc_attr($spacing );?>-pad lightgallery <?php echo esc_attr($el_class ); ?> <?php echo esc_attr($css_class ); ?>">
        <div class="grid-sizer"></div>
        <?php foreach ($images as $key => $img) {
            
        ?>
        <div class="gallery-item">
            <div class="grid-item-holder">
                <div class="box-item">
                    <a data-src="<?php echo esc_url(wp_get_attachment_url( $img ) );?>" class="popup-image" data-sub-html="<?php echo esc_attr(get_post_meta($img, '_wp_attachment_image_alt',true ) );?>">
                    <span class="overlay"></span> 
                    <?php echo wp_get_attachment_image( $img, 'monolitmasonry-size-one', false, $imgatts );?>
                    </a>
                </div>
            </div>
        </div>
        <?php
        } ?>

        
    </div>

    <?php
    endif;
}

?>