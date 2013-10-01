<h2><?php  __('Number of products to rotate');?></h2>
<div class="productFormDiv">
	<div class="mtop10"></div>
	<dl>
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $productNumber['ProductNumber']['id']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('How Many Products to display'); ?></dd>
		<dt>
			<?php echo $productNumber['ProductNumber']['prodToRotate']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Speed'); ?></dd>
		<dt>
			<?php echo $productNumber['ProductNumber']['speed']; ?>
			
		</dt>
		<div class="clr"></div>
	</dl>
	<div class="clr"></div>
				<div class="submitButton1">
					<?php echo $this->Html->link(__('Edit Text', true), array('action' => 'edit', $productNumber['ProductNumber']['id']),array('class'=>'adminSubmitButton','style'=>'padding-left:20px')); ?> 
					<?php echo $this->Html->link(__('List Text', true), array('action' => 'index'),array('class'=>'adminSubmitButton','style'=>'padding-left:20px')); ?> 
				</div>
				<div class="clr"></div>
</div>