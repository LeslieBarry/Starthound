<input type="hidden" name="txtProductSetupCost<?php echo($data['category'][0]['category']['id']); ?>" id="txtProductSetupCost<?php echo($data['category'][0]['category']['id']); ?>" value="0">
<input type="hidden" name="txtProductMonthlyCost<?php echo($data['category'][0]['category']['id']); ?>" id="txtProductMonthlyCost<?php echo($data['category'][0]['category']['id']); ?>" value="0">
<input type="hidden" name="txtProductYearlyCost<?php echo($data['category'][0]['category']['id']); ?>" id="txtProductYearlyCost<?php echo($data['category'][0]['category']['id']); ?>" value="0">

 <p class="financeTxt"><?php echo($data['category'][0]['category']['title']);?><span id="dvProductItemImgLoader<?php echo($data['category'][0]['category']['id']);?>"></span></p>                               
 <?php $j=0;?>
 <?php foreach($data['product'] as $p){ ?>
    <?php if($j==0){ ?>
        <div id="dvProductItem<?php echo($p['Product']['id']);?>" class="tab1" title="<?php echo($p['Product']['title']); ?>"  onClick='javascript:checkProductItem("<?php echo($this->params['webURL'])?>/product/plan/","<?php echo($data['category'][0]['category']['id']);?>","<?php echo($p['Product']['id']); ?>","<?php echo($this->params['imgURL'])?>");'>
    <?php }elseif($j==1){ ?>
        <div id="dvProductItem<?php echo($p['Product']['id']);?>" class="tab2" title="<?php echo($p['Product']['title']); ?>"  onClick='javascript:checkProductItem("<?php echo($this->params['webURL'])?>/product/plan/","<?php echo($data['category'][0]['category']['id']);?>","<?php echo($p['Product']['id']); ?>","<?php echo($this->params['imgURL'])?>");'>
        <div style="height:6px;"></div>
    <?php }elseif($j==2){ ?>
        <div id="dvProductItem<?php echo($p['Product']['id']);?>" class="tab3" title="<?php echo($p['Product']['title']); ?>"  onClick='javascript:checkProductItem("<?php echo($this->params['webURL'])?>/product/plan/","<?php echo($data['category'][0]['category']['id']);?>","<?php echo($p['Product']['id']); ?>","<?php echo($this->params['imgURL'])?>");'>
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
                        <div class="fleft">
                            <div class="dollorBackSmallImage" style="margin-top:0;">
                                <div class="fromPerMonth">from</div>
                                <div class="dollor25">
								<?php 
									if($p['Product']['setupcost'])
									{
										echo "$".sprintf("%01.2f",$p['Product']['setupcost']);
									}
									else if($p['Product']['monthlycost'])
									{
										echo "$".sprintf("%01.2f",$p['Product']['monthlycost']);
									}
									else if($p['Product']['yearlycost'])
									{
										echo "$".sprintf("%01.2f",$p['Product']['yearlycost']);
									}
									else
									{
										echo "$0.00";
									}
								?>
								
								</div>
                                <div class="fromPerMonth"><?php echo $p['Product']['terms']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="fleft mtop5">
					<div>
					<?php 
						$x =  round($p['Product']['rating_us']);
						if($x > $p['Product']['rating_us'])
						{
							for($star = 1;$star<$x;$star++)
							{
					
								echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>""));
							}
							echo $this->Html->image('pop_star_half.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>""));
							for($star = 1;$star<=4-$x;$star++)
							{
								echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>""));
							}
						}   
						else
						{
							for($star = 1;$star<=$x;$star++)
								{
						
									echo $this->Html->image('small_star.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>""));
								}
								
								for($star = 1;$star<=4-$x;$star++)
								{
									echo $this->Html->image('small_starhide.png', array("alt"=>"star","width"=>"14","height"=>"13", "class"=>""));
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
                    <p class="you">
						<?php echo $this->Html->link('Editors',array('controller'=>'Ratings','action'=>'add?&prod_name='.$p['Product']['seo_name']),array('escape' => false,'class'=>'ratingPopup',"title"=>"Click to see ratings"));?>
					</p>
                    <p class="you">
						<?php echo $this->Html->link('Users',array('controller'=>'Ratings','action'=>'add?&prod_name='.$p['Product']['seo_name']),array('escape' => false,'class'=>'ratingPopup',"title"=>"Click to see ratings"));?>
					</p>                        
                </div>
                <div class="clr"></div>
                <div align="center"><input type="radio" style="visibility:hidden;" id="checkProductItem<?php echo($p['Product']['id']); ?>" name="checkProductItem<?php echo($data['category'][0]['category']['id']);?>" value="<?php echo($p['Product']['id']); ?>" /></div>
            </div>
			<div class="clickmore">click for more</div>
        </div>
		
    </div>
    <?php $j++;?>
	
 <?php } ?>   
 <div class="clr"></div>
<div id="dvProductItemPlan<?php echo($data['category'][0]['category']['id']);?>" style="display:none;" >
</div>                      

<div class="clr"></div> 