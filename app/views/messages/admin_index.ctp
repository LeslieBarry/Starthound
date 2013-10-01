<?php echo $this->Session->flash();?>
<h1>Messages</h1>
	<div class="tabularDiv">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th class="fleft width50">ID</th>					
				<th class="fleft width300">Email Id</th>		
				<th class="fleft width200">Message</th>
				
				<th class="fleft width150">Posted On</th>			
				
				<th class="fleft width150"><?php __('Actions');?></th>
				
				
				</tr>
	<?php
	$i = 0;
	foreach ($messages as $message):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td  class="fleft width50"><?php echo $message['Message']['id']; ?>&nbsp;</td>
		<td  class="fleft width300"><?php echo $message['Message']['email']; ?>&nbsp;</td>
		<td  class="fleft width200">
			<?php 
				if(strlen($message['Message']['message'])>10)
				{
					echo substr($message['Message']['message'],0,10)."..."; 
				}
				else
				{
					echo $message['Message']['message'];
				}
			?>&nbsp;
		</td>
		<td  class="fleft width150"><?php echo $message['Message']['cdate']; ?>&nbsp;</td>
		<td  class="fleft width150">
			<?php echo $this->Html->link(__('read more...', true), array('action' => 'view', $message['Message']['id'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
