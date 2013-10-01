
<h1><?php __('Edit Rating'); ?></h1>
<div class="productFormDiv">
<?php echo $form->create('Rating');?>
	
	<?php echo $form->input('id');?>
		
		<div class="adminformDivHeight mtop30">
				<span class="fleft adminformTxt">Product</span>
				<span class="fleft inputTxtBlue" style="padding:7px;" >
					<?php echo $this->data['Product']['title'];?>
				</span>				
			</div>
			<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
				<span class="fleft adminformTxt">Functionality</span>
				<span class="fleft" style="padding:7px;" >
					<?php echo $form->input('functionality',array('options'=>$ratings,'label'=>false));?>
				</span>				
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
				<span class="fleft adminformTxt">Reliability</span>
				<span class="fleft" style="padding:7px;" >					
						<?php echo $form->input('reliability',array('options'=>$ratings,'label'=>false));?>
				</span>				
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
				<span class="fleft adminformTxt">Ease of Use</span>					
					<span class="fleft" style="padding:7px;" >					
						<?php echo $form->input('ease_of_use',array('options'=>$ratings,'label'=>false));?>
				
				</span>				
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
				<span class="fleft adminformTxt">Value for money</span>
				<span class="fleft" style="padding:7px;" >
					<?php echo $form->input('value_for_money',array('options'=>$ratings,'label'=>false));?>
				</span>				
		</div>
		<div class="clr"></div>	
				
			<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/admin/ratings';?>')" class="adminSubmitButton">Cancel</button>
			<?php echo $form->button('Submit',array('type'=>'submit','id'=>'submitButton','class'=>'adminSubmitButton'));?>

	<?php echo $this->Form->end();?>