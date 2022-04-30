<?php
/* add_ons_php */

function monolit_addons_register_cpt_Project() {
    
    $labels = array( 
        'name' => __( 'Monolit Project', 'monolit-add-ons' ),
        'singular_name' => __( 'Monolit Project', 'monolit-add-ons' ),
        'add_new' => __( 'Add New Project', 'monolit-add-ons' ),
        'add_new_item' => __( 'Add New Project', 'monolit-add-ons' ),
        'edit_item' => __( 'Edit Project', 'monolit-add-ons' ),
        'new_item' => __( 'New Project', 'monolit-add-ons' ),
        'view_item' => __( 'View Project', 'monolit-add-ons' ),
        'search_items' => __( 'Search Projects', 'monolit-add-ons' ),
        'not_found' => __( 'No Menus found', 'monolit-add-ons' ),
        'not_found_in_trash' => __( 'No Projects found in Trash', 'monolit-add-ons' ),
        'parent_item_colon' => __( 'Parent Projects:', 'monolit-add-ons' ),
        'menu_name' => __( 'Monolit Projects', 'monolit-add-ons' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Projects',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail','comments','excerpt'/*, 'post-formats'*/),
        'taxonomies' => array('project_cat','post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-store',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => __('project','monolit-add-ons') ),
        'capability_type' => 'post'
    );

    register_post_type( 'project', $args );
}

add_action( 'init', 'monolit_addons_register_cpt_Project' );


//create a custom taxonomy name it Skills for your posts

function monolit_addons_register_taxonomy_Project_Cat() {

    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels = array(
        'name' => __( 'Project Categories', 'monolit-add-ons' ),
        'singular_name' => __( 'Category', 'monolit-add-ons' ),
        'search_items' =>  __( 'Search Categories','monolit-add-ons' ),
        'all_items' => __( 'All Categories','monolit-add-ons' ),
        'parent_item' => __( 'Parent Category','monolit-add-ons' ),
        'parent_item_colon' => __( 'Parent Category:','monolit-add-ons' ),
        'edit_item' => __( 'Edit Category','monolit-add-ons' ), 
        'update_item' => __( 'Update Category','monolit-add-ons' ),
        'add_new_item' => __( 'Add New Category','monolit-add-ons' ),
        'new_item_name' => __( 'New Category Name','monolit-add-ons' ),
        'menu_name' => __( 'Project Categories','monolit-add-ons' ),
    );     

    // Now register the taxonomy

    register_taxonomy('project_cat',array('project'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_nav_menus'=> true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => __('project_cat','monolit-add-ons') ),
        // https://codex.wordpress.org/Roles_and_Capabilities
        'capabilities' => array(
            'manage_terms' => 'manage_categories',
            'edit_terms' => 'manage_categories',
            'delete_terms' => 'manage_categories',
            'assign_terms' => 'edit_posts'
        ),

    ));

}
    
add_action( 'init', 'monolit_addons_register_taxonomy_Project_Cat', 0 );

function monolit_addons_project_columns_head($defaults) {
    $defaults['price'] = __( 'Price', 'monolit-add-ons' );
    $defaults['thumbnail'] = __( 'Thumbnail', 'monolit-add-ons' );
    $defaults['id'] = __( 'ID', 'monolit-add-ons' );
    return $defaults;
}
function monolit_addons_project_columns_content($column_name, $post_ID) {
    if ($column_name == 'id') {
        echo $post_ID;
    }
    if ($column_name == 'thumbnail') {
        echo get_the_post_thumbnail( $post_ID, 'thumbnail', array('style'=>'width:100px;height:auto;') );
    }
    if ($column_name == 'price') {
        $_price = get_post_meta( $post_ID, '_price', true );
        $_sale_price = get_post_meta( $post_ID, '_sale_price', true );
        if($_sale_price != '') echo '<span class="project-sale-price">'.monolit_addons_get_price_formated($_sale_price).'</span>';
        if($_price != '') echo '<span class="project-price">'.monolit_addons_get_price_formated($_price).'</span>';
    }
}
add_filter('manage_cth_project_posts_columns', 'monolit_addons_project_columns_head', 10);
add_action('manage_cth_project_posts_custom_column', 'monolit_addons_project_columns_content', 10, 2);


function monolit_addons_cth_project_cat_columns_head($defaults) {
    $defaults['id'] = __('ID','monolit-add-ons');
    return $defaults;
}

function monolit_addons_cth_project_cat_columns_content($c, $column_name, $term_id) {
    if ($column_name == 'id') {
        echo $term_id;
    }
    // if ($column_name == 'thumbnail') {
    //     $term_meta = get_term_meta( $term_id, '_cth_term_meta', true );
    //     if(isset($term_meta['featured_img']) && !empty($term_meta['featured_img'])){
    //         echo wp_get_attachment_image( $term_meta['featured_img']['id'], 'thumbnail', false, array('style'=>'width:100px;height:auto;') );
            
    //     }
    // }
}

add_filter('manage_edit-cth_project_cat_columns', 'monolit_addons_cth_project_cat_columns_head');
add_filter('manage_cth_project_cat_custom_column', 'monolit_addons_cth_project_cat_columns_content', 10, 3);

