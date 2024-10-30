<?php
/**
 * 
 */
class language_ifc_controller extends app_ifc_controlers {
	
	function __construct() {
		parent::__construct();
		$this->loadView('language');
	}
}

?>