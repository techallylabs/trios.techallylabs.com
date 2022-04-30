<?php
/* add_ons_php */

class Esb_Class_TimeLine_CPT extends Esb_Class_CPT {
    protected $name = 'monolit_timeline';
    // protected function init(){
    //     parent::init();
    //     // add_action( 'init', array($this, 'taxonomies'), 0 ); 
    //     // add_filter('manage_edit-portfolio_cat_columns', array($this, 'tax_cat_columns_head') );
    //     // add_filter('manage_portfolio_cat_custom_column', array($this, 'tax_cat_columns_content'), 10, 3); 
    //     // add_filter('single_template', array($this, 'single_template')); 

    //     // add_filter('use_block_editor_for_post_type', array($this, 'enable_gutenberg'), 10, 2 );
    // }
    public function enable_gutenberg( $current_status, $post_type ){
        if ($post_type === 'monolit_timeline') 
            return true;

        return $current_status;
    }

    public function register(){

        $labels = array( 
            'name' => __( 'Timeline', 'monolit-add-ons' ),
            'singular_name' => __( 'Timeline', 'monolit-add-ons' ),
            'add_new' => __( 'Add New Timeline', 'monolit-add-ons' ),
            'add_new_item' => __( 'Add New Timeline', 'monolit-add-ons' ),
            'edit_item' => __( 'Edit Timeline', 'monolit-add-ons' ),
            'new_item' => __( 'New Timeline', 'monolit-add-ons' ),
            'view_item' => __( 'View Timeline', 'monolit-add-ons' ),
            'search_items' => __( 'Search Timelines', 'monolit-add-ons' ),
            'not_found' => __( 'No Timelines found', 'monolit-add-ons' ),
            'not_found_in_trash' => __( 'No Timelines found in Trash', 'monolit-add-ons' ),
            'parent_item_colon' => __( 'Parent Timeline:', 'monolit-add-ons' ),
            'menu_name' => __( 'Monolit Timelines', 'monolit-add-ons' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'List Timelines',
            'supports' => array( 'title', 'editor', 'thumbnail','excerpt'/*,'comments', 'post-formats'*/),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 20,
            'menu_icon' =>  'dashicons-feedback',
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'has_archive' => false,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => array( 'slug' => __('monolit_timeline','monolit-add-ons') , 'with_front' => false ),
            'capability_type' => 'post'

        );
        register_post_type( $this->name, $args );
    }
    protected function set_meta_columns(){
        $this->has_columns = true;
    }
    public function meta_columns_head($columns){
        $columns['_id'] = __( 'ID', 'monolit-add-ons' );
        $columns['_thumbnail'] = __( 'Thumbnail', 'monolit-add-ons' );
        return $columns;
    }
    public function meta_columns_content($column_name, $post_ID){
        if ($column_name == '_id') {
            echo $post_ID;
        }
        if ($column_name == '_thumbnail') {
            echo get_the_post_thumbnail( $post_ID, 'thumbnail', array('style'=>'width:100px;height:auto;') );
        }
    }

}

new Esb_Class_TimeLine_CPT();