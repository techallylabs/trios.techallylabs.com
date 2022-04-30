<?php
/* banner-php */
?>
<?php if( monolit_global_var('show_folio_header') ) :?>
    <?php if( monolit_global_var('folio_header_video')  != '' ): ?>
    <!-- content  -->
    <div class="content">
        <section class="parallax-section header-video">
            <!-- Hero video   -->
            <div class="media-container header-video" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
                <div class="video-mask"></div>
                <!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
                <div class="mob-bg bg" data-bg="<?php echo esc_url( monolit_global_var('folio_header_image','url', true) );?>"></div>
                <div  class="background-youtube" data-vid="<?php echo esc_attr( monolit_global_var('folio_header_video') );?>" data-mv="1"> </div>
            </div>
            <!-- Hero video   end -->
            <div class="overlay"></div>
            <div class="container">
                <div class="page-title">
                    <div class="row">
                    <?php 
                    $hcl = 'col-md-6';
                    if( monolit_global_var('show_folio_breadcrumbs') != true){
                        $hcl = 'col-md-12';
                    }
                    ?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <h2><?php echo wp_kses( monolit_global_var('folio_home_text') ,array('strong'=>array())) ;?></h2>
                            <?php echo wp_kses_post( monolit_global_var('folio_home_text_intro') );?>
                        </div>
                    <?php if( monolit_global_var('show_folio_breadcrumbs') ) :?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <?php monolit_breadcrumbs();?>
                        </div>
                    <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content end -->

    <?php else :?>
    <!-- content  -->
    <div class="content">
        <section class="parallax-section">
            <div class="parallax-inner">
                <div class="bg" data-bg="<?php echo esc_url( monolit_global_var('folio_header_image','url', true) );?>" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="page-title">
                    <div class="row">
                    <?php 
                    $hcl = 'col-md-6';
                    if( monolit_global_var('show_folio_breadcrumbs') != true){
                        $hcl = 'col-md-12';
                    }
                    ?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <h2><?php echo wp_kses( monolit_global_var('folio_home_text') ,array('strong'=>array())) ;?></h2>
                            <?php echo wp_kses_post( monolit_global_var('folio_home_text_intro') );?>
                        </div>
                    <?php if( monolit_global_var('show_folio_breadcrumbs') ) :?>
                        <div class="<?php echo esc_attr($hcl );?>">
                            <?php monolit_breadcrumbs();?>
                        </div>
                    <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content end -->
    <?php endif;//end header view?>     
<?php endif;//end show portfolio header?>


<?php if(have_posts()) : ?>

<!-- content  -->
<div class="content portfolio-parallax">
    <section>
        <div class="container">
            <?php $pin = 1; while(have_posts()) : the_post(); ?>
            
                <?php //get_template_part( 'portfolio', 'parallax-list' ); 
                        monolit_get_template_part( 'portfolio', 'parallax-list' , array('pin'=>$pin) );
                ?>

            <?php $pin++; endwhile;?>                                                                  
            <?php monolit_content_nav('',''); ?>
        </div>
    </section>
</div>
<!-- content end -->
<?php else :
    get_template_part('content','none' );
?>
<?php endif; // end have_post() ?>
