<?php 
/* add_ons_php */

vc_map( array(
    "name" => esc_html__("Home Image Background", 'monolit-add-ons'),
    "description" => esc_html__("Page content with image background",'monolit-add-ons'),
    "base" => "monolit_home_image",
    "content_element" => true,
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Theme',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type"      => "attach_image",
            "holder"    => "div",
            "class"     => "ajax-vc-img",
            "heading"   => esc_html__("Background Image", 'monolit-add-ons'),
            "param_name"=> "bgimg",
            "description" => esc_html__("Background image", 'monolit-add-ons'),

        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Background Parallax Value', 'monolit-add-ons'),
            "param_name" => "parallax_val",
            "value" => "300",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Background Image down every time we scroll down 100% of the viewport height and move Background Image up every time we scroll up 100% of the viewport height. Ex: 300  or -300 for reverse direction.", 'monolit-add-ons'),
            'dependency' => array(
                'element' => 'bgimg',
                //'value' => array( 'monolit_fullheight_sec','monolit_page_sec'),
                'not_empty' => true,
            ),
        ) ,
        array(
            "type"      => "textarea_html",
            "holder"    => "div",
            "heading"   => esc_html__("Page Content", 'monolit-add-ons'),
            "param_name"=> "content",
            "description" => esc_html__("Page Content", 'monolit-add-ons')
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
            "type" => "textfield",
            "heading" => esc_html__('Scroll Link', 'monolit-add-ons'),
            "param_name" => "scroll_link",
            "value" => "#sec1",
            "description" => esc_html__("Scroll Link", 'monolit-add-ons'),

            
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", 'monolit-add-ons'),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit-add-ons')
        ),
        
        
        
    ),
    // 'admin_enqueue_js' => BBT_DIR_URL . "/assets/js/vc_js_elements.js",
    // 'js_view'=> 'MonolitImagesView',
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Home_Image extends WPBakeryShortCode {     
    }
}

