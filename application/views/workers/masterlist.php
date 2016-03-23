
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Lastname</th>
					<th>Firstname</th>
					<th>MI</th>
					<th>Gender</th>
					<th class="text-center">Designation</th>
					<th class="text-center">SSS</th>
					<th class="text-center">PhilHealth</th>
					<th class="text-center">Cellphone</th>
					<th class="text-center">Contact Person</th>
					<th class="text-center">Contact Person's Phone</th>
				</tr>
				
			</thead>
			
			<tbody>
				<?php foreach($workers as $worker):
				?>
					<tr>
						<td>
							<?=$worker['lastname']?>
						</td>
						<td>
							<?=$worker['nickname']?>						
						</td>
						<td>
							<?=substr($worker['middlename'],0,1)?>
						</td>
						<td class="text-center"><?=$worker['gender']?>
							
						</td>
						<td class="text-center"><?=$worker['designation']?>
						</td>
						<td class="text-center"><?=$worker['sss']?>
						</td>
						<td class="text-center"><?=$worker['phil_health']?>
						</td>
						<td class="text-center"><?=$worker['cellphone']?>						
						</td>
						<td class="text-center"><?=$worker['contact_person']?>						
						</td>
						<td class="text-center"><?=$worker['contact_phone']?>						
						</td>
					</tr>
				
				
				<?php endforeach;?>

			</tbody>
		
		</table>
		
		
		
	</div>

</div>
