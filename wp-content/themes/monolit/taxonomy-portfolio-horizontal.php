<?php
/* banner-php */


?>

<!-- content  -->
<div class="content full-height no-bg-con portfolio-horizontal">
<?php if(have_posts()) : ?>

    <?php 
    $grid_cls = 'folio-gallery';
    $grid_cls .= ' '.monolit_global_var('folio_column') .'-ver-columns';
    if( monolit_global_var('folio_show_info_first') == 'show'){
        $grid_cls .= ' vis-port-info';
    }elseif( monolit_global_var('folio_show_info_first')  == 'hide'){
        $grid_cls .= ' hidden-port-info';
    }else{
        $grid_cls .= ' hov-port-info';
    }
    if( monolit_global_var('folio_disable_overlay') )
        $grid_cls .= ' disopa';
    if($is_hoz_header_footer)
        $grid_cls .= ' hoz_has_headfoot';
    ?>
              
    <!--=============== portfolio holder ===============-->
    <div class="resize-carousel-holder hpw">
        <div class="p_horizontal_wrap<?php if($is_hoz_header_footer) echo ' hoz_has_headfoot_wrap';?>">
            <div id="portfolio_horizontal_container" class="<?php echo esc_attr($grid_cls );?>">
                <?php while(have_posts()) : the_post(); ?>
                    
                    <?php monolit_get_template_part( 'portfolio',  'horizontal-list', array( 'columns'=> monolit_global_var('folio_column') ) ); ?>

                <?php endwhile;?>
                                                                                              
            </div>
            <!--portfolio_horizontal_container  end-->        
        </div>
        <!--p_horizontal_wrap  end-->                    
    </div>
    <?php monolit_portfolio_pagination('','' , '', false );?>
<?php else :
    get_template_part('content','none' );
?>
<?php endif; // end have_post() ?>

</div>
<!-- content end -->