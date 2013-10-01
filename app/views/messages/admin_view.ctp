<h2><?php  __('Message');?></h2>
<div class="productFormDiv">
<div class="mtop10"></div>
	<dl>
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $message['Message']['id']; ?>
			&nbsp;
		</dt>
		<div class="clr"></div>
		<dd><?php __('Email'); ?></dd>
		<dt>
			<?php echo $message['Message']['email']; ?>
			&nbsp;
		</dt>
		<div class="clr"></div>
		<dd><?php __('Message'); ?></dd>
		<dt>
			<?php echo $message['Message']['message']; ?>
			&nbsp;
		</dt>
		<div class="clr"></div>
		<dd><?php __('Cdate'); ?></dd>
		<dt>
			<?php echo $message['Message']['cdate']; ?>
			&nbsp;
		</dt>
		<div class="clr"></div>
	</dl>
<div class="clr"></div>
	<div class="submitButton1">
		 
		<?php echo $this->Html->link(__('Message List', true), array('action' => 'index'),array('class'=>'adminSubmitButton')); ?> 
	</div>
	<div class="clr"></div>
	</div>