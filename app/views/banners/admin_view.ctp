<h2><?php  __('Banner');?></h2>
<div class="productFormDiv">
	<div class="mtop10"></div>
	<dl>
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $banner['Banner']['id']; ?>			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Text for Step 1'); ?></dd>
		<dt>
			<?php echo $banner['Banner']['txt1']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Text for Step 2'); ?></dd>
		<dt>
			<?php echo $banner['Banner']['txt2']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Text for Step 3'); ?></dd>
		<dt>
			<?php echo $banner['Banner']['txt3']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Created On'); ?></dd>
		<dt>
			<?php echo $banner['Banner']['cdate']; ?>
			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Modified On'); ?></dd>
		<dt>
			<?php echo $banner['Banner']['mdate']; ?>
			
		</dt>		
		<div class="clr"></div>
	</dl>
	<div class="clr"></div>
				<div class="submitButton1">
					<?php echo $this->Html->link(__('Edit Banner', true), array('action' => 'edit', $banner['Banner']['id']),array('class'=>'adminSubmitButton')); ?> 
					<?php echo $this->Html->link(__('List Banners', true), array('action' => 'index'),array('class'=>'adminSubmitButton')); ?> 
				</div>
				<div class="clr"></div>
</div>