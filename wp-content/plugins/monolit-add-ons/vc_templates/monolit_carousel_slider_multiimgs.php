<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $css
 * @var $el_class
 * @var $items
 * @var $autoplay
 * @var $autoplayspeed
 * @var $autoplaytimeout
 * @var $loop
 * @var $dots
 * @var $smartspeed
 * @var $center
 * @var $autowidth
 * @var $parallax_value
 * @var $box_pos
 * @var $img_size
 * @var $show_zoom
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Home_Slideshow
 */
$el_class = $items = $autoplay = $autoplayspeed = $autoplaytimeout = $css = $responsive = $slideimages = $autoheight = $loop = $dots = $smartspeed = $center = $autowidth = $parallax_value = $box_pos = $img_size = $show_zoom = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts ); 

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$dataArr = array();

if($autoplayspeed == 'true'){
    $dataArr['autoplaySpeed'] = true;
}elseif(is_numeric($autoplayspeed)){
    $dataArr['autoplaySpeed'] = (int)$autoplayspeed;
}
$dataArr['autoplayTimeout'] = (int)$autoplaytimeout;
if($autoheight === 'yes'){
    $dataArr['autoHeight'] = true;
}else{
    $dataArr['autoHeight'] = false;
}
if($autoplay === 'yes'){
    $dataArr['autoplay'] = true;
}else{
    $dataArr['autoplay'] = false;
}
$dataArr['items'] = (int)$items;
if(!empty($responsive)){
    $el_class .=' resp-ena';
    $dataArr['responsive'] = $responsive;
}else{
    $dataArr['responsive'] = false;
}
if($loop === 'yes'){
    $dataArr['loop'] = true;
}else{
    $dataArr['loop'] = false;
}
if($dots === 'yes'){
    $dataArr['dots'] = true;
}else{
    $dataArr['dots'] = false;
}
if($center === 'yes'){
    $dataArr['center'] = true;
}else{
    $dataArr['center'] = false;
}
if($autowidth === 'yes'){
    $dataArr['autoWidth'] = true;
}else{
    $dataArr['autoWidth'] = false;
}

$dataArr['smartSpeed'] = (int)$smartspeed;

$box_class = '';
if($box_pos == 'right'){
    $box_class .= ' r-align';
}elseif($box_pos == 'center'){
    $box_class .= ' r-center';
}

if(!empty($slideimages)){
    $images = explode(",", $slideimages);

    if(!empty($images)) : 

    ?>
    <!-- single slider  -->
    <div class="parallax-box slider-box<?php echo esc_attr($box_class );?>"
    <?php if($parallax_value!=''):?>
     data-top-bottom="transform: translateY(<?php echo 0 - $parallax_value;?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr($parallax_value );?>px);"
    <?php endif;?>
    >
        <div class="single-slider-holder <?php echo esc_attr($el_class );?> <?php echo esc_attr($css_class );?><?php if($show_zoom == 'yes') echo ' lightgallery';?>"  data-looped="0">
            <div class="single-slider owl-carousel owl-theme refrestonresizeowl" data-options='<?php echo json_encode($dataArr);?>'>
                <?php foreach ($images as $key => $img) {
                ?>
                <div class="item">
                    <?php echo wp_get_attachment_image( $img, $img_size, '', array('class'=>'respimg')); ?>
                <?php if($show_zoom == 'yes'):?>
                    <a data-src="<?php echo esc_url( wp_get_attachment_url($img ) );?>" class="popup-image slider-zoom" data-sub-html="<?php echo esc_attr(get_post_meta($img, '_wp_attachment_image_alt',true ) );?>">
                    <i class="fa fa-expand"></i></a>
                <?php endif;?>
                </div>

                <?php
                } ?>
            </div>
            <div class="customNavigation ssn">
                <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <!-- single slider  end -->
    </div>

    <?php
    endif;
}

?>