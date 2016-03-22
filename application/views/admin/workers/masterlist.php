<?php
$num_workers = 0;
$num_probationary_pastors=0;
$num_ordained_pastors=0;
$num_probationary_deaconess=0;
$num_ordained_deaconess =0;
?>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Lastname</th>
					<th>Firstname</th>
					<th>MI</th>
					<th class="text-center">ORD. PTR.</th>
					<th class="text-center">PASTOR</th>
					<th class="text-center">ORD. DEAC.</th>
					<th class="text-center">DEAC.</th>
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
						<td class="text-center"><?php if(trim(strtolower($worker['ordained_to'])) == 'present' && trim(strtolower($worker['gender'])) == 'male' ):
							$num_ordained_pastors++;
							?>
								Yes
							<?php endif;?>
						</td>
						<td class="text-center"><?php if(trim(strtolower($worker['probationary_to'])) == 'present' && trim(strtolower($worker['gender'])) == 'male' ):
							$num_probationary_pastors++;
							?>
								Yes
							<?php endif;?>
						</td>
						<td class="text-center"><?php if(trim(strtolower($worker['ordained_to'])) == 'present' && trim(strtolower($worker['gender'])) == 'female' ):
							$num_ordained_deaconess++;
							?>
								Yes
							<?php endif;?>
						</td>
						<td class="text-center"><?php if(trim(strtolower($worker['probationary_to'])) == 'present' && trim(strtolower($worker['gender'])) == 'female' ):
							$num_probationary_deaconess++;
							?>
								Yes
							<?php endif;?>
						</td>
					</tr>
				
				
				<?php endforeach;?>

			</tbody>
		
		</table>
		<br />
		<br />
		<div class="row">
			<div class="col-md-4">
				<table class="table">
					<tr>
						<td>Number of Probationary Pastors: </td><td class="text-right"><?=$num_probationary_pastors?></td>
					</tr>
					<tr>
						<td>Number of Ordained Pastors: </td><td class="text-right"><?=$num_ordained_pastors?></td>
					</tr>
					<tr>
						<td>Number of Probationary Deaconess:</td><td class="text-right"><?=$num_probationary_deaconess?></td>
					</tr>
					<tr>
						<td>Number of Ordained Deaconess :</td><td class="text-right"><?=$num_ordained_deaconess?></td>
					</tr>
					<tr>
						<td>Total Number of Workers: </td><td class="text-right"><?=$num_workers?></td>
					</tr>					
				</table>
			</div>
		</div>
		
	</div>

</div>
