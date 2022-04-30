<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $controls
 * @var $mute
 * @var $video
 * @var $bgimg
 * @var $containment
 * @var $autoplay
 * @var $opacity
 * @var $video_style
 * @var $content
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Home_Youtube_Video
 */
$el_class = $bgimg = $opacity = $scroll_link = $video = $parallax_value = $quality = $mute = $loop = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if(empty($parallax_value)){
    $parallax_value = 0;
}

$dataArr = array();
$dataArr['video'] = $video;
$dataArr['quality'] = $quality;
$dataArr['mute'] = $mute;
$dataArr['loop'] = $loop;

?>
<div class="hero-wrap hero-wrap-home-vimeo-video <?php echo esc_attr($el_class );?>">
    <div class="media-container" data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value);?>px);" data-bottom-top="transform: translateY(<?php echo 0 - $parallax_value;?>px);">
        <div class="video-mask"></div>
        <div class="video-holder">
            <div  class="background-vimeo" data-opts='<?php echo json_encode( $dataArr );?>'> </div>
            <div class="mob-bg bg" 
            <?php if(!empty($bgimg)) : ?>
             data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($bgimg, 'monolitfuls-thumb') );?>"
            <?php endif;?>></div>
        </div>

    </div>
    <div class="overlay" style="opacity:<?php echo esc_attr($opacity );?>;"></div>
    <div class="hero-wrap-item center-item">
        <?php echo wpb_js_remove_wpautop($content,true);?>
    </div>
    <?php if(!empty($scroll_link)):?>
    <a href="<?php echo esc_url($scroll_link );?>" class="hero-scroll-link custom-scroll-link" data-top-bottom="transform: translateY(50px);" data-bottom-top="transform: translateY(-50px);"><i class="fa fa-angle-down"></i></a>
    <?php endif;?>
</div>