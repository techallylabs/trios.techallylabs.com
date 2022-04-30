<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Piechart", 'monolit-add-ons'),
    "description" => esc_html__("Animated Piechart",'monolit-add-ons'),
    "base"      => "monolit_piechart",
    "class"     => "",
    "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
    "category"  => 'Monolit Theme',
    "show_settings_on_create" => true,
    "params"    => array(
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Piecharts', 'monolit-add-ons' ),
            'param_name' => 'values',
            // 'description' => esc_html__( 'Enter values for graph - value, title and color.', 'monolit' ),
            'value' => urlencode( json_encode( array(
                array(
                    'description' => '<h4>Design</h4>',
                    'value' => '85',
                    'pie_unit'=>'%',
                    'parallax_value'=>'0',
                    'pie_width' => 'col-md-4'
                ),
                array(
                    'description' => '<h4>Architecture</h4>',
                    'value' => '95',
                    'pie_unit'=>'%',
                    'parallax_value'=>'80',
                    'pie_width' => 'col-md-4'
                ),
                array(
                    'description' => '<h4>Construction</h4>',
                    'value' => '80',
                    'pie_unit'=>'%',
                    'parallax_value'=>'100',
                    'pie_width' => 'col-md-4'
                )
            ) ) ),
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Description', 'monolit-add-ons' ),
                    'param_name' => 'description',
                    // 'description' => esc_html__( 'Enter text used as title of bar.', 'monolit' ),
                    'admin_label' => true,
                    'value'=> '<h4>Design</h4>',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Value', 'monolit-add-ons' ),
                    'param_name' => 'value',
                    'description' => esc_html__( 'Enter value of piechart.', 'monolit-add-ons' ),
                    'admin_label' => true,
                    'value'=> '85',
                ),
                array(
                    "type"      => "textfield",
                    // "holder"    => "div",
                    // "class"     => "",
                    "heading"   => esc_html__("Unit", 'monolit-add-ons'),
                    "param_name"=> "pie_unit",
                    // "description" => esc_html__("Pixel number. Which we are telling the browser is to move Piechart down every time we scroll down 100% of the viewport height and move Piechart up every time we scroll up 100% of the viewport height. Ex: 80 or -80 for reverse direction.", 'monolit'),
                    "value" => "%"
                ),
                array(
                    "type"      => "textfield",
                    // "holder"    => "div",
                    // "class"     => "",
                    "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
                    "param_name"=> "parallax_value",
                    "description" => esc_html__("Pixel number. Which we are telling the browser is to move Piechart down every time we scroll down 100% of the viewport height and move Piechart up every time we scroll up 100% of the viewport height. Ex: 80 or -80 for reverse direction.", 'monolit-add-ons'),
                    "value" => "0"
                ),
                array(
                    "type" => "dropdown", 
                    "class" => "", 
                    "heading" => esc_html__('Width', 'monolit-add-ons'), 
                    "param_name" => "pie_width", 
                    "value" => array(
                        esc_html__('1/1', 'monolit-add-ons') => 'col-md-12',
                        esc_html__('1/3', 'monolit-add-ons') => 'col-md-4', 
                        esc_html__('1/2', 'monolit-add-ons') => 'col-md-6', 
                        esc_html__('1/4', 'monolit-add-ons') => 'col-md-3', 
                        esc_html__('1/6', 'monolit-add-ons') => 'col-md-2', 
                         
                    ), 
                    // "description" => esc_html__("Show Info", 'monolit'), 
                    "default" => 'col-md-4',
                ), 
            ),
        ),
        array(
            "type" => "colorpicker",
            // "class" => "",
            "heading" => esc_html__( "Color", 'monolit-add-ons' ),
            "param_name" => "pie_color",
            "value" => '#595F62', //Default Red color
            // "description" => esc_html__( "Choose text color", "monolit" )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Size", 'monolit-add-ons'),
            "param_name" => "pie_size",
            "description" => esc_html__("Size of the pie chart in px. It will always be a square.", 'monolit-add-ons'),
            "value" => '150', //Default Red color
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Line Width", 'monolit-add-ons'),
            "holder" => "div",
            "param_name" => "linewidth",
            "description" => esc_html__("Width of the chart line in px.", 'monolit-add-ons'),
            "value" => '30', //Default Red color
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
    )
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Piechart extends WPBakeryShortCode {}
}