<div class="adminform">
	<h1>Edit Number</h1>
<?php echo $form->create('ProductNumber');?>
	<fieldset>
 		
	<?php
		echo $form->input('id');
	?>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Number of products to rotate</span>
			<span class="fleft inputTxtBlue" id="spanNumber">
				<?php echo $this->Form->input('prodToRotate',array('label'=>false,'class'=>'adminformTxtBox'));?>
			</span>
			
			<div id="dvError8" class="fleft alertTxt alert" style="display:none">Please enter number</div>
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Speed in milliseconds</span>
			<span class="fleft inputTxtBlue" id="spanSpeed">
				<?php echo $this->Form->input('speed',array('label'=>false,'class'=>'adminformTxtBox'));?>
			</span>
			
			<div id="dvError7" class="fleft alertTxt alert" style="display:none">Please enter speed</div>
		</div>
	
		
	</fieldset>

			<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/admin/ProductNumbers';?>')" class="adminSubmitButton">Cancel</button>
			<?php echo $form->button('Submit',array('type'=>'button','onClick'=>'validateProductNumber();','id'=>'submitButton','class'=>'adminSubmitButton'));?>
	
	<?php echo $this->Form->end();?>
</div>