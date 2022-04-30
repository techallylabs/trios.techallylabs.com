<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Testimonial Slider", 'monolit-add-ons'),
    "description" => esc_html__("Testimonail Slider",'monolit-add-ons'),
    "base"      => "monolit_testimonials",
    "class"     => "",
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Theme',
    "show_settings_on_create" => true,
    "params"    => array(
        array(
            "type"      => "textfield",
            "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Count", 'monolit-add-ons'),
            "param_name"=> "count",
            "value"     => "3",
            "description" => esc_html__("Number of testimonials to show", 'monolit-add-ons')
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Order by', 'monolit-add-ons'),
            "param_name" => "order_by",
            "value" => array(   
                esc_html__('Date', 'monolit-add-ons') => 'date',  
                esc_html__('ID', 'monolit-add-ons') => 'ID',  
                esc_html__('Author', 'monolit-add-ons') => 'author',       
                esc_html__('Title', 'monolit-add-ons') => 'title',  
                esc_html__('Modified', 'monolit-add-ons') => 'modified',  
            ),
            "description" => esc_html__("Order by", 'monolit-add-ons'),  
            // "default"=>'date',    
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Order', 'monolit-add-ons'),
            "param_name" => "order",
            "value" => array(   
                            esc_html__('Descending', 'monolit-add-ons') => 'DESC',
                            esc_html__('Ascending', 'monolit-add-ons') => 'ASC',  
                                                                                                              
                            ),
            "description" => esc_html__("Order", 'monolit-add-ons'),      
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Or Enter Testimonial IDs", 'monolit-add-ons'),
            "param_name" => "ids",
            "description" => esc_html__("Enter testimonial ids to show, separated by a comma. (ex: 99,100)", 'monolit-add-ons')
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Show Avatar', 'monolit-add-ons'),
            "param_name" => "show_avatar",
            "value" => array(   
                            esc_html__('No', 'monolit-add-ons') => 'no',  
                            esc_html__('Yes', 'monolit-add-ons') => 'yes',
                            
                                                                                                              
                            ),
            "description" => esc_html__("Show avatar", 'monolit-add-ons'),      
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
            "value"=>'1300',
            "description" => esc_html__("Speed Calculate, milisecond number. Ex: 250", 'monolit-add-ons')
        ), 
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Loop", 'monolit-add-ons'),
            "param_name" => "loop",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array(  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',  
                esc_html__('No', 'monolit-add-ons') => 'no',  
                  
            ),
            "default"=>'no', 
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
            "default"=>'yes', 
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
            "default"=>'no', 
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
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
                
                  
            ),
            "default"=>'yes', 
        ),
        array(
            "type"      => "textfield",
            // "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Slider down every time we scroll down 100% of the viewport height and move Slider up every time we scroll up 100% of the viewport height. Ex: 150 or -150 for reverse direction.", 'monolit-add-ons'),
            "value" => "0"
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
    class WPBakeryShortCode_Monolit_Testimonials extends WPBakeryShortCode {}
}

