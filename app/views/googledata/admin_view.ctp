<?php echo $this->Session->flash();?>
<h1>Goo.gl Complete Analysis</h1>
<div class="productFormDiv">
	<div class="mtop10"></div>
	<dl>
		
		<dd><?php __('Product'); ?></dd>
		<dt>
			<?php echo $googledatum['Product']['title']; ?>
			&nbsp;
		</dt>
		<div class="clr"></div>
		<dd><?php __('URL Information'); ?></dd>
		<dt>
			<?php 
				$response =  $googledatum['Googledatum']['completeinfo']; 
				$json = json_decode($response);
				echo '<table cellpadding="0" cellspacing="0" width="500px">';
				echo '<tr bgcolor="#ffffff">';
				echo '<td>Short Url :</td><td>'.$json->id.'</td>';
				echo '</tr><tr>';
				echo '<td>Long Url :</td><td>'.$json->longUrl.'</td>';
				echo '</tr>';
				echo '<tr bgcolor="#ffffff">';
				echo '<td>Status :</td><td>'.$json->status.'</td>';
				echo '</tr><tr>';
				echo '<td>Created On :</td><td>'.date($json->created).'</td>';
				echo '</tr><tr bgcolor="#ffffff">';
				echo '<td>Clicked On :</td><td>'.date($googledatum['Product']['mdate']).'</td>';
				echo '</tr><tr>';
				echo '<td>&nbsp;</td>';
				echo '</tr></table>';
			?>
		</dt>
		<div class="clr"></div>
		<?php if($json->analytics->allTime->shortUrlClicks>0){?>
		<dd><?php __('Complete Click Information'); ?></dd>
		<dt>
			<?php
				echo '<table cellpadding="0" cellspacing="0" width="500px">';
				echo '<tr bgcolor="#ffffff">';
				echo '<td>Total Clicks :</td><td>'. $json->analytics->allTime->shortUrlClicks.'</td>';
				echo '</tr><tr>';
				echo '<td>Country Details</td>';
				echo '<td><table cellpadding="2"><tr><th>Country&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->allTime->countries as $country)
				{
					echo '<tr><td>'.$country->id.'</td><td align="center">'.$country->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr><tr>';
				echo '<td>Browsers Used</td>';
				echo '<td><table cellpadding="2"><tr><th>Browser&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->allTime->browsers as $browser)
				{
					echo '<tr><td>'.$browser->id.'</td><td align="center">'.$browser->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr><tr>';
				echo '<td>OS Used</td>';
				echo '<td><table cellpadding="2"><tr><th>OS&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->allTime->platforms as $platform)
				{
					echo '<tr><td>'.$platform->id.'</td><td align="center">'.$platform->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr>';
				echo '</table>';
					
			?>			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Monthly Click Information'); ?></dd>
		<dt>
			<?php
				echo '<table cellpadding="0" cellspacing="0" width="500px">';
				echo '<tr bgcolor="#ffffff">';
				echo '<td>Total Clicks :</td><td>'. $json->analytics->month->shortUrlClicks.'</td>';
				echo '</tr><tr>';
				echo '<td>Country Details</td>';
				echo '<td><table cellpadding="2"><tr><th>Country&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->month->countries as $country)
				{
					echo '<tr><td>'.$country->id.'</td><td align="center">'.$country->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr><tr>';
				echo '<td>Browsers Used</td>';
				echo '<td><table cellpadding="2"><tr><th>Browser&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->month->browsers as $browser)
				{
					echo '<tr><td>'.$browser->id.'</td><td align="center">'.$browser->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr><tr>';
				echo '<td>OS Used</td>';
				echo '<td><table cellpadding="2"><tr><th>OS&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->month->platforms as $platform)
				{
					echo '<tr><td>'.$platform->id.'</td><td align="center">'.$platform->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr>';
				echo '</table>';
				//print_r($json);
				
			?>			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Weekly Click Information'); ?></dd>
		<dt>
			<?php
				echo '<table cellpadding="0" cellspacing="0" width="500px">';
				echo '<tr bgcolor="#ffffff">';
				echo '<td>Total Clicks :</td><td>'. $json->analytics->week->shortUrlClicks.'</td>';
				echo '</tr><tr>';
				echo '<td>Country Details</td>';
				echo '<td><table cellpadding="2"><tr><th>Country&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->week->countries as $country)
				{
					echo '<tr><td>'.$country->id.'</td><td align="center">'.$country->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr><tr>';
				echo '<td>Browsers Used</td>';
				echo '<td><table cellpadding="2"><tr><th>Browser&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->week->browsers as $browser)
				{
					echo '<tr><td>'.$browser->id.'</td><td align="center">'.$browser->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr><tr>';
				echo '<td>OS Used</td>';
				echo '<td><table cellpadding="2"><tr><th>OS&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->week->platforms as $platform)
				{
					echo '<tr><td>'.$platform->id.'</td><td align="center">'.$platform->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr>';
				echo '</table>';
				//print_r($json);
				
			?>			
		</dt>
		<div class="clr"></div>
		<dd><?php __('Last 24hour Click Information'); ?></dd>
		<dt>
			<?php
				echo '<table cellpadding="0" cellspacing="0" width="500px">';
				echo '<tr bgcolor="#ffffff">';
				echo '<td>Total Clicks :</td><td>'. $json->analytics->day->shortUrlClicks.'</td>';
				echo '</tr><tr>';
				echo '<td>Country Details</td>';
				echo '<td><table cellpadding="2"><tr><th>Country&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->day->countries as $country)
				{
					echo '<tr><td>'.$country->id.'</td><td align="center">'.$country->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr><tr>';
				echo '<td>Browsers Used</td>';
				echo '<td><table cellpadding="2"><tr><th>Browser&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->day->browsers as $browser)
				{
					echo '<tr><td>'.$browser->id.'</td><td align="center">'.$browser->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr><tr>';
				echo '<td>OS Used</td>';
				echo '<td><table cellpadding="2"><tr><th>OS&nbsp;</th><th>&nbsp;No. of Clicks</th></tr>';
				foreach($json->analytics->day->platforms as $platform)
				{
					echo '<tr><td>'.$platform->id.'</td><td align="center">'.$platform->count.'</td></tr>';
				}
				echo '</table></td>';
				echo '</tr>';
				echo '</table>';
				//print_r($json);
				
			?>			
		</dt>
		<?php }else {?>
		<dd><?php __('Complete Click Information'); ?></dd>
		<dt>
			<?php
				echo '<table cellpadding="0" cellspacing="0" width="500px">';
				echo '<tr bgcolor="#ffffff">';
				echo '<td>Total Clicks :</td><td>'. $json->analytics->allTime->shortUrlClicks.'</td>';
				echo '</tr></table>';		
			}?>
		</dt>
		<div class="clr"></div>
	</dl>
</div>

