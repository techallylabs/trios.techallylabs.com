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
    'members-parallax clearfix',
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
        $post_args = array(
            'post_type' => 'monolit_member',
            'posts_per_page'=> $posts_per_page,
            'paged' => $paged,
            'post__in' => $ids,
            'orderby'=> $order_by,
            'order'=> $order,
        );
    }else{
        $post_args = array(
            'post_type' => 'monolit_member',
            'posts_per_page'=> $posts_per_page,
            'paged' => $paged,
            'orderby'=> $order_by,
            'order'=> $order,
        );
    }
    
     

?>

<?php $posts_query = new WP_Query($post_args); 

if($posts_query->have_posts()) : 

?>
<div class="<?php echo esc_attr(  $css_class );?>">
    <?php $pin = 1; while($posts_query->have_posts()) : $posts_query->the_post(); ?>

        <?php
        // if( function_exists('monolit_get_template_part') ){
        //   monolit_get_template_part(  'member', 'list'  , array('pin'=>$pin) );
        // }
        ?>
        

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
                    <?php if($show_date == 'yes'):?>
                        <ul class="creat-list">

                            <li><a href="#"><?php the_time( get_option('date_format') );?></a></li>
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
                            <a href="<?php the_permalink();?>" class="btn anim-button fl-l"><?php echo wp_kses(__('<span>View More</span><i class="fa fa-long-arrow-right"></i>','monolit-add-ons'), array('span'=>array('class'=>array()),'i'=>array('class'=>array())) );?></a>
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
    <?php if($show_pagination == 'yes') monolit_custom_pagination($posts_query->max_num_pages,$range = 2,$posts_query,false);?>
</div>
<?php endif; ?>


<?php wp_reset_postdata();?>
