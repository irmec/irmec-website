<?php
$num_workers = 0;
?>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Lastname</th>
					<th>Firstname</th>
					<th>MI</th>
					<th>ORD. PTR.</th>
					<th>PASTOR</th>
					<th>ORD. DEAC.</th>
					<th>DEAC.</th>
				</tr>
				
			</thead>
			
			<tbody>
				<?php foreach($workers as $worker):
					$num_workers++;
				?>
					<tr>
						<td>
							<?=$worker['lastname']?>
						</td>
						<td>
							<?=$worker['firstname']?>						
						</td>
						<td>
							<?=substr($worker['middlename'],0,1)?>
						</td>
						<td><?php if(trim(strtolower($worker['ordained_to'])) == 'present' && trim(strtolower($worker['gender'])) == 'male' ):?>
								Yes
							<?php endif;?>
						</td>
						<td><?php if(trim(strtolower($worker['probationary_to'])) == 'present' && trim(strtolower($worker['gender'])) == 'male' ):?>
								Yes
							<?php endif;?>
						</td>
						<td><?php if(trim(strtolower($worker['ordained_to'])) == 'present' && trim(strtolower($worker['gender'])) == 'female' ):?>
								Yes
							<?php endif;?>
						</td>
						<td><?php if(trim(strtolower($worker['probationary_to'])) == 'present' && trim(strtolower($worker['gender'])) == 'female' ):?>
								Yes
							<?php endif;?>
						</td>
					</tr>
				
				
				<?php endforeach;?>
				<tr>
					<td colspan="7">
						<?=$num_workers;?>
					</td>
				</tr>
			</tbody>
		
		</table>
		
	</div>

</div>
