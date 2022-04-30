<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Timeline List", 'monolit-add-ons'),
    "description" => esc_html__("Timeline list",'monolit-add-ons'),
    "base"      => "monolit_timelines",
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
            "description" => esc_html__("Number of Timelines to show", 'monolit-add-ons')
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
            "heading" => esc_html__("Or Enter Timeline IDs", 'monolit-add-ons'),
            "param_name" => "ids",
            "description" => esc_html__("Enter Timeline ids to show, separated by a comma. (ex: 99,100)", 'monolit-add-ons')
        ),
        
        array(
            "type"      => "textfield",
            // "holder"    => "div",
            "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Timelines down every time we scroll down 100% of the viewport height and move Timelines up every time we scroll up 100% of the viewport height. Ex: 150 or -150 for reverse direction.", 'monolit-add-ons'),
            "value" => ""
        ),
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Left Columns', 'monolit-add-ons'), 
            "param_name" => "left_columns", 
            "value" => array(
                esc_html__('1/2', 'monolit-add-ons') => 'col-md-6', 
                
                esc_html__('1/3', 'monolit-add-ons') => 'col-md-4', 
                
                esc_html__('1/4', 'monolit-add-ons') => 'col-md-3', 
                esc_html__('1/6', 'monolit-add-ons') => 'col-md-2', 
                esc_html__('1/1', 'monolit-add-ons') => 'col-md-12',

                esc_html__('2/3', 'monolit-add-ons') => 'col-md-8',
                esc_html__('3/4', 'monolit-add-ons') => 'col-md-9',
                esc_html__('5/6', 'monolit-add-ons') => 'col-md-10',
                esc_html__('Hide', 'monolit-add-ons') => 'hide', 
                 
            ), 
            // "description" => esc_html__("Show Info", 'monolit'), 
            "default" => 'col-md-6',
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Right Columns', 'monolit-add-ons'), 
            "param_name" => "right_columns", 
            "value" => array(
                esc_html__('1/2', 'monolit-add-ons') => 'col-md-6', 
                
                esc_html__('1/3', 'monolit-add-ons') => 'col-md-4', 
                
                esc_html__('1/4', 'monolit-add-ons') => 'col-md-3', 
                esc_html__('1/6', 'monolit-add-ons') => 'col-md-2', 
                esc_html__('1/1', 'monolit-add-ons') => 'col-md-12',

                esc_html__('2/3', 'monolit-add-ons') => 'col-md-8',
                esc_html__('3/4', 'monolit-add-ons') => 'col-md-9',
                esc_html__('5/6', 'monolit-add-ons') => 'col-md-10',
                esc_html__('Hide', 'monolit-add-ons') => 'hide', 
                 
            ), 
            // "description" => esc_html__("Show Info", 'monolit'), 
            "default" => 'col-md-6',
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
    class WPBakeryShortCode_Monolit_Timelines extends WPBakeryShortCode {}
}
