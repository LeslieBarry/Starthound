<?php echo $this->Session->flash();?>
<div class="adminform">
	<?php echo $this->Form->create('Admin', array('url' => array('controller'=>'administrators','action'=>'admin_login'),'onSubmit'=>'return validateLogin();','label'=>false,'div' => false,'error' => array('wrap' => 'div','class' => 'alert')));?>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">User Name</span>
			<span class="fleft inputTxtBlue" id='spanEmail'>
				<?php echo $form->input('username',array('class'=>'adminformTxtBox','label'=>false));?>
			</span>
			<div id="dvError1" class="fleft alertTxt alert" style="display:none">Please enter a valid email-id</div>
		</div>
		<div class="clr"></div>
		
		<div class="adminformDivHeight mtop10">
			<span class="fleft adminformTxt">Password</span>
			<span class="fleft inputTxtBlue" id="spanPassword">
				<?php echo $form->input('password',array('class'=>'adminformTxtBox','label'=>false));?>
			</span>
			<div id="dvError2" class="fleft alertTxt alert" style="display:none">Please enter password</div>
		</div>
		<div class="clr"></div>
		<div class="forgetPassword">
			<?php echo $this->Html->link('Forgot password', '/admin/administrators/forgotPassword'); ?>
		</div>
		<div class="clr"></div>

		<div class="submitButton1">
			<?php echo $form->submit('Submit',array('class'=>'adminSubmitButton'));?>
		</div>
		<?php echo $form->end(); ?>
		<div class="clr"></div>
</div>