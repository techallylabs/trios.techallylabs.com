<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $css
 * @var $el_class
 * @var $cat_ids
 * @var $order
 * @var $order_by
 * @var $ids
 * @var $show_pagination
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Blog_Grid
 */
$el_class = $cat_ids = $order = $order_by = $ids = $posts_per_page = $show_pagination = $css = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

?>
<div class="blog-grid-wrap <?php echo esc_attr($css_class );?>">

<?php 
    if(is_front_page()) {
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    } else {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    }

	if(!empty($ids)){
        $ids = explode(",", $ids);
        $post_args = array(
            'post_type' => 'post',
            'paged' => $paged,
            'posts_per_page'=> $posts_per_page,
            'post__in' => $ids,
            'orderby'=> $order_by,
            'order'=> $order,
        );
    }else{
        $post_args = array(
            'post_type' => 'post',
            'paged' => $paged,
            'posts_per_page'=> $posts_per_page,
            'orderby'=> $order_by,
            'order'=> $order,
        );
    }
    
    

    if(!empty($cat_ids))
        $post_args['cat'] = $cat_ids;
     

    $posts = new WP_Query($post_args); ?>


    <?php if($posts->have_posts()) : $pin = 1; ?>

            <?php while($posts->have_posts()) : $posts->the_post(); ?>
        
                <?php 
                    
                        get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) );
                    
                ?>

            <?php $pin++; endwhile; ?>

            <?php if($show_pagination == 'yes') monolit_custom_pagination($posts->max_num_pages,$range = 2,'',false);?>

    <?php else: ?>

        <?php get_template_part('content','none' ); ?>

    <?php endif; ?> 


<?php wp_reset_postdata();?>
    
</div>