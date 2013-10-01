<?php echo $this->Session->flash();?>
<h1>Goo.gl Analysis</h1>

<div class="tabularDiv">
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $paginator->sort('id');?></th>
		<th><?php echo $paginator->sort('product_id');?></th>
		<th><?php echo $paginator->sort('short_url');?></th>
		<th>No. Of Clicks</th>
		<th>Created On</th>
		<th>Clicked On</th>
		<th>Graphics</th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($googledata as $googledatum):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
		<tr<?php echo $class;?>>
			<td>
				<?php echo $googledatum['Googledatum']['id']; ?>
			</td>
			<td>
				<?php echo $html->link($googledatum['Product']['title'], array('controller' => 'products', 'action' => 'view', $googledatum['Product']['id'])); ?>
			</td>
			<td>
				<?php echo $googledatum['Googledatum']['short_url']; ?>
			</td>
			<td>
				<?php echo $googledatum['Googledatum']['clicks']; ?>
			</td>
			<td>
				<?php echo $googledatum['Googledatum']['cdate']; ?>
			</td>
			<td>
				<?php echo $googledatum['Googledatum']['mdate']; ?>
			</td>
			<td class="actions">
				<a href="<?php echo $googledatum['Googledatum']['short_url'].".info";?>" target="_blank">View Complete Info</a>
				
			</td>

			<td class="actions">
				<?php echo $html->link(__('View Details', true), array('action' => 'view', $googledatum['Googledatum']['id'])); ?>
				
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<div class="clr"></div>
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