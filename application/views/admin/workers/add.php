<div class="col-md-12">
<a href="<?php echo base_url()?>admin/workers/">Back to Workers List</a>
<h2>Add a Worker</h2>
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
								<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>"  placeholder="Last Name" class="form-control" autofocus />
							</div>
							<div class="col-md-3">
								<label>First Name:</label>
								<input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="First Name"  class="form-control" />
							</div>
							<div class="col-md-3">
								<label>Middle Name:</label>
								<input type="text" name="middlename" value="<?php echo set_value('middlename'); ?>"  placeholder="Middle Name" class="form-control" />
							</div>
							<div class="col-md-3">
								<label>Nickname</label>
								<input type="text" name="nickname" value="<?php echo set_value('nickname');?>" placeholder="Nickname" class="form-control" />		
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 ">
								<label>Place of Birth</label>
								<input type="text" name="place_birth" value="<?php echo set_value('place_birth');?>" placeholder="Place of Birth" class="form-control" />
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
									<input type="text"  name="month" class="form-control" placeholder="Month"/>							
								</div>
								<div class="col-md-2">					
									<input type="text" name="day" class="form-control" placeholder="Day"  />				
								</div>
								<div class="col-md-2">
									<input type="text" name="year" class="form-control" placeholder="Year"  />					
								</div>
								<div class="col-md-6">
									<select name="status" class="form-control">
										<option >Single</option>
										<option >Married</option>
										<option >Widowed</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
							<label>Gender:</label>
								<select name="gender" class="form-control">
									<option >Male</option>
									<option >Female</option>
								</select>
							</div>
							<div class="col-md-4">
								<label>Height (cm):</label>
								<input name="height" class="form-control" placeholder="Height" />		
							</div>	
							<div class="col-md-4">
								<label>Weight (kg):</label>
								<input name="weight" class="form-control" placeholder="Weight"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>E-mail Address</label>
								<input name="email" class="form-control" placeholder="Email" />
							</div>	
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Telehone No.(landline):</label>
								<input type="text" name="phone" value="<?php echo set_value('phone')?>"  class="form-control" placeholder="Phone" />		
							</div>
							<div class="col-md-4">
								<label>Cellphone:</label>
								<input type="text" name="cell_phone" value="<?php echo set_value('cell_phone')?>"  class="form-control" placeholder="Cellphone" />		
							</div>	
						</div>
						<div class="row">
							<div class="col-md-5">
								<label>Passport No.:</label>
								<input type="text" name="passport" value="<?php echo set_value('passport')?>"  class="form-control" placeholder="Passport" />		
							</div>
							<div class="col-md-5">
								<label>SSS No.</label>
								<input type="text" name="sss" value="<?php echo set_value('sss')?>"  class="form-control" placeholder="SSS" />		
							</div>	
						</div>			
						<div class="row">
							<div class="col-md-5">
								<label>Phil. Health:</label>
								<input type="text" name="philhealth" value="<?php echo set_value('philhealth')?>"  class="form-control" placeholder="Phil. Health" />		
							</div>
							<div class="col-md-5">
								<label>TIN No.</label>
								<input type="text" name="tin" value="<?php echo set_value('tin')?>"  class="form-control" placeholder="TIN" />		
							</div>	
						</div>
						<div class="row">
							<div class="col-md-10">
								<label>Permanent Address</label>
								<input type="text" name="permanent_address" class="form-control" placeholder="Permanent Address" />
							</div>						
						</div>				
						<div class="row">				
							<div class="col-md-4">
								<label>Photo ID:</label>
								<input type="file" name="photo" class="form-control" />
							</div>
							
							<div class="col-md-4">
								<label>Photo Signature:</label>
								<input type="file" name="photo_signature" class="form-control" />
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="family">
						<h4>FAMILY INFORMATION</h4>
						<div class="row">
							<div class="col-md-6">	
								<label>Father's Name:</label>
								<input type="text" name="fathers_name" value="<?php echo set_value('fathers_name'); ?>"  placeholder="Fathers Name" class="form-control"  />								
							</div>
							<div class="col-md-3">
								<label>Province:</label>
								<input type="text" name="fathers_province" value="<?php echo set_value('fathers_province');?>" placeholder="Province" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-6">	
								<label>Mother's Name:</label>
								<input type="text" name="mothers_name" value="<?php echo set_value('mothers_name'); ?>"  placeholder="Mothers Name" class="form-control"  />								
							</div>
							<div class="col-md-3">
								<label>Province:</label>
								<input type="text" name="mothers_province" value="<?php echo set_value('mothers_province');?>" placeholder="Province" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-6">	
								<label>Name of Spouse:</label>
								<input type="text" name="spouse_name" value="<?php echo set_value('spouse_name'); ?>"  placeholder="Spouse Name" class="form-control"  />								
							</div>
							<div class="col-md-3">
								<label>Date of Birth:</label>
								<input type="text" name="spouse_dob" value="<?php echo set_value('spouse_dob');?>" placeholder="Date of Birth" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-3">	
								<label>Date of Wedding:</label>
								<input type="text" name="wedding_dow" value="<?php echo set_value('wedding_dow'); ?>"  placeholder="Date of Wedding" class="form-control"  />								
							</div>
							<div class="col-md-3">
								<label>Occupation:</label>
								<input type="text" name="spouse_occupation" value="<?php echo set_value('spouse_occupation');?>" placeholder="Occupation" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-9">
								<label>Children: (Name, Birth, Gender)</label>
								<textarea name="children" class="form-control" rows="6"><?php echo set_value('children');?></textarea>						
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Present Address:</label>
								<input type="text" name="present_address" value="<?php echo set_value('present_address');?>" placeholder="Present Address" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Person to notify in case of emergency</label>
								<input type="text" name="notify_person" value="<?php echo set_value('notify_person');?>" placeholder="Name" class="form-control" />
							</div>						
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Address</label>
								<input type="text" name="notify_address" value="<?php echo set_value('notify_address');?>" placeholder="Address" class="form-control" />								
							</div>
							<div class="col-md-3">
							<label>Phone: </label>
								<input type="text" name="notify_phone" value="<?php echo set_value('notify_phone');?>" placeholder="Phone" class="form-control" />								
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
								<input type="text" class="form-control" name="volunteer_from">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="volunteer_to">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								Pastor / Deaconness (Probationary)
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="probationary_from" >
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="probationary_to">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								Ordained Pastor / Ordained Deaconess (Ordained)
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="ordained_from">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="ordained_to">
							</div>
						</div>						
					</div>								
				</div>
			<br />
			<br />
			<div>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
			</div>
			</div>
		</form>
	</div>
</div>

