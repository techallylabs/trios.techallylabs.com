<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $css
 * @var $el_class
 * @var $partnerimgs
 * @var $target
 * @var $columns
 * @var $parallax_value
 * @var $content - shortcode content
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Our_Partners
 */
$el_class = $partnerimgs = $parallax_value = $columns = $target = $css =  '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if(!empty($partnerimgs)){
	$partners = $partnerlinks = array();
    $partners = explode(",", $partnerimgs);
    if(!empty($content)){
        $partnerlinks = preg_split( '/\r\n|\r|\n/', strip_tags($content) );//explode("\n", $content);
    }

	?>

<div class="clients-list clients-<?php echo esc_attr($columns ); ?>-columns <?php echo esc_attr($el_class ); ?> <?php echo esc_attr($css_class ); ?>" 
<?php if($parallax_value!='') :?>
 data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value );?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_value;?>px);"
<?php endif;?>>
	<?php foreach ($partners as $key => $img) { ?>

	<?php if(isset($partnerlinks[$key])) :?>
	        <a href="<?php echo esc_url($partnerlinks[$key] );?>" target="<?php echo esc_attr($target );?>">
	    <?php else : ?>
	    	<a href="javascript:void(0)">
	    <?php endif;?>
	            <?php echo wp_get_attachment_image( $img, 'full', false, array('class'=>'respimg') );?>
	    
	        </a>

	<?php } ?>
</div>

<?php } ?>