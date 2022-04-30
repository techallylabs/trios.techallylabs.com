<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Password Protected Page', 'monolit'),
    'id'         => 'password_protected',
    'subsection' => false,
    
    'icon'       => 'el-icon-lock',
    'fields' => array(
        array(
            'id' => 'bgpasspost',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Page Background Image', 'monolit'),
            //'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('This image will be used for background image in password protected page.', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'default' => array('url' => get_template_directory_uri().'/assets/images/bg/2.jpg'),
        ),
        array(
            'id'       => 'passpost_title',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show post title', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
        array(
            'id' => 'passpost_intro',
            'type' => 'editor',
            'title' => esc_html__('Page Message', 'monolit'),
            'subtitle' => '',
            'desc' => '',
            
            'default' => '<h3>Nullam sed sapien dui. Nulla auctor sit amet sem non porta. <br>Integer iaculis tellus nulla, quis imperdiet magna venenatis vitae.</h3>'
        ),
  
        
    ),
) );