<h2><?php  __('Text for popup');?></h2>
<div class="productFormDiv">
	<div class="mtop10"></div>
	<dl>
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $adminWord['AdminWord']['id']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Content'); ?></dd>
		<dt>
			<?php echo $adminWord['AdminWord']['content']; ?>
			
		</dt>
		<div class="clr"></div>
	</dl>
	<div class="clr"></div>
				<div class="submitButton1">
					<?php echo $this->Html->link(__('Edit Text', true), array('action' => 'edit', $adminWord['AdminWord']['id']),array('class'=>'adminSubmitButton','style'=>'padding-left:20px')); ?> 
					<?php echo $this->Html->link(__('List Text', true), array('action' => 'index'),array('class'=>'adminSubmitButton','style'=>'padding-left:20px')); ?> 
				</div>
				<div class="clr"></div>
</div>