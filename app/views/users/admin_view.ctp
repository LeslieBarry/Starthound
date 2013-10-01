<h2><?php  __('Customer Report');?></h2>
<div class="productFormDiv">
	<div class="mtop10"></div>
	<dl>
		<dd><?php __('Customer'); ?></dd>
		<dt>
			<?php echo ucwords($customer['User']['firstname'])." ".ucwords($customer['User']['lastname']); ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Email'); ?></dd>
		<dt>
			<?php echo $customer['User']['email']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Category'); ?></dd>
		<dt>
			<?php echo ucwords($customer['Category']['Category']['title']); ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Product'); ?></dd>
		<dt>
			<?php echo ucwords($customer['Product']['Product']['title']); ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Product Link'); ?></dd>
		<dt>
			<?php echo $customer['Product']['Product']['link']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Product Plan'); ?></dd>
		<dt>
			<?php echo $customer['Plan']['Productplan']['plan'];; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Monthly Cost'); ?></dd>
		<dt>
			<?php echo $customer['Plan']['Productplan']['monthlycost']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Emailpicks Created on'); ?></dd>
		<dt>
			<?php echo $customer['User']['cdate']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Short Url'); ?></dd>
		<dt>customer
			<?php echo $customer['Googledatum']['Googledatum']['short_url'];?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Short Url Clicked On'); ?></dd>
		<dt>
			<?php echo $customer['Googledatum']['Googledatum']['mdate']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Postal Code'); ?></dd>
		<dt>
			<?php echo $customer['User']['postcode']; ?>
		<div class="clr"></div>
	</dl>
	<div class="clr"></div>
	<div class="submitButton1">
		
		<?php echo $this->Html->link(__('List Customers', true), array('action' => 'index'),array('class'=>'adminSubmitButton')); ?> 
	</div>
	<div class="clr"></div>
	</div>