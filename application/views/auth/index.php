
	<h2>Users</h2>
	<div class="alert alert-info">Below is a list of the users.</div>
	
	<div id="infoMessage"><?php echo $message;?></div>
	<p><a href="<?php echo base_url().'auth/create_user';?>">Create a new user</a></p>
	<table class="table  table-bordered">
    <thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Group</th>
			<th>Status</th>
		</tr>
    </thead>
    <tbody>
		<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo $user['first_name']?></td>
				<td><?php echo $user['last_name']?></td>
				<td><?php echo $user['email'];?></td>
				<td><?php echo $user['group_description'];?></td>
				<td><?php echo ($user['active']) ? anchor(base_url()."auth/deactivate/".$user['id'], 'Active') : anchor(base_url()."auth/activate/". $user['id'], 'Inactive');?></td>
			</tr>
		<?php endforeach;?>
    </tbody>
	</table>

	<p><a href="<?php echo base_url().'auth/create_user';?>">Create a new user</a></p>

