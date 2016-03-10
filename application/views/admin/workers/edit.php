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
			<!-- Navigation Tab here -->
			<div>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Personal</a></li>
					<li role="presentation"><a href="#family" aria-controls="family" role="tab" data-toggle="tab">Family</a></li>
					<li role="presentation"><a href="#ministry" aria-controls="ministry" role="tab" data-toggle="tab">Ministry</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="personal">
						<h4>PERSONAL BACKGROUND</h4>
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
								<input name="weight" class="form-control" placeholder="Weight" value="<?=!empty($worker['weight']) ? $worker['weight'] : set_value('weight') ?>"/>
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
								<input type="text" name="permanent_address" class="form-control" placeholder="Permanent Address" value="<?=!empty($worker['permanent_address']) ? $worker['permanent_address'] : set_value('permanent_address') ?>" />
							</div>						
						</div>	
						<div class="form-group">
							<label>Photo:</label>
							<div class="row">
								<div class="col-md-4">
								<?php if(!empty($worker['photo'])):?>
									<img src="<?=base_url().'images/workers/'.$worker['photo']?>" height="150" />
								<?php endif; ?>
									<input type="file" name="photo" class="form-control" aaccept="image/*;capture=camera" />
								</div>
							</div>
						</div>
						<div class="form-group">
					<label>Photo Signature:</label>
					<div class="row">
						<div class="col-md-4">
						<?php if(!empty($worker['photo_signature'])):?>
							<img src="<?=base_url().'images/workers/'.$worker['photo_signature']?>" height="150" />
						<?php endif; ?>
							<input type="file" name="photo_signature" class="form-control" />
						</div>
					</div>
				</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="family">
						<h4>FAMILY INFORMATION</h4>
						<div class="row">
							<div class="col-md-6">	
								<label>Father's Name:</label>
								<input type="text" name="fathers_name" value="<?=!empty($worker['fathers_name']) ? $worker['fathers_name'] : set_value('fathers_name') ?>"  placeholder="Fathers Name" class="form-control"  />								
							</div>
							<div class="col-md-3">
								<label>Province:</label>
								<input type="text" name="fathers_province" value="<?=!empty($worker['fathers_province']) ? $worker['fathers_province'] : set_value('fathers_province') ?>" placeholder="Province" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-6">	
								<label>Mother's Name:</label>
								<input type="text" name="mothers_name" value="<?=!empty($worker['mothers_name']) ? $worker['mothers_name'] : set_value('mothers_name') ?>"  placeholder="Mothers Name" class="form-control"  />								
							</div>
							<div class="col-md-3">
								<label>Province:</label>
								<input type="text" name="mothers_province" value="<?=!empty($worker['mothers_province']) ? $worker['mothers_province'] : set_value('mothers_province') ?>" placeholder="Province" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-6">	
								<label>Name of Spouse:</label>
								<input type="text" name="spouse_name" value="<?=!empty($worker['spouse_name']) ? $worker['spouse_name'] : set_value('spouse_name') ?>"  placeholder="Spouse Name" class="form-control"  />								
							</div>
							<div class="col-md-3">
								<label>Date of Birth:</label>
								<input type="text" name="spouse_dob" value="<?=!empty($worker['spouse_dob']) ? $worker['spouse_dob'] : set_value('spouse_dob') ?>" placeholder="Date of Birth" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-3">	
								<label>Date of Wedding:</label>
								<input type="text" name="wedding_dow" value="<?=!empty($worker['wedding_dow']) ? $worker['wedding_dow'] : set_value('wedding_dow') ?>"  placeholder="Date of Wedding" class="form-control"  />								
							</div>
							<div class="col-md-3">
								<label>Occupation:</label>
								<input type="text" name="spouse_occupation" value="<?=!empty($worker['spouse_occupation']) ? $worker['spouse_occupation'] : set_value('spouse_occupation') ?>" placeholder="Occupation" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-9">
								<label>Children: (Name, Birth, Gender)</label>
								<textarea name="children" class="form-control" rows="6"><?=!empty($worker['children']) ? $worker['children'] : set_value('children') ?></textarea>						
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Present Address:</label>
								<input type="text" name="present_address" value="<?=!empty($worker['present_address']) ? $worker['present_address'] : set_value('present_address') ?>" placeholder="Present Address" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Person to notify in case of emergency</label>
								<input type="text" name="notify_person" value="<?=!empty($worker['notify_person']) ? $worker['notify_person'] : set_value('notify_person') ?>" placeholder="Name" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Address</label>
								<input type="text" name="notify_address" value="<?=!empty($worker['notify_address']) ? $worker['notify_address'] : set_value('notify_address') ?>" placeholder="Address" class="form-control" />								
							</div>
							<div class="col-md-4">
							<label>Phone: </label>
								<input type="text" name="notify_phone" value="<?=!empty($worker['notify_phone']) ? $worker['notify_phone'] : set_value('notify_phone') ?>" placeholder="Phone" class="form-control" />								
							</div>						
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="ministry">
					<h4>MINISTRY EXPERIENCE</h4>
						<div class="row">
							<div class="col-md-3">
								<label>Rank</label>
							</div>
							<div class="col-md-2">
								<label>From</label>
							</div>
							<div class="col-md-2">
								<label>To</label>
							</div>						
						</div>
						<div class="row">
							<div class="col-md-3">
								Ministry Assistant (Volunteer Worker)
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="volunteer_from" value="<?=!empty($worker['volunteer_from']) ? $worker['volunteer_from'] : set_value('volunteer_from') ?>" >
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="volunteer_to" value="<?=!empty($worker['volunteer_to']) ? $worker['volunteer_to'] : set_value('volunteer_to') ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								Pastor / Deaconness (Probationary)
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="probationary_from" value="<?=!empty($worker['probationary_from']) ? $worker['probationary_from'] : set_value('probationary_from') ?>">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="probationary_to" value="<?=!empty($worker['probationary_to']) ? $worker['probationary_to'] : set_value('probationary_to') ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								Ordained Pastor / Ordained Deaconess (Ordained)
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="ordained_from" value="<?=!empty($worker['ordained_from']) ? $worker['ordained_from'] : set_value('ordained_from') ?>">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="ordained_to" value="<?=!empty($worker['ordained_to']) ? $worker['ordained_to'] : set_value('ordained_to') ?>">
							</div>
						</div>	
					
					</div>
				
				</div>
				<br />
				<br />
				<div class="form-group">
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</div>
		</form>
	</div>
</div>
