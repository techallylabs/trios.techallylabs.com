<?php
/* banner-php */

//For portfolio_cat taxonomy
//https://make.wordpress.org/core/2015/09/04/taxonomy-term-metadata-proposal/
// Add term page
function monolit_portfolio_cat_add_new_meta_field() {
    
    // this will add the custom meta field to the add new term page
    // wp_enqueue_media();
    // wp_enqueue_script('monolit_tax_meta', get_template_directory_uri() . '/inc/assets/upload_file.js', array('jquery'), null, true);
    cth_radio_options_field(array(
                                'id'=>'tax_fullwidth_nav_menu',
                                'name'=>esc_html__('Fullwidth Navigation Menu','monolit-add-ons'),
                                'values' => array(
                                        'yes'=> esc_html__('Yes','monolit-add-ons'),
                                        'no'=> esc_html__('No','monolit-add-ons'),
                                    ),
                                'default'=>'no'
    ));
    cth_radio_options_field(array(
                                'id'=>'tax_show_header',
                                'name'=>esc_html__('Show Header Section','monolit-add-ons'),
                                'values' => array(
                                        'yes'=> esc_html__('Yes','monolit-add-ons'),
                                        'no'=> esc_html__('No','monolit-add-ons'),
                                    ),
                                'default'=>'yes'
    ));
    cth_select_media_file_field('cat_header_image',esc_html__('Header Background Image','monolit-add-ons'), array());

    cth_radio_options_field(array(
                                'id'=>'tax_show_content_footer',
                                'name'=>esc_html__('Show Content Footer','monolit-add-ons'),
                                'values' => array(
                                        'yes'=> esc_html__('Yes','monolit-add-ons'),
                                        'no'=> esc_html__('No','monolit-add-ons'),
                                    ),
                                
                                'default'=>'yes'
    ) );

}
add_action('portfolio_cat_add_form_fields', 'monolit_portfolio_cat_add_new_meta_field', 10, 2);

// Edit term page
function monolit_portfolio_cat_edit_meta_field($term) {
    // wp_enqueue_media();
    // wp_enqueue_script('monolit_tax_meta', get_template_directory_uri() . '/inc/assets/upload_file.js', array('jquery'), null, true);
    
    // put the term ID into a variable
    $t_id = $term->term_id;
    
    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option("taxonomy_portfolio_cat_$t_id");
    
    cth_radio_options_field(array(
                                'id'=>'tax_fullwidth_nav_menu',
                                'name'=>esc_html__('Fullwidth Navigation Menu','monolit-add-ons'),
                                'values' => array(
                                        'yes'=> esc_html__('Yes','monolit-add-ons'),
                                        'no'=> esc_html__('No','monolit-add-ons'),
                                    ),
                                'default'=>'no'
    ),$term_meta,false);
    cth_radio_options_field(array(
                                'id'=>'tax_show_header',
                                'name'=>esc_html__('Show Header Section','monolit-add-ons'),
                                'values' => array(
                                        'yes'=> esc_html__('Yes','monolit-add-ons'),
                                        'no'=> esc_html__('No','monolit-add-ons'),
                                    ),

                                'default'=>'yes'
    ),$term_meta,false);
    cth_select_media_file_field('cat_header_image',esc_html__('Header Background Image','monolit-add-ons'), $term_meta,false);

    cth_radio_options_field(array(
                                'id'=>'tax_show_content_footer',
                                'name'=>esc_html__('Show Content Footer','monolit-add-ons'),
                                'values' => array(
                                        'yes'=> esc_html__('Yes','monolit-add-ons'),
                                        'no'=> esc_html__('No','monolit-add-ons'),
                                    ),
                                
                                'default'=>'yes'
    ),$term_meta,false);
}
add_action('portfolio_cat_edit_form_fields', 'monolit_portfolio_cat_edit_meta_field', 10, 2);

// Save extra taxonomy fields callback function.
function monolit_save_portfolio_cat_custom_meta($term_id) {
    if (isset($_POST['term_meta'])) {
        $t_id = $term_id;
        $term_meta = get_option("taxonomy_portfolio_cat_$t_id");
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        
        // Save the option array.
        update_option("taxonomy_portfolio_cat_$t_id", $term_meta);
    }
}
add_action('edited_portfolio_cat', 'monolit_save_portfolio_cat_custom_meta', 10, 2);
add_action('edited_portfolio_cat', 'monolit_save_portfolio_cat_custom_meta', 10, 2);
