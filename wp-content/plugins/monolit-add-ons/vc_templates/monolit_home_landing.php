<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $css
 * @var $el_class
 * @var $cat_ids
 * @var $order
 * @var $order_by
 * @var $ids
 * @var $show_pagination
 * Shortcode class
 * @var $this WPBakeryShortCode_Monolit_Home_Landing
 */
$el_class = $css = $ld_logo = $ld_title = $ld_subtitle = $show_iframe = $show_constel = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="home-landing-wrap">
    <?php if($show_constel == 'yes'):?>
    <canvas class="landing-particular particular"  data-color="rgba(255,255,255,0.5)"></canvas>
    <?php endif;?>
    <?php if($show_iframe == 'yes'):?>
    <div class="landing-iframe-holder">
        <iframe id="iframe-demo" src="<?php echo esc_url(home_url('/' ));?>"></iframe>
    </div>
    <?php endif;?>
    <div class="landing-logo-holder">
        <div class="landing-logo-inner">
            <?php if(!empty($ld_logo)){
                echo wp_get_attachment_image($ld_logo , 'full' );
            }
            if(!empty($ld_title)|| !empty($ld_subtitle)):?>
            <h3> 
                <?php echo esc_html($ld_title );?>
            <?php if(!empty($ld_subtitle)) :?>
                <br><strong> <?php echo esc_html($ld_subtitle );?> </strong>
            <?php endif;?>
            </h3>
            <?php endif;?>
        </div>
    </div>
    <div class="landing-content">
        <div class="container">
            <div class="box-inner">
                <?php echo wpb_js_remove_wpautop($content,true);?>
            </div>
        </div>
    </div>

</div>