<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Google Map", 'monolit-add-ons'),
    "description" => esc_html__("Monolit google map style",'monolit-add-ons'),
    "base"      => "monolit_gmap",
    "class"     => "",
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Theme',
   
    "show_settings_on_create" => true,
    "params"    => array(
        array(
            "type" => "textfield",
            "class"=>"",
            "holder"=>'div',
            "heading" => esc_html__('Address Latitude', 'monolit-add-ons'),
            "param_name" => "map_lat",
            "value" => "40.7143528",
            "description" => wp_kses(__("Enter your address latitude. You can get your value from: <a href='http://www.gps-coordinates.net/' target='_blank'>http://www.gps-coordinates.net/</a>", 'monolit-add-ons'),array('a'=>array('href'=>array(),'target'=>array()))),
        ),
        array(
            "type" => "textfield",
            "class"=>"",
            "holder"=>'div',
            "heading" => esc_html__('Address Longtitude', 'monolit-add-ons'),
            "param_name" => "map_long",
            "value" => "-74.0059731",
            "description" => wp_kses(__("Enter your address longtitude. You can get your value from: <a href='http://www.gps-coordinates.net/' target='_blank'>http://www.gps-coordinates.net/</a>", 'monolit-add-ons'),array('a'=>array('href'=>array(),'target'=>array()))), 
            
        ),
        array(
            "type" => "textfield",
            "class"=>"",
            "holder"=>'div',
            "heading" => esc_html__('Address String', 'monolit-add-ons'),
            "param_name" => "map_address",
            "value" => "Our office  - New York City",
            "description" => esc_html__("Address String", 'monolit-add-ons'), 
        ),
        array(
            "type" => "textfield",
            "class"=>"",
            "holder"=>'div',
            "heading" => esc_html__('Map Zoom', 'monolit-add-ons'),
            "param_name" => "map_zoom",
            "value" => "14",
            "description" => esc_html__("Map Zoom", 'monolit-add-ons'), 
            
        ),
        array(
            "type"      => "attach_image",
            "class"     => "ajax-vc-img",
            'hoder'     => 'div',
            "heading"   => esc_html__("Map Marker", 'monolit-add-ons'),
            "param_name"=> "map_marker",
            "value"     => "",
            "description" => esc_html__("Upload google map marker or leave it empty to use default.", 'monolit-add-ons'),
        ),
        array(
            "type" => "textfield",
            "class"=>"",
            // "holder"=>'div',
            "heading" => esc_html__('Map Height', 'monolit-add-ons'),
            "param_name" => "map_height",
            "value" => "400",
            "description" => esc_html__("Enter your map height in pixel. Default: 400", 'monolit-add-ons'), 
            
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Use Default Style', 'monolit-add-ons'),
            "param_name" => "default_style",
            "value" => array(   
                            esc_html__('No', 'monolit-add-ons') => 'false',  
                            esc_html__('Yes', 'monolit-add-ons') => 'true',                                                                                
                        ),
            "description" => esc_html__("Set this to Yes to use default Google map style.", 'monolit-add-ons'), 
        ),
        array(
            "type"      => "textfield",
            // "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Google Map down every time we scroll down 100% of the viewport height and move Google Map up every time we scroll up 100% of the viewport height. Ex: 150 or -150 for reverse direction.", 'monolit-add-ons'),
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", 'monolit-add-ons'),
            "param_name" => "el_class",
            "value"=>'',
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit-add-ons')
        ),
    ),
    'admin_enqueue_js' => BBT_DIR_URL . "/assets/js/vc_js_elements.js",
    'js_view'=> 'MonolitImagesView',
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Gmap extends WPBakeryShortCode {}
}

