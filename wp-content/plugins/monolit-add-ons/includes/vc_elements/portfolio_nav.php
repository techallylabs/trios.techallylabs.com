<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Portfolio Nav", 'monolit-add-ons'),
    "description" => esc_html__("Portfolio post nav",'monolit-add-ons'),
    "base"      => "portfolio_nav",
    "class"     => "",
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Portfolio',
    
    "show_settings_on_create" => true,
    "params"    => array(
        array(
            "type" => "dropdown",
            // "class"=>"",
            "heading" => esc_html__('In Same Terms', 'monolit-add-ons'),
            "description" => esc_html__("Whether previous/next posts must be within the same taxonomy term as the current post.", 'monolit-add-ons'),
            "param_name" => "same_term",

            "value" => array(   
                            esc_html__('No', 'monolit-add-ons') => 'no', 
                            esc_html__('Yes', 'monolit-add-ons') => 'yes',  
                                                                                                           
                        ),
            "std" => 'no', 

            
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Show All Project', 'monolit-add-ons'),
            "param_name" => "show_all",
            "value" => array(   
                            esc_html__('No', 'monolit-add-ons') => 'no', 
                            esc_html__('Yes', 'monolit-add-ons') => 'yes',  
                                                                                                           
                        ),
            "std" => 'no', 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("All Projects Link", 'monolit-add-ons'),
            "param_name" => "all_link",
            "value"=>'',
            "description" => esc_html__("Leave empty to use default portfolio archive link.", 'monolit-add-ons')
            
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", 'monolit-add-ons'),
            "param_name" => "el_class",
            "value"=>'',
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit-add-ons')
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'monolit-add-ons' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'monolit-add-ons' ),
        ),
    )
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Portfolio_Nav extends WPBakeryShortCode {}
}

