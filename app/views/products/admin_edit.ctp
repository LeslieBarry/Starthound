<h1><?php __('Edit Product'); ?></h1>
<div class="productFormDiv">
	<?php echo $this->Form->create('Product' ,array('type' => 'file'));?>			
			<?php echo $this->Form->input('id');?>
			<div class="adminformDivHeight mtop30">
				<span class="fleft adminformTxt">Category</span>
				<span class="fleft inputTxtBlue" >
					<?php echo $this->Form->input('category_id',array('label'=>false,'class'=>'adminformTxtBox','style'=>'margin-top:-5px;height:20px;'));?>
				</span>				
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Twitter Name</span>
				<span class="fleft inputTxtBlue" id="spanCode">
					<?php echo $this->Form->input('twittername',array('label'=>false,'class'=>'adminformTxtBox'));?>
				</span>
				<div id="dvError1" class="fleft alertTxt alert" style="display:none">Please enter twitter name</div>
			</div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">SEO Name</span>
				<span class="fleft inputTxtBlue" id="spanSEO">
					<?php echo $this->Form->input('seo_name',array('label'=>false,'class'=>'adminformTxtBox'));?>
				</span>
				<div id="dvError0" class="fleft alertTxt alert" style="display:none">Please enter SEO name</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Location</span>
				<span class="fleft inputTxtBlue" id="spanLocation">
					<?php echo $this->Form->input('location', array('type' => 'select','label'=>false, 'class'=>'adminformTxtBox','style'=>'margin-top:-5px;height:20px;'));?>

				</span>
				<div id="dvError2" class="fleft alertTxt alert" style="display:none">Please enter location</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Currency</span>
				<span class="fleft inputTxtBlue" id="spanCurrency">
					<?php echo $this->Form->input('currency', array('label'=>false, 'class'=>'adminformTxtBox'));?>				
				</span>
				<div id="dvError7" class="fleft alertTxt alert" style="display:none">Please enter Currency</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Title</span>
				<span class="fleft inputTxtBlue" id="spanTitle">
					<?php echo $this->Form->input('title',array('label'=>false,'class'=>'adminformTxtBox'));?>
				</span>
				<div id="dvError3" class="fleft alertTxt alert" style="display:none">Please enter title</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Image</span>
				<span class="fleft" id="spanTitle">
					<?php echo $this->Html->image("product/".$this->data['Product']['id']."/".$this->data['Product']['image'],array("alt"=>$this->data['Product']['image'],"width"=>"160","height"=>"60","title"=>"Remove"))?>
				</span>
				<div id="dvError3" class="fleft alertTxt alert" style="display:none">Please upload image</div>
			</div>
			<div class="clr"></div>
			
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Change Image</span>
				<span class="fleft inputTxtBlue" id="spanImage">
					<?php echo $this->Form->input('image',array('type'=>'hidden'));?>
					
					<?php echo $this->Form->file('NewImage',array('label'=>false,'class'=>'adminformTxtBox','style'=>'height:25px;margin-top:5px;','size'=>'17'));?>
					
				</span>
				<div id="dvError4" class="fleft alertTxt alert" style="display:none">Please upload image</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Link</span>
				<span class="fleft inputTxtBlue" id="spanLink">
					<?php echo $this->Form->input('link',array('label'=>false,'class'=>'adminformTxtBox'));?>
				</span>
				<div id="dvError5" class="fleft alertTxt alert" style="display:none">Please enter link</div>
			</div>
			<div class="clr"></div>
			<div class="adminformDivHeight mtop10">
				<span class="fleft adminformTxt">Description</span>
				<span class="fleft inputTextAreaBlue" id="spanDescription">
					<?php echo $this->Form->input('description',array('label'=>false,'class'=>'adminformTxtBoxArea'));?>

				</span>
				<div id="dvError6" class="fleft alertTxt alert" style="display:none">Please enter description</div>
			</div>
			<div class="clr"></div>
							
			<button type="button" onclick="redirectURL('<?php echo FULL_BASE_URL.$this->base.'/admin/products';?>')" class="adminSubmitButton">Cancel</button>
			<?php echo $form->button('Submit',array('type'=>'button','onClick'=>'validateProduct();','id'=>'submitButton','class'=>'adminSubmitButton'));?>

	<?php echo $this->Form->end();?>