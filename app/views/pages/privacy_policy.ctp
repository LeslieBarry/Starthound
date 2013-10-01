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
						
						<P class="emailTxt">Privacy Policy</p>
					</div>
					<div class="formDiv">
						<div class="formDivIn">
							<div style="margin:30px 0 0 5px;padding:bottom10px;">
Cheapstart recognises the importance of an individual's privacy. The Privacy Act 1988 provides principles that the company is committed to meeting and exceeding.
cheapstart's privacy policy is to:
<ul style="disc">
		<li>
		Only collect personal information that is lawful, fair and not intrusive.
		</li>
		<li>
		Only use or disclose personal information about an individual for the purpose of collection.
		</li>
		<li>
		Take reasonable steps to protect the personal information it holds, and will destroy or permanently delete.
		</li>
		<li>
		Identify personal information if it is no longer needed.
		</li>
		<li>
		Openly allow an individual(s) access to the personal information held by Cheapstart and the right to correct the information where necessary.
		</li>
		<li>
		Not use an identifier that is assigned by a Commonwealth government agency.
		</li>
		<li>
		Only transfer personal information overseas if that country and/or organisation has similar privacy protection safeguards in place.
		</li>
		<li>
		Not intentionally collect sensitive information about an individual unless the person has consented.
		</li>
</ul>
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