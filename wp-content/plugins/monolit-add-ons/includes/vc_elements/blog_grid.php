<?php 
/* add_ons_php */

vc_map( array(
    "name"      => esc_html__("Blog Grid", 'monolit-add-ons'),
   "description" => esc_html__("Grid layout of blog posts",'monolit-add-ons'),
   "base"      => "monolit_blog_grid",
   "class"     => "",
   "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
   "category"  => 'Monolit Theme',
   "show_settings_on_create" => true,
   "params"    => array( 
        array(
            "type" => "textfield", 
            "heading" => esc_html__("Post Category IDs to include", 'monolit-add-ons'), 
            "param_name" => "cat_ids", 
            "description" => esc_html__("Enter post category ids to include, separated by a comma. Leave empty to get posts from all categories.", 'monolit-add-ons')
        ), 
        array(
            "type" => "textfield", 
            "holder" => "div",
            "heading" => esc_html__("Enter Post IDs", 'monolit-add-ons'), 
            "param_name" => "ids", 
            "description" => esc_html__("Enter Post ids to show, separated by a comma. Leave empty to show all.", 'monolit-add-ons')
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Order Posts by', 'monolit-add-ons'), 
            "param_name" => "order_by", 
            "value" => array(
                esc_html__('Date', 'monolit-add-ons') => 'date', 
                esc_html__('ID', 'monolit-add-ons') => 'ID', 
                esc_html__('Author', 'monolit-add-ons') => 'author', 
                esc_html__('Title', 'monolit-add-ons') => 'title', 
                esc_html__('Modified', 'monolit-add-ons') => 'modified',
            ), 
            // "description" => esc_html__("Order Post by", 'monolit'), 
            "std" => 'date',
        ), 
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Ordering', 'monolit-add-ons'), 
            "param_name" => "order", 
            "value" => array(
                esc_html__('Ascending', 'monolit-add-ons') => 'ASC',
                esc_html__('Descending', 'monolit-add-ons') => 'DESC', 
                
            ), 
            // "description" => esc_html__("Order Portfolios", 'monolit'),
            "std" => 'DESC',
        ), 
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Posts to show", 'monolit-add-ons'),
            "param_name" => "posts_per_page",
            "description" => esc_html__("Number of Blog posts to show (-1 for all).", 'monolit-add-ons'),
            "value"=> '4',
        ),
       
        array(
            "type" => "dropdown", 
            "class" => "", 
            "heading" => esc_html__('Show Pagination', 'monolit-add-ons'), 
            "param_name" => "show_pagination", 
            "value" => array(
                esc_html__('Yes', 'monolit-add-ons') => 'yes', 
                esc_html__('No', 'monolit-add-ons') => 'no', 
            ), 
            // "description" => esc_html__("Show Info", 'monolit'), 
            "std" => 'yes',
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
    class WPBakeryShortCode_Monolit_Blog_Grid extends WPBakeryShortCode {}
}

