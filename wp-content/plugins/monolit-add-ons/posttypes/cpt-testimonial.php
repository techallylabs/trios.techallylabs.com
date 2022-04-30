<?php
/* add_ons_php */

class Esb_Class_Testimonial_CPT extends Esb_Class_CPT {
    protected $name = 'cth_testimonial';
    // protected function init(){
    //     parent::init();
        
    //     // add_filter('use_block_editor_for_post_type', array($this, 'enable_gutenberg'), 10, 2 );
    // }
    public function enable_gutenberg( $current_status, $post_type ){
        if ($post_type === 'cth_testimonial') 
            return true;

        return $current_status;
    }

    public function register(){

        $labels = array( 
            'name' => __( 'Testimonials', 'monolit-add-ons' ),
            'singular_name' => __( 'Testimonial', 'monolit-add-ons' ),
            'add_new' => __( 'Add New Testimonial', 'monolit-add-ons' ),
            'add_new_item' => __( 'Add New Testimonial', 'monolit-add-ons' ),
            'edit_item' => __( 'Edit Testimonial', 'monolit-add-ons' ),
            'new_item' => __( 'New Testimonial', 'monolit-add-ons' ),
            'view_item' => __( 'View Testimonial', 'monolit-add-ons' ),
            'search_items' => __( 'Search Testimonials', 'monolit-add-ons' ),
            'not_found' => __( 'No Testimonials found', 'monolit-add-ons' ),
            'not_found_in_trash' => __( 'No Testimonials found in Trash', 'monolit-add-ons' ),
            'parent_item_colon' => __( 'Parent Testimonial:', 'monolit-add-ons' ),
            'menu_name' => __( 'Monolit Testimonials', 'monolit-add-ons' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,
            'description' => __( 'List Testimonials', 'monolit-add-ons' ),
            'supports' => array( 'title', 'editor', 'thumbnail'/*,'comments', 'post-formats'*/),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 25,
            'menu_icon' => 'dashicons-format-chat', 
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'has_archive' => false,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => array( 'slug' => __('cth_testimonial','monolit-add-ons') ),
            'capability_type' => 'post'
        );
        register_post_type( $this->name, $args );
    }
    protected function set_meta_columns(){
        $this->has_columns = true;
    }
    public function meta_columns_head($columns){
        $columns['_id'] = __( 'ID', 'monolit-add-ons' );
        $columns['rating'] = __( 'Rating', 'monolit-add-ons' );
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
        if ($column_name == 'rating') {
            $rated = get_post_meta($post_ID, '_cth_testim_rate', true );
            if($rated != '' && $rated != 'no'){
                $ratedval = floatval($rated);
                echo '<ul class="star-rating">';
                for ($i=1; $i <= 5; $i++) { 
                    if($i <= $ratedval){
                        echo '<li><i class="testimfa testimfa-star"></i></li>';
                    }else{
                        if($i - 0.5 == $ratedval){
                            echo '<li><i class="testimfa testimfa-star-half-o"></i></li>';
                        }else{
                            echo '<li><i class="testimfa testimfa-star-o"></i></li>';
                        }
                    }
                    
                }
                echo '</ul>';
            }else{
                esc_html_e('Not Rated','monolit-add-ons' );
            }
        }

    }
    // protected function set_meta_boxes(){
    //     $this->meta_boxes = array(
    //         'social'       => array(
    //             'title'                 => __( 'Socials', 'monolit-add-ons' ),
    //             'context'               => 'normal', // normal - side - advanced
    //             'priority'              => 'high', // default - high - low
    //             'callback_args'         => array(),
    //         ),
    //     );
    // }
    public function cth_testi_social_callback($post, $args){
        wp_nonce_field( 'cth-cpt-fields', '_cth_cpt_nonce' );
        $socials = get_post_meta( $post->ID, BBT_META_PREFIX.'socials', true );
        ?>
        <div class="custom-form">
            <div class="repeater-fields-wrap repeater-socials"  data-tmpl="tmpl-user-social">
                <div class="repeater-fields">
                <?php 
                if(!empty($socials)){
                    foreach ($socials as $key => $social) {
                        monolit_addons_get_template_part('template-parts/social',false, array('index'=>$key,'name'=>$social['name'],'url'=>$social['url']));
                    }
                }
                ?>
                </div>
                <button class="btn addfield" type="button"><?php  esc_html_e( 'Add Social','monolit-add-ons' );?></button>
            </div>
        </div>
        <?php
    }
    /**
     * Save post metadata when a post is saved.
     *
     * @param int $post_id The post ID.
     * @param post $post The post object.
     * @param bool $update Whether this is an existing post being updated or not.
     */
    public function save_post($post_id, $post, $update){
        if(!$this->can_save($post_id)) return;

        if(isset($_POST['socials'])){
            update_post_meta( $post_id, BBT_META_PREFIX.'socials', $_POST['socials'] );
        }
    }

}

new Esb_Class_Testimonial_CPT();

