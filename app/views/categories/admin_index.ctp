<?php echo $this->Session->flash();?>
<h1>Category List</h1>
<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Category', true), array('action' => 'add')); ?></li>		
	</ul>
<div class="tabularDiv">
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th class="fleft width50">Id</th>
			<th class="fleft width250">Title</th>			
			<th class="fleft width150">Created On</th>			
			<th class="fleft width100">Status</th>
			<th class="fleft width150">Order</th>
			<th class="fleft width150"><?php __('Actions');?></th>
		</tr>
		<?php 
			$i=0;
			foreach ($categories as $category){
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';	}
		?>
				<tr<?php echo $class;?>>
					<td class="fleft width50"><?php echo $category['Category']['id']; ?>&nbsp;</td>
					<td class="fleft width250">
						<?php echo $this->Html->link($category['Category']['title'], array('action' => 'view', $category['Category']['id'])); ?>
					
					<td class="fleft width150"><?php echo $category['Category']['cdate']; ?></td>
					<td class="fleft width100"><?php echo $category['Category']['status']; ?></td>
					<td class="fleft width150">
						<?php echo $category['Category']['order']; ?>
						<?php 
							if( $category['Category']['status']=='active')
							{
								if($category['Category']['order']!=$maxOrder)
								{
									echo $this->Html->link($this->Html->image("downarrow.png", array("alt"=>"down","width"=>"32","title"=>"Move Down")), array('action' => 'movedown', $category['Category']['id']),array('escape'=>false));
								}
								if($category['Category']['order']!=$minOrder)
								{
									echo $this->Html->link($this->Html->image("uparrow.png", array("alt"=>"up","width"=>"32","title"=>"Move Up")), array('action' => 'moveup', $category['Category']['id']),array('escape'=>false));
								}
							}
						?>
					</td>
					<td class="fleft width150">
						
						<?php 
							if( $category['Category']['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-edit.png", array("alt"=>"GO","width"=>"32","title"=>"Edit")), array('action' => 'edit', $category['Category']['id']),array('escape'=>false));
							}
						?>
						<?php 
							if( $category['Category']['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-delete.png",array("alt"=>"GO","width"=>"32","title"=>"Remove")), array('action' => 'delete', $category['Category']['id'],$pageParam), array('escape'=>false), sprintf(__('Are you sure you want to make inactive this category?', true)));  
							}
							else
							{
								echo $this->Html->link(__('Activate', true), array('action' => 'activate', $category['Category']['id'],$pageParam), array('class'=>'adminSubmitButton lpad28'), sprintf(__('Are you sure you want to activate this category?', true))); 								
							}
						?>

					</td>
				</tr>
		<?php } ?>
	</table>
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