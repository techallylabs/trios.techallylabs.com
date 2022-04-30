<?php
/* add_ons_php */

class Esb_Class_Plan_CPT extends Esb_Class_CPT {
    protected $name = 'lplan';
    // protected function init(){
    //     parent::init();
        
    //     // add_filter('use_block_editor_for_post_type', array($this, 'enable_gutenberg'), 10, 2 );
    // }
    public function enable_gutenberg( $current_status, $post_type ){
        if ($post_type === 'cth_testi') 
            return true;

        return $current_status;
    }

    public function register(){

        $labels = array( 
            'name' => __( 'Plan', 'monolit-add-ons' ),
            'singular_name' => __( 'Plan', 'monolit-add-ons' ), 
            'add_new' => __( 'Add New Plan', 'monolit-add-ons' ),
            'add_new_item' => __( 'Add New Plan', 'monolit-add-ons' ),
            'edit_item' => __( 'Edit Plan', 'monolit-add-ons' ),
            'new_item' => __( 'New Plan', 'monolit-add-ons' ),
            'view_item' => __( 'View Plan', 'monolit-add-ons' ),
            'search_items' => __( 'Search Plans', 'monolit-add-ons' ),
            'not_found' => __( 'No Plans found', 'monolit-add-ons' ),
            'not_found_in_trash' => __( 'No Plans found in Trash', 'monolit-add-ons' ),
            'parent_item_colon' => __( 'Parent Plan:', 'monolit-add-ons' ), 
            'menu_name' => __( 'Listing Plans', 'monolit-add-ons' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,
            'description' => 'List Plans',
            'supports' => array( 'title', 'editor', 'thumbnail'/*, 'post-formats'*/),
            'taxonomies' => array(),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,//default from show_ui
            'menu_position' => 25,
            'menu_icon' => 'dashicons-tickets-alt',
            'show_in_nav_menus' => false,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'has_archive' => false,
            'query_var' => false,
            'can_export' => true,
            'rewrite' => array( 'slug' => __('plan','monolit-add-ons') ),
            'capability_type' => 'post'
        );
        register_post_type( $this->name, $args );
    }
    protected function set_meta_columns(){
        $this->has_columns = true;
    }
    public function meta_columns_head($columns){
        unset($columns['date']);
        $columns['_id'] = __( 'ID', 'monolit-add-ons' );
        $columns['price'] = __( 'Price', 'monolit-add-ons' );
        $columns['pm_count']       = __('Subscribes Count','monolit-add-ons');
        return $columns;
    }
    public function meta_columns_content($column_name, $post_ID){
        if ($column_name == '_id') {
            echo $post_ID;
        }
        if ($column_name == 'price') {
             echo '<strong>'.monolit_addons_get_price_formated( get_post_meta( $post_ID, '_cth_price', true ) ).'</strong>';
        }
        if ($column_name == 'pm_count') {
            echo '<strong>'.get_post_meta( $post_ID, BBT_META_PREFIX.'pm_count', true ).'</strong>';
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

        if(isset($_POST[BBT_META_PREFIX.'stripe_plan_id'])){
            $new_val = sanitize_text_field( $_POST[BBT_META_PREFIX.'stripe_plan_id'] ) ;
            $origin_val = get_post_meta( $post_id, BBT_META_PREFIX.'stripe_plan_id', true );
            if($new_val !== $origin_val){
                update_post_meta( $post_id, BBT_META_PREFIX.'stripe_plan_id', $new_val );
            }
            
        }
    }

}

new Esb_Class_Plan_CPT();



// create stripe plan action
// add_action('wp_ajax_nopriv_create_stripe_plan', 'monolit_addons_create_stripe_plan_callback');
// add_action('wp_ajax_create_stripe_plan', 'monolit_addons_create_stripe_plan_callback');

function monolit_addons_create_stripe_plan_callback() {
    $json = array(
        'success' => false,
        'data' => array(
            'POST'=>$_POST,
        )
    );

    if( !isset($_POST['stripe_nonce']) || !isset($_POST['lplan_id']) || !isset($_POST['stripe_plan']) || !isset($_POST['stripe_product']) ){
        $json['data']['error'] = esc_html__( 'Invalid create stripe form', 'monolit-add-ons' ) ;
        wp_send_json($json );
    }
    

    $nonce = $_POST['stripe_nonce'];
    
    if ( ! wp_verify_nonce( $nonce, 'create_stripe_plan' ) ){
        $json['data']['error'] = esc_html__( 'Security checked!, Cheatn huh?', 'monolit-add-ons' ) ;
        wp_send_json($json );
    }


    $plan_post          = get_post($_POST['lplan_id']);

    if(empty($plan_post)){
        $json['data']['error'] = esc_html__( 'Invalid listing plan ID', 'monolit-add-ons' ) ;
        wp_send_json($json );
    }

    $prices = monolit_addons_get_plan_prices($plan_post->ID);

    $stripe_args = array(
        'nickname'      => $_POST['stripe_plan'],
        'product'       => array(
            'name'  => $_POST['stripe_product']
        ),
        'amount'        => monolit_addons_get_stripe_amount( $prices['total'] ),
        'interval'      => get_post_meta( $plan_post->ID , BBT_META_PREFIX.'period', true ),
        'interval_count'=> get_post_meta( $plan_post->ID , BBT_META_PREFIX.'interval', true )
    );

    require_once EASYBOOK_ADD_ONS_DIR.'posttypes/payment-stripe.php';
    $payment_class = new CTH_Payment_Stripe();

    $plan = $payment_class->createPlan($stripe_args);

    if($plan){
        $json['success'] = true;
        $json['plan_id'] = $plan->id;

        $update_lplan_field = true;

        if($update_lplan_field){
            update_post_meta( $plan_post->ID, BBT_META_PREFIX.'stripe_plan_id', $plan->id );
        }
    }else{
        $json['data']['error'] = esc_html__( 'There is something wrong. Please try again.', 'monolit-add-ons' ) ;
    }

    wp_send_json($json );

}
// Edit term page
function monolit_addons_plan_edit_meta_field($term) {
    // wp_enqueue_style( 'font-awesome', EASYBOOK_ADD_ONS_DIR_URL . 'inc/assets/font-awesome/font-awesome.min.css');
    // wp_enqueue_style( 'cth-backend', EASYBOOK_ADD_ONS_DIR_URL . 'inc/assets/backend.css');
    // wp_enqueue_media();
    // wp_enqueue_script('monolit_tax_meta', EASYBOOK_ADD_ONS_DIR_URL . 'inc/assets/upload_file.js', array('jquery'), null, true);
    // wp_enqueue_script('select2', EASYBOOK_ADD_ONS_DIR_URL . 'assets/js/select2.min.js', array('jquery'), null, true);
    // wp_enqueue_script('monolit_tax_repeat', EASYBOOK_ADD_ONS_DIR_URL . 'inc/assets/repeat_fields.js', array('jquery','jquery-ui-sortable'), null, true);
    
    // put the term ID into a variable
    // $t_id = $term->term_id;

    $term_meta = get_term_meta( $term->term_id, BBT_META_PREFIX.'term_meta', true );
    
    // retrieve the existing value(s) for this meta field. This returns an array
    // $term_meta = get_option(BBT_META_PREFIX."tax_listing_cat_$t_id");

    monolit_addons_icon_select_field(array(
                                'id'=>'icon_class',
                                'name'=>esc_html__('Icon','monolit-add-ons'),
                                // 'values' => array(
                                //         'yes'=> esc_html__('Yes','monolit-add-on'),
                                //         'no'=> esc_html__('No','monolit-add-on'),
                                //     ),

                                'default'=>'fa fa-cutlery'
    ),$term_meta,false);

}
// add_action('plan_edit_form_fields', 'monolit_addons_plan_edit_meta_field', 10, 2);

        

