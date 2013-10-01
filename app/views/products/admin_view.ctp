<h2><?php  __('Product');?></h2>
<div class="productFormDiv">
	<div class="mtop10"></div>
	<dl>
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $product['Product']['id']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Category'); ?></dd>
		<dt>
			<?php echo $this->Html->link($product['Category']['title'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Twitter Name'); ?></dd>
		<dt>
			<?php echo $product['Product']['twittername']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('SEO Name'); ?></dd>
		<dt>
			<?php echo $product['Product']['seo_name']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Location'); ?></dd>
		<dt>
			<?php echo $product['Product']['location']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Currency'); ?></dd>
		<dt>
			<?php echo $product['Product']['currency']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Title'); ?></dd>
		<dt>
			<?php echo $product['Product']['title']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Image'); ?></dd>
		<dt>
			<?php echo $this->Html->image('product/'.$product['Product']['id'].'/'.$product['Product']['image'],array("alt"=>"Image","width"=>"160","height"=>"60","title"=>$product['Product']['id']))?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Link'); ?></dd>
		<dt>
			<?php echo $product['Product']['link']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Description'); ?></dd>
		<dt>
			<?php echo $product['Product']['description']; ?>
			
		</dt>		
		<div class="clr"></div>
		<dd><?php __('Created on'); ?></dd>
		<dt>
			<?php echo $product['Product']['cdate']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Last modified on'); ?></dd>
		<dt>
			<?php echo $product['Product']['mdate']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Status'); ?></dd>
		<dt>
			<?php echo $product['Product']['status']; ?>
			
		</dt>
		<div class="clr"></div>
				<dd><?php __('Advertise Status'); ?></dd>
		<dt>
			<?php echo $product['Product']['advertise']; ?>
			
		</dt>
		<div class="clr"></div>

	</dl>
	<div class="clr"></div>
	<div class="submitButton1">
		<?php echo $this->Html->link(__('Edit Product', true), array('action' => 'edit', $product['Product']['id']),array('class'=>'adminSubmitButton')); ?> 
		<?php echo $this->Html->link(__('List Product', true), array('action' => 'index'),array('class'=>'adminSubmitButton')); ?> 
	</div>
	<div class="clr"></div>
	</div>
<?php if (!empty($product['Productplan'])):?>
<h2 style="color:#000000;">Product Plan List </h2>

	<?php echo $this->Html->link(__('New Product Plan', true), array('controller'=>'Productplans','action' => 'admin_add',$product['Product']['id'])); ?> 	
<div class="tabularDiv">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Id</th>
			<th>Plan</th>
			<th>Title</th>
			<th>Set Up Cost</th>
			<th>Monthly Cost</th>
			<th>Yearly Cost</th>
			<th>Short Description</th>
			
			<th>Created On</th>			
			<th>Status</th>
			<th><?php __('Actions');?></th>	
	</tr>
	<?php
		$i = 0;
		foreach ($product['Productplan'] as $productplan){
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td>
				<?php echo $this->Html->link($productplan['id'], array('controller' => 'productplans', 'action' => 'view', $productplan['id'])); ?>
				
			</td>
			
			<td>
				<?php echo $productplan['plan'];?>				
			</td>
			<td><?php echo $productplan['title'];?></td>
			<td><?php echo $productplan['setupcost'];?></td>
			<td><?php echo $productplan['monthlycost'];?></td>
			<td><?php echo $productplan['yearlycost'];?></td>
			<td>
				<?php echo $this->Html->link($productplan['short_desc'], array('controller' => 'productplans', 'action' => 'view', $productplan['id'])); ?>				
			</td>
			
			
			
			<td><?php echo $productplan['cdate'];?></td>
			
			<td><?php echo $productplan['status'];?></td>
			<td class="actions">
				<span>
						<?php 
							if($productplan['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-edit.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('controller' => 'productplans','action' => 'edit', $productplan['id']),array('escape'=>false));
							}
						?>
						
						<?php 
							if( $productplan['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-delete.png",array("alt"=>"Delete","width"=>"32","title"=>"Remove")), array('controller' => 'productplans','action' => 'delete', $productplan['id']), array('escape'=>false), sprintf(__('Are you sure you want to delete this product?', true))); 
							}
							else
							{
								echo $this->Html->link(__('Activate', true), array('controller' => 'productplans','action' => 'activate', $productplan['id']), array('class'=>'adminSubmitButton lpad28'), sprintf(__('Are you sure you want to activate this product?', true))); 
							}
						?>
						</span>
				
			</td>
		</tr>
	<?php } ?>
	</table>

</div>
<?php endif; ?>