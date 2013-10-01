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
<script>
$(document).ready(function() {
$(window).bind("load", function() {
var iOffSet = ($.browser.msie) ? 0 : 10; var iW = $(document.body).width();
var iH = $(document.body).height() + iOffSet;
// debug: use alert below to get calc dimensions on load
// alert("iframe: (w:" + iW + ", h:" + iH + ")");
// limit the window height and enable scrollbars

parent.$.fn.colorbox.myResize(iW, iH);
 }); });
</script>
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
							<div style="margin:30px 0 0 5px;padding-bottom-10px;">
								<?php echo $aboutUs;?>
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