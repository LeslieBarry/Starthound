<?php echo $this->Session->flash();?>
<h3>Product Plan List</h3>

	<ul>
		<li><?php echo $this->Html->link(__('New Product Plan', true), array('action' => 'add')); ?></li>		
	</ul>
<div class="tabularDiv">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="fleft width50">Id</th>		
			<th class="fleft width100">Category</th>
			<th class="fleft width100">Product Title</th>
			<th class="fleft width70">Plan</th>
			<th class="fleft width100">Title</th>
			<th class="fleft width70">Term</th>
			<th class="fleft width150">Short Description</th>
			<th class="fleft width150">Created On</th>			
			<th class="fleft width100">Status</th>
			<th class="fleft width150"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	//print "<pre>";print_r($productplans);die;
	foreach ($productplans as $productplan){
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td class="fleft width50">
			<?php echo $this->Html->link($productplan['Productplan']['id'], array('action' => 'view', $productplan['Productplan']['id'])); ?>
		<td class="fleft width100"><?php echo ucwords($productplan['Product']['Category']['title']); ?></td>
		<td class="fleft width100"><?php echo $productplan['Product']['title']; ?></td>
		<td class="fleft width70"><?php echo $productplan['Productplan']['plan']; ?></td>
		<td class="fleft width100"><?php echo $this->Html->link($productplan['Productplan']['title'], array('action' => 'view', $productplan['Productplan']['id'])); ?></td>
		<td class="fleft width70"><?php echo $productplan['Productplan']['terms']; ?></td>
		<td class="fleft width150"><?php echo $productplan['Productplan']['short_desc']; ?></td>		
		<td class="fleft width150"><?php echo $productplan['Productplan']['cdate']; ?></td>
		
		<td class="fleft width100"><?php echo $productplan['Productplan']['status']; ?></td>
		<td class="fleft width150">
			
			<?php 
				if( $productplan['Productplan']['status']=='active')
				{
					echo $this->Html->link($this->Html->image("icon-edit.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('action' => 'edit', $productplan['Productplan']['id']),array('escape'=>false));					
				}
			?>	
			<?php 
				if( $productplan['Productplan']['status']=='active')
				{
					echo $this->Html->link($this->Html->image("icon-delete.png",array("alt"=>"Delete","width"=>"32","title"=>"Remove")), array('action' => 'delete', $productplan['Productplan']['id'],$pageParam), array('escape'=>false), sprintf(__('Are you sure you want to make inactive this product plan?', true))); 					
				}
				else
				{
					echo $this->Html->link(__('Activate', true), array('action' => 'activate', $productplan['Productplan']['id'],$pageParam), array('class'=>'adminSubmitButton lpad28'), sprintf(__('Are you sure you want to activate this product?', true))); 
				}
			?>
		</td>
	</tr>
<?php } ?>
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