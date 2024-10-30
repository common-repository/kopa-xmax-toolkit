<?php

/*
Plugin Name: Kopa Xmax Toolkit
Plugin URI: http://kopatheme.com
Description: A specific plugin use in Xmax Theme to generate shortcodes.
Version: 1.0.0
Author: Kopatheme
Author URI: http://kopatheme.com
License: GPLv3

Kopa Xmax Toolkit plugin, Copyright 2014 Kopatheme.com
Kopa Xmax Toolkit is distributed under the terms of the GNU GPL
*/

function kopa_xmax_toolkit_init(){
    load_plugin_textdomain( 'kopa-xmax-toolkit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action('plugin_loaded','kopa_xmax_toolkit_init');

add_action('after_setup_theme', 'xmax_after_setup_theme', 20);

function xmax_after_setup_theme() {
    if (!defined('KOPA_XMAX_DOMAIN'))
        return;
    require plugin_dir_path( __FILE__ ) . 'kopa-shortcodes.php';
    require plugin_dir_path( __FILE__ ) . 'shortcodes/system/home_url.php';
    require plugin_dir_path( __FILE__ ) . 'shortcodes/gallery.php';
}