<?php echo $this->Session->flash();?>
<h1>Number of Products to rotate on home page</h1>
<div class="tabularDiv">
<table cellpadding="0" cellspacing="0">
<tr>
	<th class="fleft width50">ID</th>	
	<th class="fleft width200">How Many Products to display</th>
	<th class="fleft width100">Interval(ms)</th>
	<th class="fleft width150">Created On</th>	
	<th class="fleft width150">Modified On</th>
	<th class="fleft width220"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($productNumbers as $productNumber):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="fleft width50" style="border:none;">
			<?php echo $productNumber['ProductNumber']['id']; ?>
		</td>
		<td  class="fleft width200" style="border:none;">
			<?php echo $productNumber['ProductNumber']['prodToRotate']; ?>
		</td>
		<td  class="fleft width100" style="border:none;">
			<?php echo $productNumber['ProductNumber']['speed']; ?>
		</td>
		<td  class="fleft width150" style="border:none;">
			<?php echo $productNumber['ProductNumber']['cdate']; ?>
		</td>
		<td  class="fleft width150" style="border:none;">
			<?php echo $productNumber['ProductNumber']['mdate']; ?>
		</td>
		<td  class="fleft width220" style="border:none;">
			<?php echo $this->Html->link(__('View Details', true), array('action' => 'view', $productNumber['ProductNumber']['id']),array('class'=>'adminSubmitButton')); ?>
			
			<?php echo $this->Html->link(__('Edit Details', true), array('action' => 'edit', $productNumber['ProductNumber']['id']),array('class'=>'adminSubmitButton','style'=>'padding-left:4px;')); ?>		
			
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="clr"></div>