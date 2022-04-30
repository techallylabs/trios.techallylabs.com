<?php
/*
Plugin Name: Monolit Add-Ons
Plugin URI: https://demowp.cththemes.net/monolit/
Description: A custom plugin for Monolit - Creative Responsive Architecture WordPress Theme
Version: 2.0.3
Author: CTHthemes
Author URI: http://themeforest.net/user/cththemes
Text Domain: monolit-add-ons
Domain Path: /languages/
Copyright: ( C ) 2014 - 2019 cththemes.com . All rights reserved.
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined('ABSPATH') ) {
    die('Please do not load this file directly!');
}

if ( ! defined( 'BBT_PLUGIN_FILE' ) ) {
    define( 'BBT_PLUGIN_FILE', __FILE__ );
}

if ( ! class_exists( 'Monolit_Addons' ) ) {
    include_once dirname( __FILE__ ) . '/includes/class-addons.php';
}

function BBT_ADO() {
    return Monolit_Addons::getInstance();
}

BBT_ADO();



