<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $name //
 * @var $job //
 * @var $photo
 * @var $socials
 * @var $disable_overlay
 * @var $dis_right_deco
 * @var $parallax_value
 * @var $content
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Member
 */
$el_class = $name = $job = $photo = $disable_overlay = $dis_right_deco = $parallax_value = $socials = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$socials = (array) vc_param_group_parse_atts( $socials );
if($disable_overlay == 'yes'){
    $el_class .= ' disop';
}
if($dis_right_deco == 'yes'){
    $el_class .= ' disdeco';
}
?>
<div class="team-box-holder <?php echo esc_attr($el_class );?>">

    <div class="team-box" 
    <?php if($parallax_value!='') : ?>
    data-top-bottom="transform: translateY(<?php echo 0- $parallax_value;?>px);" data-bottom-top="transform: translateY(<?php echo esc_attr($parallax_value );?>px);"
    <?php endif;?>
    >
        <div class="team-photo">
            <div class="overlay"></div>
        <?php if(!empty($socials)) : ?>
            <ul class="team-social">
            <?php foreach ( $socials as $data ) { 
                //parse link
                $link = isset($data['link']) ? ( ( '||' === $data['link'] ) ? '' : $data['link'] ) : '' ;
                $link = vc_build_link( $link );
                $a_href = $link['url'];
                $a_title = $link['title'];
                $a_target = $link['target'];
            ?>   
                <li><a href="<?php echo esc_url($a_href );?>" target="<?php echo esc_attr($a_target );?>">
                <?php if(strpos($a_title, "fa fa-") !== false) :?>
                    <i class="<?php echo esc_attr($a_title );?>"></i>
                <?php else :?>
                    <?php echo esc_html($a_title );?>
                <?php endif;?>
                </a></li>
            <?php } ?>
            </ul>
        <?php endif;?>
            <?php if(!empty($photo)) { echo wp_get_attachment_image( $photo, 'monolitmember2-thumb', false, array('class'=>'respimg')); } ?>                        
        </div>
        <div class="team-info">
            <?php echo wpb_js_remove_wpautop($content,true);?>
        </div>
    </div>
    
</div>