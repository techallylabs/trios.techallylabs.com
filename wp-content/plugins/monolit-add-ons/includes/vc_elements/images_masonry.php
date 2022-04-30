<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Popup Gallery Masonry", 'monolit-add-ons'),
    "description" => esc_html__("Photos gallery masonry layout for monolit project with popup effect",'monolit-add-ons'),
    "base"      => "monolit_images_gallery_masonry",
    "class"     => "",
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Portfolio',
    
    "params"    => array(

        array(
            "type"      => "attach_images",
            "holder"    => "div",
            "class"     => "ajax-vc-img",
            "heading"   => esc_html__("Gallery Photos", 'monolit-add-ons'),
            "param_name"=> "galleryimgs",
            // "description" => esc_html__("Gallery photos", 'monolit')
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
                // esc_html__('Free Size', 'monolit') => 'free',        
            ),
            // "description" => esc_html__("Columns Grid", 'monolit'),  
            "std"=>'three',    
        ),
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Spacing', 'monolit-add-ons'), 
            "param_name" => "spacing", 
            "value" => array(
                esc_html__('Small', 'monolit-add-ons') => 'small',
                esc_html__('Big', 'monolit-add-ons') => 'big', 
                esc_html__('None', 'monolit-add-ons') => 'none',  
                
            ), 
            // "description" => esc_html__("Spacing", 'monolit'),
            "std" => 'small',
        ),
        
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", 'monolit-add-ons'),
            "param_name" => "el_class",
            "value"=>'',
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
    class WPBakeryShortCode_Monolit_Images_Gallery_Masonry extends WPBakeryShortCode {}
}

