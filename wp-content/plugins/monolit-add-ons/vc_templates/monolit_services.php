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
 * @var $content_width
 * @var $thumbnail_cols
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Services
 */
$extra_class = $count = $order_by = $order = $ids = $css = $parallax_value = $content_width = $thumbnail_cols = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );


if(!empty($ids)){
	$ids = explode(",", $ids);
	$args = array(
	    'post_type'		 => 'monolit_service',
	    'post__in' => $ids,
	    'orderby'=> $order_by,
	    'order'=> $order,
	);
}else{
	$args = array(
	    'post_type'		 => 'monolit_service',
	    'posts_per_page' => $count,
	    'orderby'=> $order_by,
	    'order'=> $order,
	);
}
//echo'<pre>';var_dump($args);
$services = new WP_Query($args);


?>
<?php if($services->have_posts()) {    $ser_index = array();   ?>

<div class="services-main-holder  <?php echo esc_attr($el_class ); ?>  <?php echo esc_attr($css_class ); ?>" 
    <?php if($parallax_value!=''):?>
     data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value );?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_value;?>px);"
    <?php endif;?>
    >
    <div class="services-holder service-<?php echo esc_attr($thumbnail_cols );?>">
        <?php   
        $ser_id = 1;     
        while($services->have_posts()) : $services->the_post();
        $ser_index[$ser_id] = uniqid('serid');
        ?>
        <a class="serv-item" href="#<?php echo esc_attr($ser_index[$ser_id] );?>">
            <div class="serv-item-inner">
                <?php 
                if(has_post_thumbnail( )){
                    the_post_thumbnail( 'monolit-service', array('class'=>'respimg services-thumb') );
                } 
                ?>
                <?php //if($left_columns != 'hide'):?>
                    <div class="ser-title">
                    <?php the_title('<h3>','</h3>' );?>
                    </div>
                <?php //endif;?>
            </div>
        </a>

        <?php 
        $ser_id++;
        endwhile; ?>  
        
    </div>
    <div class="row">
        <div class="<?php echo esc_attr($content_width );?>">
            <!-- serv-post  -->     
            <div class="serv-post">
            <?php  
            $ser_id = 1;      
            while($services->have_posts()) : $services->the_post();  
            ?>
            <div id="<?php echo esc_attr($ser_index[$ser_id] );?>" class="serv-details">
                <?php the_content( );?>
            </div>
            
            <?php 
            $ser_id++;
            endwhile; ?>  
                
            </div>
            <!-- serv-post end-->
        </div>
        
    </div>

</div><!-- /services-main-holder -->


   

<?php
}

/* Restore original Post Data */
wp_reset_postdata();

?>