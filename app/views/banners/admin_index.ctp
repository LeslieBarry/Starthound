<?php echo $this->Session->flash();?>

<div class="tabularDiv">
	<h1>Banner</h1>
	<div class="top">
		<div class="fleft firstStep">Text For First Step</div>
		<div class="fleft firstStep">Text For Second Step</div>
		<div class="fleft firstStep">Text For Third Step</div>
		<div class="fleft CreadtedOn">Created On</div>
		<div class="fleft CreadtedOn">Modified On</div>
		<div class="fright action">Action</div>
		<div class="clr"></div>
	</div>
	<?php foreach ($banners as $banner){?>
		<div class="top mtop5">
					<div class="fleft firstStep"><?php echo $banner['Banner']['txt1']; ?></div>
					<div class="fleft firstStep"><?php echo $banner['Banner']['txt2']; ?></div>
					<div class="fleft firstStep"><?php echo $banner['Banner']['txt3']; ?></div>
					<div class="fleft CreadtedOn"><?php echo $banner['Banner']['cdate']; ?></div>
					<div class="fleft CreadtedOn"><?php echo $banner['Banner']['mdate']; ?></div>
					<div class="fright action">
						<?php echo $this->Html->link(__('View Details', true), array('action' => 'view', $banner['Banner']['id']),array('class'=>'adminSubmitButton')); ?>

						<?php echo $this->Html->link(__('Edit Details', true), array('action' => 'edit', $banner['Banner']['id']),array('class'=>'adminSubmitButton','style'=>'padding-left:4px;')); ?>
					</div>
					<div class="clr"></div>
		</div>		
	<?php } ?>
</div>