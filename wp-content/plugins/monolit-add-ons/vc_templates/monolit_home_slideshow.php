<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $slideimgs
 * @var $opacity
 * @var $items
 * @var $autoplayspeed
 * @var $scroll_link
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Home_Slideshow
 */
$el_class = $slideimgs = $opacity = $items = $autoplayspeed = $scroll_link = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts ); 
if(empty($parallax_value)){
    $parallax_value = 0;
}
$dataArr = array();
if($autoplayspeed == 'true'){
    $dataArr['autoplaySpeed'] = true;
}elseif(is_numeric($autoplayspeed)){
    $dataArr['autoplaySpeed'] = (int)$autoplayspeed;
}
$dataArr['autoplayTimeout'] = (int)$autoplaytimeout;
$dataArr['items'] = (int)$items;
?>

<!-- Hero section   -->
<div class="hero-wrap hero-wrap-home-slideshow <?php echo esc_attr($el_class );?>">
    <?php

    if(!empty($slideimgs)){
        $slideshows = explode(",", $slideimgs);

        if(!empty($slideshows)) : 

        ?>
        <div class="slideshow-item owl-carousel owl-theme refrestonresizeowl" data-options='<?php echo json_encode($dataArr);?>' data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value);?>px);" data-bottom-top="transform: translateY(<?php echo 0 - $parallax_value;?>px);">
            <?php foreach ($slideshows as $key => $img) {
            
            ?>
            <div class="item">
                <div class="bg" style="background-image:url(<?php echo esc_url(monolit_addons_get_attachment_thumb($img, 'monolitfuls-thumb') );?>)"></div>
            </div>
            <?php
            } ?>
        </div>
        <?php
        endif;
    }

    ?>
    <div class="overlay" style="opacity:<?php echo esc_attr($opacity );?>;"></div>
    <div class="hero-wrap-item center-item">
        <?php echo wpb_js_remove_wpautop($content,true);?>
    </div>
    <?php if(!empty($scroll_link)):?>
    <a href="<?php echo esc_url($scroll_link );?>" class="hero-scroll-link custom-scroll-link" data-top-bottom="transform: translateY(50px);" data-bottom-top="transform: translateY(-50px);"><i class="fa fa-angle-down"></i></a>
    <?php endif;?>
</div>
<!-- Hero section   end -->