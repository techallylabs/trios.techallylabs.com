<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $slideimg - ''
 * @var $opacity - 0.2
 * @var $content
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Home_Swiper_Item
 */
$el_class = $slideimg = $opacity = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="item <?php echo esc_attr($el_class );?>">
    <?php echo wp_get_attachment_image( $slideimg, 'monolit-carousel', '', array('class'=>'respimg') ); ?>
    <?php if(!empty($content)) :?>
        <?php echo wpb_js_remove_wpautop($content,true);?>
    <?php endif;?>
</div>