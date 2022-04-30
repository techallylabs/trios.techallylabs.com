<?php 
/* add_ons_php */

vc_map( array(
   "name"      => esc_html__("Skills Bar", 'monolit-add-ons'),
   "description" => esc_html__("Animated skills bar",'monolit-add-ons'),
   "base"      => "monolit_skills_bar",
   "class"     => "",
   "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
   "category"  => 'Monolit Theme',
   "show_settings_on_create" => true,
   "params"    => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Widget Title', 'monolit-add-ons' ),
            'holder' => 'div',
            'param_name' => 'title',
            // 'description' => esc_html__( 'Enter text used as title of bar.', 'monolit' ),
            'value' => 'Skills',
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Values', 'monolit-add-ons' ),
            'param_name' => 'values',
            // 'holder' => 'span',
            'description' => esc_html__( 'Enter values for graph - value, title and color.', 'monolit-add-ons' ),
            'value' => urlencode( json_encode( array(
                array(
                    'label' => esc_html__( 'Photoshop', 'monolit-add-ons' ),
                    'value' => '95',
                ),
                array(
                    'label' => esc_html__( 'Illustrator', 'monolit-add-ons' ),
                    'value' => '65',
                ),
                array(
                    'label' => esc_html__( '3D MAX', 'monolit-add-ons' ),
                    'value' => '75',
                ),
                
            ) ) ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Label', 'monolit-add-ons' ),
                    'param_name' => 'label',
                    'description' => esc_html__( 'Enter text used as title of bar.', 'monolit-add-ons' ),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Value', 'monolit-add-ons' ),
                    'param_name' => 'value',
                    'description' => esc_html__( 'Enter value of bar.', 'monolit-add-ons' ),
                    'admin_label' => true,
                ),
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", 'monolit-add-ons'),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit-add-ons')
        ),
    )));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Skills_Bar extends WPBakeryShortCode {}
}
