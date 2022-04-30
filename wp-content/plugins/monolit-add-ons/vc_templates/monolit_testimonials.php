<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $css
 * @var $extra_class
 * @var $count
 * @var $order_by
 * @var $order
 * @var $ids
 * @var $show_avatar
 * @var $show_navigation
 * @var $autoplay
 * Shortcode class
 * @var $this WPBakeryShortCode_Cth_Testimonials
 */
$extra_class = $count = $order_by = $order = $ids = $show_avatar = $items = $autoplay = $autoplayspeed = $autoplaytimeout = $css = $responsive = $autoheight = $loop = $dots = $smartspeed = $center = $autowidth = $parallax_value = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );


if(!empty($ids)){
	$ids = explode(",", $ids);
	$args = array(
	    'post_type'		 => 'cth_testimonial',
	    'post__in' => $ids,
	    'orderby'=> $order_by,
	    'order'=> $order,
	);
}else{
	$args = array(
	    'post_type'		 => 'cth_testimonial',
	    'posts_per_page' => $count,
	    'orderby'=> $order_by,
	    'order'=> $order,
	);
}
//echo'<pre>';var_dump($args);
$testimonials = new WP_Query($args);

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

?>
<?php if($testimonials->have_posts()) {       ?>
<!-- Testimonials -->
    <div class="testimon-slider-holder <?php echo esc_attr($el_class ); ?>  <?php echo esc_attr($css_class ); ?>" 
    <?php if($parallax_value!=''):?>
     data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value );?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_value;?>px);"
    <?php endif;?>
    >
        <div class="testimon-slider owl-carousel owl-theme refrestonresizeowl" data-options='<?php echo json_encode($dataArr);?>'>
            <?php        
            while($testimonials->have_posts()) : $testimonials->the_post();  
            ?>
            <div class="item">
                <?php if($show_avatar == 'yes') :?>
                <div class="test-image">
                    <?php the_post_thumbnail('test-thumb',array('class'=>'respimg') ); ?>
                </div>
                <?php endif;?>
                <h3><?php the_title( );?></h3>
                <?php the_content( ); ?>
            </div>

            <?php 
            endwhile; ?>                                              
        </div>
        <div class="customNavigation">
            <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- Testimonials end-->

<?php
}

/* Restore original Post Data */
wp_reset_postdata();

?>