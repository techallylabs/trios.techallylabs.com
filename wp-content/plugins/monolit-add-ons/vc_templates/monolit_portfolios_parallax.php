<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $cat_ids
 * @var $cat_order_by
 * @var $cat_order
 * @var $order
 * @var $order_by
 * @var $ids
 * @var $first_side
 * @var $show_date
 * @var $show_cat
 * @var $show_excerpt
 * @var $show_view_project
 * @var $view_all_link
 * @var $parallax_value
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Portfolios_Parallax
 */
$el_class = $css = $cat_ids = $cat_order = $cat_order_by = $order = $order_by = $ids = $show_filter = $posts_per_page = $columns_grid = $spacing = $show_info = $first_side = $view_all_link = $show_date = $show_cat = $show_excerpt = $show_view_project = $parallax_value = $show_pagination = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
    'portfolios_parallax-element',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );


if(empty($parallax_value)){
    $parallax_value = 0;
}
?>
<?php 
    if(is_front_page()) {
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    } else {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    }
	if(!empty($ids)){
        $ids = explode(",", $ids);
        $portfolio_args = array(
            'post_type' => 'portfolio',
            'posts_per_page'=> $posts_per_page,
            'paged' => $paged,
            'post__in' => $ids,
            'orderby'=> $order_by,
            'order'=> $order,
        );
    }else{
        $portfolio_args = array(
            'post_type' => 'portfolio',
            'posts_per_page'=> $posts_per_page,
            'paged' => $paged,
            'orderby'=> $order_by,
            'order'=> $order,
        );
    }
    
    

    if(!empty($cat_ids)){
        $portfolio_args['tax_query'][] = array(
	        'taxonomy' => 'portfolio_cat',
	        'field' => 'term_id',
	        'terms' => $cat_ids,
	        'operator' => 'IN',
	    );
    }
     

?>

<?php $portfolios = new WP_Query($portfolio_args); 

if($portfolios->have_posts()) : 

?>
<div class="<?php echo esc_attr(  $css_class );?>">
    <?php $pin = 1; while($portfolios->have_posts()) : $portfolios->the_post(); ?>
        

        <?php 
        $col_cl = 'col-md-7';
        if($first_side ==='left'){
            $is_dir = 'left';
            $dir_cl = 'left-direction';
            if($pin%2 == 0){
                //right
                $is_dir = 'right';
                $dir_cl = 'right-direction';
            }
        }elseif($first_side ==='right'){
            $is_dir = 'right';
            $dir_cl = 'right-direction';
            if($pin%2 == 0){
                //left
                $is_dir = 'left';
                $dir_cl = 'left-direction';
            }
        }else{
            $is_dir = 'center';
            $dir_cl = 'center-direction';
            $col_cl = 'col-md-6 col-md-offset-3';
        }
        ?>
        <!-- <?php echo esc_attr($pin);?> --> 
        <div <?php post_class( 'row' );?>>
            <?php if($is_dir === 'right'):?>
            <div class="col-md-5"></div>
            <?php endif;?>
            <div class="<?php echo esc_attr($col_cl );?>">
                <div class="parallax-item <?php echo esc_attr($dir_cl );?>">
                    <div class="paralax-media">
                    <?php if($show_date == 'yes'||$show_cat == 'yes'):?>
                        <ul class="creat-list">
                        <?php if($show_date == 'yes'):?>
                            <li><a href="#"><?php the_time( get_option('date_format') );?></a></li>
                        <?php endif;?>
                        <?php 
                        if($show_cat == 'yes'):
                        $terms = get_the_terms(get_the_ID(), 'portfolio_cat');
                        if ( $terms && ! is_wp_error( $terms ) ){
                            foreach( $terms as $key => $term){
                                
                                echo sprintf( '<li><a href="%1$s">%2$s</a></li>',
                                    esc_url( get_term_link( $term->slug, 'portfolio_cat' ) ),
                                    esc_html( $term->name )
                                );
                            }
                        }
                        ?>
                        <?php endif;?>
                        </ul>
                    <?php endif;?> 
                        <div class="paralax-wrap">
                            <?php the_post_thumbnail( 'monolitfolio-parallax', array('class'=>'respimg') );?>
                        </div>
                    </div>
                    <div class="parallax-deck" data-top-bottom="transform: translateY(<?php echo 0-$parallax_value;?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr($parallax_value ); ?>px);">
                        <div class="parallax-deck-item">
                            <?php the_title( '<h3 class="folio-title">', '</h3>');?>
                            <?php if($show_excerpt == 'yes'){
                                the_excerpt();
                            }?>
                        <?php if($show_view_project == 'yes'):?>
                            <a href="<?php the_permalink();?>" class="btn anim-button fl-l"><?php echo wp_kses(__('<span>View Project</span><i class="fa fa-long-arrow-right"></i>','monolit-add-ons'), array('span'=>array('class'=>array()),'i'=>array('class'=>array())) );?></a>
                        <?php endif;?>                                                                                           
                        </div>
                    </div>
                </div>
            </div>
            <?php if($is_dir === 'left'):?>
            <div class="col-md-5"></div>
            <?php endif;?>
        </div>
        <!-- <?php echo esc_attr($pin);?> end-->

    <?php $pin++; endwhile;?>
    <?php if($show_pagination == 'yes') monolit_custom_pagination($portfolios->max_num_pages,$range = 2,$portfolios,false);?>
    <?php if(!empty($view_all_link)):?>
        <!-- custom-link-holder  --> 
        <div class="custom-link-holder">
            <a href="<?php echo esc_url($view_all_link );?>" class="btn anim-button"  data-top-bottom="transform: translateY(-50px);" data-bottom-top="transform: translateY(50px);"><?php echo wp_kses(__('<span>View All Projects</span><i class="fa fa-long-arrow-right"></i>','monolit-add-ons'), array('span'=>array('class'=>array()),'i'=>array('class'=>array())) );?></a>   
        </div>
        <!-- custom-link-holder  end -->
    <?php endif;?>                                      
    </div>
<?php endif; ?>


<?php wp_reset_postdata();?>
