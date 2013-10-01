<?php echo $this->Session->flash();?>
<div class="adminform">
	<?php echo $this->Form->create('Administrator', array('url' => array('controller'=>'administrators','action'=>'admin_changePassword'),'onSubmit'=>'return validateChangePassword();','label'=>false,'div' => false,'error' => array('wrap' => 'div','class' => 'alert')));?>
		<div class="adminformDivHeight mtop30">
			<?php echo $this->Form->input('id');?>
			<div class="adminformDivHeight mtop30">
				<span class="fleft adminformTxt">Old Password</span>
				<span class="fleft inputTxtBlue" id="spanOld">
					<?php echo $this->Form->input('Administrator.current',array('type'=>'password','label'=>false,'class'=>'adminformTxtBox')); ?>
				</span>
				<div id="dvError1" class="fleft alertTxt alert" style="display:none">Please enter your old password</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">New Password</span>
				<span class="fleft inputTxtBlue" id="spanNew">
					<?php echo $this->Form->input('Administrator.new_password',array('type'=>'password','label'=>false,'class'=>'adminformTxtBox'));?>
				</span>
				<div id="dvError2" class="fleft alertTxt alert" style="display:none">Please enter new password</div>
			</div>
			<div class="clr"></div>
			
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Confirm Password</span>
				<span class="fleft inputTxtBlue" id="spanConfirm">
					<?php echo $this->Form->input('Administrator.confirm_password',array('type'=>'password','label'=>false,'class'=>'adminformTxtBox'));
			?>
				</span>	
				<div id="dvError3" class="fleft alertTxt alert" style="display:none">Please re-enter new password</div>
				<div id="dvError4" class="fleft alertTxt alert" style="display:none">Confirm password and new password do not match</div>
			</div>
			<div class="clr"></div>			
		</div>
		<div class="clr"></div>					
		
		<div class="clr"></div>
	
	<div class="submitButton1">
			
			<?php //echo $form->button('Cancel',array('type'=>'button','onClick'=>'cancelFunction(FULL_BASE_URL.$this->base.'/administrators')','class'=>'adminSubmitButton'));?>
			<?php echo $form->submit('Submit',array('class'=>'adminSubmitButton'));?>
	</div>
	<?php echo $form->end(); ?>
	<div class="clr"></div>
</div>