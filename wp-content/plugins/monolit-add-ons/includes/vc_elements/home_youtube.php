<?php 
/* add_ons_php */

vc_map( array(
    "name" => esc_html__("Home Youtube Video", 'monolit-add-ons'),
    "description" => esc_html__("Home background video from Youtube",'monolit-add-ons'),
    "base" => "monolit_home_youtube_video",
    "content_element" => true,
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Theme',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type"      => "textarea_html",
            "holder"    => "div",
            "heading"   => esc_html__("Content", 'monolit-add-ons'),
            "param_name"=> "content",
            // "description" => esc_html__("Page Content", 'monolit'),
            "value" => '<h2> Monolit Studio</h2>
<h3>Architecture</h3>'
        ),  
        array(
            "type" => "textfield",
            "heading" => esc_html__('Scroll Link', 'monolit-add-ons'),
            "param_name" => "scroll_link",
            "value" => "#sec1",
            "description" => esc_html__("Scroll Link", 'monolit-add-ons'),

            
        ),  
         
        array(
            "type"      => "textfield",
            "class"     => "",
            "heading"   => esc_html__("Your Youtube Video ID", 'monolit-add-ons'),
            "param_name"=> "video",
            "value"     => "oDpSPNIozt8",
            "description" => esc_html__("Your Youtube Video ID: oDpSPNIozt8", 'monolit-add-ons')
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Video Quality', 'monolit-add-ons'),
            "param_name" => "quality",
            "value" => array(   
                            'default' => 'default',  
                            'small' => 'small',  
                            'medium' => 'medium',  
                            'large' => 'large',  
                            'hd720' => 'hd720',  
                            'hd1080' => 'hd1080',  
                            'highres' => 'highres', 
                                                                                                            
                        ),
            "std" => 'highres', 
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Mute', 'monolit-add-ons'),
            "param_name" => "mute",
            "value" => array(   
                            esc_html__('Yes', 'monolit-add-ons') => '1',  
                            esc_html__('No', 'monolit-add-ons') => '0',                                                                                
                        ),
            // "description" => esc_html__("", 'monolit'), 
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Pause on scroll', 'monolit-add-ons'),
            "param_name" => "pauseonscroll",
            "value" => array(   
                            esc_html__('Yes', 'monolit-add-ons') => '1',  
                            esc_html__('No', 'monolit-add-ons') => '0',                                                                                
                        ),
            "std" => '1', 
        ),
        array(
            "type"      => "attach_image",
            "holder"    => "div",
            "class"     => "ajax-vc-img",
            "heading"   => esc_html__("Background Image", 'monolit-add-ons'),
            "param_name"=> "bgimg",
            "description" => esc_html__("Background image for mobile device", 'monolit-add-ons'),
            "value"=>'10'
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
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Background Video down every time we scroll down 100% of the viewport height and move Background Video up every time we scroll up 100% of the viewport height. Ex: 300 or -300 for reverse direction.", 'monolit-add-ons'),
            "value" => "300"
        ),
        
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", 'monolit-add-ons'),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit-add-ons')
        ),
        
        
        
    ),
    'admin_enqueue_js' => BBT_DIR_URL . "/assets/js/vc_js_elements.js",
    'js_view'=> 'MonolitImagesView',
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Home_Youtube_Video extends WPBakeryShortCode {     
    }
}

