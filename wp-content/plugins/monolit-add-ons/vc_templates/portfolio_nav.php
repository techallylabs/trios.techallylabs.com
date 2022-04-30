<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $css
 * @var $el_class
 * @var $show_all
 * @var $all_link
 * @var $same_term //Indicates whether previous post must be within the same taxonomy term as the current post.
 * @var $content
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Service
 */
$css = $el_class = $show_all = $all_link = $same_term = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_classes = array(
    'portfolio_nav_wrap content-nav member-content-nav',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );



$in_same_term = false;
if($same_term == 'yes'){
    $in_same_term = true;
}
?>
<div class="<?php echo esc_attr($css_class );?>">
    <ul>
    <?php
    $prev_post = get_adjacent_post( $in_same_term, '', true, 'portfolio_cat' );
    if ( is_a( $prev_post, 'WP_Post' ) ) :
    ?>
        <li class="previous"><a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="lef-ar-nav" title="<?php echo get_the_title($prev_post->ID ); ?>"><?php echo esc_html_x('Previous Project','Project previous link','monolit-add-ons') ;?></a></li>
    <?php endif ?>
    <?php
    $next_post = get_adjacent_post( $in_same_term, '', false, 'portfolio_cat' );
    if ( is_a( $next_post, 'WP_Post' ) ) :
    ?>
        <li class="next"><a href="<?php echo get_permalink( $next_post->ID ); ?>" class="rig-ar-nav" title="<?php echo get_the_title($next_post->ID ); ?>"><?php echo esc_html_x('Next Project','Project next link','monolit-add-ons');?></a></li>
    <?php endif ?>
    </ul>
<?php if($show_all  == 'yes') :?>
	<div class="p-all">
	<?php if(!empty($all_link)) :?>
		<a href="<?php echo esc_url($all_link ); ?>" ><i class="fa fa-th"></i></a>
	<?php else :?>
        <a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>" ><i class="fa fa-th"></i></a>
    <?php endif;?>
    </div>
<?php endif;?>
</div>