<div class="headerSection">
    <div class="fleft cheapstartLogo">
            <?php                     
                echo $this->Html->link($this->Html->image("icon_logo.png",array("alt"=>"Logo","width"=>"243","height"=>"44")),array('controller'=>'home','action'=>'index'),array('escape' => false));  
            ?>                     
    </div>
    <div class="headerRight">
        <ul>
            <?php if($menuItem=='home'){ ?>
                <li>
                    <?php                     
                        echo $this->Html->link($this->Html->tag('span', 'HOME'),array('controller'=>'home','action'=>'index'),array('class' => 'selected homeselected','escape' => false));  
                    ?>                     
                </li>
                <li>
                    <?php                     
                        echo $this->Html->link($this->Html->tag('span', 'PRODUCTS'),array('controller'=>'product','action'=>'index'),array('class' => 'tabProduct','escape' => false));  
                    ?>                     
                </li>
                <li>
				    <?php                     
                        echo $this->Html->link($this->Html->tag('span', 'CONTACT US'),array('controller'=>'Popups','action'=>'contact_us'),array('class' => 'ratingPopup tabContact last','escape' => false));  
                    ?>                                         
                </li>
            <?php }elseif($menuItem=='products'){ ?>
                <li>
                    <?php                     
                        echo $this->Html->link($this->Html->tag('span', 'HOME'),array('controller'=>'home','action'=>'index'),array('class' => 'tabHome','escape' => false));  
                    ?>                     
                </li>
                <li>
                    <?php                     
                        echo $this->Html->link($this->Html->tag('span', 'PRODUCTS'),array('controller'=>'product','action'=>'index'),array('class' => 'selected productselected','escape' => false));  
                    ?>                     
                </li>
                <li>
                    <?php                     
                        echo $this->Html->link($this->Html->tag('span', 'CONTACT US'),array('controller'=>'Popups','action'=>'contact_us'),array('class' => 'ratingPopup tabContact last','escape' => false));  
                    ?>  
                </li>
            <?php }elseif($menuItem=='contactus'){ ?>
                <li>
                    <?php                     
                        echo $this->Html->link($this->Html->tag('span', 'HOME'),array('controller'=>'home','action'=>'index'),array('class' => 'tabHome','escape' => false));  
                    ?>                     
                </li>
                <li>
                    <?php                     
                        echo $this->Html->link($this->Html->tag('span', 'PRODUCTS'),array('controller'=>'product','action'=>'index'),array('class' => 'tabProduct','escape' => false));  
                    ?>                     
                </li>
                <li>
					<?php                     
                        echo $this->Html->link($this->Html->tag('span', 'CONTACT US'),array('controller'=>'Popups','action'=>'contact_us'),array('class' => 'ratingPopup selected contactusselected last','escape' => false));  
                    ?>                      
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="clr"></div>
</div>
