<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';

// for custom fields
$cth_layout
 = $parallax_inner = $parallax_inner_op = $parallax_inner_val  
 = $sec_number = $sec_number_pos = $sec_number_par 

  = $slideshow_imgs = $scroll_link  = $left_bg_img = $left_bg_width =
$map_bg_lat = $map_bg_long = $map_bg_address = $map_bg_zoom = $show_close_map 

 = $is_header_sec = $head_video_id
 = $gallery_images

 = $items = $autoplay = $autoplayspeed = $autoplaytimeout = $responsive = $autoheight = $loop = $dots = $smartspeed = $center = $autowidth = $show_thumbs = $show_cap = $show_zoom = $show_more_info

 = $video_id = $video_bg_id = $video_quality = $video_mute
 = $vimeo_vid_quality = $video_loop
 = $no_sec_padding
 = $use_as_img
 = $use_constellation
 = '';

 $parallax_inner_val = $sec_number_par  = 0;

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


if($cth_layout == 'monolit_fullheight_sec'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_fulh_sec',
    'content full-height',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
?>
<div <?php
    echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
    echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>
    <?php 
    if($use_constellation == 'yes') : ?>
    <canvas class="particular header-constellation"></canvas>
    <?php endif ; ?>
<?php 
if($sec_number!=''):
    if($sec_number_pos == 'right'): ?>
    <!-- section number   -->
    <div class="sect-subtitle right-align-dec" data-top-bottom="transform: translateY(<?php echo esc_attr($sec_number_par);?>px);" data-bottom-top="transform: translateY(<?php echo 0-$sec_number_par;?>px);">
<?php else: ?>
    <div class="sect-subtitle left-align-dec" data-top-bottom="transform: translateY(<?php echo 0-$sec_number_par;?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr($sec_number_par);?>px);">
<?php endif;?>
    <span><?php echo esc_attr($sec_number );?></span></div>
    <!-- section number  end  -->
    <?php endif;?>
<?php if($parallax_inner!='') :?>
    <!-- parallax image  -->                        
    <div class="parallax-inner">
        <div class="bg" data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($parallax_inner, 'monolitfuls-thumb') );?>" data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_inner_val);?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_inner_val;?>px);"></div>
        <div class="overlay" style="opacity:<?php echo esc_attr($parallax_inner_op );?>;"></div>
    </div>
    <!-- parallax image  end -->  
<?php endif;?>                  
    <?php 
        if ( ! empty( $full_width ) ) { ?>
        <div class="container-fluid full-height">
    <?php }else { ?>
        <div class="container full-height">
    <?php
    }    ?>
            <div class="row full-height <?php //echo esc_attr($el_class );?>">
                <?php echo wpb_js_remove_wpautop($content); ?>
            </div>
        </div>
</div>

<?php }elseif($cth_layout == 'monolit_page_sec'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_page_sec',
    'content',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
if($no_sec_padding == 'yes'){
    $css_class .= ' no-sec-padding';
}
?>
<div <?php
    echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
    echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>

<?php if($parallax_inner!='') :?>
    <!-- parallax image  -->                        
    <div class="parallax-inner">
        <div class="bg" data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($parallax_inner, 'monolitfuls-thumb') );?>" data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_inner_val);?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_inner_val;?>px);"></div>
        <div class="overlay" style="opacity:<?php echo esc_attr($parallax_inner_op );?>;"></div>
    </div>
    <!-- parallax image  end -->  
<?php endif;?> 

    <section>
<?php 
if($sec_number!=''):
    if($sec_number_pos == 'right'): ?>
    <!-- section number   -->
    <div class="sect-subtitle right-align-dec" data-top-bottom="transform: translateY(<?php echo esc_attr($sec_number_par);?>px);" data-bottom-top="transform: translateY(<?php echo 0-$sec_number_par;?>px);">
<?php else: ?>
    <div class="sect-subtitle left-align-dec" data-top-bottom="transform: translateY(<?php echo 0-$sec_number_par;?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr($sec_number_par);?>px);">
<?php endif;?>
    <span><?php echo esc_attr($sec_number );?></span></div>
    <!-- section number  end  -->
    <?php endif;?>
    <?php 
        if ( ! empty( $full_width ) ) { ?>
        <div class="container-fluid">
    <?php }else { ?>
        <div class="container">
    <?php
    }    ?>
            <div class="row">
                <?php echo wpb_js_remove_wpautop($content); ?>
            </div>
        </div>
    </section>
</div>

<?php }elseif($cth_layout == 'monolit_page_dark_sec'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_page_sec',
    'content dark-bg',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
if($no_sec_padding == 'yes'){
    $css_class .= ' no-sec-padding';
}
?>
<div <?php
    echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
    echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>

<?php if($parallax_inner!='') :?>
    <!-- parallax image  -->                        
    <div class="parallax-inner">
        <div class="bg" data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($parallax_inner, 'monolitfuls-thumb') );?>" data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_inner_val);?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_inner_val;?>px);"></div>
        <div class="overlay" style="opacity:<?php echo esc_attr($parallax_inner_op );?>;"></div>
    </div>
    <!-- parallax image  end -->  
<?php endif;?> 

    <section>
<?php 
if($sec_number!=''):
    if($sec_number_pos == 'right'): ?>
    <!-- section number   -->
    <div class="sect-subtitle right-align-dec" data-top-bottom="transform: translateY(<?php echo esc_attr($sec_number_par);?>px);" data-bottom-top="transform: translateY(<?php echo 0-$sec_number_par;?>px);">
<?php else: ?>
    <div class="sect-subtitle left-align-dec" data-top-bottom="transform: translateY(<?php echo 0-$sec_number_par;?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr($sec_number_par);?>px);">
<?php endif;?>
    <span><?php echo esc_attr($sec_number );?></span></div>
    <!-- section number  end  -->
    <?php endif;?>
    <?php 
        if ( ! empty( $full_width ) ) { ?>
        <div class="container-fluid">
    <?php }else { ?>
        <div class="container">
    <?php
    }    ?>
            <div class="row">
                <?php echo wpb_js_remove_wpautop($content); ?>
            </div>
        </div>
    </section>
</div>

<?php }elseif($cth_layout == 'home_sec'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_folio_head_sec',
    'content',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
if($no_sec_padding == 'yes'){
    $css_class .= ' no-sec-padding';
}
?>
<div <?php
    echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
    echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>
    <section class="parallax-section">
    <?php if($head_video_id!='') :?>
        <div class="media-container header-video" data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_inner_val);?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_inner_val;?>px);">
            <div class="video-mask"></div>
            <!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
            <div class="mob-bg bg" data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($parallax_inner, 'monolitfuls-thumb') );?>"></div>
            <div  class="background-youtube" data-vid="<?php echo esc_attr( $head_video_id );?>" data-mv="1"> </div>
        </div>
        <div class="overlay" style="opacity:<?php echo esc_attr($parallax_inner_op );?>;"></div>
    <?php elseif($parallax_inner!='') :?>
        <div class="parallax-inner">
            <div class="bg" data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($parallax_inner, 'monolitfuls-thumb') );?>" data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_inner_val);?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_inner_val;?>px);"></div>
            <div class="overlay" style="opacity:<?php echo esc_attr($parallax_inner_op );?>;"></div>
        </div>
    <?php endif;?>
    <?php 
        if ( ! empty( $full_width ) ) { ?>
        <div class="container-fluid">
    <?php }else { ?>
        <div class="container">
    <?php
    }    ?>
        <?php if($is_header_sec == 'yes') :?>
            <div class="page-title">
        <?php endif;?>
                <div class="row">
                    <?php echo wpb_js_remove_wpautop($content); ?>
                </div>
            <?php if($is_header_sec == 'yes') :?>
            </div>
        <?php endif;?>
        </div>
    </section>
</div>

<?php }elseif($cth_layout == 'portfolio_style2_wrap'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_folio_style2_wrap',
    'content full-height no-bg-con',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg-ml vc_hidden-xs-ml vc_hidden-sm-ml vc_hidden-md-ml';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
?>
<div <?php
    echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
    echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>
    <!-- portfolio  Images  -->
    <div class="control-panel<?php if($show_cap == 'no' && $show_thumbs == 'no' && $show_more_info == 'no') echo ' hide-cpanel';?>">
        <div class="container">
            <?php if($show_cap == 'yes'):?><div class="caption"></div><?php endif;?>
            <?php if($show_more_info == 'yes'):?><a href="#" class=" btn anim-button   flat-btn   transition    show-hid-sidebar"><?php echo wp_kses(__('<span>More information</span><i class="fa fa-eye"></i>','monolit-add-ons'), array('span'=>array(),'i'=>array('class'=>array()),) );?></a><?php endif;?>
            <?php if($show_thumbs == 'yes') :?>
            <span class="show-thumbs vis-con-panel vis-t" data-textshow="<?php esc_html_e('Show thumbnails','monolit-add-ons');?>" data-texthide="<?php esc_html_e('Hide thumbnails','monolit-add-ons');?>"></span>
            <?php endif;?>
        </div>
    </div>
<?php
if(!empty($gallery_images)){
    $gal_imgs = explode(",", $gallery_images);

    if(!empty($gal_imgs)) : 
        $dataArr = array();

        if($autoplay === 'yes'){
            $dataArr['autoplay'] = true;
        }else{
            $dataArr['autoplay'] = false;
        }
        $dataArr['items'] = (int)$items;
        if($loop === 'yes'){
            $dataArr['loop'] = true;
        }else{
            $dataArr['loop'] = false;
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

        if($show_thumbs === 'yes'){
            $dataArr['thumbs'] = true;
        }else{
            $dataArr['thumbs'] = false;
        }

    ?>
    <div class="resize-carousel-holder lightgallery ogm smp">
        <div class="gallery_horizontal owl-carousel owl-theme refrestonresizeowl" data-options='<?php echo json_encode($dataArr);?>'>
        <?php foreach ($gal_imgs as $img) { 
            $at_img = get_post($img);
            $at_des = $at_img->post_content;
        ?>
            <div class="horizontal_item" data-phname="<?php echo esc_attr(get_post_meta($img, '_wp_attachment_image_alt',true ) );?>" 
        <?php if(!empty($at_des)):?>
            data-phdesc="<?php echo esc_attr($at_des );?>"
        <?php endif;?>>
                <?php echo wp_get_attachment_image( $img, 'monolithoz-thumb'); ?>
            <?php if($show_zoom == 'yes'):?>
                <a data-src="<?php echo esc_url( wp_get_attachment_url($img ) );?>" class="popup-image slider-zoom"><i class="fa fa-expand"></i></a>
            <?php endif;?>
            </div>
            <!-- gallery item end-->
        <?php } ?>                               
        </div>
        <!--  navigation -->
        <div class="customNavigation fhsln">
            <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
        </div>
        <!--  navigation end-->
    </div>
</div>
<?php endif; //end gal_imgs
} ?>
    <!-- Hidden sidebar-->
    <div class="sb-overlay"></div>
    <div class="hid-sidebar">
        <div class="container small-container">
            <div class="sidebar-wrap">
                <div class="sb-bg"></div>
                <div class="sb-inner">
                    <div class="close-sidebar"></div>
                    <div class="row">
                        <?php echo wpb_js_remove_wpautop($content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

<?php }elseif($cth_layout == 'portfolio_style3_wrap'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_folio_style3_wrap',
    'content full-height no-bg-con',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg-ml vc_hidden-xs-ml vc_hidden-sm-ml vc_hidden-md-ml';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
?>
<div <?php
    echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
    echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>
    <!-- portfolio  Images  -->
    <div class="control-panel<?php if($show_cap == 'no' && $show_thumbs == 'no' && $show_more_info == 'no') echo ' hide-cpanel';?>">
        <div class="container">
            <?php if($show_cap == 'yes'):?><div class="caption"></div><?php endif;?>
            <?php if($show_more_info == 'yes'):?><a href="#" class=" btn anim-button   flat-btn   transition    show-hid-sidebar"><?php echo wp_kses(__('<span>More information</span><i class="fa fa-eye"></i>','monolit-add-ons'), array('span'=>array(),'i'=>array('class'=>array()),) );?></a><?php endif;?>
            <?php if($show_thumbs == 'yes') :?>
            <span class="show-thumbs vis-con-panel vis-t" data-textshow="<?php esc_html_e('Show thumbnails','monolit-add-ons');?>" data-texthide="<?php esc_html_e('Hide thumbnails','monolit-add-ons');?>"></span>
            <?php endif;?>
        </div>
    </div>
<?php
if(!empty($gallery_images)){
    $gal_imgs = explode(",", $gallery_images);

    if(!empty($gal_imgs)) : 

        $dataArr = array();

        if($autoplay === 'yes'){
            $dataArr['autoplay'] = true;
        }else{
            $dataArr['autoplay'] = false;
        }
        $dataArr['items'] = (int)$items;
        if($loop === 'yes'){
            $dataArr['loop'] = true;
        }else{
            $dataArr['loop'] = false;
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

        if($show_thumbs === 'yes'){
            $dataArr['thumbs'] = true;
        }else{
            $dataArr['thumbs'] = false;
        }

    ?>
    <div class="resize-carousel-holder lightgallery ogm smp">
        <div class="gallery_horizontal flow-gallery  owl-carousel owl-theme refrestonresizeowl"  data-options='<?php echo json_encode($dataArr);?>'>
        <?php foreach ($gal_imgs as $img) { 
            $at_img = get_post($img);
            $at_des = $at_img->post_content;
        ?>
            <div class="horizontal_item" data-phname="<?php echo esc_attr(get_post_meta($img, '_wp_attachment_image_alt',true ) );?>" 
        <?php if(!empty($at_des)):?>
            data-phdesc="<?php echo esc_attr($at_des );?>"
        <?php endif;?>>
                <?php echo wp_get_attachment_image( $img, 'monolithoz-thumb'); ?>
            <?php if($show_zoom == 'yes') :?>
                <a data-src="<?php echo esc_url( wp_get_attachment_url($img ) );?>" class="popup-image slider-zoom"><i class="fa fa-expand"></i></a>
            <?php endif;?>
            </div>
        <?php } ?>                               
        </div>
        <!--  navigation -->
        <div class="customNavigation fhsln">
            <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
        </div>
        <!--  navigation end-->
    </div>
</div>
<?php endif; //end gal_imgs
} ?>
    <!-- Hidden sidebar-->
    <div class="sb-overlay"></div>
    <div class="hid-sidebar">
        <div class="container small-container">
            <div class="sidebar-wrap">
                <div class="sb-bg"></div>
                <div class="sb-inner">
                    <div class="close-sidebar"></div>
                    <div class="row">
                        <?php echo wpb_js_remove_wpautop($content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

<?php }elseif($cth_layout == 'portfolio_style4_wrap'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_folio_style4_wrap',
    'content full-height no-bg-con',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg-ml vc_hidden-xs-ml vc_hidden-sm-ml vc_hidden-md-ml';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
?>
<div <?php
    echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
    echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>
    <div class="fix-con-panel<?php if($show_thumbs == 'no' && $show_more_info == 'no') echo ' hide-cpanel';?>">
        <?php if($show_thumbs == 'yes') :?><span class="show-thumbs hid-con-panel vis-t" data-textshow="<?php esc_html_e('Show thumbnails','monolit-add-ons');?>" data-texthide="<?php esc_html_e('Hide thumbnails','monolit-add-ons');?>"></span><?php endif;?>
        <?php if($show_more_info == 'yes') :?><a href="#" class="  show-hid-sidebar"><?php esc_html_e(' info','monolit-add-ons');?></a><?php endif;?>
    </div>
<?php
if(!empty($gallery_images)){
    $gal_imgs = explode(",", $gallery_images);

    if(!empty($gal_imgs)) : 

        $dataArr = array();

        if($autoplay === 'yes'){
            $dataArr['autoplay'] = true;
        }else{
            $dataArr['autoplay'] = false;
        }
        $dataArr['items'] = (int)$items;
        if($loop === 'yes'){
            $dataArr['loop'] = true;
        }else{
            $dataArr['loop'] = false;
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

        if($show_thumbs === 'yes'){
            $dataArr['thumbs'] = true;
        }else{
            $dataArr['thumbs'] = false;
        }

    ?>
    <div class="resize-carousel-holder lightgallery fhgal ogm smp hid-gal">
        <div class="gallery_horizontal  owl-carousel owl-theme refrestonresizeowl"  data-options='<?php echo json_encode($dataArr);?>'>
        <?php foreach ($gal_imgs as $img) { 
            $at_img = get_post($img);
            $at_alt = get_post_meta($img, '_wp_attachment_image_alt',true );
            $at_des = $at_img->post_content;
        ?>
            <div class="horizontal_item">
                <?php echo wp_get_attachment_image( $img, 'monolithoz-thumb'); ?>
            <?php if($show_zoom == 'yes') :?>
                <a data-src="<?php echo esc_url( wp_get_attachment_url($img ) );?>" class="popup-image slider-zoom"><i class="fa fa-expand"></i></a>
            <?php endif;?>
            <?php if(!empty($at_des)|| !empty($at_alt)):?>
                <div class="show-info">
                    <span><?php esc_html_e('Info','monolit-add-ons');?></span>
                    <div class="tooltip-info">
                        <h5><?php echo esc_attr($at_alt);?></h5>
                        <p><?php echo esc_attr($at_des );?></p>
                    </div>
                </div>
            <?php endif;?>
            </div>
            <!-- gallery item end-->
        <?php } ?>                               
        </div>
        <!--  navigation -->
        <div class="customNavigation fhsln">
            <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
        </div>
        <!--  navigation end-->
    </div>
</div>
<?php endif; //end gal_imgs
} ?>
    <!-- Hidden sidebar-->
    <div class="sb-overlay"></div>
    <div class="hid-sidebar">
        <div class="container small-container">
            <div class="sidebar-wrap">
                <div class="sb-bg"></div>
                <div class="sb-inner">
                    <div class="close-sidebar"></div>
                    <div class="row">
                        <?php echo wpb_js_remove_wpautop($content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->


<?php }elseif($cth_layout == 'portfolio_style7_wrap'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_folio_style7_wrap',
    'content full-height no-bg-con',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
    'autoheight-'.$use_as_img,
    'autowidth-'.$autowidth
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg-ml vc_hidden-xs-ml vc_hidden-sm-ml vc_hidden-md-ml';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
?>
<div <?php
    echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
    echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>
    <div class="fix-con-panel<?php if($show_more_info == 'no') echo ' hide-cpanel';?>">
        <a href="#" class="show-hid-sidebar vd"> <?php esc_html_e('More info','monolit-add-ons' );?></a>
    </div>
    <div class="resize-carousel-holder lightgallery fullscreen-gal-autoheight-<?php echo esc_attr($use_as_img );?>  fullscreen-gal-autowidth-<?php echo esc_attr($autowidth );?>" data-looped="0">
<?php
if(!empty($gallery_images)){
    $gal_imgs = explode(",", $gallery_images);

    if(!empty($gal_imgs)) : 

        $dataArr = array();

        if($autoplay === 'yes'){
            $dataArr['autoplay'] = true;
        }else{
            $dataArr['autoplay'] = false;
        }
        $dataArr['items'] = (int)$items;
        if($loop === 'yes'){
            $dataArr['loop'] = true;
        }else{
            $dataArr['loop'] = false;
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

        if($show_thumbs === 'yes'){
            $dataArr['thumbs'] = true;
        }else{
            $dataArr['thumbs'] = false;
        }

        if($responsive){
            $dataArr['responsive'] = $responsive;
        }else{
            $dataArr['responsive'] = false;
        }
    ?>
        <div class="full-screen-gallery-holder">
            <div class="full-screen-gallery owl-carousel owl-theme refrestonresizeowl autowidth-<?php echo esc_attr($autowidth );?> autoheight-<?php echo esc_attr($use_as_img );?>" data-options='<?php echo json_encode($dataArr);?>'>
        <?php foreach ($gal_imgs as $img) { 
            $at_img = get_post($img);
            $at_alt = get_post_meta($img, '_wp_attachment_image_alt',true );
            $at_des = $at_img->post_content;
        ?>
            <div class="full-screen-item" >
            <?php if($autowidth == 'yes'|| $use_as_img == 'yes') {
                echo wp_get_attachment_image( $img, 'monolitfuls-thumb', '', array('class'=>'respimg') );
            }else{

            ?>
                <div class="bg"  data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($img, 'monolitfuls-thumb') );?>"></div>
            <?php } ?>
                <?php if($show_zoom == 'yes') :?><a data-src="<?php echo esc_url( wp_get_attachment_url($img ) );?>" class="popup-image slider-zoom" data-sub-html="<?php echo esc_attr($at_alt);?>"><i class="fa fa-expand"></i></a><?php endif;?>
                <?php if(!empty($at_des)|| !empty($at_alt)):?>
                    <div class="show-info">
                        <span><?php esc_html_e('Info','monolit-add-ons');?></span>
                        <div class="tooltip-info">
                            <h5><?php echo esc_attr($at_alt);?></h5>
                            <p><?php echo esc_attr($at_des );?></p>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            
        <?php } ?>                               
            </div>
            <div class="customNavigation fhsln">
                <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
            </div>
        </div><!-- /full-screen-gallery-holder-->
    </div><!-- /resize-carousel-holder -->
</div>
<?php endif; //end gal_imgs
} ?>

        <!-- Hidden sidebar-->
        <div class="sb-overlay"></div>
        <div class="hid-sidebar">
            <div class="container small-container">
                <div class="sidebar-wrap">
                    <div class="sb-bg"></div>
                    <div class="sb-inner">
                        <div class="close-sidebar"></div>
                        <div class="row">
                            <?php echo wpb_js_remove_wpautop($content); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar end -->


<?php }elseif($cth_layout == 'portfolio_style8_wrap'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_folio_style8_wrap',
    'content full-height no-bg-con',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg-ml vc_hidden-xs-ml vc_hidden-sm-ml vc_hidden-md-ml';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
?>
    <div <?php
        echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
        echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>
        <div class="fix-con-panel<?php if($show_more_info == 'no') echo ' hide-cpanel';?>">
            <a href="#" class="show-hid-sidebar vd"> <?php esc_html_e('More info','monolit-add-ons' );?></a>
        </div>
        <div class="media-container">
            <div class="video-mask"></div>
            <div class="bg mob-bg" <?php if(!empty($video_bg_id)) : ?>
             data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($video_bg_id, 'monolitfuls-thumb') );?>"
            <?php endif;?>></div>
            <div  class="background-youtube" data-vid="<?php echo esc_html($video_id );?>" data-mv="<?php echo esc_attr($video_mute );?>" data-ql="<?php echo esc_attr($video_quality );?>"></div>
        </div>
    </div>

    <!-- Hidden sidebar-->
    <div class="sb-overlay"></div>
    <div class="hid-sidebar">
        <div class="container small-container">
            <div class="sidebar-wrap">
                <div class="sb-bg"></div>
                <div class="sb-inner">
                    <div class="close-sidebar"></div>
                    <div class="row">
                        <?php echo wpb_js_remove_wpautop($content); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar end -->
    </div>
    <!-- content end -->

<?php }elseif($cth_layout == 'portfolio_style9_wrap'){ ?>
<?php
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
    'monolit_sec monolit_folio_style9_wrap',
    'content full-height no-bg-con',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
    if ( vc_is_page_editable() ) {
        $css_classes[] = 'vc_hidden-lg-ml vc_hidden-xs-ml vc_hidden-sm-ml vc_hidden-md-ml';
    } else {
        return '';
    }
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );

$dataArr = array();
$dataArr['video'] = $video_id;
$dataArr['quality'] = $vimeo_vid_quality;
$dataArr['mute'] = $video_mute;
$dataArr['loop'] = $video_loop;

?>
    <div <?php
        echo isset($el_id) && !empty($el_id) ? "id='" . esc_attr($el_id) . "'" : ""; ?> <?php
        echo !empty($css_class) ? "class='" . esc_attr( trim( $css_class ) ) . "'" : ""; ?>>
        <div class="fix-con-panel<?php if($show_more_info == 'no') echo ' hide-cpanel';?>">
            <a href="#" class="show-hid-sidebar vd"> <?php esc_html_e('More info','monolit-add-ons' );?></a>
        </div>
        <div class="media-container">
            <div class="video-mask"></div>
            <div class="video-holder">
                <div  class="background-vimeo" data-opts='<?php echo json_encode( $dataArr );?>'> </div>
                <div class="bg mob-bg" <?php if(!empty($video_bg_id)) : ?>
             data-bg="<?php echo esc_url(monolit_addons_get_attachment_thumb($video_bg_id, 'monolitfuls-thumb') );?>"
            <?php endif;?>></div>
            </div>
        </div>
    </div>

    <!-- Hidden sidebar-->
    <div class="sb-overlay"></div>
    <div class="hid-sidebar">
        <div class="container small-container">
            <div class="sidebar-wrap">
                <div class="sb-bg"></div>
                <div class="sb-inner">
                    <div class="close-sidebar"></div>
                    <div class="row">
                        <?php echo wpb_js_remove_wpautop($content); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar end -->
    </div>
    <!-- content end -->

<?php
}else{

    wp_enqueue_script( 'wpb_composer_front_js' );

    $el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

    $css_classes = array(
        'vc_row',
        'wpb_row',
        //deprecated
        'vc_row-fluid',
        $el_class,
        vc_shortcode_custom_css_class( $css ),
    );

    if ( 'yes' === $disable_element ) {
        if ( vc_is_page_editable() ) {
            $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
        } else {
            return '';
        }
    }

    if ( vc_shortcode_custom_css_has_property( $css, array(
            'border',
            'background',
        ) ) || $video_bg || $parallax
    ) {
        $css_classes[] = 'vc_row-has-fill';
    }

    if ( ! empty( $atts['gap'] ) ) {
        $css_classes[] = 'vc_column-gap-' . $atts['gap'];
    }

    $wrapper_attributes = array();
    // build attributes for wrapper
    if ( ! empty( $el_id ) ) {
        $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
    }
    if ( ! empty( $full_width ) ) {
        $wrapper_attributes[] = 'data-vc-full-width="true"';
        $wrapper_attributes[] = 'data-vc-full-width-init="false"';
        if ( 'stretch_row_content' === $full_width ) {
            $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        } elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
            $wrapper_attributes[] = 'data-vc-stretch-content="true"';
            $css_classes[] = 'vc_row-no-padding';
        }
        $after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
    }

    if ( ! empty( $full_height ) ) {
        $css_classes[] = 'vc_row-o-full-height';
        if ( ! empty( $columns_placement ) ) {
            $flex_row = true;
            $css_classes[] = 'vc_row-o-columns-' . $columns_placement;
            if ( 'stretch' === $columns_placement ) {
                $css_classes[] = 'vc_row-o-equal-height';
            }
        }
    }

    if ( ! empty( $equal_height ) ) {
        $flex_row = true;
        $css_classes[] = 'vc_row-o-equal-height';
    }

    if ( ! empty( $content_placement ) ) {
        $flex_row = true;
        $css_classes[] = 'vc_row-o-content-' . $content_placement;
    }

    if ( ! empty( $flex_row ) ) {
        $css_classes[] = 'vc_row-flex';
    }

    $has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

    $parallax_speed = $parallax_speed_bg;
    if ( $has_video_bg ) {
        $parallax = $video_bg_parallax;
        $parallax_speed = $parallax_speed_video;
        $parallax_image = $video_bg_url;
        $css_classes[] = 'vc_video-bg-container';
        wp_enqueue_script( 'vc_youtube_iframe_api_js' );
    }

    if ( ! empty( $parallax ) ) {
        wp_enqueue_script( 'vc_jquery_skrollr_js' );
        $wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
        $css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
        if ( false !== strpos( $parallax, 'fade' ) ) {
            $css_classes[] = 'js-vc_parallax-o-fade';
            $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
        } elseif ( false !== strpos( $parallax, 'fixed' ) ) {
            $css_classes[] = 'js-vc_parallax-o-fixed';
        }
    }

    if ( ! empty( $parallax_image ) ) {
        if ( $has_video_bg ) {
            $parallax_image_src = $parallax_image;
        } else {
            $parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
            $parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
            if ( ! empty( $parallax_image_src[0] ) ) {
                $parallax_image_src = $parallax_image_src[0];
            }
        }
        $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
    }
    if ( ! $parallax && $has_video_bg ) {
        $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
    }
    $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
    $wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

    $output .= '<div class="clearfix"></div><div ' . implode( ' ', $wrapper_attributes ) . '>';
    $output .= wpb_js_remove_wpautop( $content );
    $output .= '</div><div class="clearfix"></div>';
    $output .= $after_output;

    echo $output;

 

}
