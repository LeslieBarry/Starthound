<!-- extra attributes in html are for google plus and facebook plugin-->
<html itemscope itemtype="http://schema.org/Product" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>

    <meta property="og:title" content="Product" />
	<meta property="og:type" content="website" />	
	<meta property="og:image" content="http://cheapstart.com.au/cheapstart/img/cheapstart-twitter.png" />
	<meta property="og:site_name" content="Cheapstart" />	
	<meta property="fb:admins" content="680246990" />
	<meta property="fb:app_id" content="181523425254074"/>	
	<meta property="og:url" content="<?php echo $longUrl;?>" />
<?php echo($html->css(array('chrome','common','content','ie7','ie9','popup','stylesheet','email','rating','social')));?>
<?php echo($javascript->link(array('rating','common','validate','jquery/jquery.min')));?>
<script type="text/javascript">
	var parentURL = parent.document.location.href;
	var lowerParent = parentURL.toLowerCase();
	if(lowerParent.indexOf("rating")>0)
	{
		var newParent = parentURL.replace("Ratings/add","home");
		parent.document.location.href = newParent;
	}	
</script>
<script type="text/javascript">
		$.noConflict;
		$(document).ready(function(){			
			$(window).bind("load", function() {
				var iOffSet = ($.browser.msie) ? 0 : 20; var iW = $(document.body).width();
				var iH = $(document.body).height() + iOffSet;
				// debug: use alert below to get calc dimensions on load
				// alert("iframe: (w:" + iW + ", h:" + iH + ")");
				// limit the window height and enable scrollbars

				parent.$.fn.colorbox.myResize(iW, iH);
			});
			
		});		
	
	</script>
		<!-- for google plus-->
	<script type="text/javascript">
	  (function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script> 
		<!-- for facebook -->
		<script>(function(d){
  var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
  js = d.createElement('script'); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js#appId=150547638369406&xfbml=1";
  d.getElementsByTagName('head')[0].appendChild(js);
}(document));</script>
	
</head>
<body>
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
							echo $this->Html->link($this->Html->image("btn_close.png",array('class'=>'closeButton')),"javascript:submitRating()",array('escape' => false));  
						?>
						<P class="emailTxt">cheapstart Ratings</P>
					</div>
					
					<div class="formDiv">
						<div class="RattingIn">
							<div class="fleft popTopLeft">
								<p><?php echo ucwords($productInfo['Category']['title']);?></p>
								<?php 
									echo $this->Html->image("product/".$productInfo['Product']['id']."/".$productInfo['Product']['image'],array('class'=>'mtop10 fleft',"alt"=>$productInfo['Product']['title'],"width"=>"160","height"=>"50"));
								?>
								
								
								<div style="margin-top: 15px; float: right; margin-right: 10px;" class="dollorBackSmallImage">
									<div class="fromPerMonth" style="margin-top:-4px">from</div>
									
									
									<?php foreach($productInfo['Productplan'] as $plan)
										{
											if($plan['setupcost']){
												$cost = $plan['setupcost'];
											}
											else if($plan['monthlycost'])
											{
												$cost= $plan['monthlycost'];
											}
											else
											{
												$cost =$plan['yearlycost'];
											}
										
										
										
											if(strtolower($plan['plan'])=='plan1')
											{
												echo '<div class="dollor25" style="margin-top:-4px">$'.sprintf("%01.2f", $cost).'</div><div class="fromPerMonth" style="margin-top:-4px">'.$plan['terms'].'</div>';
											}
										}
									?>
									
									
									
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
														
																	echo $this->Html->image('admin_fullstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																}
																echo $this->Html->image('admin_halfstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																for($star = 1;$star<=4-$x;$star++)
																{
																	echo $this->Html->image('admin_emptystar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																}
															}   
															else
															{
																for($star = 1;$star<=$x;$star++)
																	{
															
																		echo $this->Html->image('admin_fullstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																	}
																	
																	for($star = 1;$star<=4-$x;$star++)
																	{
																		echo $this->Html->image('admin_emptystar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
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
														
																	echo $this->Html->image('admin_fullstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																}
																echo $this->Html->image('admin_halfstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																for($star = 1;$star<=4-$x;$star++)
																{
																	echo $this->Html->image('admin_emptystar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																}
															}   
															else
															{
																for($star = 1;$star<=$x;$star++)
																	{
															
																		echo $this->Html->image('admin_fullstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																	}
																	
																	for($star = 1;$star<=4-$x;$star++)
																	{
																		echo $this->Html->image('admin_emptystar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
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
														
																	echo $this->Html->image('admin_fullstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																}
																echo $this->Html->image('admin_halfstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																for($star = 1;$star<=4-$x;$star++)
																{
																	echo $this->Html->image('admin_emptystar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																}
															}   
															else
															{
																for($star = 1;$star<=$x;$star++)
																	{
															
																		echo $this->Html->image('admin_fullstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																	}
																	
																	for($star = 1;$star<=4-$x;$star++)
																	{
																		echo $this->Html->image('admin_emptystar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
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
														
																	echo $this->Html->image('admin_fullstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																}
																echo $this->Html->image('admin_halfstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																for($star = 1;$star<=4-$x;$star++)
																{
																	echo $this->Html->image('admin_emptystar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																}
															}   
															else
															{
																for($star = 1;$star<=$x;$star++)
																	{
															
																		echo $this->Html->image('admin_fullstar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
																	}
																	
																	for($star = 1;$star<=4-$x;$star++)
																	{
																		echo $this->Html->image('admin_emptystar.gif', array("alt"=>"star","width"=>"16","height"=>"16", "class"=>""));
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
							<div class="fright popTopRightRating" style="font-weight:normal;">
								
								<p class="popTopRightTxt">
								<?php echo ucwords($productInfo['Product']['title']);?></p>
							
								<?php echo $productInfo['Product']['description'];?></br>
								<?php /*foreach($productInfo['Productplan'] as $plan)
									{
										if(strtolower($plan['plan'])=='plan1')
										{
											echo ucwords($plan['detail_desc']);
										}
									}*/
								?>
								
							</div>
							<div class="clr"></div>	
                            	
							<?php echo $this->Html->image('pop_top.png', array("alt"=>"top","width"=>"553","height"=>"11", "class"=>"mtop10 displayBl"));?>
							<div class="clr"></div>
							<div class="middlePopup">
								
								<div class="fleft popBotwidth" style="width:460px;margin-left:40px;">
									<div class="whiteBox">
										<div class="whiteBoxTop">
                                        	<div class="whiteBoxTopRight"></div>
                                        </div>
                                        
										<div class="whiteBoxMid">
											<div class="cheapRatingsMid">
												<div style="border:height:8px; *height:20px;">
												<p class="boldTxt"> User Rating</p>
												<?php echo $this->Form->create('Rating');?>
												<?php echo $this->Form->input('id',array('value'=>$productInfo['Rating']['id'],'type'=>'hidden'));?>
												<?php echo $this->Form->input('rating_old',array('label'=>false,'value'=>$productInfo['Rating']['rating_you'],'type'=>'hidden'));?>
												<?php echo $this->Form->input('no_ofUsers',array('label'=>false,'value'=>$productInfo['Rating']['no_ofUsers'],'type'=>'hidden'));?>
													<input type="hidden" id = "rating" name="rating" value=""/>
													<input type="text" id="RatingRatingYou" value="0" name="data[Rating][rating_you]" style="display:none;" />
													<span class="fleft starLeft" id="rateMe">													
														<a onclick="rateIt(this)" id="_1" title="Poor" onmouseover="on(this)" onmouseout="off(this)"></a>
														<a onclick="rateIt(this)" id="_2" title="Average" onmouseover="on(this)" onmouseout="off(this)"></a>
														<a onclick="rateIt(this)" id="_3" title="Very Good" onmouseover="on(this)" onmouseout="off(this)"></a>
														<a onclick="rateIt(this)" id="_4" title="Excellent" onmouseover="on(this)" onmouseout="off(this)"></a>
													</span>
													
														<span class="serialString2" id="beforeRating">
															<a onclick="cancelRating()" title="cancel"></a><?php echo "(".$productInfo['Rating']['no_ofUsers']." ratings) click to rate";?></span>
														<span class="serialString2" id="afterRating" style="display:none;"><a onclick="cancelRating()" title="cancel"></a>		thanks</span>
														<?php echo $this->Form->end();?>
												
													</span>			
												</div>
											</div>
										</div>
										<div class="whiteBoxBottom">
	                                        <div class="whiteBoxBottomRight"></div>	
                                        </div>
									</div>
									
									
								</div>
								<div class="clr"></div>
							</div>
							<div class="clr"></div>
							<?php echo $this->Html->image('pop_btm.png', array("alt"=>"top","width"=>"553","height"=>"11", "class"=>"displayBl"));?>
                            
                            
                            
                            
                            
                            
                            <?php echo $this->Html->image('pop_top.png', array("alt"=>"top","width"=>"553","height"=>"11", "class"=>"mtop10 displayBl"));?>
							
							<div class="clr"></div>
							<div class="middlePopup">
								<div class="fleft popBotwidth" style="width:520px;margin-left:20px;">

                                        <!-- for facebook -->
                                        <div class="facebookDiv">
                                            <div id="fb-root"></div>
        
                                            <div class="fb-like" data-href="<?php echo $longURL ;?>" data-send="false" data-layout="button_count" data-width="150" data-show-faces="true" data-action="recommend" data-font="trebuchet ms"></div>
                                        </div>
                                        
                                        <!-- for twitter -->
                                        <div class="twitterDiv">
                                            <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo $shortUrl;?>" data-text="I just rated <?php echo $productInfo['Product']['twittername']?>. See my rating here" data-count="horizontal" data-via="cheapstart" data-related="<?php echo $productInfo['Product']['twittername']?>">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                                        </div>
                                        
                                        <!-- For linkedin -->
                                        <div class="linkedinDiv">
                                            <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
                                            <script type="IN/Share" data-url="<?php echo $longURL;?>" data-counter="right"></script>
                                        </div>
                                        
                                        <!-- Google plus -->
                                        <div class="googleDiv">
                                            <g:plusone size="medium" width="150" annotation="inline" href="http://www.cheapstart.com.au/<?php echo $productInfo['Product']['twittername']?>"></g:plusone>
                                            <!-- Add the following three tags to your body 
                                            <span itemprop="name">cheapstart PRODUCT rating</span>
                                            <span itemprop="description">See my rating of PRODUCT on cheapstart</span>
                                            -->
                                    </div>
									
									<div class="whiteBox">
									</div>
								</div>
								<div class="clr"></div>
							</div>
							<div class="clr"></div>
							<?php echo $this->Html->image('pop_btm.png', array("alt"=>"top","width"=>"553","height"=>"11", "class"=>"displayBl"));?>
                            
								
								
								
							<!--  For comments on social networking sites -->
							<div style="margin-top:15px;">
								<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php echo $longURL;?>" num_posts="2" width="500"></fb:comments>
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
</body>
</html>