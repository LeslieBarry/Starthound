<div class="adminform">
	<h1>Edit Text</h1>
<?php echo $form->create('AdminWord');?>
	<fieldset>
 		
	<?php
		echo $form->input('id');
	?>
	<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Text Description</span>
			<span class="fleft inputTextAreaBlue" id="spanPopupText">
				<?php echo $this->Form->input('content',array('type'=>'textarea','label'=>false,'class'=>'adminformTxtBoxArea',"onKeyDown"=>"limitText('AdminWordContent','descMaxLimit',400);", "onKeyUp"=>"limitText('AdminWordContent','descMaxLimit',400);"));?>
			</span>
			<div id="descMaxLimit" class="fleft blackCol"><?php echo 400-strlen($this->data['AdminWord']['content']);?></div>
			<div id="dvError8" class="fleft alertTxt alert" style="display:none">Please enter text description</div>
		</div>
		<div class="clr"></div>
	
	</fieldset>

			<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/admin/AdminWords';?>')" class="adminSubmitButton">Cancel</button>
			<?php echo $form->button('Submit',array('type'=>'button','onClick'=>'validatePopupText();','id'=>'submitButton','class'=>'adminSubmitButton'));?>
	<?php echo $this->Form->end();?>
</div>