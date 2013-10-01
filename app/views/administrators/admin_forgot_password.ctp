<?php echo $this->Session->flash();?>
<div class="adminform">
	<?php echo $this->Session->flash('email'); ?>
	<?php echo $this->Form->create('Admin', array('url' => array('controller'=>'administrators'),'onSubmit'=>'return validateForgotPassword();','label'=>false,'div' => false,'error' => array('wrap' => 'div','class' => 'alert')));?>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Email Id</span>
			<span class="fleft inputTxtBlue" id='spanEmail'>
				<?php echo $form->input('username',array('class'=>'adminformTxtBox','label'=>false,'value'=>$email));?>				
			</span>
			<div id="dvError1" class="fleft alertTxt alert" style="display:none">Please enter your email-id</div>
			<div id="dvError2" class="fleft alertTxt alert" style="display:none">Please enter a valid email-id</div>
		</div>
		<div class="clr"></div>					
	<div class="submitButton1">
		<?php echo $form->submit('Submit',array('class'=>'adminSubmitButton'));?>				
	</div>
	<div class="submitButton1">
		<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/users';?>')" class="adminSubmitButton">Cancel</button>
		<?php //echo $form->button('Cancel',array('type'=>'button','onClick'=>'cancelFunction(FULL_BASE_URL.$this->base.'/administrators')','class'=>'adminSubmitButton'));?>
	</div>
	<?php echo $form->end(); ?>
	<div class="clr"></div>
</div>