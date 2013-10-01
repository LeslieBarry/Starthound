<?php if($online ==false){?>
<script>
	$(document).ready(function() {        
               $('#popupLink').click();  
				$(".footerPopup").colorbox({width:"100%", height:"100%", iframe:true});
});

</script><?php }?>
<div class="emailHeaderSection">
		
		<div class="newHeaderEmailRight">
		    <h6><strong>Thank you for using cheapstart</strong></h6>
		</div>
		<div class="clr"></div>
	</div>
	
    
    
    <div class="emailBottomSection">
		<?php echo $this->Html->image("email_table_top.png",array("alt"=>"EmailtableTop","width"=>"845","height"=>"10"));?>
		<div class="clr"></div>
		<div class="emailBottomSectionMid">
		<?php $rownum=0;?>

            <div class="fleft txtTop">            	
               Why Wait? Click on the “Learn More” button and <br/>start growing your business!
            </div>
            <div class="fright padd">
					<div class="resultBackground">
						<h6 class="whitecolor">Estimated Cost</h6>
					</div>
					<div class="emailcostMiddle">
						<ul>
							<li>
								<span class="costTxt darkGray">Setup Cost</span>
								<span class="cost darkGBlue">&#36 <?php echo sprintf("%01.2f",$setupCost); ?></span>
								<label class="clr"></label>
							</li>
							<div class="costBorder"></div>
							<li>
								<span class="costTxt darkGray">Monthly Cost</span>
								<span class="cost darkGBlue">&#36 <?php echo sprintf("%01.2f",$monthlyCost); ?></span>
								<label class="clr"></label>
							</li>
							<div class="costBorder"></div>
							<li>
								<span class="costTxt darkGray">Yearly Cost</span>
								<span class="cost darkGBlue">&#36 <?php echo sprintf("%01.2f",$yearlyCost); ?></span>
								<label class="clr"></label>
							</li>
							
						</ul>

					</div>
					<?php echo $this->Html->image("box3_bottom.png",array("alt"=>"Result Bottom Bar","width"=>"198","height"=>"15"));?>
					
				</div>
        
			<div class="clr"></div>
        </div>
        <div class="clr"></div>    
		<?php echo $this->Html->image("email_table_bottom.png",array("alt"=>"EmailtableBottom","width"=>"845","height"=>"8"));?>
		<?php echo $this->Html->link("a",array('controller'=>'users','action'=>'add/?shortURLIds='.$shortURLIds),array('class'=>'footerPopup','id'=>'popupLink','style'=>'display:none;'));  
					?>	
		<div class="clr"></div>
	</div>
    
    
    
    
    
		
	<div class="emailBottomSection">
		<?php echo $this->Html->image("email_table_top.png",array("alt"=>"EmailtableTop","width"=>"845","height"=>"10"));?>
		<div class="clr"></div>
		<div class="emailBottomSectionMid">
		<?php $rownum=0;?>
			<table border="0" cellpadding="0" cellspacing="0" style="margin:0 1px;" class="emailTable">
				<thead>
					<tr>
						<th width="221">Category</th>
						<th width="148">Product</th>
						<th width="148">Edition</th>
						<th width="148">Price*</th>
						<th width="148">Term</th>
						<th width="136" class="lastBorderNone">Learn More</th>
					</tr>
				</thead>
					<?php foreach($emailSelects as $emailSelect){?>						
					<tr <?php echo $rownum%2==0?'class="emailwhilte"':'class="emailLightBlue"';?>>
						<td><div class="emailTableLeftTxt"><?php echo $emailSelect['Category']['title']?></div></td>
						<td><?php echo $emailSelect['Product']['title']?></td>
						<td><?php echo $emailSelect['Productplan']['title']?></td>
						<td class="edition">
						<?php 
							if($emailSelect['Productplan']['setupcost']>0)
							{
								echo '$'.sprintf("%01.2f",$emailSelect['Productplan']['setupcost']);
							}
							else if($emailSelect['Productplan']['monthlycost']>0)
							{
								echo '$'.sprintf("%01.2f",$emailSelect['Productplan']['monthlycost']);
							}
							else if($emailSelect['Productplan']['yearlycost']>0)
							{
								echo '$'.sprintf("%01.2f",$emailSelect['Productplan']['yearlycost']);
							}
							else
							{
								echo 'Free';
							}
						?>
						&nbsp;</td>
						<td>
							<?php echo $emailSelect['Productplan']['terms']?>
						</td>
						<td>
						<?php 	
							$mouseover ="'".$this->params['imgURL'].'/buynow-highlight.png'."'";
							$mouseout ="'".$this->params['imgURL'].'/buynow.png'."'";
							echo $this->Html->link($this->Html->image("buynow.png",array('class'=>'buyButton','alt'=>'Learn More','onmouseover'=>"this.src=".$mouseover,'onmouseout'=>"this.src=".$mouseout)),array('controller'=>'googledata','action'=>'getClick/?urlID='.$emailSelect['Product']['shortURL_id']),array('target'=>'_blank','escape' => false));  
						?>	
						<!-- <input type="button" id="btnBuyNow" value="" class="buyButton" onclick="redirectURL('<?php echo $emailSelect['Product']['link'];?>',true)" onmouseover="changeclass('btnBuyNow','buyButton','buyButtonOver')" onmouseout="changeclass('btnBuyNow','buyButtonOver','buyButton')"/> -->
						</td>
					</tr>
					<?php $rownum++; }?>								
			</table>
			
		</div>
		<div class="clr"></div>
		<?php echo $this->Html->image("email_table_bottom.png",array("alt"=>"EmailtableBottom","width"=>"845","height"=>"8"));?>
		<?php echo $this->Html->link("a",array('controller'=>'users','action'=>'add/?shortURLIds='.$shortURLIds),array('class'=>'footerPopup','id'=>'popupLink','style'=>'display:none;'));  
					?>	
		<div class="clr"></div>
		<p style="color: #000000;font-size: 12px;">* Prices are indicative only.  They can be AUD or USD.  Please confirm actual price before signing up.</p>
	</div>