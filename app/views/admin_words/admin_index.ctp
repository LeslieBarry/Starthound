<?php echo $this->Session->flash();?>
<h1>Text on Mail Your Picks Popup</h1>
<div class="tabularDiv">
<table cellpadding="0" cellspacing="0">
<tr>
	<th class="fleft width50">ID</th>	
	<th class="fleft width300">Text</th>
	<th class="fleft width150">Created On</th>	
	<th class="fleft width150">Modified On</th>
	<th class="fleft width220"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($adminWords as $adminWord):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="fleft width50" style="border:none;">
			<?php echo $adminWord['AdminWord']['id']; ?>
		</td>
		<td  class="fleft width300" style="border:none;">
			<?php echo $adminWord['AdminWord']['content']; ?>
		</td>
		<td  class="fleft width150" style="border:none;">
			<?php echo $adminWord['AdminWord']['cdate']; ?>
		</td>
		<td  class="fleft width150" style="border:none;">
			<?php echo $adminWord['AdminWord']['mdate']; ?>
		</td>
		<td  class="fleft width220" style="border:none;">
			<?php echo $this->Html->link(__('View Details', true), array('action' => 'view', $adminWord['AdminWord']['id']),array('class'=>'adminSubmitButton')); ?>
			
			<?php echo $this->Html->link(__('Edit Details', true), array('action' => 'edit', $adminWord['AdminWord']['id']),array('class'=>'adminSubmitButton','style'=>'padding-left:4px;')); ?>		
			
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="clr"></div>