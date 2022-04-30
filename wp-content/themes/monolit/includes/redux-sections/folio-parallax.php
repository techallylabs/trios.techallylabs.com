<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Parallax Layout', 'monolit'),
    'id'         => 'portfolio-parallax-settings',
    'subsection' => true,
    
    // 'icon'       => 'el-icon-briefcase',
    'fields' => array(

        array(
            'id' => 'folio_parallax_first_side',
            'type' => 'select',
            'title' => esc_html__('First Content Side for Parallax layout', 'monolit'),
            // 'subtitle' => esc_html__('', 'monolit'),
            'desc' => '',
            'options' => array('left' => 'Left', 'right' => 'Right'), //Must provide key => value pairs for select options
            'default' => 'left'
        ),
        array(
            'id'       => 'folio_parallax_value',
            'type'     => 'text',
            'title'    => esc_html__( 'Parallax Dimension', 'monolit' ),
            'desc' => esc_html__( 'Pixel number. Which we are telling the browser is to move Portfolio Content down every time we scroll down 100% of the viewport height and move Portfolio Content up every time we scroll up 100% of the viewport height. Ex: 200  or -200 for reverse direction.', 'monolit' ),
            'default'  => '200',
        ),
        array(
            'id'       => 'folio_parallax_show_excerpt',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Post Excerpt on Parallax layout', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => false,
        ),
        array(
            'id'       => 'folio_parallax_show_meta',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Post Meta on Parallax layout', 'monolit' ),
            // 'subtitle' => esc_html__( '', 'monolit' ),
            'default'  => true,
        ),
    ),
) );