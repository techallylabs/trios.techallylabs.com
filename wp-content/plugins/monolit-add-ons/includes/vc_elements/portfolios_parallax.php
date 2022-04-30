<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Portfolios Parallax", 'monolit-add-ons'),
   "description" => esc_html__("Parallax layout of portfolio items",'monolit-add-ons'),
   "base"      => "monolit_portfolios_parallax",
   "class"     => "",
   "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
   "category"  => 'Monolit Theme',
   "show_settings_on_create" => true,
   "params"    => array(
        array(
            "type" => "textfield", 
            "heading" => esc_html__("Portfolio Category IDs to include", 'monolit-add-ons'), 
            "param_name" => "cat_ids", 
            "description" => esc_html__("Enter portfolio category ids to include, separated by a comma. Leave empty to get portfolios from all categories.", 'monolit-add-ons')
        ), 
        
        array(
            "type" => "textfield", 
            "holder" => "div",
            "heading" => esc_html__("Enter Portfolio IDs", 'monolit-add-ons'), 
            "param_name" => "ids", 
            "description" => esc_html__("Enter portfolio ids to show, separated by a comma.", 'monolit-add-ons')
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Order Portfolios by', 'monolit-add-ons'), 
            "param_name" => "order_by", 
            "value" => array(
                esc_html__('Date', 'monolit-add-ons') => 'date', 
                esc_html__('ID', 'monolit-add-ons') => 'ID', 
                esc_html__('Author', 'monolit-add-ons') => 'author', 
                esc_html__('Title', 'monolit-add-ons') => 'title', 
                esc_html__('Modified', 'monolit-add-ons') => 'modified',
            ), 
            "description" => esc_html__("Order Portfolios by", 'monolit-add-ons'), 
            "default" => 'date',
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Order Portfolios', 'monolit-add-ons'), 
            "param_name" => "order", 
            "value" => array(
                esc_html__('Ascending', 'monolit-add-ons') => 'ASC',
                esc_html__('Descending', 'monolit-add-ons') => 'DESC', 
                
            ), 
            "description" => esc_html__("Order Portfolios", 'monolit-add-ons'),
            "default" => 'DESC',
        ), 
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Post to show", 'monolit-add-ons'),
            "param_name" => "posts_per_page",
            "description" => esc_html__("Number of portfolio items to show (-1 for all).", 'monolit-add-ons'),
            "value"=> '-1',
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("First Side", 'monolit-add-ons'),
            "param_name" => "first_side",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array( 
                esc_html__('Left', 'monolit-add-ons') => 'left',   
                esc_html__('Right', 'monolit-add-ons') => 'right',  
                esc_html__('Center', 'monolit-add-ons') => 'center',  
                  
            ),
            "default"=>'left', 
        ),
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Show Date', 'monolit-add-ons'), 
            "param_name" => "show_date", 
            "value" => array(
                esc_html__('Yes', 'monolit-add-ons') => 'yes',
                esc_html__('No', 'monolit-add-ons') => 'no',
                 
                 
            ), 
            // "description" => esc_html__("Show Filter", 'monolit'), 
            "default" => 'yes',
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Show Category', 'monolit-add-ons'), 
            "param_name" => "show_cat", 
            "value" => array(
                esc_html__('Yes', 'monolit-add-ons') => 'yes',
                esc_html__('No', 'monolit-add-ons') => 'no',
                 
                 
            ), 
            // "description" => esc_html__("Show Filter", 'monolit'), 
            "default" => 'yes',
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Show Excerpt', 'monolit-add-ons'), 
            "param_name" => "show_excerpt", 
            "value" => array(
                esc_html__('No', 'monolit-add-ons') => 'no',
                esc_html__('Yes', 'monolit-add-ons') => 'yes', 
                 
            ), 
            // "description" => esc_html__("Show Filter", 'monolit'), 
            "default" => 'no',
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Show View Project', 'monolit-add-ons'), 
            "param_name" => "show_view_project", 
            "value" => array(
                esc_html__('Yes', 'monolit-add-ons') => 'yes', 
                esc_html__('No', 'monolit-add-ons') => 'no', 
            ), 
            // "description" => esc_html__("Show Filter", 'monolit'), 
            "default" => 'yes',
        ), 
        
        
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("View All Projects Link", 'monolit-add-ons'),
            "param_name" => "view_all_link",
            // "description" => esc_html__("Number of portfolio items to show (-1 for all).", 'monolit'),
            "value"=> home_url('/?post_type=portfolio' ),
        ),

        array(
            "type" => "dropdown", 
            "heading" => esc_html__('Show Pagination', 'monolit-add-ons'), 
            "param_name" => "show_pagination", 
            "value" => array(
                esc_html__('Yes', 'monolit-add-ons') => 'yes', 
                esc_html__('No', 'monolit-add-ons') => 'no', 
            ), 
            // "description" => esc_html__("Show Filter", 'monolit'), 
            "std" => 'no',
        ), 

        array(
            "type"      => "textfield",
            // "holder"    => "div",
            // "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Portfolio Title down every time we scroll down 100% of the viewport height and move Portfolio Title up every time we scroll up 100% of the viewport height. Ex: 150 or -150 for reverse direction.", 'monolit-add-ons'),
            "value" => "200"
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
    class WPBakeryShortCode_Monolit_Portfolios_Parallax extends WPBakeryShortCode {}
}