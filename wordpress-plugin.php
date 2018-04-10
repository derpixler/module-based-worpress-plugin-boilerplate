<?php # -*- coding: utf-8 -*-
/**
 * Plugin Name: WordPress Module based Plugin Boilerplate
 * Description: Create Module based wordpress plugin
 * Author:      rene reimann
 * Author URI:  http://www.rene-reimann.de
 * Version:     1.0
 * Domain Path: /languages
 * License:     GPLv3
 */

namespace ModuleBasedWordPressPlugin;

define( __NAMESPACE__ . '_PLUGIN_BASEDIR', dirname( __FILE__ ) . '/' );
define( __NAMESPACE__ . '_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( __NAMESPACE__ . '_PLUGIN_ASSETS', ModuleBasedWordPressPlugin_PLUGIN_BASEDIR . 'assets/' );
define( __NAMESPACE__ . '_PLUGIN_VENDOR', ModuleBasedWordPressPlugin_PLUGIN_BASEDIR . 'vendor/' );

define( __NAMESPACE__ . '_BASENAMESPACE', __NAMESPACE__ );


require_once( ModuleBasedWordPressPlugin_PLUGIN_BASEDIR . 'inc/Factory/autoloaderInterface.php' );
require_once( ModuleBasedWordPressPlugin_PLUGIN_BASEDIR . 'inc/Factory/autoloader.php' );
require_once( ModuleBasedWordPressPlugin_PLUGIN_BASEDIR . 'functions.php' );

(new Factory\Autoloader())::create();