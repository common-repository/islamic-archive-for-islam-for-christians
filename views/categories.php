<?php
$IFCHtml = new html_ifc_helper();
global $ifccategories,$opicifc_categories_lang;
 
$category_slug = esc_attr($_GET['cat_slug']);

$opicifc_lang = get_option(OPICIFC_Input_SLUG.'language');
$link = $opicifc_categories_lang[$opicifc_lang][$category_slug]['url'];
$jsoncaturl = $opicifc_categories_lang[$opicifc_lang][$category_slug]['cat'];
$slug = $category_slug.'_'.$opicifc_lang;
$cat_options = $IFCHtml->categoryFromTransient($jsoncaturl,$slug);
 
?>
<div class="category-head">
	<table width="100%">
		<tr>
			<td width="80px"><span class="category-logo"><?php echo opicifc_cat_logo($category_slug,array('width'=>'80px','class'=>$category_slug)) ?></span></td>
			<td><h1 class="category-title"><a target="_blank" href="<?php echo $link; ?>"><?php echo $this->getLang($category_slug); ?></a></h1></td>
		</tr>
	</table>

</div>
<hr />
<?php
	echo $IFCHtml->Input('checkbox',array('name'=>'category_'.$opicifc_lang.'_'.$category_slug.'[]','options'=>$cat_options));
?>
