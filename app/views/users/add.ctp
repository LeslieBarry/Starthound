<?php 
		$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
		$isAndroid = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'android');
		$isIE = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'ie');
		if($isiPad || $isAndroid)		
		{ 
	?>
		<meta name="viewport" content="width=768px, minimum-scale=1.0, maximum-scale=1.0" />
	<?php	
		echo($html->css(array('chrome','common','ipad','ie7','ie9','ipadpopup','stylesheet','colorbox')));
	} 
	else if($isIE)
	{
		echo($html->css(array('chrome','common','content','ie7','ie9','iepopup','stylesheet','colorbox')));
	}
	else
	{
		echo($html->css(array('chrome','common','content','ie7','ie9','popup','stylesheet','colorbox')));
	}
	?>
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
							echo $this->Form->create(null,array('id'=>'productForm','url'=>'/product/index'));
							echo $this->Form->input('',array('id'=>'txtHomeProduct','name'=>'txtHomeProduct','type'=>'hidden','value'=>$productId));
							echo $this->Html->link($this->Html->image("btn_close.png",array('class'=>'closeButton')),"javascript:goBack()",array('escape' => false));  
							echo $this->Form->end();
						?>
						
						<P class="emailTxt">Send my software list</P>
					</div>
					<div class="formDiv">
						<div class="formDivIn">
							<?php echo $form->create('User',array("class"=>"formbackcolor"));?>
								<?php echo $form->input('shortURLIds',array('type'=>'hidden','value'=>$shortURLIds,'class'=>'formTxtBox','label'=>false));?>
								<div class="formDivHeight mtop30">
									<span class="fleft formTxt">First Name</span>
									<span class="fleft inputTxtBlue" id="spanFirstname">
										<?php echo $form->input('firstname',array('class'=>'formTxtBox','label'=>false));?>
										
									</span>
									<div id="dvError1" class="fleft alertTxt alert" style="display:none">Please enter your first name</div>
								</div>
								<div class="clr"></div>
								
								<div class="formDivHeight">
									<span class="fleft formTxt">Last Name</span>
									<span class="fleft inputTxtBlue" id="spanLastname">
										<?php echo $form->input('lastname',array('class'=>'formTxtBox','label'=>false));?>
										
									</span>
									<div id="dvError2" class="fleft alertTxt alert" style="display:none">Please enter your last name</div>
								</div>
								<div class="clr"></div>
								
								<div class="formDivHeight mtop5">
									<span class="fleft formTxt">Email  Address</span>
									<span class="fleft inputTxtBlue" id="spanEmail">
										<?php echo $form->input('email',array('class'=>'formTxtBox','label'=>false));?>
									</span>
									<div id="dvError3" class="fleft alertTxt alert" style="display:none">Please enter your email</div>
								</div>
								
								<div class="formDivHeight mtop5">
									<span class="fleft formTxt">Organisation</span>
									<span class="fleft inputTxtBlue" id="spanOrganization">
										<?php echo $form->input('organization',array('class'=>'formTxtBox','label'=>false));?>
										
									</span>
									<div id="dvError4" class="fleft alertTxt alert" style="display:none">Please enter organisation</div>
								</div>
								
								<div class="formDivHeight mtop5">
									<span class="fleft formTxt">Industry</span>
									<span class="fleft inputTxtBlue" id="spanPostion">
										<?php echo $form->input('industry',array('class'=>'formTxtBox','label'=>false,'type'=>'select','style'=>'margin-top:-5px;height:20px;'));?>
									</span>
									<div id="dvError5" class="fleft alertTxt alert" style="display:none">Please select your industry</div>
								</div>
								
								<div class="formDivHeight mtop5">
									<span class="fleft formTxt">Postcode</span>
									<span class="fleft inputTxtBlue" id="spanPostcode">
										<?php echo $form->input('postcode',array('class'=>'formTxtBox','label'=>false));?>
									</span>
									<div id="dvError6" class="fleft alertTxt alert" style="display:none">Please enter your postal code</div>
								</div>
								<div class="formDivHeightTxt">
									All fields are mandatory
								</div>
						</div>
						
						<div class="clr"></div>
						
						<div class="borderGray"></div>
						<div class="popupBottomSection">
						<br/>
							<div class="popupRegistration">
								<span class="RegistrationCheck">
								<?php echo $this->Form->input('newsRegister',array('type'=>'checkbox','label'=>false));?>
									
								</span>
								<span class="mleft5">Receive exclusive discounts & product offers.</span>
								<div class="clr"></div>
							</div>
							
							<p class="fleft popLeftTxt"><?php echo $textAdmin;?></p>
                           

							<div class="fright">
								<?php echo $this->Form->button('',array("type"=>"button","id" =>"sendPicks","class"=>"  sendPicks","onmouseover"=>"changeclass('sendPicks',' sendPicks','sendPicksOver')","onmouseout"=>"changeclass('sendPicks','sendPicksOver',' sendPicks')","onclick"=>"registerUser('$this->base/product/email_template/?shortURLIds=$shortURLIds')"));?>
								
									
							</form>
							<form action="http://cheapstart.us2.list-manage.com/subscribe/post?u=ebaf3a9479d4c4a04bbc91350&amp;id=55e90d73c6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
							<input type="text" value="" name="EMAIL" id="mce-EMAIL" style="display:none"/>
							<input type="text" value="" name="FNAME" id="mce-FNAME" style="display:none"/>
							<input type="text" value="" name="LNAME" id="mce-LNAME" style="display:none"/>
							<input type="text" value="" name="COMPANY" id="mce-COMPANY" style="display:none"/>
							</form>	
								
							</div>
							<div class="clr"></div>
							
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