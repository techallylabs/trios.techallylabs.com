<?php
/* add_ons_php */
if(!function_exists('faicon_sc')) {

    function faicon_sc( $atts, $content="" ) {
    
        extract(shortcode_atts(array(
               'name' =>"magic",
               'class'=>'',
         ), $atts));

        $name = str_replace(array("fa fa-","fa-"), "", $name);
        //$name = str_replace(, "", $name);

        $classes = 'fa fa-'.$name;
        if(!empty($class)){
            $classes .= ' '.$class;
        }
        
        return '<i class="'.$classes.'"></i>'. $content;
     
    }
        
    add_shortcode( 'faicon', 'faicon_sc' ); //Icon
}
if(!function_exists('monolit_separator_sc')) {

    function monolit_separator_sc( $atts, $content="" ) {
    
        
        
        return '<div class="separator"></div><div class="clearfix"></div>';
     
    }
        
    add_shortcode( 'monolit_separator', 'monolit_separator_sc' ); //Icon
}