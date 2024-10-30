
<div class="category-head">
		<table width="100%">
		<tr>
			<td width="80px">
				<span class="category-logo"><?php echo opicifc_icon_logo('options.png',array('width'=>'80px')) ?></span>
				</td>
			<td>
				<h1 class="category-title"><?php echo $this->getLang('control-options') ?></h1>
				</td>
		</tr>
	</table>	
	
</div>
<hr />
<?php
$IFCHtml = new html_ifc_helper();

$timeList['']                 = $this->getLang('label-select');
$timeList['everyhour']        = $this->getLang('label-hourly');
$timeList['everysixhours']    = $this->getLang('label-every_six_hours');
$timeList['everytwelvehours'] = $this->getLang('label-every_twelve_hours');
$timeList['everyday']         = $this->getLang('label-daily');
$timeList['everytwodays']     = $this->getLang('label-two_days');
$timeList['weakly']           = $this->getLang('label-weakly');


echo $IFCHtml -> Input('select', array('name' => 'cronjobtime', 'options' => $timeList, 'label' =>$this->getLang('label-import_data_time')));
echo $IFCHtml->Input('text',array('name' => 'source', 'label' => $this->getLang('label-source')));
?>