<h2><?php  __('Product Plans');?></h2>
<div class="productFormDiv">
	<div class="mtop10"></div>
	<dl>
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['id']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Product'); ?></dd>
		<dt>
			<?php echo $this->Html->link($productplan['Product']['title'], array('controller' => 'products', 'action' => 'view', $productplan['Product']['id'])); ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Plan'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['plan']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Title'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['title']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Setup Cost'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['setupcost']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Monthly Cost'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['monthlycost']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Yearly Cost'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['yearlycost']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Short Description'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['short_desc']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Detail Description'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['detail_desc']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Plan Limit'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['plan_limit']; ?>
			
		</dt>
		<div class="clr"></div>	
		
		<dd><?php __('Term'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['terms']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Created On'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['cdate']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Last Modified On'); ?></dd>
		<dt>
			<?php echo $productplan['Productplan']['mdate']; ?>
			
		</dt>
		<div class="clr"></div>
		
	</dl>
	<div class="clr"></div>
	<div class="submitButton1">
		<?php echo $this->Html->link(__('Edit Plan', true), array('action' => 'edit', $productplan['Productplan']['id']),array('class'=>'adminSubmitButton')); ?> 
		<?php echo $this->Html->link(__('List Plans', true), array('action' => 'index'),array('class'=>'adminSubmitButton')); ?> 
	</div>
	<div class="clr"></div>
	</div>
	
	
	
	<div class="clr"></div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li>
			<?php 
				if( $productplan['Productplan']['status']=='active')
				{
					echo $this->Html->link(__('Edit Productplan', true), array('action' => 'edit', $productplan['Productplan']['id'])); 
				}
			?> 
		</li>
		<li>
			<?php 
				if( $productplan['Productplan']['status']=='active')
				{
					echo $this->Html->link(__('Delete', true), array('action' => 'delete', $productplan['Productplan']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productplan['Productplan']['id'])); 
				}
				else
				{
					echo $this->Html->link(__('Acivate', true), array('action' => 'activate', $productplan['Productplan']['id']), null, sprintf(__('Are you sure you want to activate # %s?', true), $productplan['Productplan']['id'])); 
				}
			?>
		</li>			
	</ul>
</div>
