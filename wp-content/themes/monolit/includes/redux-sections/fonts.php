<?php
/* banner-php */

Redux::setSection( $opt_name, array(
    'title' => esc_html__('Fonts', 'monolit'),
    'id'         => 'font-settings',
    'subsection' => false,
    
    'icon'       => 'el-icon-font',
    'fields' => array(
        
        array(
            'id' => 'body-font',
            'type' => 'typography',
            'output' => array('body'),
            'title' => esc_html__('Body Font', 'monolit'),
            'desc' => wp_kses(__('<p>Specify the body font properties.</br> Default </br>font-family: Roboto </br>font-size: 12px </br>font-weight: 400 </br>color: #000000</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
        ),
        array(
            'id' => 'hyperlink-font',
            'type' => 'typography',
            'output' => array('a'),
            'title' => esc_html__('Hyperlink Font', 'monolit'),
            'desc' => wp_kses(__('<p>Hyperlink font properties.</br> Default </br>font-family: Roboto </br>font-size: 12px </br>font-weight: 400 </br>color: #000000</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
            // 'text-transform'=>true,
        ),
        array(
            'id' => 'hyperlink-hover-font',
            'type' => 'typography',
            'output' => array('a:hover'),
            'title' => esc_html__('Hyperlink Hover Font', 'monolit'),
            'desc' => wp_kses(__('<p>Hyperlink hover font properties.</br> Default </br>font-family: Roboto </br>font-size: 12px </br>font-weight: 400 </br>color: #000000</p>', 'monolit'),array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
            // 'text-transform'=>true,
        ),
        array(
            'id' => 'paragraph-font',
            'type' => 'typography',
            'output' => array('p'),
            'title' => esc_html__('Paragraph Font', 'monolit'),
            'desc' => wp_kses(__('<p>Specify paragraph font properties. Default </br>font-family: Roboto </br>font-size: 15px </br>line-height: 24px</br>font-weight: 400</br>color: #000000</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
        ),

        array(
            'id' => 'header-font',
            'type' => 'typography',
            'output' => array('h1, h2, h3, h4, h5, h6'),
            'title' => esc_html__('Title-Header Font', 'monolit'),
            'desc' => wp_kses(__('<p>Specify the title and heading font properties.</br> Default </br>font-family: Roboto </br>color: #000000</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
            'font-size'=> false,
            'line-height'=> true,
        ),
        array(
            'id' => 'monolit-second-font',
            'type' => 'typography',
            'output' => array('nav li a,.hero-wrap-item h2,.serv-details h3,.ser-list li,.inline-filter .gallery-filters a,.inline-filter .count-folio div,.filter-button,.round-counter div,.hid-sidebar h4 ,.pd-holder h5,.team-info h4,.footer-title h2,#submit , .form-submit button,.member-content-nav li a,.main-breadcrumb li > strong,.creat-list li a  , .text-link,.cat-item a,.lg-sub-html,.show-share span,.share-icon:before'),
            'title' => esc_html__('Monolit Theme Bolder Font', 'monolit'),
            'desc' => wp_kses(__('<p>This is bolder font used in the theme. Default </br>font-family: Muli</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
            'font-weight'=> false,
            'font-size'=> false,
            'line-height'=> false,
            'color'=> false,
            'text-align'=> false,

        ),
        array(
            'id' => 'monolit-third-font',
            'type' => 'typography',
            'output' => array('blockquote p'),
            'title' => esc_html__('Monolit Theme Italic Font', 'monolit'),
            'desc' => wp_kses(__('<p>Theme italic font. Default </br>font-family: Georgia, "Times New Roman", Times, serif </br>font-style: italic</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
        ),
        array(
            'id' => 'monolit-navigation-font',
            'type' => 'typography',
            'output' => array('nav li a'),
            'title' => esc_html__('Monolit Theme Navigation Font', 'monolit'),
            'desc' => wp_kses(__('<p>Theme navigation font. Default </br>font-family: Muli </br>font-size: 10px </br>line-height: 10px</br>font-weight: 600</br>color: #ffffff</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
        ),
        array(
            'id' => 'monolit-navigation-hover-font',
            'type' => 'typography',
            'output' => array('nav li a:hover'),
            'title' => esc_html__('Monolit Theme Navigation Hover Font', 'monolit'),
            'desc' => wp_kses(__('<p>Theme navigation hover font. Default </br>font-family: Muli </br>font-size: 10px </br>line-height: 10px</br>font-weight: 600</br>color: #e5e5e5</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
        ),
        array(
            'id' => 'monolit-left-title-font',
            'type' => 'typography',
            'output' => array('.footer-title h2,.footer-title h2 a,.footer-title h2 a:hover'),
            'title' => esc_html__('Monolit Left Title Font', 'monolit'),
            'desc' => wp_kses(__('<p>Theme left title font. Default </br>font-family: Muli </br>font-size: 10px </br>line-height: 16px</br>font-weight: 600</br>color: #ffffff</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
        ),
        
        array(
            'id' => 'monolit-hero-title-font',
            'type' => 'typography',
            'output' => array('.hero-wrap-item h2'),
            'title' => esc_html__('Monolit Header Title Font', 'monolit'),
            'desc' => wp_kses(__('<p>Theme header title font. Default </br>font-family: Muli </br>font-size: 38px </br>font-weight: 600 </br>color: #ffffff</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
            'font-weight'=> false,
            'font-size'=> false,
        ),
        array(
            'id' => 'monolit-hero-sub-title-font',
            'type' => 'typography',
            'output' => array('.hero-wrap-item h3, .hero-wrap-item h3 a'),
            'title' => esc_html__('Monolit Header SubTitle Font', 'monolit'),
            'desc' => wp_kses(__('<p>Theme header sub-title font. Default </br>font-family: Roboto </br>font-size: 18px </br>font-weight: 200 </br>color: #ffffff</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
            'font-weight'=> false,
            'font-size'=> false,
        ),
        array(
            'id' => 'monolit-section-title-font',
            'type' => 'typography',
            'output' => array('.section-title'),
            'title' => esc_html__('Page Section Title Font', 'monolit'),
            'desc' => wp_kses(__('<p>Theme page section title font. Default </br>font-family: Roboto </br>font-size: 40px </br>line-height: 64px </br>font-weight: 100</p>', 'monolit'), array( 'br'=>array(),'p'=>array(), ) ),
            'google' => true,
            'subsets'=> true,
            'font-size'=> false,
        ),
        
        
        
    ),
) );