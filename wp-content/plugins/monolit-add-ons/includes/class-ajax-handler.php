<?php 
/* add_ons_php */

defined( 'ABSPATH' ) || exit;


require_once BBT_ABSPATH .'includes/classes/Drewm/CTHMailChimp.php';

class Bbt_Class_Ajax_Handler{

    public static function init(){ 
        $not_logged_in_ajax_actions = array(
            'monolit-login',
            'monolit-register'
        );
        foreach ($not_logged_in_ajax_actions as $action) {
            $funname = str_replace('monolit_addons_', '', $action);
            $funname = str_replace('monolit-', '', $funname);
            add_action('wp_ajax_nopriv_'.$action, array( __CLASS__, $funname .'_callback' ));
        }
        $logged_in_ajax_actions = array(
            'monolit_mailchimp',
        );
        foreach ($logged_in_ajax_actions as $action) {
            $funname = str_replace('monolit_', '', $action);
            add_action('wp_ajax_nopriv_'.$action, array( __CLASS__, $funname .'_callback' ));
            add_action('wp_ajax_'.$action, array( __CLASS__, $funname .'_callback' ));
        }
    }

    public static function verify_nonce($action_name = ''){
        if (!isset($_REQUEST['_wpnonce']) || $action_name == '' || ! wp_verify_nonce( $_REQUEST['_wpnonce'], $action_name ) ){
            wp_send_json( array(
                'success'   => false,
                'error'     => esc_html__( 'Security checked!, Cheatn huh?', 'monolit-add-ons' )
            ) );
        }

    }

    public static function register_callback() {
        $json = array(
            'success' => false,
            'data' => array(
                '_POST'=>$_POST
            )
        );
        // var_dump($_POST);
        // wp_send_json($json );
        if( get_option( 'users_can_register' ) != 1){
            $json['error'] = esc_html__( 'User registration feature is disabled.', 'monolit-add-ons' ) ;
            wp_send_json($json );
        }

        //wp_send_json($json );

        // verify google reCAPTCHA
        if( monolit_addons_verify_recaptcha() === false ){
            $json['error'] = esc_html__( 'reCAPTCHA failed, please try again.', 'monolit-add-ons' ) ;
            wp_send_json($json );
        }

        self::verify_nonce('monolit-register');

        $new_user_data = array(
            'user_login' => $_POST['log'],
            'user_pass'  => wp_generate_password( 12, false ), // $_POST['password'], // // When creating an user, `user_pass` is expected.
        );
        if(isset($_POST['pwd'])){
            $new_user_data['user_pass'] = $_POST['pwd'];
        }
        if(isset($_POST['url'])){
            $new_user_data['user_url'] = $_POST['url'];
        }
        if(isset($_POST['email'])){
            $new_user_data['user_email'] = $_POST['email'];
        }
        if(isset($_POST['firstname'])){
            $new_user_data['first_name'] = $_POST['firstname'];
        }
        if(isset($_POST['lastname'])){
            $new_user_data['last_name'] = $_POST['lastname'];
        }


        $user_id = wp_insert_user( $new_user_data );

        //On success
        if ( ! is_wp_error( $user_id ) ) {
            $json['success'] = true;
            
            if( isset($_POST['redirection_url']) ) $json['redirection'] =  esc_url($_POST['redirection_url']); 

            
            $json['message'] = __( 'Successfully registered.', 'monolit-add-ons' );

        }else{
            $json['error'] = $user_id->get_error_message() ;
            $json['new_user_data'] = $new_user_data ;

        }

        wp_send_json( $json );

    }

    public static function login_callback() {

        $json = array(
            'success' => false,
            'data' => array(
                '_POST'=>$_POST
            )
        );

        // wp_send_json($json );

        // $json['captcha'] = monolit_addons_verify_recaptcha();

        // verify google reCAPTCHA
        if( monolit_addons_verify_recaptcha() === false ){
            $json['error'] = esc_html__( 'reCAPTCHA failed, please try again.', 'monolit-add-ons' ) ;
            wp_send_json($json );
        }

        self::verify_nonce('monolit-login');

        
        // https://codex.wordpress.org/Function_Reference/wp_signon
        // NOTE: If you don't provide $credentials, wp_signon uses the $_POST variable (the keys being "log", "pwd" and "rememberme").
        
        // set the WP login cookie
        $secure_cookie = is_ssl() ? true : false;
        $user = wp_signon( NULL, $secure_cookie );

        if ( is_wp_error($user) ) {
            $json['error'] = $user->get_error_message();
        } else {
            $json['success'] = true;
            do_action( 'monolit_addons_user_login' );
            // monolit_addons_auto_login_new_user( $user->ID );

            $json['userID'] = $user->ID;
            if( isset($_POST['redirection_url']) ) $json['redirection'] =  esc_url($_POST['redirection_url']); 

            $json['message'] = __( 'Login success! The page will be reload.', 'monolit-add-ons' );
        }

        wp_send_json($json );
    }

    public static function mailchimp_callback() {
        $output = array();
        $output['success'] = 'no';
        $output['debug'] = false;



        if ( ! isset( $_POST['_nonce'] ) || ! wp_verify_nonce( $_POST['_nonce'], 'monolit_mailchimp' ) ){
            $output['message'] = esc_html__('Sorry, your nonce did not verify.','monolit-add-ons' );
            wp_send_json( $output );
        }
        if(isset($_POST['_list_id'])&& $_POST['_list_id']){
            $list_id = $_POST['_list_id'];
        }else{
            $list_id = monolit_addons_get_option('mailchimp_list_id'); 
        }

        /*
         * ------------------------------------
         * Mailchimp Email Configuration
         * ------------------------------------
         */
        $MailChimp = new CTH_MailChimp( monolit_addons_get_option('mailchimp_api') );

        $result = $MailChimp->post("lists/$list_id/members", array(
            'email_address' => $_POST['email'],
            'status'        => 'subscribed'
        ) );

        if ($MailChimp->success()) {
            $output['success'] = 'yes';
            $output['message'] = esc_html__('Almost finished. Please check your email and verify.','monolit-add-ons' );
            $output['last_response'] = $MailChimp->getLastResponse();
        } else {
            $output['message'] = esc_html__('Oops. Something went wrong!','monolit-add-ons' );
            $output['last_response'] = $MailChimp->getLastResponse();
        }

        wp_send_json( $output );
    }

    
  
}   
    

Bbt_Class_Ajax_Handler::init();