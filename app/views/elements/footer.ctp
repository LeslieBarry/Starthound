<div class="footer">
    <div class="footerMainContainer">

        <div class="fleft">
            <div class=" footerTxt">
            <ul>
                <li class="about">
					<?php 					
						echo $this->Html->link('About',array('controller'=>'Popups','action'=>'about_us'),array('escape' => false,'class'=>'footerPopup'));  
					?>						 
                                     
                </li>
                <li>
					<?php 					
						echo $this->Html->link('Terms of Use',array('controller'=>'Popups','action'=>'disclaimer'),array('escape' => false,'class'=>'footerPopup'));  
					?>			
                                       
                </li>
                <li>
					<?php 					
						echo $this->Html->link('Privacy Policy',array('controller'=>'Popups','action'=>'privacy_policy'),array('escape' => false,'class'=>'footerPopup'));  
					?>		
                                        
                </li>
				<li>
					<a href="http://www.cheapstart.com.au/blog" target="_blank">Blog</a>
				</li>
            </ul>
            </div>
            <div class="copyright">
                &copy; cheapstart 2011. All rights reserved.
            </div>
			
        </div>
        <div class="fright footerCheapStartLogo">
							<div><?php 					
					echo $this->Html->link($this->Html->image("twitter-small.png",array('class'=>'linkRight',"alt"=>"twitter","width"=>"20","height"=>"20")),"http://twitter.com/cheapstart",array('escape' => false,"target"=>"_blank"));  
				?>
				<?php 					
					echo $this->Html->link($this->Html->image("linkedin-small.png",array('class'=>'linkRight',"alt"=>"linkedin","width"=>"20","height"=>"20")),"http://www.linkedin.com/company/cheapstart",array('escape' => false,"target"=>"_blank"));  
				?>
				<?php 					
					echo $this->Html->link($this->Html->image("facebook-small.png",array('class'=>'',"alt"=>"facebook","width"=>"20","height"=>"20")),"http://www.facebook.com/cheapstart",array('escape' => false,"target"=>"_blank"));  
				?>
				</div>				
				<div class="txtBox">
                    <div class="fleft registerUpdate">
						<?php 					
						echo $this->Html->link('Register for updates on deals and products',array('controller'=>'newsletter','action'=>'index'),array('escape' => false,'class'=>'footerPopup'));  
					?>	
                        
                    </div>
                    <div class="fleft">
						<?php 
								 $mouseover ="'".$this->params['imgURL'].'/go-highlight.png'."'";
								 $mouseout ="'".$this->params['imgURL'].'/go-normal.png'."'";
								 echo $this->Html->link($this->Html->image("go-normal.png",array("alt"=>"Register","width"=>"20px","height"=>"20px",'onmouseover'=>"this.src=".$mouseover,'onmouseout'=>"this.src=".$mouseout)),array('controller'=>'newsletter','action'=>'index'),array('escape' => false,'class'=>'footerPopup'));  
							?>
					
                       				 
                    </div>
                    <div class="clr"></div>
				</div>
        </div>
        <div class="clr"></div>
    </div>
</div>
