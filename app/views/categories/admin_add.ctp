<?php echo $this->Session->flash();?>
<h1><?php __('Add Category'); ?></h1>
<div class="productFormDiv">
<?php echo $this->Form->create('Category' ,array('type' => 'file'));?>
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Title</span>
		<span class="fleft inputTxtBlue" id="spanTitle">
			<?php echo $this->Form->input('title',array('label'=>false,'class'=>'adminformTxtBox'));?>
		</span>
		<div id="dvError3" class="fleft alertTxt alert" style="display:none">Please enter title</div>
	</div>
	<div class="clr"></div>
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Order</span>
		<span class="fleft inputTxtBlue" id="spanOrder">
			<?php echo $this->Form->input('order',array('label'=>false,'value'=>$newOrder,'readonly'=>true,'class'=>'adminformTxtBox'));?>
		</span>
		<div id="dvError6" class="fleft alertTxt alert" style="display:none">Please enter order</div>
	</div>
	<div class="clr"></div>
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Selected Image</span>
		<span class="fleft inputTxtBlue" id="spanImage">
				
			<?php echo $this->Form->file('NewSelImage',array('label'=>false,'class'=>'adminformTxtBox','style'=>'height:25px;margin-top:5px;','size'=>'17'));?>
			
		</span>
		<div id="dvError4" class="fleft alertTxt alert" style="display:none">Please upload image</div>
	</div>
	<div class="clr"></div>
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Unselected Image</span>
		<span class="fleft inputTxtBlue" id="spanImage">
				
			<?php echo $this->Form->file('NewUnselImage',array('label'=>false,'class'=>'adminformTxtBox','style'=>'height:25px;margin-top:5px;','size'=>'17'));?>
			
		</span>
		<div id="dvError4" class="fleft alertTxt alert" style="display:none">Please upload image</div>
	</div>
	<div class="clr"></div>	
<div class="clr"></div>	
		
			<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/admin/Categories';?>')" class="adminSubmitButton">Cancel</button>
			<?php echo $form->button('Submit',array('type'=>'button','onClick'=>'validateCategory();','id'=>'submitButton','class'=>'adminSubmitButton'));?>
	<?php echo $this->Form->end();?>