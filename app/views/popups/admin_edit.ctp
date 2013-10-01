<h1><?php __('Edit Popups'); ?></h1>
<div class="productFormDiv">
<?php echo $form->create('Popup');?>
	
		<?php echo $form->input('id');?>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">About Us</span>
				<span class="fleft" id="spanAboutUs">
					<?php echo $this->Form->input('about_us',array('label'=>false,'style'=>'height:120px;width:400px'));?>

				</span>
				<div id="dvError1" class="fleft alertTxt alert" style="display:none">Please enter text</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Terms of Use</span>
				<span class="fleft" id="spanDisclaimer">
					<?php echo $this->Form->input('disclaimer',array('label'=>false,'style'=>'height:120px;width:400px'));?>

				</span>
				<div id="dvError2" class="fleft alertTxt alert" style="display:none">Please enter text</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Pricay Policy</span>
				<span class="fleft" id="spanTerms">
					<?php echo $this->Form->input('terms',array('label'=>false,'style'=>'height:120px;width:400px'));?>

				</span>
				<div id="dvError3" class="fleft alertTxt alert" style="display:none">Please enter text</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Contact Us</span>
				<span class="fleft" id="spanContact">
					<?php echo $this->Form->input('contact_us',array('label'=>false,'style'=>'height:120px;width:400px'));?>

				</span>
				<div id="dvError4" class="fleft alertTxt alert" style="display:none">Please enter text</div>
			</div>
			<div class="clr"></div>
			<div class="mtop10">
				<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/admin/Popups';?>')" class="adminSubmitButton">Cancel</button>
						<?php echo $form->button('Submit',array('type'=>'button','onClick'=>'validateTextOnPopups();','id'=>'submitButton','class'=>'adminSubmitButton'));?>
			</div>
			<div class="clr"></div>
	<?php echo $this->Form->end();?>
	

</div>

