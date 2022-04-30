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
 * @var $ani_duration
 * @var $opacity
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Home_Slideshow
 */
$el_class = $items = $autoplay = $autoplayspeed = $autoplaytimeout = $css = $responsive = $slideimages = $autoheight = $loop = $dots = $smartspeed = $center = $autowidth = $parallax_value = $ani_duration = $opacity = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts ); 

if(empty($parallax_value)){
    $parallax_value = 0;
}

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$dataArr = array();

if($autoplayspeed == 'true'){
    $dataArr['autoplaySpeed'] = true;
}elseif(is_numeric($autoplayspeed)){
    $dataArr['autoplaySpeed'] = (int)$autoplayspeed;
}
$dataArr['autoplayTimeout'] = (int)$autoplaytimeout;
// if($autoheight === 'yes'){
//     $dataArr['autoHeight'] = true;
// }else{
//     $dataArr['autoHeight'] = false;
// }
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
// if($autowidth === 'yes'){
//     $dataArr['autoWidth'] = true;
// }else{
//     $dataArr['autoWidth'] = false;
// }

$dataArr['smartSpeed'] = (int)$smartspeed;

$values = (array) vc_param_group_parse_atts( $values );
if(!empty($values)){
    ?>
    <!-- Hero section   -->
    <div class="hero-wrap hero-wrap-home-slider <?php echo esc_attr($el_class );?> <?php echo esc_attr($css_class );?>">
        
    <?php if($loop == 'yes') : 
        if($loop === 'yes'){
            $dataArr['loop'] = true;
        }else{
            $dataArr['loop'] = false;
        }
    ?>
        <div class="hero-wrap-image-slider-holder">
            <div class="home-slider-loop owl-carousel owl-theme refrestonresizeowl keyboardcontr" data-options='<?php echo json_encode($dataArr);?>'>
                <?php foreach ( $values as $data ) { 
                    $bgimg = isset( $data['slideimg'] ) ? $data['slideimg'] : '1';
                    $slide_content = isset( $data['slide_content'] ) ? $data['slide_content'] : '';
                ?> 
                <div class="item">
                    <div class="overlay" style="opacity:<?php echo esc_attr($opacity);?>;"></div>
                    <div class="bg" data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($bgimg, 'monolitfuls-thumb') );?>" data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value);?>px);" data-bottom-top="transform: translateY(<?php echo 0 - $parallax_value;?>px);"></div>

                    <div class="hero-wrap-item center-item">
                        <?php echo wp_kses_post($slide_content );?>
                    </div>

                </div>
                <?php } ?>
            </div>
            <div class="customNavigation fhsln">
                <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    <?php else : ?>
        <div class="hero-wrap-image-slider-holder">
            <div class="overlay" style="opacity:<?php echo esc_attr($opacity);?>;"></div>
            <!-- hero-wrap-image-slider  -->
            <div class="hero-wrap-image-slider owl-carousel owl-theme" data-dur="<?php echo esc_attr($ani_duration );?>">
                
                <?php foreach ( $values as $data ) { 
                    $bgimg = isset( $data['slideimg'] ) ? $data['slideimg'] : '1';
                ?> 

                <div class="item">
                    <div class="bg"  data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($bgimg, 'monolitfuls-thumb') );?>" data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value);?>px);" data-bottom-top="transform: translateY(<?php echo 0 - $parallax_value;?>px);"></div>
                </div>
                
                <?php } ?>
                
            </div>
            <!-- hero-wrap-image-slider  end -->
        </div>
        <!-- hero-wrap-image-slider-holder  end -->
        <!-- hero-wrap-image-slider-holder  end -->
        <div class="hero-wrap-text-slider-holder">
            <!-- hero-wrap-image-slider  -->
            <div class="hero-wrap-text-slider owl-carousel owl-theme refrestonresizeowl keyboardcontr" data-options='<?php echo json_encode($dataArr);?>'>
                <?php foreach ( $values as $data ) { 
                    $slide_content = isset( $data['slide_content'] ) ? $data['slide_content'] : '';
                ?> 
                <div class="item">
                    <div class="hero-wrap-item center-item">
                        <?php echo wp_kses_post($slide_content );?>
                    </div>
                </div>
                
                <?php } ?>
            </div>
            <!-- hero-wrap-text-slider  end -->
            <!--  navigation -->
            <div class="customNavigation fhsln">
                <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
            </div>
            <!--  navigation end-->
        </div>
        <!-- hero-wrap-image-text-holder  end -->    
    <?php endif ; ?>                      
    </div>
    <!-- Hero section   end -->

    <?php
}
?>