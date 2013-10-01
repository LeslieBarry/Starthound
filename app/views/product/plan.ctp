
<div class="financeTableBorder">
        <div class="clearlink"><a href="javascript:clearProductSelection(<?php echo($categoryId);?>)">Clear Selection</a></div> 
        <?php if((count($productPlanDataList['Plan1'])>0) || (count($productPlanDataList['Plan2'])>0) || (count($productPlanDataList['Plan3'])>0) || (count($productPlanDataList['Plan4'])>0) || (count($productPlanDataList['Plan5'])>0)){ ?>
            <div class="clr"></div>
            <table border="0" cellpadding="0" cellspacing="0" class="financeTable">
            <thead>
                <tr>
                    <?php if(count($productPlanDataList['Plan1'])>0){ ?>
                        <th width="100"><?php echo($productPlanDataList['Plan1'][0]['productplan']['title']); ?></th>
                    <?php }else{ ?>
<!--                       <th width="100">N/A</th>  -->
                    <?php } ?>    
                    <?php if(count($productPlanDataList['Plan2'])>0){ ?>
                        <th width="100"><?php echo($productPlanDataList['Plan2'][0]['productplan']['title']); ?></th>
                    <?php }else{ ?>
                       <!--                       <th width="100">N/A</th>  -->
                    <?php } ?>    
                    <?php if(count($productPlanDataList['Plan3'])>0){ ?>
                        <th width="100"><?php echo($productPlanDataList['Plan3'][0]['productplan']['title']); ?></th>
                    <?php }else{ ?>
                       <!--                       <th width="100">N/A</th>  -->
                    <?php } ?>    
                    <?php if(count($productPlanDataList['Plan4'])>0){ ?>
                        <th width="100"><?php echo($productPlanDataList['Plan4'][0]['productplan']['title']); ?></th>
                    <?php }else{ ?>
                       <!--                       <th width="100">N/A</th>  -->
                    <?php } ?>    
                    <?php if(count($productPlanDataList['Plan5'])>0){ ?>
                        <th width="100"><?php echo($productPlanDataList['Plan5'][0]['productplan']['title']); ?></th>
                    <?php }else{ ?>
                       <!--                       <th width="100">N/A</th>  -->
                    <?php } ?>    
                </tr>
            </thead>
                                            
                <tr>
                    <?php if($productPlanDataList['Plan1'][0]['productplan']['plan_limit']){ ?>
                        <td><?php echo($productPlanDataList['Plan1'][0]['productplan']['plan_limit']); ?></td>
                    <?php }else{ ?>
                        <!--<td></td>-->
                    <?php } ?>    
                    <?php if((count($productPlanDataList['Plan2'])>0) && $productPlanDataList['Plan2'][0]['productplan']['plan_limit']){ ?>
                        <td><?php echo($productPlanDataList['Plan2'][0]['productplan']['plan_limit']); ?></td>
                    <?php }else{ ?>
                        <!--<td></td>-->
                    <?php } ?>    
                    <?php if((count($productPlanDataList['Plan3'])>0) && $productPlanDataList['Plan3'][0]['productplan']['plan_limit']){ ?>
                        <td><?php echo($productPlanDataList['Plan3'][0]['productplan']['plan_limit']); ?></td>
                    <?php }else{ ?>
                        <!--<td></td>-->
                    <?php } ?>    
                    <?php if((count($productPlanDataList['Plan4'])>0) && $productPlanDataList['Plan4'][0]['productplan']['plan_limit']){ ?>
                        <td><?php echo($productPlanDataList['Plan4'][0]['productplan']['plan_limit']); ?></td>
                    <?php }else{ ?>
                        <!--<td></td>-->
                    <?php } ?>    
                    <?php if((count($productPlanDataList['Plan5'])>0) && $productPlanDataList['Plan5'][0]['productplan']['plan_limit']){ ?>
                        <td><?php echo($productPlanDataList['Plan5'][0]['productplan']['plan_limit']); ?></td>
                    <?php }else{ ?>
                        <!--<td></td>-->
                    <?php } ?>    
                </tr>            
                                                
                <tr class="dollorTxt">
					
                    <?php
						if(count($productPlanDataList['Plan1'])>0)
						{
							if($productPlanDataList['Plan1'][0]['productplan']['setupcost']!=0)
							{ 
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan1'][0]['productplan']['setupcost']).'</td>';
							}else if($productPlanDataList['Plan1'][0]['productplan']['monthlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan1'][0]['productplan']['monthlycost']).'</td>';
							}
							else if($productPlanDataList['Plan1'][0]['productplan']['yearlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan1'][0]['productplan']['yearlycost']).'</td>';
							}
                            else
							{
									echo '<td>Free</td>';
							}
						}
					?>
                    <?php
						if(count($productPlanDataList['Plan2'])>0)
						{
							if($productPlanDataList['Plan2'][0]['productplan']['setupcost']!=0)
							{ 
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan2'][0]['productplan']['setupcost']).'</td>';
							}else if($productPlanDataList['Plan2'][0]['productplan']['monthlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan2'][0]['productplan']['monthlycost']).'</td>';
							}
							else if($productPlanDataList['Plan2'][0]['productplan']['yearlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan2'][0]['productplan']['yearlycost']).'</td>';
							}
                            else
							{
									echo '<td>Free</td>';
							}
						}
					?>
					<?php
						if(count($productPlanDataList['Plan3'])>0)
						{
							if($productPlanDataList['Plan3'][0]['productplan']['setupcost']!=0)
							{ 
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan3'][0]['productplan']['setupcost']).'</td>';
							}else if($productPlanDataList['Plan3'][0]['productplan']['monthlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan3'][0]['productplan']['monthlycost']).'</td>';
							}
							else if($productPlanDataList['Plan3'][0]['productplan']['yearlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan3'][0]['productplan']['yearlycost']).'</td>';
							}
                            else
							{
									echo '<td>Free</td>';
							}
						}
					?>
					<?php
						if(count($productPlanDataList['Plan4'])>0)
						{
							if($productPlanDataList['Plan4'][0]['productplan']['setupcost']!=0)
							{ 
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan4'][0]['productplan']['setupcost']).'</td>';
							}else if($productPlanDataList['Plan4'][0]['productplan']['monthlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan4'][0]['productplan']['monthlycost']).'</td>';
							}
							else if($productPlanDataList['Plan4'][0]['productplan']['yearlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan4'][0]['productplan']['yearlycost']).'</td>';
							}
                            else
							{
									echo '<td>Free</td>';
							}
						}
					?>
					<?php
						if(count($productPlanDataList['Plan5'])>0)
						{
							if($productPlanDataList['Plan5'][0]['productplan']['setupcost']!=0)
							{ 
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan5'][0]['productplan']['setupcost']).'</td>';
							}else if($productPlanDataList['Plan5'][0]['productplan']['monthlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan5'][0]['productplan']['monthlycost']).'</td>';
							}
							else if($productPlanDataList['Plan5'][0]['productplan']['yearlycost']!=0)
							{ 	
								echo '<td>$'.sprintf("%01.2f",$productPlanDataList['Plan5'][0]['productplan']['yearlycost']).'</td>';
							}
                            else
							{
									echo '<td>Free</td>';
							}
						}
					?> </tr>
                 <tr>
                    <?php if(count($productPlanDataList['Plan1'])>0){ ?>
                        <td>
							<?php echo($productPlanDataList['Plan1'][0]['productplan']['terms']); ?>
						</td>
					<?php } if(count($productPlanDataList['Plan2'])>0){ ?>
                        <td>
							<?php echo($productPlanDataList['Plan2'][0]['productplan']['terms']); ?>
						</td>
					<?php } if(count($productPlanDataList['Plan3'])>0){ ?>
                        <td>
							<?php echo($productPlanDataList['Plan3'][0]['productplan']['terms']); ?>
						</td>
					<?php } if(count($productPlanDataList['Plan4'])>0){ ?>
                        <td>
							<?php echo($productPlanDataList['Plan4'][0]['productplan']['terms']); ?>
						</td>
					<?php } if(count($productPlanDataList['Plan5'])>0){ ?>
                        <td>
							<?php echo($productPlanDataList['Plan5'][0]['productplan']['terms']); ?>
						</td>
					<?php } ?>
				</tr>                               
                <tr>
                    <?php if(count($productPlanDataList['Plan1'])>0) { ?>
                        <td style="padding-bottom:5px;">
						<input type="hidden" id="descPlan<?php echo $productPlanDataList['Plan1'][0]['productplan']['id']?>" name="descPlan1" value='<?php echo(str_replace("'",'"',$productPlanDataList['Plan1'][0]['productplan']['detail_desc']));?>'/>
						<input type="radio"  name="radioProductPlan<?php echo($productId);?>" onClick="javascript:setProductPlan(this,'<?php echo($categoryId);?>','<?php echo($productId);?>','<?php echo($productPlanDataList['Plan1'][0]['productplan']['id']);?>','<?php echo($productPlanDataList['Plan1'][0]['productplan']['title']);?>','<?php echo sprintf("%01.2f",$productPlanDataList['Plan1'][0]['productplan']['setupcost']);?>','<?php echo sprintf("%01.2f",$productPlanDataList['Plan1'][0]['productplan']['monthlycost']);?>','<?php echo sprintf("%01.2f",$productPlanDataList['Plan1'][0]['productplan']['yearlycost']);?>','descPlan<?php echo $productPlanDataList['Plan1'][0]['productplan']['id']?>');" value='<?php echo($productPlanDataList['Plan1'][0]['productplan']['id']);?>'/></td>
                     <?php }else{ ?>   
                        <!--<td>&nbsp;</td>-->
                     <?php } ?>       
                    <?php if(count($productPlanDataList['Plan2'])>0){ ?>
                        <td style="padding-bottom:5px;">
						<input type="hidden" id="descPlan<?php echo $productPlanDataList['Plan2'][0]['productplan']['id']?>" name="descPlan2" value='<?php echo($productPlanDataList['Plan2'][0]['productplan']['detail_desc']);?>'/>
						<input type="radio"  name="radioProductPlan<?php echo($productId);?>" onClick="javascript:setProductPlan(this,'<?php echo($categoryId);?>','<?php echo($productId);?>','<?php echo($productPlanDataList['Plan2'][0]['productplan']['id']);?>','<?php echo($productPlanDataList['Plan2'][0]['productplan']['title']);?>','<?php echo($productPlanDataList['Plan2'][0]['productplan']['setupcost']);?>','<?php echo($productPlanDataList['Plan2'][0]['productplan']['monthlycost']);?>','<?php echo($productPlanDataList['Plan2'][0]['productplan']['yearlycost']);?>','descPlan<?php echo $productPlanDataList['Plan2'][0]['productplan']['id']?>');" value='<?php echo($productPlanDataList['Plan2'][0]['productplan']['id']);?>'/></td>
                     <?php }else{ ?>   
                        <!--<td>&nbsp;</td>-->
                     <?php } ?>       
                    <?php if(count($productPlanDataList['Plan3'])>0){ ?>
                        <td style="padding-bottom:5px;">
						<input type="hidden" id="descPlan<?php echo $productPlanDataList['Plan3'][0]['productplan']['id']?>" name="descPlan3" value='<?php echo($productPlanDataList['Plan3'][0]['productplan']['detail_desc']);?>'/>
						<input type="radio" name="radioProductPlan<?php echo($productId);?>" onClick="javascript:setProductPlan(this,'<?php echo($categoryId);?>','<?php echo($productId);?>','<?php echo($productPlanDataList['Plan3'][0]['productplan']['id']);?>','<?php echo($productPlanDataList['Plan3'][0]['productplan']['title']);?>','<?php echo($productPlanDataList['Plan3'][0]['productplan']['setupcost']);?>','<?php echo($productPlanDataList['Plan3'][0]['productplan']['monthlycost']);?>','<?php echo($productPlanDataList['Plan3'][0]['productplan']['yearlycost']);?>','descPlan<?php echo $productPlanDataList['Plan3'][0]['productplan']['id']?>');"value='<?php echo($productPlanDataList['Plan3'][0]['productplan']['id']);?>'/></td>
                     <?php }else{ ?>   
                        <!--<td>&nbsp;</td>-->
                     <?php } ?>       
                    <?php if(count($productPlanDataList['Plan4'])>0){ ?>
                        <td style="padding-bottom:5px;">
						<input type="hidden" id="descPlan<?php echo $productPlanDataList['Plan4'][0]['productplan']['id']?>" name="descPlan4" value='<?php echo($productPlanDataList['Plan4'][0]['productplan']['detail_desc']);?>'/>
						<input type="radio" name="radioProductPlan<?php echo($productId);?>" onClick="javascript:setProductPlan(this,'<?php echo($categoryId);?>','<?php echo($productId);?>','<?php echo($productPlanDataList['Plan4'][0]['productplan']['id']);?>','<?php echo($productPlanDataList['Plan4'][0]['productplan']['title']);?>','<?php echo($productPlanDataList['Plan4'][0]['productplan']['setupcost']);?>','<?php echo($productPlanDataList['Plan4'][0]['productplan']['monthlycost']);?>','<?php echo($productPlanDataList['Plan4'][0]['productplan']['yearlycost']);?>','descPlan<?php echo $productPlanDataList['Plan4'][0]['productplan']['id']?>');" value='<?php echo($productPlanDataList['Plan4'][0]['productplan']['id']);?>'/></td>
                     <?php }else{ ?>   
                        <!--<td>&nbsp;</td>-->
                     <?php } ?>       
                    <?php if(count($productPlanDataList['Plan5'])>0){ ?>
                        <td style="padding-bottom:5px;">
						<input type="hidden" id="descPlan<?php echo $productPlanDataList['Plan5'][0]['productplan']['id']?>" name="descPlan5" value='<?php echo($productPlanDataList['Plan5'][0]['productplan']['detail_desc']);?>'/>
						<input type="radio"  name="radioProductPlan<?php echo($productId);?>" onClick="javascript:setProductPlan(this,'<?php echo($categoryId);?>','<?php echo($productId);?>','<?php echo($productPlanDataList['Plan5'][0]['productplan']['id']);?>','<?php echo($productPlanDataList['Plan5'][0]['productplan']['title']);?>','<?php echo($productPlanDataList['Plan5'][0]['productplan']['setupcost']);?>','<?php echo($productPlanDataList['Plan5'][0]['productplan']['monthlycost']);?>','<?php echo($productPlanDataList['Plan5'][0]['productplan']['yearlycost']);?>','descPlan<?php echo $productPlanDataList['Plan5'][0]['productplan']['id']?>');" value='<?php echo($productPlanDataList['Plan5'][0]['productplan']['id']);?>'/></td>
                     <?php }else{ ?>   
                        <!--<td>&nbsp;</td>-->
                     <?php } ?>       
                </tr>
				
				
            </table>
			<div class="currencyText"><?php echo "All prices shown in ".strtoupper($productInfo['Product']['currency']);?></div>
            <div id="dvProductPlanDesc<?php echo($productId);?>" class="FinanceTableTxt" style="display:none;float:left;">
            </div>
        <?php }else{ ?>
            <div>
                <p class="alert alertTxt">No Plan Details.</span></p>
            </div>    
        <?php } ?>  
        
</div>
<?php echo($this->Html->image("finance_bottom.png",array("alt"=>"Bottom Bar","width"=>"537","height"=>"8","class"=>"financeBottom"))); ?>                         