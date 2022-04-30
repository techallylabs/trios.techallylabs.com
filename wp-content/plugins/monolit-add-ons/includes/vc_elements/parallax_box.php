<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Parallax Box", 'monolit-add-ons'),
   "description" => esc_html__("Content box with parallax effect.",'monolit-add-ons'),
   "base"      => "monolit_parallax_box",
   "class"     => "",
   "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
   "category"  => 'Monolit Theme',
   "show_settings_on_create" => true,
   "params"    => array(
        array(
            "type"      => "textarea_html",
            "holder"    => "div",
            "heading"   => esc_html__("Box Content", 'monolit-add-ons'),
            "param_name"=> "content",
            "description" => esc_html__("Box Content", 'monolit-add-ons')
        ), 
        array(
            "type"      => "textfield",
            // "holder"    => "div",
            // "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Box down every time we scroll down 100% of the viewport height and move Box up every time we scroll up 100% of the viewport height. Ex: 150 or -150 for reverse direction.", 'monolit-add-ons'),
            "value" => "150"
        ),
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Box Position', 'monolit-add-ons'), 
            "param_name" => "box_pos", 
            "value" => array(
                esc_html__('Move Left 20%', 'monolit-add-ons') => 'left', 
                esc_html__('Move Right 20%', 'monolit-add-ons') => 'right', 
                esc_html__('Center', 'monolit-add-ons') => 'center', 
            ), 
            // "description" => esc_html__("Show Info", 'monolit'), 
            "default" => 'left',
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", 'monolit-add-ons'),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit-add-ons')
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'monolit-add-ons' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'monolit-add-ons' ),
        ),

    )));


if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Parallax_Box extends WPBakeryShortCode {}
}