<?php echo($html->css(array('chrome','common','content','ie7','ie9','popup','stylesheet')));?>
<?php echo($javascript->link(array('common','validate','jquery/jquery.js','jquery/jquery-1.2.6.pack.js','jquery/jquery1.4.4.js')));?>
<div class="popup">
	
		<div class="popupTop">
			<div class="popupTopRight"></div>		
			<div class="popupTopLeft"></div>
			<div class="clr"></div>
		</div>
		
		
		<div class="popupMid">
			<div class="poupmidLeft">
				<div class="poupmidRight">
					<div class="midTop">
						<?php 					
							echo $this->Html->link($this->Html->image("btn_close.png",array('class'=>'closeButton')),"javascript:closePopup()",array('escape' => false));  
						?>
						
						<P class="emailTxt">Contact Us</P>
					</div>
					<div class="formDiv">
						<div class="formDivIn" style="padding-top:15px;">							
							<?php echo $this->Form->create('Message');?>
								<div class="formDivHeight mtop5">
									<span class="fleft msgformTxt">Email  Address</span>
									<span class="fleft msgTxtBlue" id="spanEmail">
										<?php echo $form->input('email',array('class'=>'msgTxtBox','label'=>false));?>
									</span>
									<div id="dvError1" class="fleft alertTxt" style="display:none">*</div>
								</div>
								<div class="clr"></div>
								<div class="formDivHeight mtop10">
									<span class="fleft msgformTxt">Message</span>
									<span class="fleft inputTextAreaBlue" id="spanMessage">
										<?php echo $this->Form->input('message',array('label'=>false,'class'=>'msgTxtBoxArea'));?>
									</span>
									<div id="dvError2" class="fleft alertTxt" style="display:none">*</div>
								</div>
								<div class="clr"></div>
								<?php echo $this->Form->button('',array("type"=>"button","id" =>"contactus","class"=>" contactus","onmouseover"=>"changeclass('contactus','contactus','contactusOver')","onmouseout"=>"changeclass('contactus','contactusOver','contactus')","onclick"=>"validateMessage()"));?>	
								<div class="clr"></div>
					<?php echo $this->Form->end();?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
	
		<div class="popupBottom">
			<div class="popupBottomRight"></div>		
			<div class="popupBottomLeft"></div>
			<div class="clr"></div>
		</div>
		
		
		
	</div>	