<?php 
/* add_ons_php */

vc_map( array(
    "name" => esc_html__("Home Slider", 'monolit-add-ons'),
    "description" => esc_html__("Slider element for home page",'monolit-add-ons'),
    "base" => "monolit_home_slider",
    "category"  => 'Monolit Theme',
    // "as_parent" => array('only' => 'monolit_carousel_slider_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
    // "class"=>'cth_home_slider',
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "params" => array(
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Slides', 'monolit-add-ons' ),
            'param_name' => 'values',
            // 'description' => esc_html__( 'Enter values for graph - value, title and color.', 'monolit' ),
            'value' => urlencode( json_encode( array(
                array(
                    'slideimg' => '13',
                    'slide_content' => '<h2> Monolit Studio</h2>
<h3>Architecture</h3>
<a href="#sec1" class="hero-link custom-scroll-link">Start exploer</a>',
                    // 'pie_unit'=>'%',
                    // 'parallax_value'=>'0',
                    // 'pie_width' => 'col-md-4'
                ),
                array(
                    'slideimg' => '10',
                    'slide_content' => '<h2>Quisque non augue</h2>
<h3>Design - Interior</h3>
<a href="http:demowp.cththemes.net/monolit/portfolio/portfolio-item-1/" class="hero-link ajax">View project</a>',
                    // 'pie_unit'=>'%',
                    // 'parallax_value'=>'80',
                    // 'pie_width' => 'col-md-4'
                ),
                array(
                    'slideimg' => '12',
                    'slide_content' => '<h2> Our Services </h2>
<h3>Architecture - Design</h3>
<a href="http:demowp.cththemes.net/monolit/services/" class="hero-link ajax">View Services</a>',
                    // 'pie_unit'=>'%',
                    // 'parallax_value'=>'100',
                    // 'pie_width' => 'col-md-4'
                )
            ) ) ),
            'params' => array(
                array(
                    "type"      => "attach_image",
                    "holder"    => "div",
                    "class"     => "",
                    "heading"   => esc_html__("Slide Image", 'monolit-add-ons'),
                    "param_name"=> "slideimg",
                    // "description" => esc_html__("Slide Images", 'monolit')
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Content', 'monolit-add-ons' ),
                    'param_name' => 'slide_content',
                    // 'description' => esc_html__( 'Enter text used as title of bar.', 'monolit' ),
                    // 'admin_label' => true,
                    'value'=> '',
                ),
                
            ),
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
            "default"=>'no', 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("smartSpeed", 'monolit-add-ons'),
            "param_name" => "smartspeed",
            "value"=>'1200',
            "description" => esc_html__("Speed Calculate, milisecond number. Ex: 250", 'monolit-add-ons')
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
            "default"=>'no', 
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Loop", 'monolit-add-ons'),
            "param_name" => "loop",
            "description" => esc_html__("Restart when reaches to the end.", 'monolit-add-ons'),
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "default"=>'no', 
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
            "default"=>'yes', 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Animated Duration", 'monolit-add-ons'),
            "param_name" => "ani_duration",
            "value"=>'1300',
            "description" => esc_html__("Time after display background image will change after text slide changed (in milisecond). Ex: 1300", 'monolit-add-ons')
        ),
        array(
            "type"      => "textfield",
            "class"     => "",
            "heading"   => esc_html__("Overlay Opacity", 'monolit-add-ons'),
            "param_name"=> "opacity",
            "value"     => "0.2",
            "description" => esc_html__("Overlay Opacity value 0.0 - 1", 'monolit-add-ons')
        ), 
        array(
            "type"      => "textfield",
            // "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Background Image down every time we scroll down 100% of the viewport height and move Background Image up every time we scroll up 100% of the viewport height. Ex: 300 or -300 for reverse direction.", 'monolit-add-ons'),
            "value" => "300"
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
    // "js_view" => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Home_Slider extends WPBakeryShortCode {}
}
