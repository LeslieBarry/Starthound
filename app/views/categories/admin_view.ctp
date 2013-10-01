<h2><?php  __('Category');?></h2>
<div class="productFormDiv">
<div class="mtop10"></div>
	<dl>	
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $category['Category']['id']; ?>
			
		</dt>
		<dd><?php __('Title'); ?></dd>
		<dt>
			<?php echo $category['Category']['title']; ?>
			
		</dt>
		<dd><?php __('Selection Image'); ?></dd>
		<dt>
			<?php echo $this->Html->image('category/'.$category['Category']['id'].'/selected/'.$category['Category']['image'],array("alt"=>"Image","width"=>"32","title"=>$category['Category']['id']))?>
			
			
		</dt>
		<dd><?php __('Unselection Image'); ?></dd>
		<dt>
			<?php echo $this->Html->image('category/'.$category['Category']['id'].'/unselected/'.$category['Category']['image'],array("alt"=>"Image","width"=>"32","title"=>$category['Category']['id']))?>
			
			
		</dt>
		<dd><?php __('Created On'); ?></dd>
		<dt>
			<?php echo $category['Category']['cdate']; ?>
			
		</dt>
		<dd><?php __('Modified On'); ?></dd>
		<dt>
			<?php echo $category['Category']['mdate']; ?>
			
		</dt>
		<dd><?php __('Status'); ?></dd>
		<dt>
			<?php echo $category['Category']['status']; ?>
			
		</dt>
		<dd><?php __('Order'); ?></dd>
		<dt>
			<?php echo $category['Category']['order']; ?>
			
		</dt>
	</dl>
	<div class="clr"></div>
	<div class="submitButton1">
		<?php echo $this->Html->link(__('Edit Category', true), array('action' => 'edit', $category['Category']['id']),array('class'=>'adminSubmitButton')); ?> 
		<?php echo $this->Html->link(__('List Category', true), array('action' => 'index'),array('class'=>'adminSubmitButton')); ?> 
	</div>
	<div class="clr"></div>
	</div>
	<?php if (!empty($category['Product'])):?>
	<h2 style="color:#000000;">Product Plan List </h2>

	<?php echo $this->Html->link(__('New Product', true), array('controller'=>'Products','action' => 'admin_add',$category['Category']['id'])); ?> 	
<div class="tabularDiv">

	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		
		<th><?php __('Code'); ?></th>
		<th><?php __('Location'); ?></th>
		<th class="width150"><?php __('Title'); ?></th>
		<th><?php __('Image'); ?></th>		
		<th><?php __('Currency'); ?></th>
		<th class="width100"><?php __('Cdate'); ?></th>
		
		<th class="width50"><?php __('Status'); ?></th>
		<th class="fleft"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Product'] as $product):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $product['id'];?></td>			
			<td>
				<?php echo $this->Html->link($product['code'], array('controller' => 'products', 'action' => 'view', $product['id'])); ?>				
			</td>
			<td><?php echo $product['location'];?></td>
			<td class="width150"><?php echo $product['title'];?></td>
			<td><?php echo $this->Html->image('product/'.$product['id'].'/'.$product['image'],array("alt"=>"Image","width"=>"32","title"=>$product['id']))?>
				
			</td>			
			<td><?php echo $product['currency'];?></td>
			<td class="width150"><?php echo $product['cdate'];?></td>
			
			<td class="width50"><?php echo $product['status'];?></td>
			<td class="fleft">
				<span>
						<?php 
							if($product['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-edit.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('controller' => 'products','action' => 'edit', $product['id']),array('escape'=>false));
							}
						?>
						
						<?php 
							if( $product['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-delete.png",array("alt"=>"Delete","width"=>"32","title"=>"Remove")), array('controller' => 'products','action' => 'delete', $product['id']), array('escape'=>false), sprintf(__('Are you sure you want to delete this product?', true))); 
							}
							else
							{
								echo $this->Html->link(__('Activate', true), array('controller' => 'products','action' => 'activate', $product['id']), array('class'=>'adminSubmitButton lpad28'), sprintf(__('Are you sure you want to activate this product?', true))); 
							}
						?>
						</span>		
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
