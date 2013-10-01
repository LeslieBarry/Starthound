<h1><?php __('Edit category'); ?></h1>
<div class="productFormDiv">
<?php echo $this->Form->create('Category',array('type' => 'file'));?>	
	
	<?php echo $this->Form->input('id');?>
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Title</span>
		<span class="fleft inputTxtBlue" id="spanTitle">
			<?php echo $this->Form->input('title',array('label'=>false,'class'=>'adminformTxtBox'));?>
		</span>
		<div id="dvError3" class="fleft alertTxt alert" style="display:none">Please enter title</div>
	</div>
	<div class="clr"></div>
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Image for Selected</span>
		<span class="fleft">
			<?php echo $this->Html->image("category/".$this->data['Category']['id']."/selected/".$this->data['Category']['image'],array("alt"=>$this->data['Category']['image'],"width"=>"32","title"=>"Remove"))?>
		</span>
		<div id="dvError4" class="fleft alertTxt alert" style="display:none">Please upload image</div>
	</div>
	<div class="clr"></div>	
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Change Image</span>
		<span class="fleft inputTxtBlue" id="spanSelImage">
			<?php echo $this->Form->input('image',array('type'=>'hidden'));?>
			
			<?php echo $this->Form->file('NewSelImage',array('label'=>false,'class'=>'adminformTxtBox','style'=>'height:25px;margin-top:5px;','size'=>'17'));?>
			
		</span>
		<div id="dvError5" class="fleft alertTxt alert" style="display:none">Please upload image</div>
	</div>
	<div class="clr"></div>
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Image for Un-selected</span>
		<span class="fleft">
			<?php echo $this->Html->image("category/".$this->data['Category']['id']."/unselected/".$this->data['Category']['image'],array("alt"=>$this->data['Category']['image'],"width"=>"32","title"=>"Remove"))?>
		</span>
		<div id="dvError6" class="fleft alertTxt alert" style="display:none">Please upload image</div>
	</div>
	<div class="clr"></div>	
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Change Image</span>
		<span class="fleft inputTxtBlue" id="spanUnImage">			
			<?php echo $this->Form->file('NewUnselImage',array('label'=>false,'class'=>'adminformTxtBox','style'=>'height:25px;margin-top:5px;','size'=>'17'));?>
			
		</span>
		<div id="dvError6" class="fleft alertTxt alert" style="display:none">Please upload image</div>
	</div>
	<div class="clr"></div>
	<div class="adminformDivHeight mtop10">
		<span class="fleft adminformTxt">Order</span>
		<span class="fleft inputTxtBlue" id="spanOrder">
			<?php echo $this->Form->input('order',array('label'=>false,'class'=>'adminformTxtBox','style'=>'height:25px;margin-top:5px;','size'=>'17','readonly'=>true));?>
		</span>
		<div id="dvError6" class="fleft alertTxt alert" style="display:none">Please enter order</div>
	</div>
	<div class="clr"></div>						
			
			<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/admin/categories';?>')" class="adminSubmitButton">Cancel</button>
			<?php echo $form->button('Submit',array('type'=>'button','onClick'=>'validateCategory();','id'=>'submitButton','class'=>'adminSubmitButton'));?>
	<?php echo $this->Form->end();?>