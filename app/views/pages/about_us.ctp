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
						
						<P class="emailTxt">About Us</p>
					</div>
					<div class="formDiv">
						<div class="formDivIn">
							<div style="margin:30px 0 0 5px;padding:bottom10px;">
<p>Cheapstart has a single mission. To drive down the cost of doing business by using the best value for money, online software available to run your business.</p>

<p>By using our understanding of online software and expert knowledge to help you filter through the hundreds of products on offer, we are able to recommend the Top 3 products to help you improve each area of your business.</p>

<p>We are driven by your satisfaction with the recommended products, and ulimately, your improved productivity and cost savings.</p>

<p>Helping you work on and in your business, not spending hours playing with technology choices.</p>

<p>We will become successful only when you trust our recommendations and are happy using them. This drives all our decisions.</p>

<p>Getting you the right solution at the right price as easily as possible.</p>
							</div>
							<div class="clr"></div>
						</div>
						
						<div class="clr"></div>
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