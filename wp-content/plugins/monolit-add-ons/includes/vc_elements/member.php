<?php 
/* add_ons_php */

vc_map( array(
   "name"      => esc_html__("Team Member", 'monolit-add-ons'),
   "description" => esc_html__("Team member",'monolit-add-ons'),
   "base"      => "monolit_member",
   "class"     => "",
   "icon"      => BBT_DIR_URL . "/assets/cththemes-logo.png",
   "category"  => 'Monolit Theme',
   "show_settings_on_create" => true,
   "params"    => array(
       
        array(
            "type"      => "attach_image",
            "class"     => "ajax-vc-img",
            'holder'=> 'div',
            "heading"   => esc_html__("Photo", 'monolit-add-ons'),
            "param_name"=> "photo",
            "value"     => "",
            "description" => esc_html__("Upload avatar photo of the member", 'monolit-add-ons')
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Socials', 'monolit-add-ons' ),
            'param_name' => 'socials',
            // 'description' => esc_html__( 'Enter values for graph - value, title and color.', 'monolit' ),
            // 'value' => urlencode( json_encode( array(
            //     array(
            //         'description' => '<h4>Design</h4>'
                    
            //     )
                
            // ) ) ),
            'value' => '',
            'params' => array(
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Social Link', 'monolit-add-ons' ),
                    'param_name' => 'link',
                    'description' => esc_html__( 'You have to use full Awesome icon class for social icon. Ex: fa fa-facebook. Or use normal title instead.', 'monolit-add-ons' ),
                    // 'admin_label' => true,
                    // 'value'=> '',
                ),
                
            ),
        ),
        
        

        array(
            "type" => "textarea_html",
            "heading" => esc_html__('Member Info', 'monolit-add-ons'),
            "holder" => "div",
            "param_name" => "content",
            "value" => '<h3><a href="#" class="ajax">Mila Slavko</a></h3>
<h4>CEO - Main Architect</h4>',
        ),
        array(
            "type"      => "textfield",
            "holder"    => "div",
            // "class"     => "",
            "heading"   => esc_html__("Parallax Value", 'monolit-add-ons'),
            "param_name"=> "parallax_value",
            "description" => esc_html__("Pixel number. Which we are telling the browser is to move Member down every time we scroll down 100% of the viewport height and move Member up every time we scroll up 100% of the viewport height. Ex: 50 or -50 for reverse direction.", 'monolit-add-ons'),
            "value" => "50"
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Disable Overlay', 'monolit-add-ons'),
            "param_name" => "disable_overlay",
            "value" => array(   
                            esc_html__('No', 'monolit-add-ons') => 'no', 
                            esc_html__('Yes', 'monolit-add-ons') => 'yes',  
                                                                                                           
                        ),
            // "description" => esc_html__("", 'monolit'), 
        ),
        array(
            "type" => "dropdown",
            "class"=>"",
            "heading" => esc_html__('Disable Bottom Right Decoration', 'monolit-add-ons'),
            "param_name" => "dis_right_deco",
            "value" => array(   
                            esc_html__('No', 'monolit-add-ons') => 'no', 
                            esc_html__('Yes', 'monolit-add-ons') => 'yes',  
                                                                                                           
                        ),
            // "description" => esc_html__("", 'monolit'), 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", 'monolit-add-ons'),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'monolit-add-ons')
        ),
    ),
    'admin_enqueue_js' => BBT_DIR_URL . "/assets/js/vc_js_elements.js",
    'js_view'=> 'MonolitImagesView',
));
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Monolit_Member extends WPBakeryShortCode {}
}
