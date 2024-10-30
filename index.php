<?php
/**
 * Islam for Christians Archive
 *
 * Plugin Name: Islam for Christians Archive
 * Plugin URI:  https://wordpress.org/plugins/islamic-archive-for-islam-for-christians/
 * Description: Islam for Christians is a main informative online source of knowledge about the true message of prophet Jesus and how Muslims view him.
 * Version:     1.3.5
 * Author:      EDC TEAM (E-Dawah Committee)
 * Author URI:  https://edc.org.kw
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Requires at least: 5.0
 * Requires PHP: 7.4
*/

define('OPICIFC_PLUGIN_PATH',plugin_dir_path( __FILE__ ));
define('OPICIFC_PLUGIN_URL',plugin_dir_url( __FILE__ ));
define('OPICIFC_Page_SLUG','islam_for_christians_archive');
define('OPICIFC_Input_SLUG','opicifc_');
define('IFCLIB','lib');
define('IFCDS','/');
define('IFCCONTROLLERS','controllers');
define('IFCMODELS','models');
define('IFCDBTable', 'opicifc_categories');
define('IFCBootstrappath',OPICIFC_PLUGIN_PATH.'style'.IFCDS);
define('IFCLogourl',OPICIFC_PLUGIN_URL.'style'.IFCDS.'images'.IFCDS.'logo'.IFCDS);
define('IFCIconpath',OPICIFC_PLUGIN_PATH.'style'.IFCDS.'images'.IFCDS.'icons'.IFCDS);
define('IFCIconurl',OPICIFC_PLUGIN_URL.'style'.IFCDS.'images'.IFCDS.'icons'.IFCDS);
define('IFCFlagspath',OPICIFC_PLUGIN_PATH.'style'.IFCDS.'images'.IFCDS.'flags'.IFCDS);
define('IFCFlagsurl',OPICIFC_PLUGIN_URL.'style'.IFCDS.'images'.IFCDS.'flags'.IFCDS);

define('IFCControlerspath',OPICIFC_PLUGIN_PATH.'controllers'.IFCDS);
define('IFCModelspath',OPICIFC_PLUGIN_PATH.'models'.IFCDS);
define('IFCViewspath',OPICIFC_PLUGIN_PATH.'views'.IFCDS);
define('IFCLayoutpath',OPICIFC_PLUGIN_PATH.'views'.IFCDS.'layout'.IFCDS);
define('IFCLangpath',OPICIFC_PLUGIN_PATH.'views'.IFCDS.'lang'.IFCDS);

function OPICIFC_plugin_install(){

	$default_lang = 'eng';
	$source = 'Soucre Link';
	add_option(OPICIFC_Input_SLUG.'language', $default_lang);
	add_option(OPICIFC_Input_SLUG.'source', $source);
	add_option(OPICIFC_Input_SLUG.'cronjobtime', 'everyhour');
	add_option(OPICIFC_Input_SLUG.'version', '1.1');
}
function OPICIFC_plugin_uninstall(){

	$options = get_option(OPICIFC_Input_SLUG.'language');
 	if( is_array($options) && $options['uninstall'] === true){
		delete_option(OPICIFC_Input_SLUG.'language');
		delete_option(OPICIFC_Input_SLUG.'source');
		delete_option(OPICIFC_Input_SLUG.'cronjobtime');
		delete_option(OPICIFC_Input_SLUG.'version');
	}
}
register_activation_hook(plugin_basename(__FILE__),'OPICIFC_plugin_install');
register_deactivation_hook(plugin_basename(__FILE__), 'OPICIFC_plugin_uninstall');


include_once(OPICIFC_PLUGIN_PATH.'load.php');
?>
