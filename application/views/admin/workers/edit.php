<div class="col-md-12">
<a href="<?php echo base_url()?>admin/workers/">Back to Worker's List</a>
<h2>Edit a Worker</h2>
<?php $errors =validation_errors(); ?>

<?php if($errors):?>
<div class="alert alert-warning">
    <?php echo $errors; ?>
</div>
<?php endif;?>
	<div class="well">
		<form method="post" role="form" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3">	
					<label>Last Name:</label>
					<input type="text" name="lastname" value="<?=!empty($worker['lastname']) ? $worker['lastname'] : set_value('lastname') ?>"  placeholder="Last Name" class="form-control"  />
				</div>
				<div class="col-md-3">
					<label>First Name:</label>
					<input type="text" name="firstname" value="<?=!empty($worker['firstname']) ? $worker['firstname'] : set_value('firstname') ?>" placeholder="First Name"  class="form-control" />
				</div>
				<div class="col-md-3">
					<label>Middle Name:</label>
					<input type="text" name="middlename" value="<?=!empty($worker['middlename']) ? $worker['middlename'] : set_value('middlename') ?>"  placeholder="Middle Name" class="form-control" />
				</div>
				<div class="col-md-3">
					<label>Nickname</label>
					<input type="text" name="nickname" value="<?=!empty($worker['nickname']) ? $worker['nickname'] : set_value('nickname') ?>" placeholder="Nickname" class="form-control" />		
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 ">
					<label>Place of Birth</label>
					<input type="text" name="place_birth" value="<?=!empty($worker['place_birth']) ? $worker['place_birth'] : set_value('place_birth') ?>" placeholder="Place of Birth" class="form-control" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Date of Birth</label>
				</div>
				<div class="col-md-6">
					<label>Civil Status</label>
				</div>
			</div>
			<div class="row">		
				<div class="form-group">
					<div class="col-md-2">					
						<input type="text"  name="month" class="form-control" placeholder="Month" value="<?=!empty($worker['month']) ? $worker['month'] : set_value('month') ?>" />							
					</div>
					<div class="col-md-2">					
						<input type="text" name="day" class="form-control" placeholder="Day" value="<?=!empty($worker['day']) ? $worker['day'] : set_value('day') ?>"  />				
					</div>
					<div class="col-md-2">
						<input type="text" name="year" class="form-control" placeholder="Year" value="<?=!empty($worker['year']) ? $worker['year'] : set_value('year') ?>" />					
					</div>
					<div class="col-md-6">
						<select name="status" class="form-control">
							<option <?=$worker['status']=='Single' ? 'selected' : ''; ?>>Single</option>
							<option <?=$worker['status']=='Married' ? 'selected' : ''; ?>>Married</option>
							<option <?=$worker['status']=='Widowed' ? 'selected' : ''; ?>>Widowed</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				<label>Gender:</label>
					<select name="gender" class="form-control">
						<option <?=$worker['gender']=='Male' ? 'selected' : ''; ?>>Male</option>
						<option <?=$worker['gender']=='Female' ? 'selected' : ''; ?>>Female</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Height (cm):</label>
					<input name="height" class="form-control" placeholder="Height" value="<?=!empty($worker['height']) ? $worker['height'] : set_value('height') ?>" />		
				</div>	
				<div class="col-md-4">
					<label>Weight (kg):</label>
					<input name="wieight" class="form-control" placeholder="Weight" value="<?=!empty($worker['weight']) ? $worker['weight'] : set_value('weight') ?>"/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>E-mail Address</label>
					<input name="email" class="form-control" placeholder="Email" value="<?=!empty($worker['email']) ? $worker['email'] : set_value('email') ?>" />
				</div>	
			</div>
			<div class="row">
				<div class="col-md-4">
					<label>Telehone No.(landline):</label>
					<input type="text" name="phone" value="<?=!empty($worker['phone']) ? $worker['phone'] : set_value('phone') ?>"  class="form-control" placeholder="Phone" />		
				</div>
				<div class="col-md-4">
					<label>Cellphone:</label>
					<input type="text" name="cell_phone" value="<?=!empty($worker['cell_phone']) ? $worker['cell_phone'] : set_value('cell_phone') ?>"  class="form-control" placeholder="Cellphone" />		
				</div>	
			</div>
			<div class="row">
				<div class="col-md-5">
					<label>Passport No.:</label>
					<input type="text" name="passport" value="<?=!empty($worker['passport']) ? $worker['passport'] : set_value('passport') ?>" class="form-control" placeholder="Passport" />		
				</div>
				<div class="col-md-5">
					<label>SSS No.</label>
					<input type="text" name="sss" value="<?=!empty($worker['sss']) ? $worker['sss'] : set_value('sss') ?>" class="form-control" placeholder="SSS" />		
				</div>	
			</div>			
			<div class="row">
				<div class="col-md-5">
					<label>Phil. Health:</label>
					<input type="text" name="philhealth" value="<?=!empty($worker['philhealth']) ? $worker['philhealth'] : set_value('philhealth') ?>"  class="form-control" placeholder="Phil. Health" />		
				</div>
				<div class="col-md-5">
					<label>TIN No.</label>
					<input type="text" name="tin" value="<?=!empty($worker['tin']) ? $worker['tin'] : set_value('tin') ?>"  class="form-control" placeholder="TIN" />		
				</div>	
			</div>
			<div class="row">
				<div class="col-md-10">
					<label>Permanent Address</label>
					<input type="text" name="permanent_address" class="form-control" placeholder="Permanent Address" value="<?=!empty($worker['address']) ? $worker['address'] : set_value('address') ?>" />
				</div>						
			</div>	
			<div class="form-group">
				<label>Photo:</label>
				<div class="row">
					<div class="col-md-4">
					<?php if(!empty($worker['photo'])):?>
						<img src="<?=base_url().'images/workers/'.$worker['photo']?>" height="150" />
					<?php endif; ?>
						<input type="file" name="photo" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Photo Signature:</label>
				<div class="row">
					<div class="col-md-4">
					<?php if(!empty($worker['photo'])):?>
						<img src="<?=base_url().'images/workers/'.$worker['photo_signature']?>" height="150" />
					<?php endif; ?>
						<input type="file" name="photo_signature" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Save" class="btn btn-primary" />
			</div>
		</form>
	</div>
</div>
