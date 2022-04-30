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
 * @var $parallax_value
 * @var $left_columns
 * @var $right_columns
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Timelines
 */
$extra_class = $count = $order_by = $order = $ids = $css = $parallax_value = $left_columns = $right_columns = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );


if(!empty($ids)){
	$ids = explode(",", $ids);
	$args = array(
	    'post_type'		 => 'monolit_timeline',
	    'post__in' => $ids,
	    'orderby'=> $order_by,
	    'order'=> $order,
	);
}else{
	$args = array(
	    'post_type'		 => 'monolit_timeline',
	    'posts_per_page' => $count,
	    'orderby'=> $order_by,
	    'order'=> $order,
	);
}
//echo'<pre>';var_dump($args);
$timelines = new WP_Query($args);


?>
<?php if($timelines->have_posts()) {       ?>
    <div class="custom-inner-holder  <?php echo esc_attr($el_class ); ?>  <?php echo esc_attr($css_class ); ?>" 
    <?php if($parallax_value!=''):?>
     data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value );?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_value;?>px);"
    <?php endif;?>
    >
    <?php        
    while($timelines->have_posts()) : $timelines->the_post();  
    ?>
    <div class="custom-inner timeline-custom-inner">
        <div class="row">
        <?php if($left_columns != 'hide'):?>
            <div class="<?php echo esc_attr($left_columns );?>">
            <?php the_title('<h3>','</h3>' );?>
            </div>
        <?php endif;?>
        <?php if($right_columns != 'hide'):?>
            <div class="<?php echo esc_attr($right_columns );?>">
            <?php 
            if(has_post_thumbnail( )){
                the_post_thumbnail( 'full', array('class'=>'respimg timeline-thumbnail') );
            } 
            ?>
                <?php the_content( );?>
            
            </div>
        <?php endif;?>
        </div>
    </div>

    <?php 
    endwhile; ?>  
        
    </div>

<?php
}

/* Restore original Post Data */
wp_reset_postdata();

?>