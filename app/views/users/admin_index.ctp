<h1>Customer Report</h1>

<div class="tabularDiv" style="width:1200px;margin-left:-50px">
	<table cellpadding="0" cellspacing="0" style="width:100%;">
	<tr>
	<th><?php echo 'No.#';?></th>
	<th><?php echo 'Customer';?></th>
	
	<th><?php echo 'Category';?></th>
	<th><?php echo 'Product';?></th>
	<th><?php echo 'Product Link';?></th>
	<th><?php echo 'Product Plan';?></th>
	<th><?php echo 'Monthly Cost';?></th>
	<th><?php echo 'Email Created';?></th>
	<th><?php echo 'Goo.gl Link';?></th>
	<th><?php echo 'URL clicked';?></th>
	
</tr>
<?php
$i = 0;

foreach ($userDet as $user):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $i; ?>
		</td>
		<td>
			<?php echo $this->Html->link(ucwords($user['User']['firstname'])." ".ucwords($user['User']['lastname']), array('action' => 'view', $user['User']['id'],$user['Emailpick']['analytic_id'])); ?>
			
		</td>
		
		
		<td>
			<?php echo ucwords($user['Category']['title']); ?>
		</td>
		<td>
			<?php echo ucwords($user['Product']['title']); ?>
		</td>
		<td>
			<?php echo $user['Product']['link']; ?>
		</td>
		<td>
			<?php echo $user['Productplan']['title']; ?>
		</td>
		<td>
			<?php echo $user['Productplan']['monthlycost']; ?>
		</td>
		<td>
			<?php echo $user['Emailpick']['cdate']; ?>
		</td>
		<td>
			<?php echo $user['Googledatum']['short_url']; ?>
		</td>
		<td>
			<?php echo $user['Googledatum']['mdate']; ?>
		</td>
		
	</tr>
<?php endforeach; ?>
</table>

<div class="clr"></div>

	<p>
		<?php
			echo $this->Paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)));
		?>	
	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>