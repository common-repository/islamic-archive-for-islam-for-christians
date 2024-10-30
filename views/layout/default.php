<form method="post" action="<?php admin_url( 'options-general.php?page='.OPICIFC_Page_SLUG ); ?>">
<?php
	echo wp_nonce_field(OPICIFC_Page_SLUG,OPICIFC_Page_SLUG."-settings-page"); 
	
	$IFCHtmlHelper = new html_IFC_helper();
	$IFCHtmlHelper->opic_admin_tabs();
	$IFCHtmlHelper->MainContent($mainViewFile);
?>
   <p class="submit" style="clear: both;">
      <input type="submit" name="Submit"  class="button-primary" value="<?php echo $IFCHtmlHelper->getLang('btn-updatesetting') ?>" />
      <input type="hidden" name="ilc-settings-submit" value="Y" />
   </p>
</form>