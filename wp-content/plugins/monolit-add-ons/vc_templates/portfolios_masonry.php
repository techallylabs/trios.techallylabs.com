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
$el_class = $css =   '';
$cat_ids = $cat_order = $cat_order_by = $show_filter = $ids = $ids_not = $order_by = $order = $posts_per_page = $show_pagination = '';
$columns_grid = $spacing = $show_info = $first_side = $view_all_link = $show_date = $show_cat = $show_excerpt = $show_view_project = $parallax_value = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
    'portfolios_masonry-element clearfix',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );

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
            'post_type' => 'portfolio',
            'paged' => $paged,
            'posts_per_page'=> $posts_per_page,
            'post__in' => $ids,
            'orderby'=> $order_by,
            'order'=> $order,
        );
    }elseif(!empty($ids_not)){
        $ids_not = explode(",", $ids_not);
        $post_args = array(
            'post_type' => 'portfolio',
            'paged' => $paged,
            'posts_per_page'=> $posts_per_page,
            'post__not_in' => $ids_not,
            'orderby'=> $order_by,
            'order'=> $order,
        );
    }else{
        $post_args = array(
            'post_type' => 'portfolio',
            'paged' => $paged,
            'posts_per_page'=> $posts_per_page,
            'orderby'=> $order_by,
            'order'=> $order,
        );
    }
    
    

    if(!empty($cat_ids)){
        $term_args = array(
            'orderby'           => $cat_order_by, 
            'order'             => $cat_order,
            'exclude'           => $cat_ids,
            'parent'            => 0,
            
        ); 
        $post_args['tax_query'][] = array(
            'taxonomy' => 'portfolio_cat',
            'field' => 'term_id',
            'terms' => explode(",", $cat_ids),
            'operator' => 'NOT IN',
        );
    }else{
        $term_args = array(
            'orderby'           => $cat_order_by, 
            'order'             => $cat_order,
            'parent' => 0,
            
        ); 
    }
?>
<?php $folio_posts = new WP_Query($post_args); 


if($folio_posts->have_posts()) : 

?>
<div class="<?php echo esc_attr($css_class );?>">
    <?php
    if($show_filter == 'yes') : 
        $term_args['taxonomy'] = 'portfolio_cat';

        $portfolio_cats = get_terms($term_args); 


    ?>
    <?php if(count($portfolio_cats)): ?>
        <!-- filter -->
        <div class="filter-holder inline-filter">
            <div class="gallery-filters">
                <a href="#" class="gallery-filter transition2 gallery-filter_active" data-filter="*"><?php esc_html_e('All','monolit-add-ons' );?></a>
                <?php foreach($portfolio_cats as $portfolio_cat) { ?>
                <a href="#" class="gallery-filter transition2" data-filter=".portfolio_cat-<?php echo $portfolio_cat->slug; ?>"><?php echo esc_html($portfolio_cat->name ); ?></a>
                <?php } ?>
            </div>
            <?php if( monolit_global_var('folio_show_counter') ) :?>
            <div class="count-folio">
                <div class="num-album"></div>
                <div class="all-album"></div>
            </div>
            <?php endif;?>
        </div>
        <!-- filter end-->
    <?php endif; 
    endif; //end showfillter
    ?>

<?php
$grid_cls = 'gallery-items folio-gallery';
$grid_cls .= ' '.$columns_grid.'-columns';
if( $show_info == 'show'){
    $grid_cls .= ' vis-port-info';
}elseif( $show_info == 'hide'){
    $grid_cls .= ' hidden-port-info';
}else{
    $grid_cls .= ' hov-port-info';
}
$grid_cls .= ' grid-'.$spacing.'-pad mob-pa';
if( monolit_global_var('folio_disable_overlay') )
$grid_cls .= ' disopa';
?>

    <div class="<?php echo esc_attr($grid_cls );?>">

        <div class="grid-sizer"></div>
        <div class="grid-sizer-second"></div>
        <div class="grid-sizer-three"></div>

        <?php while($folio_posts->have_posts()) : $folio_posts->the_post(); ?>
            
            <?php get_template_part( 'portfolio', 'vertical-list' ); ?>

        <?php endwhile;?>
        
    </div>
    <!-- end gallery items -->
    <?php if($show_pagination == 'yes') monolit_custom_pagination($folio_posts->max_num_pages,$range = 2,$folio_posts,false);?>
</div>

<?php endif; ?>


<?php wp_reset_postdata();?>
