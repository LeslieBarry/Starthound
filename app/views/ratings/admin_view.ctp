<h2><?php  __('Ratings');?></h2>
<div class="productFormDiv">
<div class="mtop10"></div>
	<dl>	<?php $i = 0; $class = ' class="altrow"';?>
		<dd><?php __('Id'); ?></dd>
		<dt>
			<?php echo $rating['Rating']['id']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Product Id'); ?></dd>
		<dt>
			<?php echo $rating['Rating']['product_id']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Functionality'); ?></dd>
		<dt>
			<?php echo $rating['Rating']['functionality']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Reliability'); ?></dd>
		<dt>
			<?php echo $rating['Rating']['reliability']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Ease Of Use'); ?></dd>
		<dt>
			<?php echo $rating['Rating']['ease_of_use']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Value For Money'); ?></dd>
		<dt>
			<?php echo $rating['Rating']['value_for_money']; ?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('Rating given by users'); ?></dd>
		<dt>
			<?php if($rating['Rating']['no_ofUsers']>0)
			{
				echo round($rating['Rating']['rating_you']/$rating['Rating']['no_ofUsers'],2);
			}
			else
			{
				echo "0";
			}?>
		</dt>
		<div class="clr"></div>
		<dd><?php __('No OfUsers'); ?></dd>
		<dt>
			<?php echo $rating['Rating']['no_ofUsers']; ?>
		</dt>
		<div class="clr"></div>
	</dl>
	<div class="clr"></div>
				<div class="submitButton1">
					<?php echo $this->Html->link(__('Edit Rating', true), array('action' => 'edit', $rating['Rating']['id']),array('class'=>'adminSubmitButton')); ?> 
					<?php echo $this->Html->link(__('List Rating', true), array('action' => 'index'),array('class'=>'adminSubmitButton')); ?> 
				</div>
				<div class="clr"></div>
</div>
