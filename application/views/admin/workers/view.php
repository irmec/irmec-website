<div clas="row">
	<div class="col-md-12">
		<a href="<?php echo base_url()?>admin/workers/">Back to Workers List</a>
		<br />
		<div class="panel panel-primary">
			<div class="panel-heading">
				Workers Profile
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
								<?php echo 199203000000 + $worker['id']?>
								<br />
								<img src="<?php echo base_url().'admin/workers/bar_code/'.$worker['id']?>" class="img-thumbnail"/>        
							</div>
						</div>
					</div>
					
					<div class="col-md-8">
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
							<div class="col-md-5">
								<strong>Facebook:</strong>
								<?php if(!empty($worker['facebook'])):?>
									<?=$worker['facebook']?>
								<?php endif;?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<strong>Telephone No.:</strong> <?=!empty($worker['phone']) ? $worker['phone'] : ''?>
							</div>
							<div class="col-md-3">
								<strong>Cellhone No.:</strong> <?=!empty($worker['cell_phone']) ? $worker['cell_phone'] : ''?>
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
