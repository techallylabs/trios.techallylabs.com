<?php 
/* add_ons_php */
defined( 'ABSPATH' ) || exit;
function monolit_addons_get_plugin_options(){  
    return array(
        'general' => array(

            
            array(
                "type" => "section",
                'id' => 'general_style_opts',
                "title" => __( 'Style Options', 'monolit-add-ons' ),    
            ),

            array(
                "type" => "field",
                "field_type" => "select",
                'id' => 'header_type',
                "title" => __('Default Header Style', 'monolit-add-ons'),
                'args'=> array(
                    'options'=> monolit_addons_get_header_type_options(),
                )
            ),
            array(
                "type" => "field",
                "field_type" => "select",
                'id' => 'footer_type',
                "title" => __('Default Footer Style', 'monolit-add-ons'),
                'args'=> array(
                    'options'=> monolit_addons_get_footer_type_options(),
                )
            ),
            


        ),
        
        

        'widgets' => array(


            array(
                "type" => "section",
                'id' => 'mailchimp_sub_section',
                "title" => __( 'Mailchimp Section', 'monolit-add-ons' ),
            ),

            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'mailchimp_api',
                "title" => __('Mailchimp API key', 'monolit-add-ons'),
                'desc'  => '<a href="'.esc_url('http://kb.mailchimp.com/accounts/management/about-api-keys#Finding-or-generating-your-API-key').'" target="_blank">'.esc_html__('Find your API key','monolit-add-ons' ).'</a>'
            ),
            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'mailchimp_list_id',
                "title" => __('Mailchimp List ID', 'monolit-add-ons'),
                'desc'  => '<a href="'.esc_url('http://kb.mailchimp.com/lists/managing-subscribers/find-your-list-id').'" target="_blank">'.esc_html__('Find your list ID','monolit-add-ons' ).'</a>',
            ),
        
            array(
                "type" => "field",
                "field_type" => "info",
                'id' => 'mailchimp_shortcode',
                "title" => __('Subscribe Shortcode', 'monolit-add-ons'),
                'desc'  => wp_kses_post( __('Use the <code><strong>[monolit_subscribe]</strong></code> shortcode  to display subscribe form inside a post, page or text widget.
<br />Available Variables:<br />
<code><strong>message</strong></code> (Optional) - The message above subscription form.<br />
<code><strong>placeholder</strong></code> (Optional) - The form placeholder text.<br />
<code><strong>button</strong></code> (Optional) - The submit button text.<br />
<code><strong>list_id</strong></code> (Optional) - List ID. If you want user subscribe to a different list from the option above.<br />
<code><strong>class</strong></code> (Optional) - Your extraclass used to style the form.<br /><br />
Example: <code><strong>[monolit_subscribe list_id="b02fb5f96f" class="your_class_here"]</strong></code>', 'monolit-add-ons') )
                
            ),

            array(
                "type" => "section",
                'id' => 'tweets_section',
                "title" => __( 'Twitter Feeds Section', 'monolit-add-ons' ),
                'callback' => function($arg){ 
                    echo '<p>'.esc_html__('Visit ','monolit-add-ons' ).
                        '<a href="'.esc_url('https://apps.twitter.com' ).'" target="_blank">'.esc_html__("Twitter's Application Management",'monolit-add-ons' ).'</a> '
                        .__('page, sign in with your account, click on Create a new application and create your own keys if you haven\'t one.<br /> Fill all the fields bellow with those keys.','monolit-add-ons' ).
                        '</p>';  
                }
            ),

            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'consumer_key',
                "title" => __('Consumer Key', 'monolit-add-ons'),
                'desc'  => ''
            ),
            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'consumer_secret',
                "title" => __('Consumer Secret', 'monolit-add-ons'),
                'desc'  => ''
            ),
            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'access_token',
                "title" => __('Access Token', 'monolit-add-ons'),
                'desc'  => ''
            ),
            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'access_token_secret',
                "title" => __('Access Token Secret', 'monolit-add-ons'),
                'desc'  => ''
            ),
            array(
                "type" => "field",
                "field_type" => "info",
                'id' => 'tweets_shortcode',
                "title" => __('Access Token Secret', 'monolit-add-ons'),
                'desc'  => wp_kses_post( __('You can use <code><strong>monolit Twitter Feed</strong></code> widget or  <code><strong>[monolit_tweets]</strong></code> shortcode  to display tweets inside a post, page or text widget.
<br />Available Variables:<br />
<code><strong>username</strong></code> (Optional) - Option to load tweets from another account. Leave this empty to load from your own.<br />
<code><strong>list</strong></code> (Optional) - List name to load tweets from. If you define list name you also must define the <strong>username</strong> of the list owner.<br />
<code><strong>hashtag</strong></code> (Optional) - Option to load tweets with a specific hashtag.<br />
<code><strong>count</strong></code> (Required) - Number of tweets you want to display.<br />
<code><strong>list_ticker</strong></code> (Optional) - Display tweets as a list ticker?. Values: <strong>yes</strong> or <strong>no</strong><br />
<code><strong>follow_url</strong></code> (Optional) - Follow us link.<br />
<code><strong>extraclass</strong></code> (Optional) - Your extraclass used to style the form.<br /><br />
Example: <code><strong>[monolit_tweets count="3" username="CTHthemes" list_ticker="no" extraclass="your_class_here"]</strong></code>', 'monolit-add-ons') )
                
            ),
            // api weather
            array(
                "type" => "section",
                'id' => 'weather_api_section',
                "title" => __( 'Weather Section', 'monolit-add-ons' ),
            ),

            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'weather_api',
                "title" => __('Weather API key', 'monolit-add-ons'),
                'desc'  => '<a href="'.esc_url('https://openweathermap.org/api').'" target="_blank">'.esc_html__('Find your API key','monolit-add-ons' ).'</a>'
            ),
            // socials share
            array(
                "type" => "section",
                'id' => 'widgets_section_3',
                "title" => __( 'Socials Share', 'monolit-add-ons' ),
            ),
            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'widgets_share_names',
                "title" => __('Socials Share', 'monolit-add-ons'),
                'desc'  => __('Enter your social share names separated by a comma.<br /> List bellow are available names:<strong><br /> facebook,twitter,linkedin,in1,tumblr,digg,googleplus,reddit,pinterest,stumbleupon,email,vk</strong>', 'monolit-add-ons'),
                'args'=> array(
                    'default' => 'facebook, pinterest, googleplus, twitter, linkedin'
                ),
            ),


        ),
        // end tab array

        // end tab array
        'maintenance' => array(
            array(
                "type" => "section",
                'id' => 'maintenance_section_1',
                "title" => __( 'Status', 'monolit-add-ons' ),
            ),

            array(
                "type" => "field",
                "field_type" => "radio",
                'id' => 'maintenance_mode',
                "title" => __('Mode', 'monolit-add-ons'),
                'args'=> array(
                    'default'=> 'disable',
                    'options'=> array(
                        'disable' => __( 'Disable', 'monolit-add-ons' ),
                        // 'maintenance' => __( 'Maintenance', 'monolit-add-ons' ),
                        'coming_soon' => __( 'Coming Soon', 'monolit-add-ons' ),
                    ),
                    'options_block' => true
                )
            ),
//             array(
//                 "type" => "section",
//                 'id' => 'maintenance_section_2',
//                 "title" => __( 'Maintenance Options', 'monolit-add-ons' ),
//             ),

//             array(
//                 "type" => "field",
//                 "field_type" => "textarea",
//                 'id' => 'maintenance_msg',
//                 "title" => __('Message', 'monolit-add-ons'),
//                 'args' => array(
//                     'default'  => '<h3 class="soon-title">We\'ll be right back!</h3>
// <p>We are currently performing some quick updates. Leave us your email and we\'ll let you know as soon as we are back up again.</p>
// [monolit_subscribe message=""]
// <div class="cs-social fl-wrap">
// <ul>
// <li><a href="#" target="_blank" ><i class="fa fa-facebook-official"></i></a></li>
// <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
// <li><a href="#" target="_blank" ><i class="fa fa-chrome"></i></a></li>
// <li><a href="#" target="_blank" ><i class="fa fa-vk"></i></a></li>
// <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
// </ul>
// </div>',
//                 ),
//                 'desc'  => ''
//             ),

            array(
                "type" => "section",
                'id' => 'maintenance_section_3',
                "title" => __( 'Coming Soon Options', 'monolit-add-ons' ),
            ),
            array(
                "type" => "field",
                "field_type" => "textarea",
                'id' => 'coming_soon_msg',
                "title" => __('Message', 'monolit-add-ons'),
                'args' => array(
                    'default'  => '<h3 class="soon-title">Our website is coming soon!</h3>',
                ),
                'desc'  => ''
            ),

            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'coming_soon_email',
                "title" => __('Owner Email', 'monolit-add-ons'),
                'args' => array(
                    'default'  => 'support@domain.com',
                ),
                'desc'  => '',
            ),

            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'coming_soon_date',
                "title" => __('Coming Soon Date', 'monolit-add-ons'),
                'args' => array(
                    'default'  => '09/12/2021',
                ),
                'desc'  => __('The date should be DD/MM/YYYY format. Ex: 09/12/2021', 'monolit-add-ons'),
            ),
            array(
                "type" => "field",
                "field_type" => "text",
                'id' => 'coming_soon_time',
                "title" => __('Coming Soon Time', 'monolit-add-ons'),
                'args' => array(
                    'default'  => '10:30:00',
                ),
                'desc'  => __('The time should be hh:mm:ss format. Ex: 10:30:00', 'monolit-add-ons'),
            ),

            array(
                "type" => "field",
                "field_type" => "number",
                'id' => 'coming_soon_tz',
                "title" => __('Timezone Offset', 'monolit-add-ons'),
                'args' => array(
                    'default'  => '0',
                    'min'  => '-12',
                    'max'  => '14',
                    'step'  => '1',
                ),
                'desc'  => __('Timezone offset value from UTC', 'monolit-add-ons'),
            ),
            array(
                "type" => "field",
                "field_type" => "textarea",
                'id' => 'coming_soon_msg_after',
                "title" => __('Message After', 'monolit-add-ons'),
                'args' => array(
                    'default'  => '<h2><span>Coming soon</span><strong>days</strong></h2>
[monolit_subscribe]',
                ),
                'desc'  => ''
            ),

            array(
                "type" => "field",
                "field_type" => "image",
                'id' => 'coming_soon_bg',
                "title" => __('Background', 'monolit-add-ons'),
                'desc'  => ''
            ),


        ),
        // end tab array



    );
}