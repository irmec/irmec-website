<div clas="row">
	<div class="col-md-12">
		<a href="<?php echo base_url()?>admin/workers/">Back to Workers List</a>
		<br />
		<div class="panel panel-primary">
			<div class="panel-heading">
				Workers Profile&nbsp;&nbsp;<a href="<?php echo base_url().'admin/workers/edit/'.$worker['id']?>" class="btn btn-default">Edit</a>
			</div>
			<div class="panel-body">
				<div class="row">		
					<div class="col-md-2 col-md-offset-1">
						<div class="row">
							<div>
								<?php if(!empty($worker['photo'])):?>
									<img src="<?php echo base_url().'images/workers/'.$worker['photo']?>" class="img-thumbnail"/>
								<?php else:?>
									<img src="<?php echo base_url().'images/no_image.jpg'?>" class="img-thumbnail" />
								<?php endif;?>                		 
							</div>
						</div>
						<div class="row">
							<div class="text-center">
								<br />
								<label>ID Number:</label>
								<br />
								<?php echo 199200000 + $worker['id']?>
								<br />
								<img src="<?php echo base_url().'admin/workers/bar_code/'.$worker['id']?>" class=""/>        
							</div>
						</div>
					</div>
					
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-5">
								<h3>ID Information</h3>									
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>ID No.:</strong> <?php echo 199200000 + $worker['id']?>
							</div>													
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<strong>Lastname:</strong> <?=!empty($worker['lastname'])? $worker['lastname'] : '' ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>Firstname:</strong> <?=!empty($worker['firstname'])? $worker['firstname'] : '' ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>Middlename:</strong> <?=!empty($worker['middlename'])? $worker['middlename'] : '' ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>Position:</strong> <?php echo position($worker); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<strong>SSS No.:</strong> <?=!empty($worker['sss']) ? $worker['sss'] : ''?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>PhilHealth No.:</strong> <?=!empty($worker['philhealth']) ? $worker['philhealth'] : ''?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Person to notify in case of emergency:</strong> <?=!empty($worker['notify_person'])? $worker['notify_person'] : ''; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Address:</strong> &nbsp; <?=!empty($worker['notify_address']) ? $worker['notify_address'] : ''; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>Contact Number:</strong> <?=!empty($worker['notify_phone']) ? $worker['notify_phone'] : ''; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<h3>PERSONAL BACKGROUND</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>Name:</strong> <?=$worker['firstname'].' '.(!empty($worker['middlename'][0]) ? $worker['middlename'][0].'. ' : '').$worker['lastname']?>
							</div>
							<div class="col-md-2">
								<strong>Nickname:</strong> <?=$worker['nickname'] ? $worker['nickname'] : '' ?>
							</div>						
						</div>
						<div class="row">
							<div class="col-md-5">
								<strong>Place of Birth:</strong> <?=!empty($worker['place_birth']) ? $worker['place_birth'] : ''?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>Date of Birth:</strong> <?=!empty($worker['dob']) ? date('F j, Y', strtotime($worker['dob'])) : '' ?>
							</div>
							<div class="col-md-3">
								<strong>Civil Status:</strong> <?=!empty($worker['status']) ? $worker['status'] : ''?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<strong>Gender:</strong> <?=!empty($worker['gender']) ? $worker['gender'] : ''?>
							</div>
							<div class="col-md-2">
								<strong>Height:</strong> <?=!empty($worker['height']) ? $worker['height'] : ''?> cm.
							</div>
							<div class="col-md-2">
								<strong>Weight:</strong> <?=!empty($worker['weight']) ? $worker['weight'] : ''?> kgs.
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<strong>Email Address:</strong> 
								<?php if(!empty($worker['email'])):?>
									<a href="mailto:<?=$worker['email']?>"><?=$worker['email']?></a>
								<?php endif;?>
							</div>						
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>Telephone No.:</strong> <?=!empty($worker['phone']) ? $worker['phone'] : ''?>
							</div>
							<div class="col-md-4">
								<strong>Cellphone No.:</strong> <?=!empty($worker['cell_phone']) ? $worker['cell_phone'] : ''?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>Passport No.:</strong> <?=!empty($worker['passport']) ? $worker['passport'] : ''?>
							</div>
							<div class="col-md-3">
								<strong>SSS No.:</strong> <?=!empty($worker['sss']) ? $worker['sss'] : ''?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>PhilHealth No.:</strong> <?=!empty($worker['philhealth']) ? $worker['philhealth'] : ''?>
							</div>
							<div class="col-md-3">
								<strong>TIN No.:</strong> <?=!empty($worker['tin']) ? $worker['tin'] : ''?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Permanent Address:</strong> <?=!empty($worker['permanent_address']) ? $worker['permanent_address'] : ''?>
							</div>						
						</div>
						
						
						<div class="row">
							<div class="col-md-5">
								<h3>FAMILY INFORMATION</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Father's Name:</strong> <?=!empty($worker['fathers_name']) ? $worker['fathers_name'] : '' ?>
							</div>
							<div class="col-md-4">
								<strong>Province:</strong> <?=!empty($worker['fathers_province']) ? $worker['fathers_province'] : '' ?>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Mother's Name:</strong> <?=!empty($worker['mothers_name']) ? $worker['mothers_name'] : '' ?>
							</div>
							<div class="col-md-4">
								<strong>Province:</strong> <?=!empty($worker['mothers_province']) ? $worker['mothers_province'] : '' ?>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Name of Spouse:</strong> <?=!empty($worker['spouse_name']) ? $worker['spouse_name'] : '' ?>
							</div>
							<div class="col-md-4">
								<strong>Date of Birth:</strong> <?=!empty($worker['spouse_dob']) ? $worker['spouse_dob'] : '' ?>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Date of Wedding:</strong> <?=!empty($worker['wedding_dow']) ? $worker['wedding_dow'] : '' ?>
							</div>
							<div class="col-md-4">
								<strong>Occupation:</strong> <?=!empty($worker['occupation']) ? $worker['occupation'] : '' ?>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Children:</strong>
								<br />
								<?php 									
									echo !empty($worker['children'])? nl2br($worker['children']) : '';
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">							
								<strong>Present Address:</strong> <?=!empty($worker['present_address'])? $worker['present_address'] : ''; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Person to notify in case of emergency:</strong> <?=!empty($worker['notify_person'])? $worker['notify_person'] : ''; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Address:</strong> &nbsp; <?=!empty($worker['notify_address']) ? $worker['notify_address'] : ''; ?>
							</div>
							<div class="col-md-4">
								<strong>Tel/Cellphone:</strong> <?=!empty($worker['notify_phone']) ? $worker['notify_phone'] : ''; ?>
							</div>
						</div>
						<div class="row">								
							<div class="col-md-5">
								<h3>MINISTRY EXPERIENCE</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
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
							<div class="col-md-8">
								<strong>Ministry Assistant</strong> (Volunteer Worker)
							</div>
							<div class="col-md-2">
								<?=!empty($worker['volunteer_from'])? $worker['volunteer_from'] : ''?>
							</div>
							<div class="col-md-2">
								<?=!empty($worker['volunteer_to'])? $worker['volunteer_to'] : ''?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Pastor / Deaconess</strong> (Probationary)
							</div>
							<div class="col-md-2">
								<?=!empty($worker['probationary_from'])? $worker['probationary_from'] : ''?>
							</div>
							<div class="col-md-2">
								<?=!empty($worker['probationary_to'])? $worker['probationary_to'] : ''?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<strong>Ordained Pastor / Ordained Deaconess</strong> (Ordained)
							</div>
							<div class="col-md-2">
								<?=!empty($worker['ordained_from'])? $worker['ordained_from'] : ''?>
							</div>
							<div class="col-md-2">
								<?=!empty($worker['ordained_to'])? $worker['ordained_to'] : ''?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	function position($worker){
		if(!empty($worker['ordained_to'])){
			if($worker['ordained_to'] == 'Emeritus' or $worker['ordained_to'] == 'emeritus'){
				if($worker['gender']=='Male'){
					return 'Reverend';
				}else{
					return 'Deaconess';
				}	
				
			}
			if($worker['ordained_to'] == 'present' or $worker['ordained_to'] == 'Present'){
				if($worker['gender']=='Male'){
					return 'Reverend';
				}else{
					return 'Deaconess';
				}			
			}
			
			if($worker['probationary_to'] == 'present' or $worker['probationary_to'] == 'Present'){
				if($worker['gender']=='Male'){
					return 'Pastor';
				}else{
					return 'Deaconess';
				}			
			}
			
			if($worker['volunteer_to'] == 'present' or $worker['volunteer_to'] == 'Present'){
					return 'Missionary Assistant';
			}
		}
		return '';
	}


?>
