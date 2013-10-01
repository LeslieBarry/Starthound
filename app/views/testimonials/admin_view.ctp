<h2><?php  __('Testimonial');?></h2>
<div class="productFormDiv">
<div class="mtop10"></div>
	<dl>
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $testimonial['Testimonial']['id']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Name'); ?></dd>
		<dt>
			<?php echo $testimonial['Testimonial']['name']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Testimonial'); ?></dd>
		<dt>
			<?php echo $testimonial['Testimonial']['testimonial']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Status'); ?></dd>
		<dt>
			<?php echo $testimonial['Testimonial']['status']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Advertise'); ?></dd>
		<dt>
			<?php echo $testimonial['Testimonial']['advertise']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Cdate'); ?></dd>
		<dt>
			<?php echo $testimonial['Testimonial']['cdate']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Mdate'); ?></dd>
		<dt>
			<?php echo $testimonial['Testimonial']['mdate']; ?>
		</dt>
		<div class="clr"></div>
	</dl>
	<div class="clr"></div>
	<div class="submitButton1">
		<?php echo $this->Html->link(__('Edit Testimonial', true), array('action' => 'edit', $testimonial['Testimonial']['id']),array('class'=>'adminSubmitButton')); ?> 
		<?php echo $this->Html->link(__('List Testimonial', true), array('action' => 'index'),array('class'=>'adminSubmitButton')); ?> 
	</div>
	<div class="clr"></div>
	</div>
