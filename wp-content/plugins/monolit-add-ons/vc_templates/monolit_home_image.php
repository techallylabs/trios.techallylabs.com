<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $bgimg
 * @var $opacity
 * @var $home_image_style
 * @var $parallax_val
 * @var $scroll_link
 * @var $content
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Home_Image
 */
$el_class = $bgimg = $opacity = $home_image_style = $scroll_link = $parallax_val = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
// var_dump($content);die;
?>
<!-- Hero section   -->
<div class="hero-wrap hero-wrap-home-image">
<?php if(!empty($bgimg)) : ?>
    <!-- Hero image   -->
    <div class="bg" 
        data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($bgimg, 'monolitfuls-thumb') );?>" 
    <?php if($parallax_val!='') : ?>
    data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_val );?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_val;?>px);"
    <?php endif;?>></div>
    <!-- Hero image   end -->
<?php endif;?>
    <div class="overlay" style="opacity:<?php echo esc_attr($opacity );?>;"></div>
    <!-- Hero text   -->
    <div class="hero-wrap-item center-item">
        <?php echo wpb_js_remove_wpautop($content,true);?>
    </div>
    <!-- Hero text   end-->
    <?php if(!empty($scroll_link)):?>
    <a href="<?php echo esc_url($scroll_link );?>" class="hero-scroll-link custom-scroll-link"
    data-top-bottom="transform: translateY(50px);" data-bottom-top="transform: translateY(-50px);"><i class="fa fa-angle-down"></i></a>
    <?php endif;?>
</div>
<!-- Hero section   end -->