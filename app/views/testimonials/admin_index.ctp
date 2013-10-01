<?php echo $this->Session->flash();?>
<h1>Product List</h1>
<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link(__('New Testimonial', true), array('action' => 'add')); ?></li>
	</ul>
<div class="tabularDiv">
		<table cellpadding="0" cellspacing="0">
<tr>
	<th class="fleft width50">ID</th>					
	<th class="fleft width200">Submitted By</th>		
	<th class="fleft width300">Testimonial</th>
	
	<th class="fleft width150">Created On</th>			
	
	<th class="fleft width150"><?php __('Actions');?></th>
	<th class="fleft width100">Advertise</th>
	
</tr>
<?php
$i = 0;
foreach ($testimonials as $testimonial):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="fleft width50">
			<?php echo $testimonial['Testimonial']['id']; ?>
		</td>
		<td class="fleft width200">
			<?php echo $testimonial['Testimonial']['name']; ?>
		</td>
		<td class="fleft width300">
			<?php 
						if($testimonial['Testimonial']['status']=='active'){
							echo $this->Html->link( $testimonial['Testimonial']['testimonial'], array('action' => 'view', $testimonial['Testimonial']['id'])); 
						}
						else
						{
							echo $testimonial['Testimonial']['testimonial'];
						}
					?>				
		</td>
		
		<td class="fleft width150">
			<?php echo $testimonial['Testimonial']['cdate']; ?>
		</td>
		<td class="fleft width150">
						<span>
						<?php 
							if( $testimonial['Testimonial']['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-edit.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('action' => 'edit', $testimonial['Testimonial']['id']),array('escape'=>false));
							}
						?>
						
						<?php 
							if( $testimonial['Testimonial']['status']=='active')
							{
								echo $this->Html->link($this->Html->image("icon-delete.png",array("alt"=>"Delete","width"=>"32","title"=>"Remove")), array('action' => 'delete', $testimonial['Testimonial']['id'],$pageParam), array('escape'=>false), sprintf(__('Are you sure you want to make inactive this testimonial?', true))); 
							}
							else
							{
								echo $this->Html->link(__('Activate', true), array('action' => 'activate', $testimonial['Testimonial']['id'],$pageParam), array('class'=>'adminSubmitButton lpad28'), sprintf(__('Are you sure you want to activate this testimonial?', true))); 
							}
						?>
						</span>
					</td>
					<td class="fleft width100">
						<span>
						<?php 
							if( $testimonial['Testimonial']['advertise']=='yes')
							{
								echo $this->Html->link($this->Html->image("yes.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('action' => 'advertise', $testimonial['Testimonial']['id'],0),array('escape'=>false));
							}
							else
							{
								echo $this->Html->link($this->Html->image("no.png",array("alt"=>"Edit","width"=>"32","title"=>"Edit")), array('action' => 'advertise', $testimonial['Testimonial']['id'],1),array('escape'=>false)); 
							}
						?>
						</span>
					</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

