<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $css
 * @var $el_class
 * @var $pie_color
 * @var $pie_size
 * @var $linewidth
 * @var $values
 * @var $content - shortcode content
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Piechart
 */
$css = $el_class = $pie_color = $pie_size = $linewidth = $values = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$values = (array) vc_param_group_parse_atts( $values );
?>
<!-- piecharts  -->
<div class="piechart-holder animaper <?php echo esc_attr($el_class ); ?>" data-skcolor="<?php echo esc_attr($pie_color ); ?>" data-pies="<?php echo esc_attr($pie_size ); ?>" data-pielw="<?php echo esc_attr($linewidth ); ?>">
    <div class="row">
    <?php foreach ( $values as $data ) { ?>   
        <div class="piechart <?php echo isset( $data['pie_width'] ) ? esc_attr($data['pie_width'] ) : 'col-md-4';?>" 
		<?php if(isset($data['parallax_value']) && $data['parallax_value'] != '') :?>
			data-top-bottom="transform: translateY(<?php echo esc_attr($data['parallax_value']);?>px);" data-bottom-top="transform: translateY(<?php echo 0-$data['parallax_value'];?>px);"
		<?php endif;?>
        >
            <span class="chart" data-percent="<?php echo isset( $data['value'] ) ? esc_attr($data['value'] ) : '0';?>">
            <span class="percent"></span><span class="pie_unit"><span><?php echo isset( $data['pie_unit'] ) ? esc_attr($data['pie_unit'] ) : '%';?></span></span>
            </span>
            <div class="clearfix"></div>
        <?php if(isset($data['description']) && !empty($data['description'])) :?>
            <div class="skills-description">
                <?php echo wp_kses_post( $data['description'] ) ;?>
            </div>
        <?php endif;?>
        </div><!-- //piechart  -->		
    <?php } ?>
        														
    </div>
</div>
<!-- piecharts  end-->