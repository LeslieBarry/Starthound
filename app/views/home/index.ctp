<?php if($prod_name){?>
<script>
	$(document).ready(function() {
				var id = '#prod'+'<?php echo $prod_name;?>';
               $(id).click();
        
});
</script>
<?php }?>


<script>	
  window.setInterval("changeTestimonial(<?php echo $toDisplay['ProductNumbers']['prodToRotate']>sizeof($testimonials)?sizeof($testimonials):$toDisplay['ProductNumbers']['prodToRotate'];?>)",<?php echo $toDisplay['ProductNumbers']['speed']?>);
  window.setInterval("changeProduct(<?php echo $toDisplay['ProductNumbers']['prodToRotate'];?>)",<?php echo $toDisplay['ProductNumbers']['speed']?>);
</script>

<div class="mainContainer">
    <h1>Ready, Set, Grow!</h1>
    <h4><strong>Compare and choose the best software to run your business</strong></h4>
    <!-- <h2>The easy way to start your business</h2>
    <h5 class="ptop10">Compare and choose the best software for your business</h5> -->
    <!-- <h5 class="ptop10">Compare and choose the best software to run your business</h5> -->
    
    <div class="businessDeal">
            <div class="businessNeed" id="step-1">
                <div class="fleft">
                    <?php echo($this->Html->image("num1.png",array("alt"=>"One","width"=>"31","height"=>"57"))); ?>
                </div>    
                <a>                            
                    <h6 class="businessDealTxt">
                        <?php if($bannerTxt1) {?>
                            <?php echo($bannerTxt1);?>
                        <?php } ?>
                    </h6>
                </a>
            </div>
            <div class="pickTop" id="step-2">
                <div class="fleft number">
                    <?php echo($this->Html->image("num2.png",array("alt"=>"Two","width"=>"42","height"=>"57"))); ?>
                </div>
                <a>                            
                    <h6 class="businessDealTxt">
                        <?php if($bannerTxt2) {?>
                            <?php echo($bannerTxt2);?>
                        <?php } ?>
                    </h6>
                </a>
            </div>
            <div class="emailPick" id="step-3">
                <div class="fleft">
                    <?php echo($this->Html->image("num3.png",array("alt"=>"Three","width"=>"45","height"=>"57"))); ?>
                </div>
                <a>                            
                    <h6 class="businessDealTxtStep3">
                        <?php if($bannerTxt3) {?>
                            <?php echo($bannerTxt3);?>
                        <?php } ?>
                    </h6>
                </a>
            </div>
        </div>

        <form name="frmHomeCategory" id="frmHomeCategory" method="POST" action="<?php echo($this->params['webURL'])?>/product/"> 
            <input type="hidden" name="txtHomeCategory" id="txtHomeCategory" value="">
            <div class="registrationProcessDiv">        
                <div class="fleft">
                    <?php echo($this->Html->image("box_left.png",array("alt"=>"leftBar","width"=>"20","height"=>"379"))); ?>
                </div>
                <div class="registrationProcess">
                    <div class="topDiv">
                        <div class="fleft quickTxt"><h2>QUICK START</h2></div>
                        <div class="freeDiv free"><!--<h4><a>FREE & EASY</a></h4>--></div>
                        <div class="clr"></div>
                    </div>
                    
                   <?php if($categoryDataList){ ?>
                        <ul>
                                <?php foreach($categoryDataList as $cat){ ?>                                                   
                                    <li name="dvHomeCategoryItem<?php echo($cat['category']['id']);?>" id="dvHomeCategoryItem<?php echo($cat['category']['id']);?>" class="mtop15 unselectedCategory" onmouseover="javascript:setCatBackground('<?php echo($cat['category']['id']);?>','mouseover');" onmouseout="javascript:setCatBackground('<?php echo($cat['category']['id']);?>','mouseout');">
									<a href="javascript:checkHomeCategory('<?php echo($cat['category']['id']);?>');">
                                        <span style="display:none;" name="dvHomeCategoryItemPicSelected<?php echo($cat['category']['id']);?>" id="dvHomeCategoryItemPicSelected<?php echo($cat['category']['id']);?>" class="registrationPic">
                                            <?php echo($this->Html->image("category/".$cat['category']['id']."/selected/".$cat['category']['image'],array("alt"=>$cat['category']['title'],"width"=>"31","height"=>"30"))); ?>
                                        </span>
                                        <span style="display:block;" name="dvHomeCategoryItemPicUnselected<?php echo($cat['category']['id']);?>" id="dvHomeCategoryItemPicUnselected<?php echo($cat['category']['id']);?>" class="registrationPic">
                                            <?php echo($this->Html->image("category/".$cat['category']['id']."/unselected/".$cat['category']['image'],array("alt"=>$cat['category']['title'],"width"=>"31","height"=>"30"))); ?>
                                        </span>
                                        <span class="registrationTxt"><?php echo($cat['category']['title']);?></span>
                                        <input type="checkbox" class="chechbutton" name="checkHomeCategory" id="checkHomeCategory<?php echo($cat['category']['id']);?>" value="<?php echo($cat['category']['id']);?>"  style="visibility:hidden;"/>
                                        <div class="clr"></div>
                                 </a></li>
                                <?php } ?>
                            <div class="clr"></div>
                        </ul>
                    
                        <div class="selectDiv">
                            <div class="fleft select">
                                <span><a href="javascript:selectHomeCategory(true);" class="selectActive">Select All</a></span>
                                <span class="selectTxt"><a href="javascript:selectHomeCategory(false);">Unselect All</a></span>
                            </div>
                            
							

                           
							<div class="fright" id="divNormal" style="display:block;">
							 <?php 
								 $mouseover ="'".$this->params['imgURL'].'/start-highlight.png'."'";
								 $mouseout ="'".$this->params['imgURL'].'/start-normal.png'."'";
								 echo $this->Html->link($this->Html->image("start-normal.png",array("alt"=>"START","width"=>"113px","height"=>"43px",'onmouseover'=>"this.src=".$mouseover,'onmouseout'=>"this.src=".$mouseout)),'javascript:startHomeCategory();',array('escape' => false,'class'=>'start'));  
							?>
                            </div>   
							<div class="fright" id="divcatSelected" style="display:none;">
							 <?php 
								 echo $this->Html->link($this->Html->image("start-highlight.png",array("alt"=>"START","width"=>"113px","height"=>"43px")),'javascript:startHomeCategory();',array('escape' => false,'class'=>'start'));  
							?>
                            </div>
                            <div id="dvHomeErrorStart" class="fright" style="display:none;">
								<span class="startErrorTxt fright alertback alertTxt">Please select a Category.</span>
                            </div>
                            <div class="clr"></div>
                        </div>
                    <?php }else{ ?>
                    <?php } ?>    
                </div>
                <div class="fleft">
                    <?php echo($this->Html->image("box_right.png",array("alt"=>"rightBar","width"=>"20","height"=>"379"))); ?>
                </div>
            </div>
         </form>   
    
</div>


<div class="block2">
	<?php $i = 1;foreach($productInfo as $prod){?>
	<div class="deatilDiv" id="detailDiv<?php echo $i;?>" <?php echo $i>1?"style='display:none;'":'';?>>
		<div class="fleft"><img src="<?php echo($this->params['imgURL'])?>/img_box2_left.png" alt="LeftBar" width="11" height="186"  /></div>
		<div class="fleft middleBar">
			<div class="middleBar Txt">
                 <div class="timeBox1In">
                    <div class="fleft saasuTxt">
                        
                        <?php echo $this->Html->image("product/".$prod['Product']['id']."/".$prod['Product']['image'],array('class'=>'prodImage',"alt"=>$prod['Product']['title'],"width"=>"160px","height"=>"50"))?>   
                        <p class="lightGray"><?php echo $prod['Category']['title'];?></p>
                    </div>
                <div class="clr"></div>
            </div>
			</div>
			
				<div class="timeStarDiv newHomeContentDiv">
                <div class="fleft">
                    <div class="fleft">
                        <div class="fleft">
                            <div class="dollorBackSmallImage" style="margin-top:0;">
                                <div class="fromPerMonth">from</div>
                                <div class="dollor25"><?php if($prod['Product']['setupcost']>0){echo "$".sprintf("%01.2f", $prod['Product']['setupcost']);}
								else if($prod['Product']['monthlycost']>0){echo "$".sprintf("%01.2f",$prod['Product']['monthlycost']);}
								else if($prod['Product']['yearlycost']>0){echo "$".sprintf("%01.2f",$prod['Product']['yearlycost']);}
								else{
									echo "$".sprintf("%01.2f",0);
								}
								
								?>
								
								</div>
                                <div class="fromPerMonth"><?php echo $prod['Product']['terms']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="fleft">
					<div class="marginLeft20">
						<a href="<?php echo FULL_BASE_URL.$this->base;?>/Ratings/add?&amp;prod_name=<?php echo $prod['Product']['seo_name'] ?>" class="ratingPopup">
							<?php 
								$x =  round($prod['Product']['rating_us']);
								if($x > $prod['Product']['rating_us'])
								{
									for($star = 1;$star<$x;$star++)
									{
							
										echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings", "class"=>"mtop6"));
									}
									echo $this->Html->image('pop_star_half.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings", "class"=>"mtop6"));
									for($star = 1;$star<=4-$x;$star++)
									{
										echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings","class"=>"mtop6"));
									}
								}   
								else
								{
									for($star = 1;$star<=$x;$star++)
										{
								
											echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings","class"=>"mtop6"));
										}
										
										for($star = 1;$star<=4-$x;$star++)
										{
											echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings", "class"=>"mtop6"));
										}
								}?>
						</a>
					</div>
					<div class="marginLeft20">
						<a href="<?php echo FULL_BASE_URL.$this->base;?>/Ratings/add?&amp;prod_name=<?php echo $prod['Product']['seo_name'] ?>" class="ratingPopup">
							<?php 
							$x =  round($prod['Product']['rating_you']);
							if($x > $prod['Product']['rating_you'])
							{
								for($star = 1;$star<$x;$star++)
								{
						
									echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings", "class"=>"mtop6"));
								}
								echo $this->Html->image('pop_star_half.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings", "class"=>"mtop6"));
								for($star = 1;$star<=4-$x;$star++)
								{
									echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings", "class"=>"mtop6"));
								}
							}   
							else
							{
								for($star = 1;$star<=$x;$star++)
									{
							
										echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings", "class"=>"mtop6"));
									}
									
									for($star = 1;$star<=4-$x;$star++)
									{
										echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13","title"=>"Click on stars to see ratings", "class"=>"mtop6"));
									}
							}?>
						</a>
					</div>

                    </div>
                </div>
                <div class="fright">
                    <p class="us"><?php 					
								echo $this->Html->link('Editor',array('controller'=>'Ratings','action'=>'add?&prod_name='.$prod['Product']['seo_name']),array('escape' => false,'id'=>'prod'.$prod['Product']['seo_name'],'class'=>'ratingPopup'));  
							?></p>
                    <p class="us mtop8"><?php 					
								echo $this->Html->link('Users',array('controller'=>'Ratings','action'=>'add?&prod_name='.$prod['Product']['seo_name']),array('escape' => false,'class'=>'ratingPopup'));  
							?></p>                        
                </div>
                <div class="clr"></div>
            </div>
		</div>
		<div class="fright"><img src="<?php echo($this->params['imgURL'])?>/img_box2_right.png" alt="RightBar" width="11" height="186"  /></div>
	</div>
	<?php $i++;}?>
	
	

	<div class="deatilDiv">
		<div class="fleft"><img src="<?php echo($this->params['imgURL'])?>/img_box2_left.png" alt="LeftBar" width="11" height="186"  /></div>
		<div class="fleft middleBar">
			<h6>Popular choices</h6>
			<div class="popularChoices">
				<ul>
					
					<?php 
						if($productData){
							$i=1;
							foreach($productData as $product){?>
							<li>
								<span class="xeroTxt"><?php echo $i.". ".$product['Product']['title'];$i++?></span>
								<span class="readTxt fright">
									<?php 					
										echo $this->Html->link('read more >>', array('controller'=>'Ratings','action'=>'add?&prod_name='.$product['Product']['seo_name']),array('escape' => false,'class'=>'ratingPopup'));  
									?>
								</span>
								<div class="clr"></div>
							</li>
					<?php } }?>
				</ul>
			</div>
		</div>
		<div class="fright"><img src="<?php echo($this->params['imgURL'])?>/img_box2_right.png" alt="RightBar" width="11" height="186"  /></div>
	</div>
	
	<div class="deatilDivLast">
	
		<div class="fleft"><img src="<?php echo($this->params['imgURL'])?>/img_box2_left.png" alt="LeftBar" width="11" height="186"  /></div>
		<div class="fleft middleBarLast">
			
				
				<?php $t = 1;foreach($testimonials as $test){?>
				<div class="linkDiv" id ="testDiv<?php echo $t;?>" <?php echo $t>1?"style='display:none;'":'';?>>
					<?php echo $test['Testimonial']['name'];?><br/>
					<?php echo $test['Testimonial']['testimonial'];?>
					
				</div>
				
				<?php $t++;}?>
			<!--<p class="registerUpdate"><a href="#">Register to get updates</a></p>-->
		</div>

		<div class="fright" ><img src="<?php echo($this->params['imgURL'])?>/img_box2_right.png" alt="RightBar" width="11" height="186"  /></div>

	
	</div>
	
<div class="clr"></div>
</div>