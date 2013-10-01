<?php echo $this->Session->flash();?>
<h1>Product rating</h1>
<div class="tabularDiv">
	<table cellpadding="0" cellspacing="0">
	<tr>
	<th>ID</th>
	<th>Product Title</th>
	<th>Functionality</th>
	<th>Reliability</th>
	<th>Ease Of use</th>
	<th>Value For Money</th>
	<th>User Rating</th>
	<th>No. Of Users</th>	
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
//print "<pre>";print_r($ratings);die;
foreach ($ratings as $rating):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $rating['Rating']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($rating['Product']['title'],array('controller'=>'Products','action' => 'view', $rating['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $rating['Rating']['functionality']; ?>
		</td>
		<td>
			<?php echo $rating['Rating']['reliability']; ?>
		</td>
		<td>
			<?php echo $rating['Rating']['ease_of_use']; ?>
		</td>
		<td>
			<?php echo $rating['Rating']['value_for_money']; ?>
		</td>
		<td>
			<?php if($rating['Rating']['no_ofUsers']>0)
			{
				echo round($rating['Rating']['rating_you']/$rating['Rating']['no_ofUsers'],2);
			}
			else
			{
				echo "0";
			}?>
		</td>
		<td>
			<?php echo $rating['Rating']['no_ofUsers']; ?>
		</td>
		
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $rating['Rating']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $rating['Rating']['id'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
