<?php
class OPICIFC_plugin {
	
	function __construct(){ }
	static function loaded(){
		
	}
	public static function createTable(){
		global $wpdb;
		$table_name = $wpdb->prefix . IFCDBTable;
		$charset_collate = $wpdb->get_charset_collate();
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
			`id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
			`opic_key` varchar(50) NOT NULL DEFAULT '',
			`opic_value` longtext NOT NULL DEFAULT '',
			PRIMARY KEY (`id`)
			) $charset_collate;";
	
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
		}
	}
}

add_action( 'plugins_loaded', array( 'OPICIFC_plugin', 'loaded' ));
add_action( 'plugins_loaded', array( 'OPICIFC_plugin', 'createTable' ) );

function OPICIFC_plugin_styles() {
	$ulr =  OPICIFC_PLUGIN_URL.'style/css/style.css';
	echo "<link rel='stylesheet' href='$ulr' type='text/css' media='all' />";
}
add_action( 'admin_head', 'OPICIFC_plugin_styles' );

?>