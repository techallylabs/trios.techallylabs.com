<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Landing Page Section", 'monolit-add-ons'),
   "description" => esc_html__("For Home Landing template only",'monolit-add-ons'),
   "base"      => "monolit_home_landing",
   "class"     => "",
   "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
   "category"  => 'Monolit Theme',
   "show_settings_on_create" => true,
   "params"    => array( 
        array(
            "type"      => "attach_image",
            "holder"    => "div",
            "class"     => "ajax-vc-img",
            "heading"   => esc_html__("Logo", 'monolit-add-ons'),
            "param_name"=> "ld_logo",
            
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Title", 'monolit-add-ons'),
            "param_name" => "ld_title",
            // "description" => esc_html__("Number of Blog posts to show (-1 for all).", 'monolit'),
            "value"=> 'Responsive  Architecture',
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Subtitle", 'monolit-add-ons'),
            "param_name" => "ld_subtitle",
            // "description" => esc_html__("Number of Blog posts to show (-1 for all).", 'monolit'),
            "value"=> 'Theme',
        ),
        array(
            "type" => "textarea_html", 
            "holder" => "div",
            "heading" => esc_html__("Landing Content", 'monolit-add-ons'), 
            "param_name" => "content", 
            // "description" => esc_html__("You show ", 'monolit')
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Show Right Iframe', 'monolit-add-ons'), 
            "param_name" => "show_iframe", 
            "value" => array(
                esc_html__('Yes', 'monolit-add-ons') => 'yes', 
                esc_html__('No', 'monolit-add-ons') => 'no', 
            ), 
            // "description" => esc_html__("Show Info", 'monolit'), 
            "std" => 'yes',
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Show Constellation', 'monolit-add-ons'), 
            "param_name" => "show_constel", 
            "value" => array(
                esc_html__('Yes', 'monolit-add-ons') => 'yes', 
                esc_html__('No', 'monolit-add-ons') => 'no', 
            ), 
            // "description" => esc_html__("Show Info", 'monolit'), 
            "std" => 'yes',
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

    ),
   'admin_enqueue_js' => BBT_DIR_URL . "/assets/js/vc_js_elements.js",
    'js_view'=> 'MonolitImagesView',
));


if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Home_Landing extends WPBakeryShortCode {}
}
