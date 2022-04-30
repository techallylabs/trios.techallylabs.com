<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Our Partners", 'monolit-add-ons'),
    "description" => esc_html__("List of our partners or clients",'monolit-add-ons'),
    "base"      => "monolit_our_partners",
    "class"     => "",
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Theme',
    
    "show_settings_on_create" => true,
    "params"    => array(

        array(
            "type"      => "attach_images",
            "holder"    => "div",
            "class"     => "ajax-vc-img",
            "heading"   => esc_html__("Partner Images", 'monolit-add-ons'),
            "param_name"=> "partnerimgs",
            // "description" => esc_html__("Sponsors Images", 'monolit')
            "value"     => '436,437,438,439,440',
        ),

        array(
            "type"      => "textarea",
            "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Partner Links", 'monolit-add-ons'),
            "param_name"=> "content",
            "value"     => 'http://market.envato.com
http://lesscss.org
https://jquery.com
http://mailchimp.com
http://sass-lang.com',
            "description" => esc_html__("Enter links for each partner (Note: divide links with linebreaks (Enter)).", 'monolit-add-ons')
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Target', 'monolit-add-ons'),
            "param_name" => "target",
            "value" => array(   
                            esc_html__('Opens Partner link in new window', 'monolit-add-ons') => '_blank',  
                            esc_html__('Opens Partner link in the same window', 'monolit-add-ons') => '_self',                                                                               
                        ),
            "std" => '_blank', 
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Columns Grid', 'monolit-add-ons'),
            "param_name" => "columns",
            "value" => array(   
                esc_html__('One Column', 'monolit-add-ons') => 'one',  
                esc_html__('Two Columns', 'monolit-add-ons') => 'two',  
                esc_html__('Three Columns', 'monolit-add-ons') => 'three',        
                esc_html__('Four Columns', 'monolit-add-ons') => 'four',        
                esc_html__('Five Columns', 'monolit-add-ons') => 'five',        
                esc_html__('Six Columns', 'monolit-add-ons') => 'six',        
            ),
            // "description" => esc_html__("Columns Grid", 'monolit'),  
            "std"=>'five',    
        ),
        array(
            "type"      => "textfield",
            // "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Partner Logos down every time we scroll down 100% of the viewport height and move Partner Logos up every time we scroll up 100% of the viewport height. Ex: 150 or -150 for reverse direction.", 'monolit-add-ons'),
            "value" => ""
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
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Our_Partners extends WPBakeryShortCode {}
}

