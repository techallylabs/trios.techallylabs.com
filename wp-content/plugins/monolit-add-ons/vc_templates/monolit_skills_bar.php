<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $title
 * @var $values
 * @var $content - shortcode content
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Skill_Bar
 */
$el_class = $title = $values = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$values = (array) vc_param_group_parse_atts( $values );
?>
<div class="custom-skillbar-holder <?php echo esc_attr($el_class ); ?>">
<?php if(!empty($title)): ?>
	<h3 class="bold-title"><?php echo esc_attr($title );?></h3>
<?php endif;?>
    <div class="skillbar-box animaper">
    <?php foreach ( $values as $data ) { ?>    
        <div class="custom-skillbar-title"><span><?php echo isset( $data['label'] ) ? $data['label'] : '';?></span></div>
        <div class="skill-bar-percent"><?php echo isset( $data['value'] ) ? $data['value'] : 0;?>%</div>
        <div class="skillbar-bg" data-percent="<?php echo isset( $data['value'] ) ? $data['value'] : 0;?>%">
            <div class="custom-skillbar"></div>
        </div>
    <?php } ?>  
    </div>
</div>