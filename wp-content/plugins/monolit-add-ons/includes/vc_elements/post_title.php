<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Post Title", 'monolit-add-ons'),
    "description" => esc_html__("Portfolio title",'monolit-add-ons'),
    "base"      => "monolit_post_title",
    "class"     => "",
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Portfolio',
    
    "show_settings_on_create" => false,
    "params"    => array(
        
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", 'monolit-add-ons'),
            "param_name" => "el_class",
            "description" => esc_html__("Use 'section-title' for other style.", 'monolit-add-ons')
        ),
        
    )
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Post_Title extends WPBakeryShortCode {}
}