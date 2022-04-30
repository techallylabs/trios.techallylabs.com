<?php
/** 
 * get template part file related to plugin folder
 *
 */
if(!function_exists('monolit_addons_get_template_part')){
    /**
     * Load a template part into a template
     *
     * Makes it easy for a theme to reuse sections of code in a easy to overload way
     * for child themes.
     *
     * Includes the named template part for a theme or if a name is specified then a
     * specialised part will be included. If the theme contains no {slug}.php file
     * then no template will be included.
     *
     * The template is included using require, not require_once, so you may include the
     * same template part multiple times.
     *
     * For the $name parameter, if the file is called "{slug}-special.php" then specify
     * "special".
      * For the var parameter, simple create an array of variables you want to access in the template
     * and then access them e.g. 
     * 
     * array("var1=>"Something","var2"=>"Another One","var3"=>"heres a third";
     * 
     * becomes
     * 
     * $var1, $var2, $var3 within the template file.
     *
     * @since 2.0.3
     *
     * @param string $slug The slug name for the generic template.
     * @param string $name The name of the specialised template.
     * @param array $vars The list of variables to carry over to the template
     * @author CTHthemes 
     * @ref http://www.zmastaa.com/2015/02/06/php-2/wordpress-passing-variables-get_template_part
     * @ref http://keithdevon.com/passing-variables-to-get_template_part-in-wordpress/
     */
    function monolit_addons_get_template_part( $slug, $name = null, $vars = null, $include = true ) {

        $template = "{$slug}.php";
        $name = (string) $name;
        if ( '' !== $name ) {
            $template = "{$slug}-{$name}.php";
        }

        if(isset($vars)) extract($vars);
        if($located = locate_template( 'monolit-add-ons/'.$template )){
            if($include) 
                include $located;
            else 
                return $located;
        }else{
            if($include) 
                include BBT_ABSPATH.$template;
            else 
                return BBT_ABSPATH.$template;
            
        }
        // include(monolit_addons_locate_template($template));
        
    }

 //    function monolit_addons_locate_template($template_names, $load = false, $require_once = true ) {
    //  $located = '';
    //  foreach ( (array) $template_names as $template_name ) {
    //      if ( !$template_name )
    //          continue;
    //      if ( file_exists(BBT_ABSPATH . '/' . $template_name)) {
    //          $located = BBT_ABSPATH . '/' . $template_name;
    //          break;
    //      } elseif ( file_exists(BBT_ABSPATH . '/' . $template_name) ) {
    //          $located = BBT_ABSPATH . '/' . $template_name;
    //          break;
    //      } elseif ( file_exists( ABSPATH . WPINC . '/theme-compat/' . $template_name ) ) {
    //          $located = ABSPATH . WPINC . '/theme-compat/' . $template_name;
    //          break;
    //      }
    //  }

    //  if ( $load && '' != $located )
    //      load_template( $located, $require_once );

    //  return $located;
    // }
}


function monolit_addons_get_option( $setting, $default = null ) { 
    global $monolit_addons_options;

    $default_options = array(
        
        'maintenance_mode'                      => 'disable', 
    );
    $value = false;
    if ( isset( $monolit_addons_options[ $setting ] ) ) { 
        $value = $monolit_addons_options[ $setting ];
    }else {
        if(isset($default)){
            $value = $default;
        }else if( isset( $default_options[ $setting ] ) ){
            $value = $default_options[ $setting ];
        }
    }
    return $value;
}

add_action( 'monolit_login_additional', function(){
    monolit_addons_display_recaptcha('loginCaptcha');
} );
add_action( 'monolit_reg_additional', function(){
    monolit_addons_display_recaptcha('regCaptcha');
} );
add_action( 'monolit_advanced_reg_additional', function(){
    monolit_addons_display_recaptcha('adRegCaptcha');
} );


function monolit_addons_display_recaptcha($ele_id){
    if( monolit_addons_get_option('enable_g_recaptcah') == 'yes' && monolit_addons_get_option('g_recaptcha_site_key') != '' ) 
        echo '<div id="'.$ele_id.'" class="cth-recaptcha mt-20"></div>';
}

function monolit_addons_verify_recaptcha(){
        
    if( monolit_addons_get_option('enable_g_recaptcah') == 'yes' && monolit_addons_get_option('g_recaptcha_secret_key') != '' ){
        if( empty( $_POST['g-recaptcha-response'] ) ) return false;
        $response = wp_remote_post( 
            'https://www.google.com/recaptcha/api/siteverify' ,
            array(
                'body' =>   array(
                                'secret'   => monolit_addons_get_option('g_recaptcha_secret_key'),
                                'response' => $_POST['g-recaptcha-response'],
                                'remoteip' => isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']
                            )
            )
        );

        // return json_decode( $response['body'] ); // captcha: {success: true, challenge_ts: "2019-03-19T09:58:27Z", hostname: "localhost"}

        if( is_wp_error( $response ) || empty($response['body']) || ! ($json = json_decode( $response['body'] )) || ! $json->success ) {
            //return new WP_Error( 'validation-error',  __('reCAPTCHA validation failed. Please try again.' ) );
            return false;
        }

        return true;
    }

    return true;
}


// https://stackoverflow.com/questions/10808109/script-tag-async-defer
function monolit_addons_add_async_forscript($url)
{
    if(is_admin()){
        return str_replace(array('#cthasync','#cthdefer'), '', $url);
    }else{
        if(strpos($url, '#cthasync') !== false) $url = str_replace('#cthasync', '', $url)."' async='async"; 
        if(strpos($url, '#cthdefer') !== false) $url = str_replace('#cthdefer', '', $url)."' defer='defer"; 
    }

    return $url;
}
add_filter('clean_url', 'monolit_addons_add_async_forscript', 11, 1);
function monolit_addons_get_header_type_options(){
    $options = array(
        'use_global'      => __( 'Global', 'monolit-add-ons' ),
        'none'      => __( 'None', 'monolit-add-ons' ),
        
    );
    $posts = get_posts( array(
        'fields'            => 'ids',
        'post_type'         => 'cth_header',
        'posts_per_page'    => -1,
        'post_status'       => 'publish',

    ) );
    if($posts){
        foreach ($posts as $ltid) {
            $options[$ltid] = get_the_title( $ltid );
        }
    }
    return $options;
}
function monolit_addons_get_footer_type_options(){
    $options = array(
        'use_global'      => __( 'Global', 'monolit-add-ons' ),
        'none'      => __( 'None', 'monolit-add-ons' ),
        
    );
    $posts = get_posts( array(
        'fields'            => 'ids',
        'post_type'         => 'cth_footer',
        'posts_per_page'    => -1,
        'post_status'       => 'publish',

    ) );
    if($posts){
        foreach ($posts as $ltid) {
            $options[$ltid] = get_the_title( $ltid );
        }
    }
    return $options;
}

add_filter('monolit_plugin_header_style', function(){
    return true;
});

add_action('monolit_header_style', function(){
    $header_type = monolit_addons_get_option('header_type');
    $hide = false;
    if(is_singular()){
        $post_header = get_post_meta( get_the_ID(), '_cth_header_type', true );
        if($post_header == 'none'){
            $hide = true;
        }elseif( $post_header != '' && $post_header != 'use_global') 
            $header_type = $post_header;
    }
    if ($hide === false && !empty($header_type)) {
        $header_post = get_post($header_type);
        echo wpb_js_remove_wpautop(  $header_post->post_content );
    }
});
add_filter('monolit_plugin_footer_style', function(){
    return true;
});

add_action('monolit_footer_style', function(){
    $footer_type = monolit_addons_get_option('footer_type');
    $hide = false;
    if(is_singular()){
        $post_footer = get_post_meta( get_the_ID(), '_cth_footer_type', true );
        if($post_footer == 'none'){
            $hide = true;
        }elseif( $post_footer != '' && $post_footer != 'use_global') 
            $footer_type = $post_footer;
    }
    if ($hide === false && !empty($footer_type)) {
        $footer_post = get_post($footer_type);
        echo wpb_js_remove_wpautop(  $footer_post->post_content );
    }
});

add_filter( 'body_class', function($classes){
    $classes[] = 'monolit-has-addons';
    if ( is_singular() ) {
        if( get_post_meta( get_the_ID(), '_cth_footer_type', true ) == 'none') 
            $classes[] = 'monolit-hide-footer';
    }
    return $classes;
} );

function monolit_addons_portfolio_taxs($post_id = 0, $tax = 'portfolio_cat'){
    $terms = get_the_terms( $post_id, $tax );             
    if ( $terms && ! is_wp_error( $terms ) ){
     
        $tax_names = array();
     
        foreach ( $terms as $term ) {
            $tax_names[] = $term->name;
        }
                             
        $tax_names_text = join( ", ", $tax_names );

        return $tax_names_text;
    }
    return '';
}
function monolit_addons_color_skins(){
    $skins = array(
        'use_global'      => __( 'Global', 'monolit-add-ons' ),
        'skin-1' => __( 'Skin 1', 'monolit-add-ons' ),
        'color/skin-1' => __( 'Skin 1 - Color', 'monolit-add-ons' ),
        'skin-2' => __( 'Skin 2', 'monolit-add-ons' ),
        'color/skin-2' => __( 'Skin 2 - Color', 'monolit-add-ons' ),
        'skin-3' => __( 'Skin 3', 'monolit-add-ons' ),
        'color/skin-3' => __( 'Skin 3 - Color', 'monolit-add-ons' ),
        'skin-4' => __( 'Skin 4', 'monolit-add-ons' ),
        'color/skin-4' => __( 'Skin 4 - Color', 'monolit-add-ons' ),
    );
    return $skins;
}
add_filter( 'monolit_color_skin', function($skin){
    if ( is_singular() ) {
        $single_skin = get_post_meta( get_the_ID(), '_cth_skin', true );
        if( $single_skin != '' && $single_skin !== 'use_global') 
            return $single_skin;
    }
    return $skin;
}, 20 );

function monolit_addons_extract_themify(){
    $content =file_get_contents(BBT_ABSPATH.'assets/css/monolit-icons.css');
    $re = '/\.(ti-([\w-]+))/m';
    preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);
    // var_dump($matches);
    $icons = array();
    if($matches){
        foreach ($matches as $match) {
            $icons[] = array($match[1] => str_replace(array('-'), array(' '), $match[2]) );
        }
    }
    return $icons;
}

function monolit_addons_get_icon_themify() {
    $icons = monolit_addons_extract_themify();
    $icon_options = array();
    foreach ($icons as $icon) {
        // php 7.3
        // $icon_options['im '.array_key_first($icon)] = reset( $icon );
        $icotitle = reset( $icon );
        $icon_options[key($icon)] = $icotitle;
    }
    return $icon_options;
}

function monolit_addons_get_socials_list(){

    $socials = array(
        'facebook' => __( 'Facebook',  'monolit-add-ons' ),
        'twitter' => __( 'Twitter',  'monolit-add-ons' ),
        'youtube' => __( 'Youtube',  'monolit-add-ons' ),
        'vimeo' => __( 'Vimeo',  'monolit-add-ons' ),
        'instagram' => __( 'Instagram',  'monolit-add-ons' ),
        'vk' => __( 'Vkontakte',  'monolit-add-ons' ),
        'reddit' => __( 'Reddit',  'monolit-add-ons' ),
        'pinterest' => __( 'Pinterest',  'monolit-add-ons' ),
        'vine' => __( 'Vine Camera',  'monolit-add-ons' ),
        'tumblr' => __( 'Tumblr',  'monolit-add-ons' ),
        'flickr' => __( 'Flickr',  'monolit-add-ons' ),
        'google-plus-g' => __( 'Google+',  'monolit-add-ons' ),
        'linkedin' => __( 'LinkedIn',  'monolit-add-ons' ),
        'whatsapp' => __( 'Whatsapp',  'monolit-add-ons' ),
        'meetup' => __( 'Meetup',  'monolit-add-ons' ),
        'custom_icon' => __( 'Custom',  'monolit-add-ons' ),
    );

    return $socials ;

}  
// echo socials share content
function monolit_addons_echo_socials_share(){
    $widgets_share_names = monolit_addons_get_option('widgets_share_names',' facebook , twitter , pinterest ');
    if($widgets_share_names !=''):
    ?>
    <div class="share-holder share-post ml-auto">
        <div class="share-container" data-share="<?php echo esc_attr( $widgets_share_names ); ?>">
            <span class="share-lbl"><?php esc_html_e( 'SHARE: ', 'monolit-add-ons' ) ?></span>
        </div>
    </div>
    <?php
    endif;  
}

function monolit_addons_get_attachment_thumb( $id, $size = 'thumbnail', $icon = false ){
    $image_attributes = wp_get_attachment_image_src( $id, $size, $icon );
    if ( $image_attributes ) {
        return $image_attributes[0];
    }
    return '';
}



add_action('wp_ajax_nopriv_monolit_get_vc_attach_images', 'monolit_addons_get_vc_attach_images_callback');
add_action('wp_ajax_monolit_get_vc_attach_images', 'monolit_addons_get_vc_attach_images_callback');


function monolit_addons_get_vc_attach_images_callback() {
    $images = $_POST['images'];
    $html = $images;
    if($images != '') {
        $images = explode(",", $images);
        if(count($images)){
            $html = '';
            foreach ($images as $key => $img) {
                $html .= wp_get_attachment_image( $img, 'thumbnail', '', array('class'=>'monolit-ele-attach-thumb') );
            }
        }
    }
    wp_send_json($html );
}
