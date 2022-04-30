<?php
/* add_ons_php */

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'monolit_addons_vcSetAsTheme' );
function monolit_addons_vcSetAsTheme() {
    vc_set_as_theme($disable_updater = true);
}


function monolit_addons_vc_animation() {
    $animation = array(
        esc_html__('None', 'monolit-add-ons') => '', 
        esc_html__('BounceIn', 'monolit-add-ons') =>'bounceIn',
        esc_html__('BounceInUp', 'monolit-add-ons') =>'bounceInUp',
        esc_html__('BounceInDown', 'monolit-add-ons') =>'bounceInDown', 
        esc_html__('BounceInLeft', 'monolit-add-ons') =>'bounceInLeft',
        esc_html__('BounceInRight', 'monolit-add-ons') =>'bounceInRight',
        
        esc_html__('FadeIn', 'monolit-add-ons') =>'fadeIn',
        esc_html__('FadeInUp', 'monolit-add-ons') =>'fadeInUp', 
        esc_html__('FadeInDown', 'monolit-add-ons') =>'fadeInDown',
        esc_html__('FadeInLeft', 'monolit-add-ons') =>'fadeInLeft',
        esc_html__('FadeInRight', 'monolit-add-ons') =>'fadeInRight',
        
        esc_html__('ZoomIn', 'monolit-add-ons')  =>'zoomIn' ,
        esc_html__('ZoomInUp', 'monolit-add-ons')  =>'zoomInUp' , 
        esc_html__('ZoomInDown', 'monolit-add-ons')  =>'zoomInDown' , 
        esc_html__('ZoomInLeft', 'monolit-add-ons')  =>'zoomInLeft' , 
        esc_html__('ZoomInRight', 'monolit-add-ons')  =>'zoomInRight' ,

        esc_html__('RotateIn', 'monolit-add-ons')  =>'rotateIn' ,
        esc_html__('RotateInDownLeft', 'monolit-add-ons')  =>'rotateInDownLeft' ,
        esc_html__('RotateInDownRight', 'monolit-add-ons')  =>'rotateInDownRight' ,
        esc_html__('RotateInUpLeft', 'monolit-add-ons')  =>'rotateInUpLeft' ,
        esc_html__('RotateInUpRight', 'monolit-add-ons')  =>'rotateInUpRight' ,
    ); 
    return $animation;
}


function monolit_addons_register_wpbakerry_elements()
{
    //header
    require_once BBT_ABSPATH . 'includes/vc_elements/home_image.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/gmap.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/carousel_multiimgs.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/breadcrumb.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/post_title.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/portfolio_nav.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/portfolio_comment.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/partners.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/member.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/images_masonry.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/home_youtube.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/home_vimeo.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/home_slideshow.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/home_landing.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/counter.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/blog_parallax.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/blog_grid.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/timelines.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/testimonials.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/skills_bar.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/services.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/portfolios_parallax.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/portfolios_masonry.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/piechart.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/parallax_box.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/members_parallax.php';
    require_once BBT_ABSPATH . 'includes/vc_elements/home_slider.php';
    
}
add_action('vc_before_init', 'monolit_addons_register_wpbakerry_elements'); 



// Add new Param in Row
function monolit_add_ons_add_vc_param()
{
    if (function_exists('vc_set_shortcodes_templates_dir')) {
        vc_set_shortcodes_templates_dir(BBT_ABSPATH . '/vc_templates/');
    }

    $new_row_params = array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Monolit Predefined Section Layout', 'monolit-add-ons'),
            "param_name" => "cth_layout",
            "value" => array(   
                            esc_html__('Visual Composer - Default', 'monolit-add-ons') => 'default',  
                            esc_html__('Monolit Fullheight Section', 'monolit-add-ons') => 'monolit_fullheight_sec',
                            esc_html__('Monolit Page Section', 'monolit-add-ons') => 'monolit_page_sec',
                            esc_html__('Monolit Page Section Dark', 'monolit-add-ons') => 'monolit_page_dark_sec',
                            
                            esc_html__('Monolit Parallax Section - Portfolio Header', 'monolit-add-ons') => 'home_sec',
                            esc_html__('Monolit Portfolio Horizontal', 'monolit-add-ons') => 'portfolio_style2_wrap',
                            esc_html__('Monolit Portfolio Horizontal 3D', 'monolit-add-ons') => 'portfolio_style3_wrap',
                            esc_html__('Monolit Portfolio Horizontal Style2', 'monolit-add-ons') => 'portfolio_style4_wrap',
                            esc_html__('Monolit Portfolio Fullscreen Slider', 'monolit-add-ons') => 'portfolio_style7_wrap',
                            esc_html__('Monolit Portfolio Fullscreen Video', 'monolit-add-ons') => 'portfolio_style8_wrap',
                            esc_html__('Monolit Portfolio Fullscreen Vimeo Video', 'monolit-add-ons') => 'portfolio_style9_wrap', 
                          ),
            "description" => esc_html__("Select one of the pre made page sections or using default", 'monolit-add-ons'), 
            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ) ,
        array(
                            
            "type" => "dropdown",
            "heading" => esc_html__('No Padding', 'monolit-add-ons'),
            "param_name" => "no_sec_padding",
            "value" => array(   
                            'Yes' => 'yes',  
                            'No' => 'no',  
                                                                                                            
                        ),
            "std" => 'no',
            

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'monolit_page_sec','monolit_page_dark_sec','home_sec'),
                'not_empty' => false,
            ),


            "group" => "Monolit Theme",
        ),
        array(
                            
            "type"      => "textfield",
            "heading"   => esc_html__("Your Video ID", 'monolit-add-ons'),
            "param_name"=> "video_id",
            "value"     => "oDpSPNIozt8",
            "description" => esc_html__("Your Youtube video: oDpSPNIozt8 or Vimeo video: 143243001", 'monolit-add-ons'),
            

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style8_wrap','portfolio_style9_wrap'),
                'not_empty' => false,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "attach_image",
            // "class"=>"",
            "heading" => esc_html__('Video Background Image', 'monolit-add-ons'),
            "param_name" => "video_bg_id",
            
            // "description" => esc_html__("Select your parallax background image for left image page section layout.", 'monolit'), 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style8_wrap','portfolio_style9_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
                            
            "type" => "dropdown",
            "heading" => esc_html__('Video Quality', 'monolit-add-ons'),
            "param_name" => "video_quality",
            "value" => array(   
                            'default' => 'default',  
                            'small' => 'small',  
                            'medium' => 'medium',  
                            'large' => 'large',  
                            'hd720' => 'hd720',  
                            'hd1080' => 'hd1080',  
                            'highres' => 'highres', 
                                                                                                            
                        ),
            "std" => 'highres',
            

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style8_wrap'),
                'not_empty' => false,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
                            
            "type"          => "dropdown",
            "heading"       => esc_html__('Video Quality', 'monolit-add-ons'),
            "param_name"    => "vimeo_vid_quality",
            "value"         => array(   
                                esc_html__( '4K' , 'monolit-add-ons' )       => '4K',  
                                esc_html__( '2K' , 'monolit-add-ons' )       => '2K',  
                                esc_html__( '1080P' , 'monolit-add-ons' )    => '1080p',  
                                esc_html__( '720P' , 'monolit-add-ons' )     => '720p',  
                                esc_html__( '540P' , 'monolit-add-ons' )     => '540p',  
                                esc_html__( '360P' , 'monolit-add-ons' )     => '360p',                                                                            
            ),
            "std"           => '1080p', 
            

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style9_wrap'),
                'not_empty' => false,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
                            
            "type" => "dropdown",
            "heading" => esc_html__('Mute', 'monolit-add-ons'),
            "param_name" => "video_mute",
            "value" => array(   
                            esc_html__('Yes', 'monolit-add-ons') => '1',  
                            esc_html__('No', 'monolit-add-ons') => '0',                                                     
                        ),
            

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style8_wrap', 'portfolio_style9_wrap'),
                'not_empty' => false,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
                            
            "type" => "dropdown",
            "heading" => esc_html__('Loop', 'monolit-add-ons'),
            "param_name" => "video_loop",
            "value" => array(   
                            esc_html__('Yes', 'monolit-add-ons') => '1',  
                            esc_html__('No', 'monolit-add-ons') => '0',                                                     
                        ),
            

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array('portfolio_style9_wrap'),
                'not_empty' => false,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Is Header Section', 'monolit-add-ons'),
            "param_name" => "is_header_sec",
            "value" => array(
                        esc_html__('Yes', 'monolit-add-ons') => 'yes',  
                        esc_html__('No', 'monolit-add-ons') => 'no',
                                ),
            // "description" => esc_html__("Left or right position", 'monolit'),

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'home_sec'),
                'not_empty' => false,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "attach_images",
            // "class"=>"",
            "heading" => esc_html__('Portfolio Images', 'monolit-add-ons'),
            "param_name" => "gallery_images",
            // "value"=>'149,56,141,142,150,153,154,159,58,143,147,59',
            
            // "description" => esc_html__("Select your parallax background image for left image page section layout.", 'monolit'), 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap','portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Items", 'monolit-add-ons'),
            "param_name" => "items",
            "description" => esc_html__("The number of items you want to see on the screen. Ex: 3", 'monolit-add-ons'),
            "value" => "1",

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap','portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Responsive", 'monolit-add-ons'),
            "param_name" => "responsive",
            "description" => esc_html__("The format is: screen-size:number-items-display,larger-screen-size:number-items-display. Ex: 0:1,768:1,992:3,1200:3", 'monolit-add-ons'),
            "value" => "",

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Center", 'monolit-add-ons'),
            "param_name" => "center",
            "description" => esc_html__("Center item. Works well with even an odd number of items.", 'monolit-add-ons'),
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "std"=>'yes', 

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap','portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("smartSpeed", 'monolit-add-ons'),
            "param_name" => "smartspeed",
            "value"=>'1300',
            "description" => esc_html__("Speed Calculate, milisecond number. Ex: 250", 'monolit-add-ons'),

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap','portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Loop", 'monolit-add-ons'),
            "param_name" => "loop",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "std"=>'yes', 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap','portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Auto Width", 'monolit-add-ons'),
            "param_name" => "autowidth",
            "description" => esc_html__("Set non grid content. Try using width style on divs.", 'monolit-add-ons'),
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "std"=>'yes', 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap','portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Auto Play", 'monolit-add-ons'),
            "param_name" => "autoplay",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "std"=>'no', 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap','portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Show Zoom Image", 'monolit-add-ons'),
            "param_name" => "show_zoom",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array( 
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                  
            ),
            "std"=>'yes', 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap','portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Show Thumbnails", 'monolit-add-ons'),
            "param_name" => "show_thumbs",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array( 
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                  
            ),
            "std"=>'yes', 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap'),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Show Caption", 'monolit-add-ons'),
            "param_name" => "show_cap",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array( 
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                  
            ),
            "std"=>'yes', 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap'),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Show More Info", 'monolit-add-ons'),
            "param_name" => "show_more_info",
            // "description" => esc_html__("Boolen or number in mili-second (5000)", "monolit")
            "value" => array( 
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                  
            ),
            "std"=>'yes', 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'portfolio_style2_wrap','portfolio_style3_wrap','portfolio_style4_wrap','portfolio_style7_wrap','portfolio_style8_wrap','portfolio_style9_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Auto Height", 'monolit-add-ons'),
            "param_name" => "use_as_img",
            "description" => '',
            "value" => array(   
                esc_html__('No', 'monolit-add-ons') => 'no',  
                esc_html__('Yes', 'monolit-add-ons') => 'yes',   
            ),
            "std"=>'no', 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array('portfolio_style7_wrap' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "attach_image",
            // "class"=>"",
            "heading" => esc_html__('Parallax Background Image', 'monolit-add-ons'),
            "param_name" => "parallax_inner",
            
            // "description" => esc_html__("Select your parallax background image for left image page section layout.", 'monolit'), 
            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'monolit_fullheight_sec','monolit_page_sec','monolit_page_dark_sec','home_sec' ),
                'not_empty' => false,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
                            
            "type"      => "textfield",
            "heading"   => esc_html__("Youtube Video ID", 'monolit-add-ons'),
            "param_name"=> "head_video_id",
            "value"     => "",
            "description" => esc_html__("Your Youtube video: oDpSPNIozt8", 'monolit-add-ons'),
            

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'home_sec' ),
                'not_empty' => false,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type"      => "textfield",
            // "class"     => "",
            "heading"   => esc_html__("Overlay Opacity", 'monolit-add-ons'),
            "param_name"=> "parallax_inner_op",
            "value"     => "0.2",
            "description" => esc_html__("Overlay Opacity value 0.0 - 1. Ex: 0.2 or 0.8 for dark background", 'monolit-add-ons'),

            'dependency' => array(
                'element' => 'parallax_inner',
                //'value' => array( 'monolit_fullheight_sec','monolit_page_sec'),
                'not_empty' => true,
            ),

            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Background Parallax Value', 'monolit-add-ons'),
            "param_name" => "parallax_inner_val",
            "value" => "300",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Background Image down every time we scroll down 100% of the viewport height and move Background Image up every time we scroll up 100% of the viewport height. Ex: 300 or -300 for reverse direction.", 'monolit-add-ons'),

            'dependency' => array(
                'element' => 'parallax_inner',
                //'value' => array( 'monolit_fullheight_sec','monolit_page_sec'),
                'not_empty' => true,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Section Number', 'monolit-add-ons'),
            "param_name" => "sec_number",
            "value" => "",
            "description" => esc_html__("Section Number", 'monolit-add-ons'),

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'monolit_fullheight_sec','monolit_page_sec','monolit_page_dark_sec'),
                'not_empty' => false,
            ),
            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Section Number Position', 'monolit-add-ons'),
            "param_name" => "sec_number_pos",
            "value" => array(
                        esc_html__('Right Position', 'monolit-add-ons') => 'right',  
                        esc_html__('Left Position', 'monolit-add-ons') => 'left',
                                ),
            "description" => esc_html__("Left or right position", 'monolit-add-ons'),

            'dependency' => array(
                'element' => 'sec_number',
                //'value' => array( 'monolit_fullheight_sec','monolit_page_sec'),
                'not_empty' => true,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Section Number Parallax Value', 'monolit-add-ons'),
            "param_name" => "sec_number_par",
            "value" => "200",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Section Number down every time we scroll down 100% of the viewport height and move Section Number up every time we scroll up 100% of the viewport height. Ex: 200 or -200 for reverse direction.", 'monolit-add-ons'),

            'dependency' => array(
                'element' => 'sec_number',
                //'value' => array( 'monolit_fullheight_sec','monolit_page_sec'),
                'not_empty' => true,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Use Constellation Animation?', 'monolit-add-ons'),
            "param_name" => "use_constellation",
            "value" => array(
                        esc_html__('Yes', 'monolit-add-ons') => 'yes',  
                        esc_html__('No', 'monolit-add-ons') => 'no',
            ),
            "description" => '',
            'std'=>'no',

            'dependency' => array(
                'element' => 'cth_layout',
                'value' => array( 'monolit_fullheight_sec'),
                'not_empty' => false,
            ),


            "group" => esc_html__("Monolit Theme",'monolit-add-ons'),   
        ),
    );
    if (function_exists('vc_add_params')) {
        vc_add_params('vc_row', $new_row_params);
    }
    
    $animation_params = array(
        array(
            "type" => "dropdown",  
            "admin_label"   => true,
            "heading" => __('CSS Animation', 'monolit-add-ons'), 
            "param_name" => "ani_type", 
            "value" => monolit_addons_vc_animation(),
            "description" => __("Select type of animation for element to be animated when it \"enters\" the browsers viewport (Note: works only in modern browsers).", 'monolit-add-ons'), 
            "std" => '',
            "group" => __( 'Monolit Theme', 'monolit-add-ons' ),
        ),
        array(
            "type" => "textfield",
            "admin_label"   => true,
            "heading" => esc_html__("Animation Duration", 'monolit-add-ons'),
            "param_name" => "ani_time",
            "description" => esc_html__("Ex: 0.2s for 200 miliseconds, 2s for 2 second", 'monolit-add-ons'),
            "value" => "2s",
            'dependency' => array(
                'element' => 'ani_type',
                'not_empty' => true,
            ),
            "group" => __( 'Monolit Theme', 'monolit-add-ons' ),
        ),
        array(
            "type" => "textfield",
            "admin_label"   => true,
            "heading" => esc_html__("Animation delay", 'monolit-add-ons'),
            "param_name" => "ani_delay",
            "description" => esc_html__("Ex: 0.2s for 200 miliseconds, 2s for 2 second", 'monolit-add-ons'),
            "value" => "0.2s",
            'dependency' => array(
                'element' => 'ani_type',
                'not_empty' => true,
            ),
            "group" => __( 'Monolit Theme', 'monolit-add-ons' ),
        ),
    );

    // new columns animation
    // if (function_exists('vc_add_params')) {
    //     vc_add_params('vc_column', $animation_params);
    //     vc_add_params('vc_column_inner', $animation_params);
    //     vc_add_params('vc_single_image', $animation_params);
    // }

    // if( function_exists('vc_remove_param') ){ 
    //     // vc_remove_param( 'vc_column', 'css_animation' ); 
    //     // vc_remove_param( 'vc_single_image', 'css_animation' ); 
    // }

    // new themify icon
    // add_filter( 'vc_iconpicker-type-themify', 'monolit_addons_vc_iconpicker_type_themify' );

}

add_action('init', 'monolit_add_ons_add_vc_param');

// add_action('init', function(){
//     if (function_exists('vc_set_shortcodes_templates_dir')) {
//         vc_set_shortcodes_templates_dir( get_stylesheet_directory() . '/vc_templates/');
//     }
// }, 99 );

function monolit_addons_vc_iconpicker_type_themify($icons){
    $icons = monolit_addons_extract_themify();
    $icon_options = array();
    foreach ($icons as $icon) {
        // php 7.3
        // $icon_options['im '.array_key_first($icon)] = reset( $icon );
        $icotitle = reset( $icon );
        $icon_options[] = array( key($icon) => $icotitle ) ;
    }
    return $icon_options;

    // return monolit_addons_get_icon_themify();
}

// // change vc_templates from child theme
// add_action( 'init', function(){
//     if (function_exists('vc_set_shortcodes_templates_dir')) {
//         vc_set_shortcodes_templates_dir( get_stylesheet_directory() . '/vc_templates/');
//     }

// }, 20 );
