<?php 
/* add_ons_php */

defined( 'ABSPATH' ) || exit;

class Bbt_Class_Frontend_Scripts {

    private static $plugin_url;

    public static function init(){
        self::$plugin_url = plugin_dir_url(BBT_PLUGIN_FILE);    
        add_action( 'wp_enqueue_scripts', array(get_called_class(), 'enqueue_scripts') );
        // add_action( 'wp_footer', array(get_called_class(), 'footer_markup') );       
    }

    public static function footer_markup(){
        ?>
        <!-- Quik search -->
        <div class="dlab-quik-search">
            <form action="<?php echo esc_url(home_url( '/' ) ); ?>">
                <input name="s" value="<?php echo get_search_query() ?>" type="text" class="form-control" placeholder="<?php esc_attr_e( 'Enter Your Keyword ...', 'monolit-add-ons' ); ?>">
                <span id="quik-search-remove"><i class="ti-close"></i></span>
            </form>
        </div>
        <?php
    }
    public static function enqueue_scripts(){

        // wp_enqueue_style( 'monolit-addon-icons', self::$plugin_url .'assets/css/monolit-icons.css' ); 
        // wp_enqueue_style( 'monolit-add-ons', self::$plugin_url .'assets/css/monolit-add-ons.min.css' ); 

        wp_enqueue_script( 'monolit-addons', self::$plugin_url ."assets/js/monolit-add-ons.min.js" , array('jquery'), null , true );

        $_monolit_add_ons = array(
            'url'           => esc_url(admin_url( 'admin-ajax.php' ) ),
            'nonce'         => wp_create_nonce( 'monolit-add-ons' ),
            'like'          => esc_html__( 'Like', 'monolit-add-ons' ),
            'unlike'        => esc_html__( 'Unlike', 'monolit-add-ons' ),
            
            // 'gcaptcha'          => ( monolit_addons_get_option('enable_g_recaptcah') == 'yes' && monolit_addons_get_option('g_recaptcha_site_key') != '' )? true: false,
            // 'gcaptcha_key'      => monolit_addons_get_option('g_recaptcha_site_key'),
        );

        wp_localize_script( 'monolit-addons', '_monolit_add_ons', $_monolit_add_ons );

        // google reCAPTCHA - v2
        // if( monolit_addons_get_option('enable_g_recaptcah') == 'yes' && monolit_addons_get_option('g_recaptcha_site_key') != '' )
        //     wp_enqueue_script( 'g-recaptcha', "https://www.google.com/recaptcha/api.js?onload=cthCaptchaCallback&render=explicit#cthasync#cthdefer" , array('monolit-addons'), null , true );
    }
}

Bbt_Class_Frontend_Scripts::init();