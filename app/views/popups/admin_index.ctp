<?php echo $this->Session->flash();?>
<h1><?php __('Text for Popups');?></h1>
<div class="tabularDiv" style="margin-left:-80px">
<table cellpadding="0" cellspacing="0">
<tr>	
	<th class="width200"><?php echo $html->link(__('About Us', true), array('action' => 'view', $Popups[0]['Popup']['id'])); ?></th>
	<th class="width200"><?php echo $html->link(__('Terms of Use', true), array('action' => 'view', $Popups[0]['Popup']['id'])); ?></th>
	<th class="width200"><?php echo $html->link(__('Privacy Policy', true), array('action' => 'view', $Popups[0]['Popup']['id'])); ?></th>
	<th class="width200"><?php echo $html->link(__('Contact Us', true), array('action' => 'view', $Popups[0]['Popup']['id'])); ?></th>
	<th class="width100"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($Popups as $footerPopup):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		
		<td class="width200">
			<?php echo $footerPopup['Popup']['about_us']; ?>
		</td>
		<td class="width200">
			<?php echo $footerPopup['Popup']['disclaimer']; ?>
		</td>
		<td class="width200">
			<?php echo $footerPopup['Popup']['terms']; ?>
		</td>
		<td class="width200">
			<?php echo $footerPopup['Popup']['contact_us']; ?>
		</td>
		<td class="width100">
			
			<?php echo $this->Html->link($this->Html->image("icon-edit.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('action' => 'edit', $footerPopup['Popup']['id']),array('escape'=>false));?>
			
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>