<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Portfolio Comment", 'monolit-add-ons'),
    "description" => esc_html__("Portfolio comment list",'monolit-add-ons'),
    "base"      => "portfolio_comment",
    "class"     => "",
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Portfolio',
    
    "show_settings_on_create" => false,
    "params"    => array(
        
        
    )
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Portfolio_Comment extends WPBakeryShortCode {}
}