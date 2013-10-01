<?php echo $this->Session->flash();?>
<h1>Product List</h1>
<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product', true), array('action' => 'add')); ?></li>		
	</ul>
<div class="tabularDiv">
		<table cellpadding="0" cellspacing="0">
			<tr>
					<th class="fleft width50">ID</th>					
					<th class="fleft width200">Title</th>		
					<th class="fleft width150">Twitter Name</th>
					<th class="fleft width150">SEO Name</th>
					<th class="fleft width70">Location</th>					
					<th class="fleft width150">Created On</th>			
					<th class="fleft width70">Status</th>
					<th class="fleft width100"><?php __('Actions');?></th>
					<th class="fleft width100"><?php __('Advertise');?></th>
			</tr>
			<?php 
				$i=0;
				
			foreach ($products as $product){
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
				<tr<?php echo $class;?>>
					<td class="fleft width50"><?php echo $product['Product']['id']; ?></td>
					
					<td class="fleft width200">
					<?php 
						if($product['Product']['status']=='active'){
							echo $this->Html->link( $product['Product']['title'], array('action' => 'view', $product['Product']['id'])); 
						}
						else
						{
							echo $product['Product']['title'];
						}
					?>				
					</td>
					<td class="fleft width150"><?php echo $product['Product']['twittername']; ?></td>
					<td class="fleft width150"><?php echo $product['Product']['seo_name']; ?></td>
					<td class="fleft width70"><?php echo $product['Product']['location']; ?></td>
					<td class="fleft width150"><?php echo $product['Product']['cdate']; ?></td>
					
					<td class="fleft width70"><?php echo $product['Product']['status']; ?></td>
					<td class="fleft width100">
						<span>
						<?php 
							if( $product['Product']['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-edit.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('action' => 'edit', $product['Product']['id']),array('escape'=>false));
							}
						?>
						
						<?php 
							if( $product['Product']['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-delete.png",array("alt"=>"Delete","width"=>"32","title"=>"Remove")), array('action' => 'delete', $product['Product']['id'],$pageParam), array('escape'=>false), sprintf(__('Are you sure you want to make inactive this product?', true))); 
							}
							else
							{
								echo $this->Html->link(__('Activate', true), array('action' => 'activate', $product['Product']['id'],$pageParam), array('class'=>'adminSubmitButton lpad28'), sprintf(__('Are you sure you want to activate this product?', true))); 
							}
						?>
						</span>
					</td>
					<td class="fleft width100">
						<span>
						<?php 
							if( $product['Product']['advertise']=='yes')
							{
								echo $this->Html->link($this->Html->image("yes.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('action' => 'advertise', $product['Product']['id'],0),array('escape'=>false));
							}
							else
							{
								echo $this->Html->link($this->Html->image("no.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('action' => 'advertise', $product['Product']['id'],1),array('escape'=>false)); 
							}
						?>
						</span>
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