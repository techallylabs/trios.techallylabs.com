<?php 
/* add_ons_php */

// Page ID
function monolit_addons_page_columns_head($defaults) {
    $defaults['_id'] = __( 'ID', 'monolit-add-ons' );
    return $defaults;
}

// CUSTOM POSTS
function monolit_addons_page_columns_content($column_name, $post_ID) { 
    if ($column_name == '_id') {
        echo $post_ID;
    }
}

add_filter('manage_page_posts_columns', 'monolit_addons_page_columns_head', 10);
add_action('manage_page_posts_custom_column', 'monolit_addons_page_columns_content', 10, 2);  

// Post ID

function monolit_addons_post_columns_head($defaults) {
    $defaults['_id'] = __( 'ID', 'monolit-add-ons' );
    return $defaults;
}


function monolit_addons_post_columns_content($column_name, $post_ID) {
    if ($column_name == '_id') {
        echo $post_ID;
    }
}


add_filter('manage_post_posts_columns', 'monolit_addons_post_columns_head', 10);
add_action('manage_post_posts_custom_column', 'monolit_addons_post_columns_content', 10, 2);

// require_once BBT_ABSPATH . 'posttypes/cpt-header.php';
// require_once BBT_ABSPATH . 'posttypes/cpt-footer.php';
require_once BBT_ABSPATH . 'posttypes/cpt-portfolio.php';
require_once BBT_ABSPATH . 'posttypes/cpt-testimonial.php';
// require_once BBT_ABSPATH . 'posttypes/cpt-plans.php';
require_once BBT_ABSPATH . 'posttypes/cpt-members.php';
require_once BBT_ABSPATH . 'posttypes/cpt-service.php';
require_once BBT_ABSPATH . 'posttypes/cpt-timeline.php';



require_once BBT_ABSPATH . 'posttypes/tax-meta/cth_taxonomy_fields.php';
require_once BBT_ABSPATH . 'posttypes/tax-meta/category_metabox_fields.php';
require_once BBT_ABSPATH . 'posttypes/tax-meta/tag_metabox_fields.php';
require_once BBT_ABSPATH . 'posttypes/tax-meta/portfolio_cat_metabox_fields.php';

require_once BBT_ABSPATH . 'posttypes/tax-meta/product_tag_metabox_fields.php';




abstract class Esb_Class_CPT {
    protected $name = '';
    protected $meta_boxes = array();
    protected $has_columns = false;

    protected $meta_df_options = array();

    public function __construct( ) {
        $this->set_meta_option_default();
        $this->set_meta_boxes();
        $this->set_meta_columns();
        $this->init();
    }
    protected function init(){
        add_action( 'init', array($this, 'register') );

        if(!empty($this->meta_boxes)){
            add_action( 'add_meta_boxes_'.$this->name, array($this, 'add_meta_boxes') );
            add_action( 'save_post_'.$this->name, array($this, 'save_post'), 10, 3 );
        }
        if($this->has_columns){
            add_action( 'manage_'.$this->name.'_posts_columns', array($this, 'meta_columns_head') );
            add_action( 'manage_'.$this->name.'_posts_custom_column', array($this, 'meta_columns_content'), 10, 2 );
        }
    }

    protected function set_meta_option_default(){
        $this->meta_df_options = array(
            'title'                 => __( 'Default title', 'monolit-add-ons' ),
            'context'               => 'normal', // normal - side - advanced
            'priority'              => 'default', // default - high - low
            'callback_args'         => array()
        );
    }

    protected function set_meta_boxes(){}

    protected function can_save($post_id){
        /*
         * We need to verify this came from our screen and with proper authorization,
         * because the save_post action can be triggered at other times.
         */
        // If this is just a revision, don't send the email.
        if ( wp_is_post_revision( $post_id ) )
            return false;

        // Check if our nonce is set.
        if ( ! isset( $_POST['_cth_cpt_nonce'] ) ) {
            return false;
        }
        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $_POST['_cth_cpt_nonce'], 'cth-cpt-fields' ) ) {
            return false;
        }
        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return false;
        }
        // Check the user's permissions.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return false;
        }

        return true;
    }

    protected function filter_meta_args($args, $post){
        return $args;
    }

    public function add_meta_boxes($post){
        $count = 0; // for print nonce on first
        foreach ($this->meta_boxes as $key => $options) {
            $options = array_merge($this->meta_df_options, $options);
            $options['callback_args'] = array_merge($options['callback_args'], array('index_count'  => $count));
            $options['callback_args'] = $this->filter_meta_args($options['callback_args'], $post);
            add_meta_box(
                $this->name.'_'.$key,
                $options['title'],
                array($this, $this->name.'_'.$key.'_callback'),
                $this->name,
                $options['context'],
                $options['priority'],
                $options['callback_args']
            );
            $count++;
        }
    }

    public function save_post($post_id, $post, $update){}
    protected function set_meta_columns(){}
    public function meta_columns_head($columns){}
    public function meta_columns_content($column_name, $post_ID){}
}