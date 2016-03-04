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
			<h4>PERSONAL BACKGROUND</h4>
			<div class="row">
				<div class="col-md-3">	
					<label>Last Name:</label>
					<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>"  placeholder="Last Name" class="form-control"  />
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
			
			<br />
			<div>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
			</div>
		</form>
	</div>
</div>

