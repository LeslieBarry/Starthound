<div class="adminform">
	<label class="editBanner">Edit Banner</label>	
	<?php echo $this->Form->create('Banner', array('inputDefaults' => array('label' => false,'div' => true,'error' => array('wrap' => 'div','class' => 'alert'))));?>
	<fieldset> 
		<?php echo $this->Form->input('id');?>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Text For First Step</span>
			<span class="fleft inputTxtBlue" id="spanTxt1">
				<?php echo $this->Form->input('txt1', array('label' =>false,'class'=>'adminformTxtBox'));?>
			</span>
			<div id="dvError1" class="fleft alertTxt alert" style="display:none">Please enter text</div>
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop10">
			<span class="fleft adminformTxt">Text For Second Step</span>
			<span class="fleft inputTxtBlue" id="spanTxt2">
				<?php echo $this->Form->input('txt2', array('label' =>false,'class'=>'adminformTxtBox'));?>
			</span>	
			<div id="dvError2" class="fleft alertTxt alert" style="display:none">Please enter text</div>
		</div>
		<div class="clr"></div>
		
		<div class="adminformDivHeight mtop10">
			<span class="fleft adminformTxt">Text For Third Step</span>
			<span class="fleft inputTxtBlue" id="spanTxt3">
				<?php echo $this->Form->input('txt3', array('label' =>false,'class'=>'adminformTxtBox'));?>
			</span>	
			<div id="dvError3" class="fleft alertTxt alert" style="display:none">Please enter text</div>
		</div>
		<div class="clr"></div>
		<div class="mtop15"></div>
	</fieldset>
	
			<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/banners';?>')" class="adminSubmitButton">Cancel</button>
			<?php echo $form->button('Submit',array('type'=>'button','onClick'=>'validateBanner();','id'=>'submitButton','class'=>'adminSubmitButton'));?>
	<?php echo $this->Form->end();?>
</div>