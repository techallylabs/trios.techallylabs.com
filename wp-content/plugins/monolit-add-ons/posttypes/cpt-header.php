<?php
/* add_ons_php */

class Esb_Class_Monolit_Header_CPT extends Esb_Class_CPT {
    protected $name = 'cth_header';

    public function register(){

        $labels = array( 
            'name' => __( 'Monolit Header', 'monolit-add-ons' ),
            'singular_name' => __( 'Monolit Header', 'monolit-add-ons' ),
            'add_new' => __( 'Add New Monolit Header', 'monolit-add-ons' ),
            'add_new_item' => __( 'Add New Monolit Header', 'monolit-add-ons' ),
            'edit_item' => __( 'Edit Monolit Header', 'monolit-add-ons' ),
            'new_item' => __( 'New Monolit Header', 'monolit-add-ons' ),
            'view_item' => __( 'View Monolit Header', 'monolit-add-ons' ),
            'search_items' => __( 'Search Monolit Headers', 'monolit-add-ons' ),
            'not_found' => __( 'No Monolit Headers found', 'monolit-add-ons' ),
            'not_found_in_trash' => __( 'No Monolit Headers found in Trash', 'monolit-add-ons' ),
            'parent_item_colon' => __( 'Parent Monolit Header:', 'monolit-add-ons' ),
            'menu_name' => __( 'Monolit Headers', 'monolit-add-ons' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,
            'description' => __( 'List Monolit Headers', 'monolit-add-ons' ),
            'supports' => array( 'title', 'editor', 'thumbnail' /*'thumbnail','comments', 'post-formats'*/),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 25,
            'menu_icon' => 'dashicons-editor-insertmore', 
            'show_in_nav_menus' => false,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'has_archive' => false,
            'query_var' => false,
            'can_export' => true,
            'rewrite' => false,
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
            echo get_the_post_thumbnail( $post_ID, 'full', array('style'=>'width:100px;height:auto;') );
        }
    }

}

new Esb_Class_Monolit_Header_CPT();