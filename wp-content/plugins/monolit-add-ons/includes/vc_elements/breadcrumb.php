<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Breadcrumb", 'monolit-add-ons'),
    "description" => esc_html__("Portfolio Breadcrumb",'monolit-add-ons'),
    "base"      => "monolit_breadcrumb",
    "class"     => "",
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Portfolio',
    
    "show_settings_on_create" => false,
    "params"    => array(
        
        // array(
        //     "type" => "textfield",
        //     "heading" => esc_html__("Extra class name", 'monolit'),
        //     "param_name" => "el_class",
        //     "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit')
        // ),
        // array(
        //     'type' => 'css_editor',
        //     'heading' => esc_html__( 'Css', 'monolit' ),
        //     'param_name' => 'css',
        //     'group' => esc_html__( 'Design options', 'monolit' ),
        // ),
    )
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Breadcrumb extends WPBakeryShortCode {}
}