<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $css
 * @var $el_class
 * @var $show_all
 * @var $all_link
 * @var $content
 * Shortcode class
 * @var $this WPBakeryShortCode_Portfolio_Comment
 */

if ( comments_open() || get_comments_number() ) {
	comments_template();
}