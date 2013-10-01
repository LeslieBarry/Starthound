<?php echo($html->css(array('chrome','common','content','ie7','ie9','popup','stylesheet','email')));?>
<?php echo($javascript->link(array('common','validate')));?>

	<div class="popup">
	
		<div class="popupTop">
			<div class="popupTopRight"></div>		
			<div class="popupTopLeft"></div>
			<div class="clr"></div>
		</div>
		
		<div class="popupMid">
			<div class="poupmidLeft">
				<div class="poupmidRight">
					
					<div class="midTop" style="margin-top:-20px;">
						<?php 					
							echo $this->Html->link($this->Html->image("btn_close.png",array('class'=>'closeButton')),"javascript:closePopup()",array('escape' => false));  
						?>
						<P class="emailTxt">cheapstart Ratings</P>
					</div>
					
					<div class="formDiv">
						<div class="RattingIn">
							<div class="fleft popTopLeft">
								<p><?php echo ucwords($productInfo['Category']['title']);?></p>
								<?php 
									echo $this->Html->image("product/".$productInfo['Product']['id']."/".$productInfo['Product']['image'],array('class'=>'mtop10 fleft',"alt"=>$productInfo['Product']['title'],"width"=>"165","height"=>"70"));
								?>
								
								
								<div class="dollorBackSmallImage" style="margin-top:25px;margin-left:170px;">
									<div class="fromPerMonth">from</div>
									
									<div class="dollor25">$
									<?php foreach($productInfo['Productplan'] as $plan)
										{
											if(strtolower($plan['plan'])=='plan1')
											{
												echo $plan['monthlycost'];
											}
										}
									?>
									</div>
									
									<div class="fromPerMonth">per month</div>
                                </div>
								
								<div class="fleft popBotwidth">
									
									<div class="whiteBox">
										
										<div class="whiteBoxMid" style="background:transparent;">
											<div class="cheapRatingsMid">
												<div class="functinoaly">
													<span class="fleft functinoalyTxt" >Functionality</span>
													<span class="fleft">
														<?php 
															$x =  round($productInfo['Rating']['functionality']);
															if($x >$productInfo['Rating']['functionality'])
															{
																for($star = 1;$star<$x;$star++)
																{
														
																	echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
																echo $this->Html->image('iocn_star_half.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																for($star = 1;$star<=5-$x;$star++)
																{
																	echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
															}   
															else
															{
																for($star = 1;$star<=$x;$star++)
																	{
															
																		echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
																	
																	for($star = 1;$star<=5-$x;$star++)
																	{
																		echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
															}
														?>
													</span>
												</div>
												
												<div class="functinoaly">
													<span class="fleft functinoalyTxt" >Reliability</span>
													<span class="fleft">
														<?php 
															$x =  round($productInfo['Rating']['reliability']);
															if($x >$productInfo['Rating']['reliability'])
															{
																for($star = 1;$star<$x;$star++)
																{
														
																	echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
																echo $this->Html->image('iocn_star_half.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																for($star = 1;$star<=5-$x;$star++)
																{
																	echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
															}   
															else
															{
																for($star = 1;$star<=$x;$star++)
																	{
															
																		echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
																	
																	for($star = 1;$star<=5-$x;$star++)
																	{
																		echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
															}
														?>
													</span>
												</div>
												
												<div class="functinoaly">
													<span class="fleft functinoalyTxt" >Ease of Use</span>
													<span class="fleft">
														<?php 
															$x =  round($productInfo['Rating']['ease_of_use']);
															if($x >$productInfo['Rating']['ease_of_use'])
															{
																for($star = 1;$star<$x;$star++)
																{
														
																	echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
																echo $this->Html->image('iocn_star_half.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																for($star = 1;$star<=5-$x;$star++)
																{
																	echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
															}   
															else
															{
																for($star = 1;$star<=$x;$star++)
																	{
															
																		echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
																	
																	for($star = 1;$star<=5-$x;$star++)
																	{
																		echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
															}
														?>
													</span>
												</div>
												
												<div class="functinoaly">
													<span class="fleft functinoalyTxt" >Value for Money</span>
													<span class="fleft">
														<?php 
															$x =  round($productInfo['Rating']['value_for_money']);
															if($x >$productInfo['Rating']['value_for_money'])
															{
																for($star = 1;$star<$x;$star++)
																{
														
																	echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
																echo $this->Html->image('iocn_star_half.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																for($star = 1;$star<=5-$x;$star++)
																{
																	echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
															}   
															else
															{
																for($star = 1;$star<=$x;$star++)
																	{
															
																		echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
																	
																	for($star = 1;$star<=5-$x;$star++)
																	{
																		echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
															}
														?>
													</span>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								
							 </div>
							<div class="fright popTopRight">
								Company Overview
								<p class="popTopRightTxt">
								Introducing <?php echo ucwords($productInfo['Product']['title']);?><br/>
								<?php echo ucwords($productInfo['Product']['description']);?><br/>
								<?php foreach($productInfo['Productplan'] as $plan)
									{
										if(strtolower($plan['plan'])=='plan1')
										{
											echo ucwords($plan['detail_desc']);
										}
									}
								?>
								</p>
							</div>
							<div class="clr"></div>		
							<?php echo $this->Html->image('pop_top.png', array("alt"=>"top","width"=>"553","height"=>"11", "class"=>"mtop10"));?>
							
							<div class="clr"></div>
							<div class="middlePopup">
								
								<div class="fleft popBotwidth" style="width:460px;margin-left:40px;">
									
									
									<div class="whiteBox">
										<div class="whiteBoxTop"><div class="whiteBoxTopRight"></div></div>
										<div class="whiteBoxMid">
											<div class="cheapRatingsMid">
												<div class="functinoaly">
												<p class="boldTxt"> User Rating</p>
												<span class="fleft starLeft">
													<?php 
															$x =  round($productInfo['Rating']['rating_you']/$productInfo['Rating']['no_ofUsers']);
															if($x >($productInfo['Rating']['rating_you']/$productInfo['Rating']['no_ofUsers']))
															{
																for($star = 1;$star<$x;$star++)
																{
														
																	echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
																echo $this->Html->image('iocn_star_half.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																for($star = 1;$star<=5-$x;$star++)
																{
																	echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																}
															}   
															else
															{
																for($star = 1;$star<=$x;$star++)
																	{
															
																		echo $this->Html->image('icon_star_full.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
																	
																	for($star = 1;$star<=5-$x;$star++)
																	{
																		echo $this->Html->image('icon_star_empty.png', array("alt"=>"star","width"=>"27","height"=>"26", "class"=>""));
																	}
															}
														?>
													</span>
												</div>
											</div>
										</div>
										<div class="whiteBoxBottom"><div class="whiteBoxBottomRight"></div></div>
									</div>
									
									
								</div>
								<div class="clr"></div>
							</div>
							<div class="clr"></div>
							<?php echo $this->Html->image('pop_btm.png', array("alt"=>"top","width"=>"553","height"=>"11", "class"=>""));?>
							
							<div class="clr"></div>
							
							<div style="margin-top:15px;">
								<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="www.cheapstart.com.au" num_posts="2" width="500"></fb:comments><meta property="fb:app_id" content="{181523425254074}"/>
							</div>

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