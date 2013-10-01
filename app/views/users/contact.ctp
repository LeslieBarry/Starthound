<?php echo($html->css(array('chrome','common','content','ie7','ie9','popup','stylesheet','thickbox')));?>
<?php echo($javascript->link(array('ajax/yahoo-min','ajax/event-min','ajax/connection-min','ajax/container-min','ajax/dom-min','common','validate','jquery/jquery.js','jquery/jquery-1.2.6.pack.js','jquery/jquery1.4.4.js','thickbox')));?>
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
								<script type="text/javascript">var host = (("https:" == document.location.protocol) ? "https://secure." : "http://");document.write(unescape("%3Cscript src='" + host + "wufoo.com/scripts/embed/form.js' type='text/javascript'%3E%3C/script%3E"));</script>

							<script type="text/javascript">
							var m7x3w7 = new WufooForm();
							m7x3w7.initialize({
							'userName':'cheapstart', 
							'formHash':'m7x3w7', 
							'autoResize':false,
							'height':'375',
							'header':'show'});
							m7x3w7.display();
							</script>
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