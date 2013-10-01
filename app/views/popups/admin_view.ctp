<h2><?php  __('Text on Popups');?></h2>
<div class="productFormDiv">
	<div class="mtop10"></div>
	<dl>
	
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $Popup['Popup']['id']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('About Us'); ?></dd>
		<dt>
			<?php echo $Popup['Popup']['about_us']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Terms of Use'); ?></dd>
		<dt>
			<?php echo $Popup['Popup']['disclaimer']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Privacy Policy'); ?></dd>
		<dt>
			<?php echo $Popup['Popup']['terms']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Contact Us'); ?></dd>
		<dt>
			<?php echo $Popup['Popup']['contact_us']; ?>
		</dt>
		<div class="clr"></div>
	</dl>
	<div class="clr"></div>
	<div class="submitButton1">
		<?php echo $html->link(__('Edit Popup', true), array('action' => 'edit', $Popup['Popup']['id']),array('class'=>'adminSubmitButton')); ?>
		<?php echo $html->link(__('List Popups', true), array('action' => 'index'),array('class'=>'adminSubmitButton')); ?> 		
	</div>
	<div class="clr"></div>
	</div>