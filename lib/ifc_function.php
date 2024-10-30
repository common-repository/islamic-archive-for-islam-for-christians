<?php

if (!function_exists('pr')) {
	function pr($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";

	}

}
	 
if (!function_exists('opicifc_cat_logo')) {
	function opicifc_cat_logo($slug, $attr = array('width'=>'80px')) {
		global $ifccategories;
 
		$_attr = NULL;
		if (!empty($attr) && is_array($attr)) {
			foreach ($attr as $key => $value) {
				$_attr .= sprintf('%s="%s" ', $key, $value);
			}

		}
		 
		if (!empty($ifccategories[$slug]['logo'])) {
			return sprintf('<img src="%s" %s />', IFCLogourl . $ifccategories[$slug]['logo'], $_attr);
		}
		return NULL;
	}

}

if (!function_exists('opicifc_icon_logo')) {
	function opicifc_icon_logo($slug, $attr = array('width'=>'80px')) {
		$_attr = NULL;
		if (!empty($attr) && is_array($attr)) {
			foreach ($attr as $key => $value) {
				$_attr .= sprintf('%s="%s" ', $key, $value);
			}

		}
	 
		
		if (file_exists(IFCIconpath . $slug)) {
			return sprintf('<img src="%s" %s />', IFCIconurl . $slug, $_attr);
		}
		return NULL;
	}

}

if (!function_exists('opic_cat_flags')) {
	function opic_cat_flags($slug, $attr = array('width'=>'30px')) {
		global $ifccategories;
		$_attr = NULL;
		if (!empty($attr) && is_array($attr)) {
			foreach ($attr as $key => $value) {
				$_attr .= sprintf('%s="%s" ', $key, $value);
			}
		}
		if (file_exists(Flagspath . $slug)) {
			return sprintf('<img src="%s" %s />', Flagsurl . $slug, $_attr);
		}
		return NULL;
	}

}

if (!function_exists('set_value')) {
	function set_value($key) {
		if (!empty($_POST[$key])) {
			return $_POST[$key];
		} else {
			return get_option($key);
		}
	}

}

if (!function_exists('opic_get_data')) {
	function opic_get_data($url = NULL) {
	    
		$response = wp_remote_get($url,[ 'timeout' => 5000, 'httpversion' => '1.1','sslverify' => false]);
		if ( is_array( $response ) && ! is_wp_error( $response ) && !empty($response['body']) ) {
			return json_decode($response['body']);
		}
		return;
	}

}

if (!function_exists('opic_set_ifc_transient')) {
	function opic_set_ifc_transient($slug, $data) {
		global $wpdb;
		if (is_array($data)) {
			$data = json_encode($data);
		}
		return $wpdb -> insert($wpdb -> prefix . IFCDBTable, array('opic_key' => $slug, 'opic_value' => $data), array('%s', '%s'));
	}

}

if (!function_exists('opic_get_ifc_transient')) {
	function opic_get_ifc_transient($slug) {
		global $wpdb;
		$result = array();
		$tablename = $wpdb -> prefix . IFCDBTable;
		$return = $wpdb -> get_row("SELECT * FROM `$tablename` WHERE `opic_key`='$slug'");
		if ($return) {
			$result['id'] = $return -> id;
			$result['opic_key'] = $return -> opic_key;
			$result['opic_value'] = json_decode($return -> opic_value);
			return $result;
		}
		return NULL;
	}

}
if (!function_exists('opic_do_ifc_transient')) {
	function opic_do_ifc_transient($slug, $data = NULL) {
		$old = opic_get_ifc_transient($slug);
		if (empty($old)) {
			opic_set_ifc_transient($slug, $data);
		}
		return opic_get_ifc_transient($slug);

	}

}

if (!function_exists('fun_ifc_loadlang')) {

	function fun_ifc_loadlang() {
		 $__lang = get_option(OPICIFC_Input_SLUG . 'language');
		 
		if ($__lang) {
			$def_lang = get_option(OPICIFC_Input_SLUG . 'language') . '.php';
			$ifcpath = IFCLangpath . $def_lang;
		 	
			if (file_exists($ifcpath)) {
				include_once $ifcpath;
				return $ifclang;
			} else {
				$ifcpath = IFCLangpath.'eng.php';
				include_once $ifcpath;
				return $ifclang;
				//echo sprintf("Lnaguage File <b>%s</b> not found in path <b>%s</b>", $def_lang, IFCLangpath);
				//exit();
			}
		}else{
			return array();
		}

	}

}
?>