<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $number
 * @var $icon_class
 * @var $parallax_value
 * @var $content - shortcode content
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_Cth_Counter
 */
$el_class = $number = $icon_class = $parallax_value = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="inline-facts <?php echo esc_attr($el_class ); ?>"
<?php if($parallax_value!='') :?>
 data-top-bottom="transform: translateY(<?php echo esc_attr($parallax_value );?>px);" data-bottom-top="transform: translateY(<?php echo 0-$parallax_value;?>px);"
<?php endif;?>
>
    <?php if(!empty($icon_class)) :?>
    <i class="<?php echo esc_attr($icon_class );?>"></i>
	<?php endif;?>
    <div class="milestone-counter">
        <div class="stats animaper">
            <div class="num" data-content="<?php echo esc_attr($number );?>" data-num="<?php echo esc_attr($number );?>">0</div>
        </div>
    </div>
    <?php echo wpb_js_remove_wpautop($content);?>
</div>