<?php 
/* add_ons_php */

defined( 'ABSPATH' ) || exit;

class Bbt_Class_Admin_Scripts {  

    private static $plugin_url;

    public static function init(){
        self::$plugin_url = plugin_dir_url(BBT_PLUGIN_FILE); 

        // add_action( 'admin_footer', array(get_called_class(), 'price_templates') ); 

        add_action( 'admin_enqueue_scripts', array(get_called_class(), 'enqueue_scripts') );    
    }

    public static function price_templates(){
        ?>
        <script type="text/template" id="tmpl-user-social">
            <?php monolit_addons_get_template_part( 'template-parts/social' );?>
        </script>
        <?php
    }

    public static function enqueue_scripts($hook){
        wp_enqueue_media();
        // wp_enqueue_style( 'wp-color-picker');
        // wp_enqueue_script( 'wp-color-picker');
        // wp_enqueue_editor();
        
        // wp_enqueue_style( 'monolit-addon-icons', self::$plugin_url .'assets/css/monolit-icons.css' ); 

        wp_enqueue_style( 'monolit-add-ons', self::$plugin_url .'assets/css/admin.min.css' ); 

        

        wp_enqueue_script('monolit-addons-admin', self::$plugin_url . 'assets/js/addons-admin.min.js', array('jquery','jquery-ui-sortable'), null, true);
        
        // if($hook != 'settings_page_monolit-addons') {
        //     return;
        // }
        
        wp_enqueue_script('monolit_addons_image', self::$plugin_url . 'assets/js/upload_file.js', array('jquery'), null, true);

        // wp_enqueue_script('monolit-add-ons-options', self::$plugin_url . 'assets/js/addons-options.js', array('select2'), null, true);
    }

}

Bbt_Class_Admin_Scripts::init();