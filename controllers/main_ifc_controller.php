<?php
/**
 *
 */
class IslamforChristiansMaincontroller extends app_ifc_controlers {

	function __construct() {
		parent::__construct();
		add_action('admin_menu', array($this, 'ifc_admin_menu'));
	}

	function ifc_admin_menu() {
		add_options_page('Islam for Christians Archive', 'Islam for Christians Archive', 'manage_options',OPICIFC_Page_SLUG, array($this, 'ifcsettings_page'));
	}

	function ifcsettings_page() {
		if(isset($_GET['tab'])){
			$tab = strip_tags($_GET['tab']);
		}else{
			$tab = '';
		}
		switch ($tab) {
			case 'options':
				$this->loadController('options');
				break;
			case 'language':
				$this->loadController('language');
				break;
			case 'categories':
				echo $this->loadController('categories');
				break;
			default:
				$this->loadController('language');
				break;
		}
	}

}
new IslamforChristiansMaincontroller();
?>