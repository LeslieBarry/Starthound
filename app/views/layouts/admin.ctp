<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="" />
    <title>cheapstart</title>
    <meta name="Description" content=""/>
    <meta name="Keywords" content=""/>
    <meta name="robots" content="index,follow"/>
    <meta name="revisit-after" content="10"/>
    <meta name="robots" content="all"/>
    <meta name="page-topic" content=""/>
    <meta name="distrp ibution" content=""/>
    <meta name="rating" content=""/>
    <?php echo($html->css(array('chrome','common','content','ie7','ie9','popup','stylesheet','admin','colorbox')));?>
    <?php echo($javascript->link(array('common','jquery/jquery.js','jquery/jquery-1.2.6.pack.js','jquery/jquery1.4.4.js','slider','validate','colorbox/jquery.colorbox.js')));?>
	<script>
	$(document).ready(function() {
				$(".aboutUsPopup").colorbox({width:"100%", height:"100%", iframe:true});
        
});
</script>
</head>

<body>
	<div style="min-height:100%;height:auto !important;height:100%;margin:0 auto -55px auto;">
    <!-- ====Header Here==== -->
        <?php echo($this->element('admin_header')); ?>
    <!-- ====Header End==== -->
    
   <!-- ====Middle Here==== -->
	<div class="adminbackGround">
        <div class="adminmainBlock">
			<div class="adminBlock">
				<?php if($menuitem=='afterlogin'){ ?>				
					<div class="adminBlockTop">		
						<h3>ADMIN PANEL</h3>
						<h6 class="fright">Hi <?php echo $user['name'];?>!
							<span class="logout">
								<?php echo $html->link('Logout', array('controller' => 'Administrators', 'action' => 'admin_logout')); ?>
							</span>
						</h6>
						<div class="clr"></div>
					</div>
					<div class="adminform">
						<div class="button" >
							<div class="menu_class1 buttonHover">USER</div>
							<ul class="the_menu1 the_menu">
								<li>
									<?php echo $html->link('Change Password', array('controller' => 'Administrators', 'action' => 'admin_changePassword',$user['id'])); ?>
								</li>
							</ul>
						</div>

						<div class="button">
							<div class="menu_class2 buttonHover">ADMIN MANAGEMENT</div>
							<ul class="the_menu2 the_menu">
								<li>
									<?php echo $html->link('Manage Banner', array('controller' => 'Banners', 'action' => 'admin_index')); ?>
								</li>
								<li>
									<?php echo $html->link('Manage Product', array('controller' => 'Products', 'action' => 'admin_index')); ?>
								</li>
								<li>
									<?php echo $html->link('Manage Categories', array('controller' => 'Categories', 'action' => 'admin_index')); ?>
								</li>
								<li>
									<?php echo $html->link('Manage Product Plans', array('controller' => 'Productplans', 'action' => 'admin_index')); ?>
								</li>
								<li>
									<?php echo $html->link('View Google URL Info', array('controller' => 'Googledata', 'action' => 'admin_index')); ?>
								</li>
								<li>
									<?php echo $html->link('Customer Report', array('controller' => 'Users', 'action' => 'admin_index')); ?>
								</li>
							</ul>
						</div>
						<div class="button" >
							<div class="menu_class3 buttonHover">ADDITIONAL</div>
							<ul class="the_menu3 the_menu">
								<li>
									<?php echo $html->link('Text on PopUp', array('controller' => 'AdminWords', 'action' => 'admin_index')); ?>
								</li>
								<li>
									<?php echo $html->link('Product Number to Rotate', array('controller' => 'ProductNumbers', 'action' => 'admin_index')); ?>
								</li>
								<li>
									<?php echo $html->link('Testimonials', array('controller' => 'Testimonials', 'action' => 'admin_index')); ?>
								</li>
								<li>
									<?php echo $html->link('Popup Text', array('controller' => 'Popups', 'action' => 'admin_index')); ?>
								</li>
								<li>
									<?php echo $html->link('Ratings', array('controller' => 'Ratings', 'action' => 'admin_index')); ?>
								</li>
								
							</ul>
						</div>
						<div class="clr"></div>
					</div>
				<?php } else {?>
					<div class="adminBlockTop">		
						<h3>ADMIN PANEL</h3>
						<div class="clr"></div>
					</div>
				<?php } ?>
					
						<?php echo $content_for_layout; ?>
					<div class="clr"></div>
					
			</div>
		</div>	
	</div>
    <!-- ====Middle End==== -->
    <div class="clr"></div>
	<?php echo $this->element('sql_dump'); ?>
	<div class="nudge"></div>
	</div>
	  <!-- ====Footer Here==== -->
        <?php echo($this->element('footer')); ?>
    <!-- ====Footer End==== -->
</body>
</html>