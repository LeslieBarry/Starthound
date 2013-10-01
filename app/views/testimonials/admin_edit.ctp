<h1><?php __('Add Testimonial'); ?></h1>
<div class="productFormDiv">
<?php echo $form->create('Testimonial');?>
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Submitted By</span>
		<span class="fleft inputTxtBlue" id="spanName">
			<?php echo $this->Form->input('name',array('label'=>false,'class'=>'adminformTxtBox'));?>
		</span>
		<div id="dvError1" class="fleft alertTxt alert" style="display:none">Please enter name</div>
	</div>
	<div class="clr"></div>
	
	<div class="adminformDivHeight mtop10">
			<span class="fleft adminformTxt">testimonial</span>
			<span class="fleft inputTextAreaBlue" id="spanTestimonial">
				<?php echo $this->Form->input('testimonial',array('label'=>false,'class'=>'adminformTxtBoxArea'));?>
			</span>
			<div id="dvError2" class="fleft alertTxt alert" style="display:none">Please enter testimonial</div>
		</div>
		<div class="clr"></div>
	
			<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/admin/Categories';?>')" class="adminSubmitButton">Cancel</button>
			<?php echo $form->button('Submit',array('type'=>'button','onClick'=>'validateTestimonial();','id'=>'submitButton','class'=>'adminSubmitButton'));?>
	<?php echo $this->Form->end();?>

