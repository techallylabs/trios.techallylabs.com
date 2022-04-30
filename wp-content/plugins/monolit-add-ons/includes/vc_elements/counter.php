<?php 
/* add_ons_php */

vc_map( array(
   "name"      => esc_html__("Counter", 'monolit-add-ons'),
   "description" => esc_html__("Animated Counter",'monolit-add-ons'),
   "base"      => "cth_counter",
   "class"     => "",
   "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
   "category"  => 'Monolit Theme',
   "show_settings_on_create" => true,
   "params"    => array(
        
        array(
            "type"      => "textfield",
            "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Number", 'monolit-add-ons'),
            "param_name"=> "number",
            "description" => esc_html__("Number", 'monolit-add-ons'),
            "value" => "461"
        ),
        array(
            "type" => "textarea",
            "holder"    => "div",
            "heading" => esc_html__("Content", 'monolit-add-ons'),
            "param_name" => "content",
            "description" => esc_html__("Content", 'monolit-add-ons'),
            "value"=>"<h6>Finished projects</h6>",
        ),
        array(
            "type"      => "textfield",
            "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Icon Class", 'monolit-add-ons'),
            "param_name"=> "icon_class",
            "description" => wp_kses(__("Search icon : <a href='http://fontawesome.io/icons/' target='_blank'>FONT AWESOME</a>", 'monolit-add-ons'),array('a'=>array('href'=>array(),'target'=>array()))),
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extraclass", 'monolit-add-ons'),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit-add-ons'),
            "value" => "col-md-4"
        ),
        array(
            "type"      => "textfield",
            // "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Number down every time we scroll down 100% of the viewport height and move Number up every time we scroll up 100% of the viewport height. Ex: 80 or -80 for reverse direction.", 'monolit-add-ons'),
            "value" => ""
        ),
    )
));
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Cth_Counter extends WPBakeryShortCode {}
}

