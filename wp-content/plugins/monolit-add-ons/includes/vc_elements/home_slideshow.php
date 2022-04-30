<?php 
/* add_ons_php */

vc_map( array(
   "name"      => esc_html__("Home Slideshow", 'monolit-add-ons'),
   "description" => esc_html__("Monolit home with background slideshow images",'monolit-add-ons'),
   "base"      => "monolit_home_slideshow",
   "class"     => "",
   "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
   "category"  => 'Monolit Theme',
   "show_settings_on_create" => true,
   "params"    => array(
        array(
            "type"      => "attach_images",
            "holder"    => "div",
            "class"     => "ajax-vc-img",
            "heading"   => esc_html__("Background Images", 'monolit-add-ons'),
            "param_name"=> "slideimgs",
            "description" => esc_html__("Background slideshow images", 'monolit-add-ons'),
            "value" => "12,13,14"
        ),
        array(
            "type"      => "textarea_html",
            "holder"    => "div",
            "heading"   => esc_html__("Page Content", 'monolit-add-ons'),
            "param_name"=> "content",
            "description" => esc_html__("Page Content", 'monolit-add-ons'),
            "value"=>'<h2> Monolit Studio</h2><h3>Architecture</h3>'
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
            "heading" => esc_html__("Items", 'monolit-add-ons'),
            "param_name" => "items",
            "description" => esc_html__("The maximum amount of items displayed: 1", 'monolit-add-ons'),
            "value" => "1"
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
            "type"      => "textfield",
            // "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Background Image down every time we scroll down 100% of the viewport height and move Background Image up every time we scroll up 100% of the viewport height. Ex: 300 or -300 for reverse direction.", 'monolit-add-ons'),
            "value" => "300"
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
            "heading" => esc_html__("Extraclass", 'monolit-add-ons'),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit-add-ons')
        ),
    ),
    'admin_enqueue_js' => BBT_DIR_URL . "/assets/js/vc_js_elements.js",
    'js_view'=> 'MonolitImagesView',
));
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Home_Slideshow extends WPBakeryShortCode {}
}

