<?php
/* add_ons_php */


function monolit_addons_after_import_setup() {
    

    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Monolit Navigation Menus', 'nav_menu' );
    if($main_menu){
        set_theme_mod( 'nav_menu_locations', array(
                'primary' => $main_menu->term_id,
            )
        );
    }
    $onepage_menu = get_term_by( 'name', 'One Page Navigation Menus', 'nav_menu' );
    if($onepage_menu){
        set_theme_mod( 'nav_menu_locations', array(
                'onepage' => $onepage_menu->term_id,
            )
        );
    }

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home Image' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    if( null !== $front_page_id ) update_option( 'page_on_front', $front_page_id->ID );
    if( null !== $blog_page_id ) update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'monolit_addons_after_import_setup' );
