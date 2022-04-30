<?php
/* add_ons_php */
defined( 'ABSPATH' ) || exit;
// set global options value
if(!isset($monolit_addons_options)) 
    $monolit_addons_options = get_option( 'monolit-addons-options', array() );  

final class Monolit_Addons { 
    public $cthversion = '2.0.3';
    public $cart = null;
    private static $_instance;

    public $options = null;
    private $plugin_url;
    private $plugin_path;

    private function __construct() {
        $this->define_constants();
        $this->includes();
        $this->init_hooks();
    }

    private function init_hooks() {
        add_action('plugins_loaded', array( $this, 'load_plugin_textdomain' ));

        // add_action('wp_loaded', array( $this, 'maintenance_mode' ));
        

        add_action( 'init', array( $this, 'init' ), 0 );

        // add_filter( 'template_include', array( $this, 'template_include' ) );

        add_filter('widget_text', 'do_shortcode');

        // add_shortcode('gallery', '__return_false');
        
        add_action( 'widgets_init', array( $this, 'register_widgets' ) );
        



    }

    public function load_plugin_textdomain(){
        load_plugin_textdomain( 'monolit-add-ons', false, plugin_basename(dirname(BBT_PLUGIN_FILE)) . '/languages' );
    }


    public function register_widgets() {
        
        register_widget( 'Monolit_Recent_Posts' );
    }

    public static function getInstance() {
        if ( ! ( self::$_instance instanceof self ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    private function __clone() {
    }

    private function __wakeup() {
    }

    private function define_constants() {
        $upload_dir = wp_upload_dir( null, false );

        $this->define( 'BBT_ABSPATH', plugin_dir_path( BBT_PLUGIN_FILE ) );
        $this->define( 'BBT_DIR_URL', plugin_dir_url( BBT_PLUGIN_FILE ) );
        $this->define( 'BBT_VERSION', $this->cthversion );
        $this->define( 'BBT_META_PREFIX', '_cth_' );
        $this->define( 'BBT_DEBUG', true );
        $this->define( 'BBT_LOG_FILE', $upload_dir['basedir'] .'/cthdev.log' );


        $this->plugin_url = plugin_dir_url(BBT_PLUGIN_FILE);
        $this->plugin_path = plugin_dir_path(BBT_PLUGIN_FILE);
    }

    private function define( $name, $value ) {
        if ( ! defined( $name ) ) {
            define( $name, $value );
        }
    }

    public function is_request( $type ) {
        switch ( $type ) {
            case 'admin':
                return is_admin();
            case 'ajax':
                return defined( 'DOING_AJAX' );
            case 'frontend':
                return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
        }
    }

    private function includes() {
        require_once BBT_ABSPATH . 'includes/core-functions.php';
        require_once BBT_ABSPATH .'includes/class-cpt.php';

        // require_once BBT_ABSPATH .'includes/class-blocks.php';
        //CMB2
        if($this->is_request('admin')){
            // plugin option values
            require_once BBT_ABSPATH . 'includes/option_values.php';
            /* plugin options */
            require_once BBT_ABSPATH . 'includes/class-options.php';

            require_once BBT_ABSPATH . 'includes/class-admin-scripts.php';
            
            require_once BBT_ABSPATH . 'includes/cmb2-init.php';

            require_once BBT_ABSPATH . 'includes/class-import.php';
        }

        if($this->is_request('frontend')){
            require_once BBT_ABSPATH . 'includes/class-frontend-scripts.php';
            require_once BBT_ABSPATH . 'includes/class-ajax-handler.php';

            // require_once BBT_ABSPATH . 'inc/post_like.php';
        }



        require_once BBT_ABSPATH . 'includes/vc-elements.php';
        require_once BBT_ABSPATH . 'widgets/shortcodes.php';
        require_once BBT_ABSPATH . 'widgets/recent-posts.php';

    }

    public function init() {

    }

    public function maintenance_mode(){
        global $pagenow;
        $mode = monolit_addons_get_option('maintenance_mode');
        $demo_mode = isset($_GET['demo_mode'])? $_GET['demo_mode'] : '';
        if ( $pagenow !== 'wp-login.php' && ! current_user_can( 'manage_options' ) && ! is_admin() && !wp_doing_ajax() && ($mode == 'maintenance'||$mode=='coming_soon'||$demo_mode =='maintenance'||$demo_mode =='coming_soon') ) {
            // wp_redirect( home_url( ) );// redirect to home page first
            // header( $_SERVER["SERVER_PROTOCOL"] . __( ' 503 Service Temporarily Unavailable', 'monolit-add-ons' ), true, 503 );
            header( 'Content-Type: text/html; charset=utf-8' );
            if($mode == 'coming_soon'||$demo_mode =='coming_soon'){
                monolit_addons_get_template_part('template-parts/coming-soon');
            }else{
                header( 'Retry-After: 3600' );
                monolit_addons_get_template_part('template-parts/maintenance');
            } 
            die;
        }
    }

    public function template_include($template){
        if( is_post_type_archive('portfolio') || is_tax('portfolio_cat') ){
            $template = monolit_addons_get_template_part('template-parts/folio', 'archive', null, false);
        }
        return $template;
    }
}
