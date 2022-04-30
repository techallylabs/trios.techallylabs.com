<?php
/* add_ons_php */

function monolit_addons_dynamic_menu_options(){
    $monolit_options = get_option( 'monolit_options', array() );
    $return = array();
    if(!empty($monolit_options['dynamic_menus'])){
        foreach ($monolit_options['dynamic_menus'] as $key => $location) {
            $return[sanitize_title($location )] = $location;
        }
    }

    return $return;
}


/**
 * Gets a number of terms and displays them as options
 * @param  string       $taxonomy Taxonomy terms to retrieve. Default is category.
 * @param  string|array $args     Optional. get_terms optional arguments
 * @return array                  An array of options that matches the CMB2 options array
 */
function monolit_addons_get_term_options( $taxonomy = 'category', $args = array() ) {

    $args['taxonomy'] = $taxonomy;
    // $defaults = array( 'taxonomy' => 'category' );
    $args = wp_parse_args( $args, array( 'taxonomy' => 'category' ) );

    $taxonomy = $args['taxonomy'];

    $terms = get_terms( $taxonomy, $args );
    //var_dump($terms);die;
    // Initate an empty array
    $term_options = array();
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
            if(isset($term))
            $term_options[ $term->term_id ] = $term->name;
        }
    }

    return $term_options;
}


add_action( 'cmb2_admin_init', 'monolit_addons_cmb2_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function monolit_addons_cmb2_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_monolit_';

    /**
     * Initiate Post metabox
     */
    $post_cmb = new_cmb2_box( array(
        'id'            => 'post_options',
        'title'         => esc_html__( 'Post Format Options', 'monolit-add-ons' ),
        'object_types'  => array( 'post'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'high',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $post_cmb->add_field( array(
        'name' => esc_html__('Post Slider Images', 'monolit-add-ons' ),
        'desc' => esc_html__('These images will be use in Gallery post format only.', 'monolit-add-ons' ),
        'id'   => $prefix . 'post_slider_images',
        'type' => 'file_list',
        'preview_size' => array( 150, 150 ), // Default: array( 50, 50 )
        // Optional, override default text strings
        // 'options' => array(
        //     'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
        //     'remove_image_text' => 'Replacement', // default: "Remove Image"
        //     'file_text' => 'Replacement', // default: "File:"
        //     'file_download_text' => 'Replacement', // default: "Download"
        //     'remove_text' => 'Replacement', // default: "Remove"
        // ),
    ) );

    $post_cmb->add_field( array(
        'name'       => esc_html__('oEmbed for Post Format', 'monolit-add-ons' ),
        'desc'       => wp_kses(__('Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'monolit-add-ons' ),array('a'=>array('href'=>array()))),
        'id'   => $prefix . 'embed_video',
        'type' => 'oembed',
    ) );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Initiate Post metabox 2
     */
    $post2_cmb = new_cmb2_box( array(
        'id'            => 'post_layout_options',
        'title'         => esc_html__( 'Post Layout Options', 'monolit-add-ons' ),
        'object_types'  => array( 'post'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'high',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $post2_cmb->add_field( array(
        'name'    => esc_html__('Fullwidth Navigation Menu', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id'      => $prefix . 'fullwidth_nav_menu',
        'type'             => 'radio_inline',
        // 'show_option_none' => false,
        'default'          => 'yes',
        'options' => array(
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
        ),
    ) );

    $post2_cmb->add_field( array(
        'name' => esc_html__('Show Post Header', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_post_header',
        'type'    => 'radio_inline',
        'default'=>'no',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $post2_cmb->add_field( array(
        'name' => esc_html__('Show Post Title', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_post_title',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $post2_cmb->add_field( array(
        'name' => esc_html__('Show Breadcrumbs', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_post_breadcrumbs',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $post2_cmb->add_field( array(
        'name' => esc_html__( 'Header Video Background', 'monolit-add-ons' ),
        'desc' => esc_html__( 'Please enter your Youtube video ID (ex: oDpSPNIozt8 ) here to use header background video feature or leave empty to use header background image selected bellow.', 'monolit-add-ons' ),
        'id'   => $prefix . 'post_header_video',
        'default' => '',
        'type'    => 'text',
    ) );

    $post2_cmb->add_field( array(
        'name' => esc_html__('Header Image Background (Main background for Home Landing Page template)', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'post_header_bg',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => true, // Hide the text input for the url
            // 'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );


    $post2_cmb->add_field( array(
        'name' => esc_html__('Header Additional Info', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Post Subtitle show in header section','monolit'),
        'id'   => $prefix . 'post_header_intro',
        // 'default' => 'standard value (optional)',
        'type' => 'textarea_small'
    ) );


    $post2_cmb->add_field( array(
        'name' => esc_html__( 'Single Layout', 'monolit-add-ons' ),
        'desc' => esc_html__( 'Choose display layout for this post', 'monolit-add-ons' ),
        'id' => $prefix . 'single_layout',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'right_sidebar',
        'options'          => array(
            'fullwidth' => esc_html__( 'Fullwidth', 'monolit-add-ons' ),
            'right_sidebar' => esc_html__( 'Right Sidebar', 'monolit-add-ons' ),
            'left_sidebar' => esc_html__( 'Left Sidebar', 'monolit-add-ons' ),
        ),
    ) );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Initiate Portfolio metabox
     */
    $folio_cmb = new_cmb2_box( array(
        'id'            => 'porfolio_list_fields',
        'title'         => esc_html__('Portfolio List Options', 'monolit-add-ons' ),
        'object_types'  => array( 'portfolio'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'high',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $folio_cmb->add_field( array(
        'name' => esc_html__('Video Link', 'monolit-add-ons' ),
        'desc' => wp_kses(__('Enter a youtube, twitter, or instagram URL to display video as a thumbnail. Supports services listed at <a href="http://codex.wordpress.org/Embeds" target="_blank">http://codex.wordpress.org/Embeds</a>.', 'monolit-add-ons' ),array('a'=>array('href'=>array(),'target'=>array()))),
        'id'   => $prefix . 'folio_video',
        'type' => 'oembed',
    ) );

    $folio_cmb->add_field( array(
        'name' => esc_html__( 'Masonry Size', 'monolit-add-ons' ),
        'desc' => esc_html__( 'Choose the size of item thumbnail that show in portfolio masonry grid. You must select a Feature image for this portfolio item.', 'monolit-add-ons' ),
        'id' => $prefix . 'masonry_size',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'one',
        'options' => array(
            'one' => esc_html__( 'Size One', 'monolit-add-ons' ),
            //'one-tall' => esc_html__( 'Size One - Two Tall', 'monolit' ),
            'second' => esc_html__( 'Size Two', 'monolit-add-ons' ),
            'three' => esc_html__( 'Size Three', 'monolit-add-ons' ),
            // 'free' => esc_html__( 'Size Free', 'monolit' ),
        ),
    ) );

    $folio_cmb->add_field( array(
        'name' => esc_html__('Popup Image or Video', 'monolit-add-ons' ),
        'desc' => esc_html__('Select image or Youtube, Vimeo video link for popup. Leave empty for single portfolio page link.', 'monolit-add-ons' ),
        'id'   => $prefix . 'folio_popup_link',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => true, // Hide the text input for the url
            // 'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Initiate Portfolio metabox 2
     */
    $folio2_cmb = new_cmb2_box( array(
        'id'            => 'porfolio_style_fields',
        'title'         => esc_html__('Portfolio Layout Options', 'monolit-add-ons' ),
        'object_types'  => array( 'portfolio'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'high',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $folio2_cmb->add_field( array(
        'name'    => esc_html__('Fullwidth Navigation Menu', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id'      => $prefix . 'fullwidth_nav_menu',
        'type'             => 'radio_inline',
        // 'show_option_none' => false,
        'default'          => 'no',
        'options' => array(
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
        ),
    ) );

    $folio2_cmb->add_field( array(
        'name'    => esc_html__('Show Content Footer', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id'      => $prefix . 'folio_single_footer',
        'type'             => 'radio_inline',
        // 'show_option_none' => false,
        'default'          => 'no',
        'options' => array(
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
        ),
    ) );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Initiate Page metabox
     */
    $page_cmb = new_cmb2_box( array(
        'id'            => 'des_header',
        'title'         => esc_html__('Page Layout Options', 'monolit-add-ons' ),
        'object_types'  => array( 'page'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'high',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $page_cmb->add_field( array(
        'name'    => esc_html__('Fullwidth Navigation Menu', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id'      => $prefix . 'fullwidth_nav_menu',
        'type'             => 'radio_inline',
        // 'show_option_none' => false,
        'default'          => 'no',
        'options' => array(
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
        ),
    ) );

    $page_cmb->add_field( array(
        'name' => esc_html__('Show Page Header', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_page_header',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $page_cmb->add_field( array(
        'name' => esc_html__('Show Page Title', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_page_title',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $page_cmb->add_field( array(
        'name' => esc_html__('Shows Breadcrumbs', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_page_breadcrumbs',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $page_cmb->add_field( array(
        'name' => esc_html__( 'Header Video Background', 'monolit-add-ons' ),
        'desc' => esc_html__( 'Please enter your Youtube video ID (ex: oDpSPNIozt8 ) here to use header background video feature or leave empty to use header background image selected bellow.', 'monolit-add-ons' ),
        'id'   => $prefix . 'page_header_video',
        'default' => '',
        'type'    => 'text',
    ) );

    $page_cmb->add_field( array(
        'name' => esc_html__('Header Image Background (Main background for Home Landing Page template)', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'page_header_bg',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => true, // Hide the text input for the url
            // 'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );


    $page_cmb->add_field( array(
        'name' => esc_html__('Header Additional Info  (Main Title for Home Landing Page template)', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Post Subtitle show in header section','monolit'),
        'id'   => $prefix . 'page_header_intro',
        // 'default' => 'standard value (optional)',
        'type' => 'textarea_small'
    ) );

    $page_cmb->add_field( array(
        'name'    => esc_html__('Show Content Footer', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id'      => $prefix . 'folio_content_footer',
        'type'             => 'radio_inline',
        // 'show_option_none' => false,
        'default'          => 'yes',
        'options' => array(
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Initiate Page metabox 2
     */
    $page2_cmb = new_cmb2_box( array(
        'id'            => 'portfolio_page',
        'title'         => esc_html__('Portfolio Page Template Options', 'monolit-add-ons' ),
        'object_types'  => array( 'page'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'high',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $page2_cmb->add_field( array(
        'name'    => esc_html__('Show Filter (for Portfolio template only)', 'monolit-add-ons' ),
        'id'      => $prefix . 'folio_show_filter',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
        ),
    ) );
    $page2_cmb->add_field( array(
        'name'    => esc_html__('Show Counter', 'monolit-add-ons' ),
        'id'      => $prefix . 'folio_show_counter',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
        ),
    ) );

    $page2_cmb->add_field( array(
        'name'    => esc_html__('Show Info (for Portfolio Grid and Masonry templates)', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Choose the size of item thumbnail that show in portfolio masonry grid. You must select a Feature image for this portfolio item.', 'monolit' ),
        'id'      => $prefix . 'folio_show_info',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'no',
        'options' => array(
            'yes'   => esc_html__( 'Show', 'monolit-add-ons' ),
            'no'     => esc_html__( 'Show on hover', 'monolit-add-ons' ),
            'hide'     => esc_html__( 'Hide', 'monolit-add-ons' ),
        ),
    ) );

    $page2_cmb->add_field( array(
        'name' => esc_html__('Portfolio Categories (for Portfolio template only)', 'monolit-add-ons' ),
        'desc' => esc_html__('Select portfolio categories to get items from. For Portfolio page templates only.', 'monolit-add-ons' ),
        'id' => $prefix . 'portfolio_categories',
        'type'    => 'multicheck',
        'options' => monolit_addons_get_term_options('portfolio_cat')
    ) );


    $page2_cmb->add_field( array(
        'name' => esc_html__( 'Exclude Portfolio Items', 'monolit-add-ons' ),
        'desc' => esc_html__( 'Portfolio ids separated by comma. Include Portfolio Items field must blank.', 'monolit-add-ons' ),
        'id'   => $prefix . 'folio_exclude',
        'default' => '',
        'type'    => 'text',
    ) );

    $page2_cmb->add_field( array(
        'name' => esc_html__( 'Include Portfolio Items', 'monolit-add-ons' ),
        'desc' => esc_html__( 'Portfolio ids separated by comma. Exclude Portfolio Items field must blank.', 'monolit-add-ons' ),
        'id'   => $prefix . 'folio_include',
        'default' => '',
        'type'    => 'text',
    ) );

    $page2_cmb->add_field( array(
        'name' => esc_html__( 'Items per page (-1 for all)', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'field description (optional)', 'monolit' ),
        'id'   => $prefix . 'portfolio_count',
        'default' => '-1',
        'type'    => 'text',
    ) );

    $page2_cmb->add_field( array(
        'name' => esc_html__( 'Order By', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id' => $prefix . 'folio_orderby',
        'type'             => 'select',
        'show_option_none' => false,
        'repeatable'      => false,
        'options' => array(
            'date' => esc_html__( 'Date', 'monolit-add-ons' ),
            'ID' => esc_html__( 'ID', 'monolit-add-ons' ),
            'author' => esc_html__( 'Author', 'monolit-add-ons' ),
            'name' => esc_html__( 'Name', 'monolit-add-ons' ),
            'title' => esc_html__( 'Title', 'monolit-add-ons' ),
            'modified' => esc_html__( 'Modified', 'monolit-add-ons' ),
            'rand' => esc_html__( 'Random', 'monolit-add-ons' ),
        ),
        // 'default'          => 'date',
    ) );

    $page2_cmb->add_field( array(
        'name' => esc_html__( 'Order', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id' => $prefix . 'folio_order',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'DESC',
        'options' => array(
            'DESC' => esc_html__( 'Descending', 'monolit-add-ons' ),
            'ASC' => esc_html__( 'Ascending', 'monolit-add-ons' ),
        ),
    ) );

    $page2_cmb->add_field( array(
        'name' => esc_html__( 'Columns Layout (for Portfolio Grid and Masonry templates)', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id' => $prefix . 'folio_columns',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'four',
        'options' => array(
            //'six' => esc_html__( 'Six Columns', 'monolit' ),
            'five' => esc_html__( 'Five Columns', 'monolit-add-ons' ),
            'four' => esc_html__( 'Four Columns', 'monolit-add-ons' ),
            'three' => esc_html__( 'Three Columns', 'monolit-add-ons' ),
            'two' => esc_html__( 'Two Columns', 'monolit-add-ons' ),
            'one' => esc_html__( 'One Column', 'monolit-add-ons' ),
        ),
    ) );

    $page2_cmb->add_field( array(
        'name' => esc_html__( 'Spacing', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id' => $prefix . 'folio_pad',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'small',
        'options' => array(
            'small' => esc_html__( 'Small', 'monolit-add-ons' ),
            'big' => esc_html__( 'Big', 'monolit-add-ons' ),
            'none' => esc_html__( 'None', 'monolit-add-ons' ),
        ),
    ) );

    $page2_cmb->add_field( array(
        'name'    => esc_html__('Enable Image Gallery on Portfolio Grid', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id'      => $prefix . 'folio_enable_gallery',
        'type'             => 'radio_inline',
        // 'show_option_none' => false,
        'default'          => 'no',
        'options' => array(
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
        ),
    ) );

    $page2_cmb->add_field( array(
        'name'    => esc_html__('Disbale Image Overlay Effect', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id'      => $prefix . 'folio_disable_overlay',
        'type'             => 'radio_inline',
        // 'show_option_none' => false,
        'default'          => 'no',
        'options' => array(
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
        ),
    ) );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    /**
     * Initiate Page, Post and Portfolio metabox
     */
    $page_post_folio_cmb = new_cmb2_box( array(
        'id'         => 'dynamic_navigation_fields',
        'title'      => esc_html__('Scroll Navigation Menu', 'monolit-add-ons' ),
        'object_types'  => array( 'page', 'post','portfolio'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'high',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $page_post_folio_cmb->add_field( array(
        'name' => esc_html__( 'Scroll Navigation Menu', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id' => $prefix . 'dynamic_menu',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '',
        'options' => monolit_addons_dynamic_menu_options(),
    ) );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    /**
     * Initiate Timeline metabox
     */
    $timeline_cmb = new_cmb2_box( array(
        'id'         => 'timeline_metabox_fields',
        'title'      => esc_html__('Timeline Options', 'monolit-add-ons' ),
        'object_types'  => array( 'monolit_timeline'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'high',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $timeline_cmb->add_field( array(
        'name' => esc_html__('Addition Info', 'monolit-add-ons' ),
        'desc' => esc_html__('This info will display on the left side, bellow timeline title','monolit-add-ons'),
        'id'   => $prefix . 'timeline_add_info',
        // 'default' => 'standard value (optional)',
        'type' => 'textarea'
    ) );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Initiate Member metabox
     */
    $member_cmb = new_cmb2_box( array(
        'id'            => 'member_layout_options',
        'title'         => esc_html__( 'Member Layout Options', 'monolit-add-ons' ),
        'object_types'  => array( 'monolit_member'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'high',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $member_cmb->add_field( array(
        'name'    => esc_html__('Fullwidth Navigation Menu', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id'      => $prefix . 'fullwidth_nav_menu',
        'type'             => 'radio_inline',
        // 'show_option_none' => false,
        'default'          => 'yes',
        'options' => array(
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
        ),
    ) );

    $member_cmb->add_field( array(
        'name' => esc_html__('Show Member Header', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_member_header',
        'type'    => 'radio_inline',
        'default'=>'no',
        'options' => array(
            
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
            
        ),
    ) );

    $member_cmb->add_field( array(
        'name' => esc_html__('Show Member Title', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_member_title',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $member_cmb->add_field( array(
        'name' => esc_html__('Show Breadcrumbs', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_member_breadcrumbs',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $member_cmb->add_field( array(
        'name' => esc_html__( 'Header Video Background', 'monolit-add-ons' ),
        'desc' => esc_html__( 'Please enter your Youtube video ID (ex: oDpSPNIozt8 ) here to use header background video feature or leave empty to use header background image selected bellow.', 'monolit-add-ons' ),
        'id'   => $prefix . 'member_header_video',
        'default' => '',
        'type'    => 'text',
    ) );

    $member_cmb->add_field( array(
        'name' => esc_html__('Header Image Background (Main background for Home Landing Page template)', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'member_header_bg',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => true, // Hide the text input for the url
            // 'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );



    $member_cmb->add_field( array(
        'name' => esc_html__( 'Single Layout', 'monolit-add-ons' ),
        'desc' => esc_html__( 'Choose display layout for this post', 'monolit-add-ons' ),
        'id' => $prefix . 'single_layout',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'fullwidth',
        'options'          => array(
            'fullwidth' => esc_html__( 'Fullwidth', 'monolit-add-ons' ),
            'right_sidebar' => esc_html__( 'Right Sidebar', 'monolit-add-ons' ),
            'left_sidebar' => esc_html__( 'Left Sidebar', 'monolit-add-ons' ),
        ),
    ) );


    ///////////////////////////////

    $wooproduct_cmb = new_cmb2_box( array(
        'id'            => 'product_layout_options',
        'title'         => esc_html__( 'For Monolit Theme Options', 'monolit-add-ons' ),
        'object_types'  => array( 'product'), // Post type
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'default',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $wooproduct_cmb->add_field( array(
        'name' => esc_html__('Header Image Background', 'monolit-add-ons' ),
        'id'   => $prefix . 'page_header_bg',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => true, // Hide the text input for the url
        ),
    ) );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Initiate User Profile metabox
     */
    $user_cmb = new_cmb2_box( array(
        'id'         => 'user_edit',
        'title'      => esc_html__( 'User Profile Metabox', 'monolit-add-ons' ),
        'object_types'  => array( 'user' ), // Tells CMB to use user_meta vs post_meta
        'context'       => 'normal',// normal, side and advanced
        'priority'      => 'core',// default, high and low - core
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $user_cmb->add_field( array(
        'name'     => esc_html__( 'Extra Info', 'monolit-add-ons' ),
        // 'desc'     => esc_html__( 'field description (optional)', 'monolit' ),
        'id'       => $prefix . 'exta_info',
        'type' => 'title',
        'on_front' => false,
    ) );

    $user_cmb->add_field( array(
        'name'    => esc_html__('Fullwidth Navigation Menu', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'Overlay color that show when hover the service thumbnail in the list.', 'monolit' ),
        'id'      => $prefix . 'fullwidth_nav_menu',
        'type'             => 'radio_inline',
        // 'show_option_none' => false,
        'default'          => 'yes',
        'options' => array(
            'yes'   => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'     => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $user_cmb->add_field( array(
        'name' => esc_html__('Show User Header', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_user_header',
        'type'    => 'radio_inline',
        'default'=>'no',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    $user_cmb->add_field( array(
        'name'    => esc_html__( 'Header Background Image', 'monolit-add-ons' ),
        // 'desc'    => esc_html__( 'field description (optional)', 'monolit' ),
        'id'      => $prefix . 'user_header_img',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => true, // Hide the text input for the url
            // 'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $user_cmb->add_field( array(
        'name' => esc_html__('Show User Info Block', 'monolit-add-ons' ),
        // 'desc' => esc_html__('Select an image for resume grid view','monolit'),
        'id'   => $prefix . 'show_user_info',
        'type'    => 'radio_inline',
        'default'=>'yes',
        'options' => array(
            'yes' => esc_html__( 'Yes', 'monolit-add-ons' ),
            'no'   => esc_html__( 'No', 'monolit-add-ons' ),
            
        ),
    ) );

    

    $user_cmb->add_field( array(
        'name' => esc_html__( 'Facebook URL', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'field description (optional)', 'monolit' ),
        'id'   => $prefix . 'facebookurl',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    $user_cmb->add_field( array(
        'name' => esc_html__( 'Twitter URL', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'field description (optional)', 'monolit' ),
        'id'   => $prefix . 'twitterurl',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );
    $user_cmb->add_field( array(
        'name' => esc_html__( 'Google+ URL', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'field description (optional)', 'monolit' ),
        'id'   => $prefix . 'googleplusurl',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );
    $user_cmb->add_field( array(
       'name' => esc_html__( 'Linkedin URL', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'field description (optional)', 'monolit' ),
        'id'   => $prefix . 'linkedinurl',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    $user_cmb->add_field( array(
        'name' => esc_html__( 'User Field', 'monolit-add-ons' ),
        // 'desc' => esc_html__( 'field description (optional)', 'monolit' ),
        'id'   => $prefix . 'user_text_field',
        'default' => '',
        'type'    => 'text',
    ) );



}