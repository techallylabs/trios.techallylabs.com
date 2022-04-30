<?php
/* add_ons_php */

class Esb_Class_Portfolio_CPT extends Esb_Class_CPT {
    protected $name = 'portfolio';
    protected function init(){
        parent::init();
        add_action( 'init', array($this, 'taxonomies'), 0 ); 
        add_filter('manage_edit-portfolio_cat_columns', array($this, 'tax_cat_columns_head') );
        add_filter('manage_portfolio_cat_custom_column', array($this, 'tax_cat_columns_content'), 10, 3); 
        // add_filter('single_template', array($this, 'single_template')); 
        add_filter('pre_get_posts', array($this, 'pre_get_posts')); 


        // add_filter('use_block_editor_for_post_type', array($this, 'enable_gutenberg'), 10, 2 );

        add_filter('getarchives_where', array($this, 'getarchives_where'), 10, 3); 
        add_filter( 'generate_rewrite_rules', array($this, 'generate_rewrite_rules') ); 
    }
    public function enable_gutenberg( $current_status, $post_type ){
        if ($post_type === 'portfolio') 
            return true;

        return $current_status;
    }

    public function single_template($single_template){
        global $post;

        if ($post->post_type == 'portfolio') {
            $single_template = monolit_addons_get_template_part('template-parts/portfolio/single', '', null, false);
        }
        return $single_template;
    }

    public function pre_get_posts($query){
        if ( ! is_admin() && $query->is_main_query() ) {
            if( is_post_type_archive('portfolio') || is_tax('portfolio_cat') ){
                $query->set('posts_per_page', monolit_get_option('folio_posts_per_page'));
                $query->set('orderby', monolit_get_option('folio_archive_orderby'));
                $query->set('order', monolit_get_option('folio_archive_order'));

            }
        }
    }

    public function register(){

        $labels = array( 
            'name' => __( 'Portfolio', 'monolit-add-ons' ),
            'singular_name' => __( 'Portfolio', 'monolit-add-ons' ),
            'add_new' => __( 'Add New Portfolio', 'monolit-add-ons' ),
            'add_new_item' => __( 'Add New Portfolio', 'monolit-add-ons' ),
            'edit_item' => __( 'Edit Portfolio', 'monolit-add-ons' ),
            'new_item' => __( 'New Portfolio', 'monolit-add-ons' ),
            'view_item' => __( 'View Portfolio', 'monolit-add-ons' ),
            'search_items' => __( 'Search Portfolios', 'monolit-add-ons' ),
            'not_found' => __( 'No Portfolios found', 'monolit-add-ons' ),
            'not_found_in_trash' => __( 'No Portfolios found in Trash', 'monolit-add-ons' ),
            'parent_item_colon' => __( 'Parent Portfolio:', 'monolit-add-ons' ),
            'menu_name' => __( 'Monolit Portfolios', 'monolit-add-ons' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'List Portfolios',
            'supports' => array( 'title', 'editor',  'author', 'thumbnail','comments','excerpt', 'page-attributes' /*'title', 'editor', 'excerpt', 'thumbnail','comments',*//*, 'post-formats'*/),
            'taxonomies' => array('portfolio_cat'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-editor-kitchensink', 
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => array( 'slug' => __('portfolio','monolit-add-ons') , 'with_front' => false ),
            'capability_type' => 'post',
            // https://wordpress.stackexchange.com/questions/324221/enable-gutenberg-on-custom-post-type
            // 'show_in_rest'      => true,
        );
        register_post_type( $this->name, $args );
    }
    public function taxonomies(){
        $labels = array(
            'name' => __( 'Categories', 'monolit-add-ons' ),
            'singular_name' => __( 'Category', 'monolit-add-ons' ),
            'search_items' =>  __( 'Search Categories','monolit-add-ons' ),
            'all_items' => __( 'All Categories','monolit-add-ons' ),
            'parent_item' => __( 'Parent Category','monolit-add-ons' ),
            'parent_item_colon' => __( 'Parent Category:','monolit-add-ons' ),
            'edit_item' => __( 'Edit Category','monolit-add-ons' ), 
            'update_item' => __( 'Update Category','monolit-add-ons' ),
            'add_new_item' => __( 'Add New Category','monolit-add-ons' ),
            'new_item_name' => __( 'New Category Name','monolit-add-ons' ),
            'menu_name' => __( 'Categories','monolit-add-ons' ),
          );     

        // Now register the taxonomy

        register_taxonomy('portfolio_cat',array('portfolio'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => __('portfolio_cat','monolit-add-ons') , 'with_front' => false ),
        ));

    }
    public function tax_cat_columns_head($columns) {
        // $columns['_thumbnail'] = __('Thumbnail','monolit-add-ons');
        $columns['_id'] = __('ID','monolit-add-ons');
        return $columns;
    }

    public function tax_cat_columns_content($c, $column_name, $term_id) {
        if ($column_name == '_id') {
            echo $term_id;
        }
        // if ($column_name == '_thumbnail') {
        //     $term_meta = get_term_meta( $term_id, ESB_META_PREFIX.'term_meta', true );
        //     if(isset($term_meta['featured_img']) && !empty($term_meta['featured_img'])){
        //         echo wp_get_attachment_image( $term_meta['featured_img']['id'], 'thumbnail', false, array('style'=>'width:100px;height:auto;') );
                
        //     }
        // }
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

    public function getarchives_where( $where, $args ){
        if ( isset($args['post_type']) && $args['post_type'] == 'portfolio' ) {      
            $where = "WHERE post_type = '$args[post_type]' AND post_status = 'publish'";
        }

        return $where;
    }

    public function generate_rewrite_rules( $wp_rewrite ){
        $slug = _x( 'portfolio', 'portfolio url slug', 'monolit-add-ons' );
        $new_rules = array(
            $slug.'/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$' => 'index.php?post_type=portfolio&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]',
            $slug.'/([0-9]{4})/([0-9]{1,2})/?$' => 'index.php?post_type=portfolio&year=$matches[1]&monthnum=$matches[2]',
            $slug.'/([0-9]{4})/?$' => 'index.php?post_type=portfolio&year=$matches[1]' 
        );

        $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
    }
}

new Esb_Class_Portfolio_CPT();