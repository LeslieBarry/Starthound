<h1><?php __('Edit Productplan'); ?></h1>
<div class="productFormDiv">
<?php echo $this->Form->create('Productplan');?>
	
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Product</span>
			<span class="fleft inputTxtBlue" id="spanProduct">
				<?php echo $this->Form->input('product_id',array('label'=>false,'class'=>'adminformTxtBox','style'=>'margin-top:-5px;'));?>
			</span>
			<div id="dvError" class="fleft alertTxt alert" style="display:none">Please select product</div>			
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Plan</span>
			<span class="fleft inputTxtBlue" id="spanPlan" >
				<?php echo $this->Form->input('plan', array('type'=>'text','readonly'=>true,'label'=>false, 'class'=>'adminformTxtBox'));?>
			</span>
			<div id="dvError1" class="fleft alertTxt alert" style="display:none">Please select plan</div>
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Title</span>
			<span class="fleft inputTxtBlue" id="spanTitle">
				<?php echo $this->Form->input('title',array('label'=>false,'class'=>'adminformTxtBox'));?>
			</span>			
			<div id="dvError3" class="fleft alertTxt alert" style="display:none">Please enter title</div>			
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Set Up Cost</span>
			<span class="fleft inputTxtBlue" id="spanSetupcost">
				<?php echo $this->Form->input('setupcost',array('label'=>false,'class'=>'adminformTxtBox'));?>
			</span>
			<div class="fleft blackCol"></div>
			<div id="dvError2" class="fleft alertTxt alert" style="display:none">Please enter setup cost</div>			
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Monthly Cost</span>
			<span class="fleft inputTxtBlue" id="spanMonthly">
				<?php echo $this->Form->input('monthlycost',array('label'=>false,'class'=>'adminformTxtBox'));?>
			</span>
			<div class="fleft blackCol"></div>
			<div id="dvError4" class="fleft alertTxt alert" style="display:none">Please enter monthly cost</div>			
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Yearly Cost</span>
			<span class="fleft inputTxtBlue" id="spanYearly">
				<?php echo $this->Form->input('yearlycost',array('label'=>false,'class'=>'adminformTxtBox'));?>
			</span>
			<div class="fleft blackCol"></div>
			<div id="dvError6" class="fleft alertTxt alert" style="display:none">Please enter yearly cost</div>			
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Short Description</span>
			<span class="fleft inputTextAreaBlue" id="spanShortDesc">
				<?php echo $this->Form->input('short_desc',array('type'=>'textarea','label'=>false,'class'=>'adminformTxtBoxArea',"onKeyDown"=>"limitText('ProductplanShortDesc','descMaxLimit',255);", "onKeyUp"=>"limitText('ProductplanShortDesc','descMaxLimit',255);"));?>
			</span>
			<div id="descMaxLimit" class="fleft blackCol"><?php echo 255-strlen($this->data['Productplan']['short_desc']);?></div>
			<div id="dvError8" class="fleft alertTxt alert" style="display:none">Please enter short description</div>
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Detail Description</span>
			<span class="fleft inputTextAreaBlue" id="spanDetailDesc">
				<?php echo $this->Form->input('detail_desc',array('label'=>false,'class'=>'adminformTxtBoxArea'));?>
			</span>
			<div id="dvError9" class="fleft alertTxt alert" style="display:none">Please enter detail description</div>
		</div>
		<div class="clr"></div>
		<div class="adminformDivHeight mtop30">
			<span class="fleft adminformTxt">Plan Limit</span>
			<span class="fleft inputTextAreaBlue" id="spanPlanLimit">
				<?php echo $this->Form->input('plan_limit',array('type'=>'textarea','label'=>false,'class'=>'adminformTxtBoxArea',"onKeyDown"=>"limitText('ProductplanPlanLimit','planMaxLimit',255);", "onKeyUp"=>"limitText('ProductplanPlanLimit','planMaxLimit',255);"));?>
			</span>
			<div id="planMaxLimit" class="fleft blackCol"><?php echo 255-strlen($this->data['Productplan']['plan_limit']);?></div>
			<div id="dvError10" class="fleft alertTxt alert" style="display:none">Please enter plan limit</div>
		</div>
		<div class="clr"></div>
		
		
	
		<div class="adminformDivHeight mtop30">
				<span class="fleft adminformTxt">Term</span>
				<span class="fleft inputTxtBlue" id="spanPrimaryCond">
					<?php echo $this->Form->input('terms',array('label'=>false,'class'=>'adminformTxtBox'));?>
				</span>				
				<div id="dvError14" class="fleft alertTxt alert" style="display:none">Please select Term</div>
		</div>
		<div class="clr"></div>		
		
	
			<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/admin/Productplans';?>')" class="adminSubmitButton">Cancel</button>
			<?php echo $form->button('Submit',array('type'=>'button','onClick'=>'validateProductPlan();','id'=>'submitButton','class'=>'adminSubmitButton'));?>
	<?php echo $this->Form->end();?>
</div>