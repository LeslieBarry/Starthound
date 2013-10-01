<div class="mainContainerProduct">

<h3>We recommend...</h3>
    <div class="fleft mainLeft mtop10">

        <form name="frmProductCategory" id="frmProductCategory" method="POST" action="<?php echo($this->params['webURL'])?>/product/content/"> 
            <input type="hidden" name="txtProductCategory" id="txtProductCategory" value="">
            <input type="hidden" name="txtLocation" id="txtLocation" value="<?php echo($location);?>">
            <div class="fleft resultDiv">
                <div class="resultBackground">
                    <h6>Refine Results&nbsp;&nbsp;<span id="dvRefineImgLoader"></span></h6>
                </div>
                <div class="resultMiddle">
                    <?php if($categoryDataList){ ?>
                        <ul class="ptop8">
                            <?php foreach($categoryDataList as $cat){ ?>
                                <li>
                                    <?php if($cat['category']['selected'] && $cat['category']['selected']==true){ ?>
									
                                        <input type="checkbox" id="checkProductCategory<?php echo($cat['category']['id']);?>" name="checkProductCategory" value="<?php echo($cat['category']['id']);?>" checked="checked" onClick="javascript:setProductCategory(this,'<?php echo($this->params['webURL'])?>/product/content/','<?php echo($this->params['imgURL'])?>');" />
                                        <span id="dvProductCategoryTxt<?php echo($cat['category']['id']);?>" name="dvProductCategoryTxt<?php echo($cat['category']['id']);?>" class="resultMidTxtBlack"><?php echo($cat['category']['title']);?></span>
									
                                    <?php }else{ ?> 
										
                                        <input type="checkbox" id="checkProductCategory<?php echo($cat['category']['id']);?>" name="checkProductCategory" value="<?php echo($cat['category']['id']);?>" onClick="javascript:setProductCategory(this,'<?php echo($this->params['webURL'])?>/product/content/','<?php echo($this->params['imgURL'])?>');" />
                                        <span id="dvProductCategoryTxt<?php echo($cat['category']['id']);?>" name="dvProductCategoryTxt<?php echo($cat['category']['id']);?>" class="resultMidTxt"><?php echo($cat['category']['title']);?></span>
								
                                    <?php } ?>    
                                </li>
                            <?php } ?>
                        </ul>
                    <?php }else{ ?>
                            
                    <?php } ?>
                    <div class="clr"></div>
                </div>
                <div>
                    <?php echo($this->Html->image("box3_bottom.png",array("alt"=>"Bottom Bar","width"=>"198","height"=>"14"))); ?>
                </div>
            </div>
        </form>   

        <form name="frmProductItem" id="frmProductItem" method="POST" action=""> 
            <input type="hidden" name="txtCategoryItem" id="txtCategoryItem" value="">
            <input type="hidden" name="txtProductItem" id="txtProductItem" value="">
            <div class="fleft financeDiv">
				<div id="centerAjaxLoader" class="ajaxLoader">
					<?php echo($this->Html->image("ajax-loader-big.gif",array("alt"=>"One","width"=>"100","height"=>"100"))); ?>
				</div>
				<div class="clr"></div>
                <div>
                     <?php echo($this->Html->image("boxp_big_top.png",array("alt"=>"Top Bar","width"=>"564","height"=>"16"))); ?>
                </div>
                <?php if($categoryDataList){ ?>
                      <?php foreach($categoryDataList as $cat){ ?>
                            <?php if($cat['category']['selected'] && $cat['category']['selected']==true){ ?>
                                <div id="dvProductContent<?php echo($cat['category']['id']);?>" class="financeMiddle" style="display:block;">
                            <input type="hidden" name="txtProductSetupCost<?php echo($cat['category']['id']); ?>" id="txtProductSetupCost<?php echo($cat['category']['id']); ?>" value="0">
                            <input type="hidden" name="txtProductMonthlyCost<?php echo($cat['category']['id']); ?>" id="txtProductMonthlyCost<?php echo($cat['category']['id']); ?>" value="0">
                            <input type="hidden" name="txtProductYearlyCost<?php echo($cat['category']['id']); ?>" id="txtProductYearlyCost<?php echo($cat['category']['id']); ?>" value="0">
                                     
                                     <p class="financeTxt"><?php echo($cat['category']['title']);?><span id="dvProductItemImgLoader<?php echo($cat['category']['id']);?>"></span></p>                               
                                     <?php $j=0;?>
                                     <?php foreach($cat['category']['product'] as $p){ ?>
                                        
                                        <?php if($j==0){ ?>
                                            <div id="dvProductItem<?php echo($p['Product']['id']);?>" class="tab1" title="<?php echo($p['Product']['title']); ?>"  onClick='javascript:checkProductItem("<?php echo($this->params['webURL'])?>/product/plan/","<?php echo($cat['category']['id']);?>","<?php echo($p['Product']['id']); ?>","<?php echo($this->params['imgURL'])?>");'>
                                        <?php }elseif($j==1){ ?>
                                            <div id="dvProductItem<?php echo($p['Product']['id']);?>" class="tab2" title="<?php echo($p['Product']['title']); ?>"  onClick='javascript:checkProductItem("<?php echo($this->params['webURL'])?>/product/plan/","<?php echo($cat['category']['id']);?>","<?php echo($p['Product']['id']); ?>","<?php echo($this->params['imgURL'])?>");'>
                                            <div style="height:6px;"></div>
                                        <?php }elseif($j==2){ ?>
                                            <div id="dvProductItem<?php echo($p['Product']['id']);?>" class="tab3" title="<?php echo($p['Product']['title']); ?>"  onClick='javascript:checkProductItem("<?php echo($this->params['webURL'])?>/product/plan/","<?php echo($cat['category']['id']);?>","<?php echo($p['Product']['id']); ?>","<?php echo($this->params['imgURL'])?>");'>
                                        <?php } ?>    
                                            <div class="top"><div class="left"></div></div>
                                            <div class="content">
                                                <div class="timeBox1In">
                                                    <div class="fleft saasuTxt">
													<?php echo $this->Form->input('prodTitle'.$p['Product']['id'],array('type'=>'hidden','value'=>$p['Product']['title']));?>
                                                        <?php echo $this->Html->image("product/".$p['Product']['id']."/".$p['Product']['image'],array('class'=>'prodImage',"alt"=>$p['Product']['title'],"width"=>"160px","height"=>"50"))?>
					
                                                    </div>
                                                    
                                                    <div class="clr"></div>
                                                </div>
                                                <div class="timeStarDiv">
                                                    <div class="fleft">    
                                                        <div class="fleft">
                                                            <div class="dollorBackSmallImage" style="margin-top:0;">
                                                                <div class="fromPerMonth">from</div>
                                                                <div class="dollor25">$<?php if($p['Product']['setupcost']){echo sprintf("%01.2f",$p['Product']['setupcost']);}
																else if($p['Product']['monthlycost']){echo sprintf("%01.2f",$p['Product']['monthlycost']);}
																else{echo sprintf("%01.2f",$p['Product']['yearlycost']);}?></div>
                                                                <div class="fromPerMonth"><?php echo($p['Product']['terms'])?></div>
                                                            </div>
                                                        </div>
                                                        <div class="fleft">
                                                            <div>
															<?php 
																$x =  round($p['Product']['rating_us']);
																if($x > $p['Product']['rating_us'])
																{
																	for($star = 1;$star<$x;$star++)
																	{
															
																		echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13", "title"=>"Click on stars to see ratings","class"=>"mtop6"));
																	}
																	echo $this->Html->image('pop_star_half.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>"mtop6"));
																	for($star = 1;$star<=4-$x;$star++)
																	{
																		echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>"mtop6"));
																	}
																}   
																else
																{
																	for($star = 1;$star<=$x;$star++)
																		{
																
																			echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>"mtop6"));
																		}
																		
																		for($star = 1;$star<=4-$x;$star++)
																		{
																			echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>"mtop6"));
																		}
																}?>
															
                                                            </div>
                                                            <div>
															

																<?php 
																$x =  round($p['Product']['rating_you']);
																if($x > $p['Product']['rating_you'])
																{
																	for($star = 1;$star<$x;$star++)
																	{
															
																		echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>"mtop6"));
																	}
																	echo $this->Html->image('pop_star_half.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>"mtop6"));
																	for($star = 1;$star<=4-$x;$star++)
																	{
																		echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>"mtop6"));
																	}
																}   
																else
																{
																	for($star = 1;$star<=$x;$star++)
																		{
																
																			echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>"mtop6"));
																		}
																		
																		for($star = 1;$star<=4-$x;$star++)
																		{
																			echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>"mtop6"));
																		}
																}?>
															
                                                      </div>
                                                        </div>
                                                    </div>
                                                    <div class="fright">
                                                        <p class="you mtop7">
															<?php 					
																echo $this->Html->link('Editors',array('controller'=>'Ratings','action'=>'add?&prod_name='.$p['Product']['seo_name']),array('escape' => false,'class'=>'ratingPopup',"title"=>"Click to see ratings"));  
															?>
														</p>
                                                        <p class="you mtop7">
															<?php 					
																echo $this->Html->link('Users',array('controller'=>'Ratings','action'=>'add?&prod_name='.$p['Product']['seo_name']),array('escape' => false,'class'=>'ratingPopup',"title"=>"Click to see ratings"));  
															?>
														</p>                        
                                                    </div>
                                                    <div class="clr"></div>
                                                    <div align="center"><input type="radio" style="visibility:hidden;" id="checkProductItem<?php echo($p['Product']['id']); ?>" name="checkProductItem<?php echo($cat['category']['id']);?>" value="<?php echo($p['Product']['id']); ?>" /></div>
                                                </div>
												<div class="clickmore">click for more</div>
                                            </div>
											
                                        </div>
                                        <?php $j++;?>
                                     <?php } ?>   
                                     <div class="clr"></div>
                            <?php }else{ ?>
                                <div id="dvProductContent<?php echo($cat['category']['id']);?>" class="financeMiddle" style="display:none;">
                            <?php } ?>    
                                <div id="dvProductItemPlan<?php echo($cat['category']['id']);?>" style="display:none;" >
                                </div>                      
                                
                               <div class="clr"></div> 
                            </div>
                      <?php } ?>  
                      <?php if(!$category){ ?>
                        <div id="dvErrorProductItem" class="financeMiddle" style="display:block;">
                            <p class="financeTxt alert alertTxt">Please select a Category.</span></p>
                        </div>    
                      <?php }else{ ?>
                        <div id="dvErrorProductItem" class="financeMiddle" style="display:none;">
                        </div>
                      <?php } ?>
                <?php }else{ ?>
                        <div id="dvErrorProductItem" class="financeMiddle" style="display:block;">
                            <p class="financeTxt alert alertTxt">No Categories defined.</span></p>
                        </div>    
                <?php } ?>
                <div>
                    <?php echo($this->Html->image("boxp_big_bottom.png",array("alt"=>"Bottom Bar","width"=>"564","height"=>"16"))); ?>
                </div>
                <div class="clr"></div>
            </div>
            
    </form>   
    </div>        
    
    <div class="fright mainRight mtop10">
        <div class="resultBackground">
            <h6>Estimated Cost</h6>
        </div>
        <div class="costMiddle">
            <ul id="ulEstCost" style="border:2px solid #EBEBEB">
                <li>
                    <span class="costTxt darkGray">Setup Cost</span>
                    <span class="cost darkGBlue">$ <span id="dvEstimatedCostSetup" >0</span></span>
                    <label class="clr"></label>
                </li>
                <div class="costBorder"></div>
                <li>
                     <span class="costTxt darkGray">Monthly Cost</span>
                     <span class="cost darkGBlue">$ <span id="dvEstimatedCostMonthly" >0</span></span>
                     <label class="clr"></label>
                </li>
                <div class="costBorder"></div>
                <li>
                    <span class="costTxt darkGray">Yearly Cost</span>
                     <span class="cost darkGBlue">$ <span id="dvEstimatedCostYearly" >0</span></span>
                     <label class="clr"></label>
                </li>
            </ul>
        </div>
        <div>
            <?php echo($this->Html->image("box3_bottom.png",array("alt"=>"Result Bottom Bar","width"=>"198","height"=>"14"))); ?>
        </div>
        
        <div class="mtop10">
            <div class="resultBackground">
                <h6>Your List</h6>
            </div>
            <div class="resultMiddle">
                <table border="0" cellpadding="0" cellspacing="0" class="financeTable" id="tableYourPicks">
                    <thead class="financeTableTop">
                        <th width="70" height="30">Product</th>
                        <th width="65">Edition</th>
                        <th width="65">Cost</th>
						
                    </thead>					
                </table>
				<div id="dvProductErrorStart" class="fright"></div>
                <div id="heightGap" style="min-height:150px;"}>&nbsp;</div>
                <div class="heightTxt" style="text-align:center; padding-left: 8px;">Please click on send, to email your software list</div>
                <div>
				
						
					<?php echo $this->Form->create('', array('action' => 'email_template','name'=>'ProductEmailTemplateForm'));?>
					
					<?php echo $this->Form->input('planId',array('type'=>'hidden'));?>
					<?php echo $this->Form->button('',array("type"=>"button","id" =>"emailpicks","class"=>" emailpicks","onmouseover"=>"changeclass('emailpicks','emailpicks','emailpicksOver')","onmouseout"=>"changeclass('emailpicks','emailpicksOver','emailpicks')","onclick"=>"mailPicks()"));?>	
					<?php echo $this->Form->end();?>
                </div>
                <div class="clr"></div>
            </div>
            <div>
                <?php echo($this->Html->image("box3_bottom.png",array("alt"=>"Result Bottom Bar","width"=>"198","height"=>"14"))); ?>
            </div>
        </div>
    </div>
    <div class="clr"></div>
</div>
<script>
<?php if($fromEmail){
	for($i = 0;$i<sizeof($details);$i++){ 
		echo  'checkProductItem("'.$this->params['webURL'].'/product/plan/",'.$details[$i]['catId'].','.$details[$i]['prodId'].',"'.$this->params['imgURL'].'");';
 }}?>
</script>