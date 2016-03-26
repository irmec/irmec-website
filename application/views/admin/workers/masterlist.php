<script type="text/javascript">
	$(function(){
		
		$('.processed-id').click(function(){
			var worker_id = $(this).attr('data-id');
			var processed = 'N';
			if($(this).attr('checked')){
				processed = 'Y';
			}else{
				processed = 'N';				
			}
			/** post **/
			$.ajax({
				url: '/admin/workers/xhr_processed_ID',
				type: 'POST',
				data: {id:worker_id, processed:processed},
				success: function()
				{
					console.log('success');
				}
			
			});
		
		});
	});


</script>

<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID. No.</th>
					<th>Lastname</th>
					<th>Firstname</th>
					<th>Middlename</th>
					<th>Gender</th>
					<th>Designation</th>
					<th>SSS</th>
					<th>PhilHealth</th>
					<th>Cellphone</th>
					<th class="text-center">Contact Person</th>
					<th class="text-center">Contact Person's Phone</th>
					<th class="text-center">ID Processed</th>
				</tr>				
			</thead>
			<tbody>
				<?php foreach($workers as $worker):?>
					<tr>
						<td>
							<a href="<?php echo base_url().'admin/workers/edit/'.$worker['id']?>"><?=199200000 + $worker['id']?></a>
						</td>
						<td>
							<?=$worker['lastname']?>
						</td>
						<td>
							<?=$worker['firstname']?>						
						</td>
						<td>
							<?=$worker['middlename']?>
						</td>
						<td class="text-center"><?=$worker['gender']?>
							
						</td>
						<td><?=$worker['designation']?>
						</td>
						
						<td><?=$worker['sss']?>
						</td>
						<td><?=$worker['philhealth']?>
						</td>
						<td><?=$worker['cell_phone']?>
						</td>
						<td class="text-center"><?=$worker['contact_person']?>
						</td>
						<td class="text-center"><?=$worker['contact_phone']?>						
						</td>
						<td class="text-center"><input type="checkbox" class="processed-id" value="1" data-id ="<?=$worker['id']?>" <?php if($worker['processed']) echo 'checked="checked"';?>/></td>
					</tr>
				<?php endforeach;?>
			</tbody>		
		</table>		
	</div>
</div>
