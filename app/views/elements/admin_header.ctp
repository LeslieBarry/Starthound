<div class="headerSection">
    <div class="fleft">
            <?php                     
                echo $this->Html->link($this->Html->image("icon_logo.png",array("alt"=>"Logo","width"=>"243","height"=>"44")),array('controller'=>'home','action'=>'index'),array('escape' => false));  
            ?>                     
    </div>
    <div class="headerRight">
        <ul>
            
                <li>
					<a href="<?php echo FULL_BASE_URL.$this->base.'/Home'?>" target="_blank" class="tabHome"><span>HOME</span></a>
				</li>
                <li>
					<a href="<?php echo FULL_BASE_URL.$this->base.'/Product'?>"  target="_blank" class="tabProduct"><span>PRODUCTS</span></a>
                </li>
                
            
                
        </ul>
    </div>
    <div class="clr"></div>
</div>