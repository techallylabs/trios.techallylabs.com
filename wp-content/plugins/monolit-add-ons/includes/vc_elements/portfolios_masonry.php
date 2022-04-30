<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Portfolios Masonry", 'monolit-add-ons'),
   "description" => esc_html__("Masonry layout of portfolio items",'monolit-add-ons'),
   "base"      => "portfolios_masonry",
   "class"     => "",
   "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
   "category"  => 'Monolit Theme',
   "show_settings_on_create" => true,
   "params"    => array(
        array(
            "type"          => "textfield", 
            "heading"       => esc_html__("Portfolio Category IDs to exclude", 'monolit-add-ons'), 
            "param_name"    => "cat_ids", 
            "description"   => esc_html__("Enter portfolio category ids to exclude, separated by a comma. Leave empty to display all categories.", 'monolit-add-ons'),
            "value"         => '',
        ), 
        array(
            "type"          => "dropdown", 
            "class"         => "", 
            "heading"       => esc_html__('Order Portfolio Categories by', 'monolit-add-ons'), 
            "param_name"    => "cat_order_by", 
            "value"         => array(
                esc_html__('Name', 'monolit-add-ons')    => 'name', 
                esc_html__('ID', 'monolit-add-ons')      => 'id', 
                esc_html__('Count', 'monolit-add-ons')   => 'count', 
                esc_html__('Slug', 'monolit-add-ons')    => 'slug', 
                esc_html__('None', 'monolit-add-ons')    => 'none',
            ), 
            "std"           => 'name',
        ), 
        array(
            "type"          => "dropdown", 
            "class"         => "", 
            "heading"       => esc_html__('Sort Order', 'monolit-add-ons'), 
            "param_name"    => "cat_order", 
            "value"         => array(
                esc_html__('Ascending', 'monolit-add-ons')   => 'ASC',
                esc_html__('Descending', 'monolit-add-ons')  => 'DESC', 
                
            ), 
            "std"           => 'ASC',
        ), 
        array(
            "type"          => "dropdown", 
            "class"         => "", 
            "heading"       => esc_html__('Show Filter', 'monolit-add-ons'), 
            "param_name"    => "show_filter", 
            "value"         => array(
                esc_html__('Yes', 'monolit-add-ons')     => 'yes', 
                esc_html__('No', 'monolit-add-ons')      => 'no', 
            ),  
            "std"           => 'yes',
        ),
        
       
        array(
            "type" => "textfield", 
            "holder" => "div",
            "heading" => esc_html__("Enter Portfolio IDs", 'monolit-add-ons'), 
            "param_name" => "ids", 
            "description" => esc_html__("Enter portfolio ids to show, separated by a comma. Leave empty to get all.", 'monolit-add-ons')
        ), 
        array(
            "type" => "textfield", 
            // "holder" => "div",
            "heading" => esc_html__("Portfolio IDs to Exclude", 'monolit-add-ons'), 
            "param_name" => "ids_not", 
            "description" => esc_html__("Enter portfolio ids to exclude, separated by a comma. Use if the field above is empty. Leave empty to get all.", 'monolit-add-ons')
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
            "std" => 'date',
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
            "std" => 'DESC',
        ), 
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Post to show", 'monolit-add-ons'),
            "param_name" => "posts_per_page",
            "description" => esc_html__("Number of portfolio items to show (-1 for all).", 'monolit-add-ons'),
            "value"=> '12',
        ),




        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Columns Layout', 'monolit-add-ons'), 
            "param_name" => "columns_grid", 
            "value" => array(
                esc_html__('One Column', 'monolit-add-ons') => 'one', 
                esc_html__('Two Columns', 'monolit-add-ons') => 'two', 
                esc_html__('Three Columns', 'monolit-add-ons') => 'three', 
                esc_html__('Four Columns', 'monolit-add-ons') => 'four', 
                esc_html__('Five Columns', 'monolit-add-ons') => 'five', 
            ), 
            // "description" => esc_html__("Show Filter", 'monolit'), 
            "std" => 'four',
        ), 

        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Show Info', 'monolit-add-ons'), 
            "param_name" => "show_info", 
            "value" => array(
                esc_html__('Show On Hover', 'monolit-add-ons') => 'show_on_hover', 
                esc_html__('Show', 'monolit-add-ons') => 'show', 
                esc_html__('Hide', 'monolit-add-ons') => 'hide', 
                
            ), 
            // "description" => esc_html__("Show Filter", 'monolit'), 
            "std" => 'show_on_hover',
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
            // "description" => esc_html__("Show Filter", 'monolit'), 
            "std" => 'small',
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
            "std" => 'yes',
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
            "std" => 'yes',
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
            "std" => 'no',
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
            "std" => 'yes',
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
    class WPBakeryShortCode_Portfolios_Masonry extends WPBakeryShortCode {}
}