<?php 
/* add_ons_php */


vc_map( array(
    "name" => esc_html__("Owl Carousel Slider", 'monolit-add-ons'),
    "description" => esc_html__("with multi images selected",'monolit-add-ons'),
    "base" => "monolit_carousel_slider_multiimgs",
    "category"  => 'Monolit Theme',
    // "as_parent" => array('only' => 'monolit_carousel_slider_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
    // "class"=>'cth_home_slider',
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "params" => array(
        array(
            "type"      => "attach_images",
            "holder"    => "div",
            "class"     => "ajax-vc-img",
            "heading"   => esc_html__("Slide Images", 'monolit-add-ons'),
            "param_name"=> "slideimages",
            "description" => esc_html__("Slide Images", 'monolit-add-ons')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Items", 'monolit-add-ons'),
            "param_name" => "items",
            "description" => esc_html__("The number of items you want to see on the screen. Ex: 3", 'monolit-add-ons'),
            "value" => "1"
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Center", 'monolit-add-ons'),
            "param_name" => "center",
            "description" => esc_html__("Center item. Works well with even an odd number of items.", 'monolit-add-ons'),
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "std"=>'no', 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("smartSpeed", 'monolit-add-ons'),
            "param_name" => "smartspeed",
            "value"=>'1300',
            "description" => esc_html__("Speed Calculate, milisecond number. Ex: 250", 'monolit-add-ons')
        ), 
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Loop", 'monolit-add-ons'),
            "param_name" => "loop",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "std"=>'no', 
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Auto Height", 'monolit-add-ons'),
            "param_name" => "autoheight",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array(   
                esc_html__('Yes', 'monolit-add-ons') => 'yes', 
                esc_html__('No', 'monolit-add-ons') => 'no',  
                  
            ),
            "std"=>'yes', 
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Auto Width", 'monolit-add-ons'),
            "param_name" => "autowidth",
            "description" => esc_html__("Set non grid content. Try using width style on divs.", 'monolit-add-ons'),
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "std"=>'no', 
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Auto Play", 'monolit-add-ons'),
            "param_name" => "autoplay",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "std"=>'no', 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("autoplayTimeout", 'monolit-add-ons'),
            "param_name" => "autoplaytimeout",
            "value"=>'4000',
            "description" => esc_html__("Time after display next slide (in milisecond)", 'monolit-add-ons')
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("autoplaySpeed", 'monolit-add-ons'),
            "param_name" => "autoplayspeed",
            "value"=>'3600',
            "description" => esc_html__("Duration of transition between slides (in ms) or boolen", 'monolit-add-ons')
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("responsive", 'monolit-add-ons'),
            "param_name" => "responsive",
            "description" => esc_html__("The format is: screen-size:number-items-display,larger-screen-size:number-items-display. Ex: 320:1,768:1,992:3,1200:3", 'monolit-add-ons'),
            "value" => ""
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Show Pagination", 'monolit-add-ons'),
            "param_name" => "dots",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array( 
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                  
            ),
            "std"=>'yes', 
        ),
        array(
            "type"      => "textfield",
            // "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Slider down every time we scroll down 100% of the viewport height and move Slider up every time we scroll up 100% of the viewport height. Ex: 150 or -150 for reverse direction.", 'monolit-add-ons'),
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
            "std" => 'left',
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Image Size', 'monolit-add-ons'), 
            "param_name" => "img_size", 
            "value" => array(
                esc_html__('Small - Tall', 'monolit-add-ons') => 'monolit-carousel', 
                esc_html__('Portfolio Slider', 'monolit-add-ons') => 'monolitfolio-carousel', 
                esc_html__('Horizontal Slider', 'monolit-add-ons') => 'monolithoz-thumb', 
                esc_html__('Full Size', 'monolit-add-ons') => 'full', 
            ), 
            // "description" => esc_html__("Show Info", 'monolit'), 
            "std" => 'monolit-carousel',
        ), 
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Show Zoom", 'monolit-add-ons'),
            "param_name" => "show_zoom",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array( 
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                  
            ),
            "std"=>'no', 
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
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Carousel_Slider_Multiimgs extends WPBakeryShortCode {}
}
