<div class="col-md-10">
<a href="<?php echo base_url()?>admin/workers/">Back to Workers List</a>
<br />
    <div class="panel panel-primary">
    <div class="panel-heading">
    Workers Profile
    </div>
    <div class="panel-body">
     <div class="row">
     <div class="col-md-3">
        <?php if(!empty($worker['photo'])):?>
            <img src="<?php echo base_url().'images/workers/'.$worker['photo']?>" class="img-thumbnail"/>
        <?php else:?>
            <img src="<?php echo base_url().'images/no_image.jpg'?>" class="img-thumbnail" />
        <?php endif;?>
    </div>
    <div class="col-md-7">
        <p><strong>Name:</strong> <?=$worker['firstname'].' '.(!empty($worker['middlename'][0]) ? $worker['middlename'][0].'. ' : '').$worker['lastname']?></p>
        <p><strong>Place of Birth:</strong> <?=!empty($worker['place_birth']) ? $worker['place_birth'] : ''?></p>
        <p><strong>Birthday</strong> <?=!empty($worker['dob']) ? date('F j, Y', strtotime($worker['dob'])) : '' ?></p>
        <p><strong>Phone</strong> <?=!empty($worker['cell_phone']) ? $worker['cell_phone'] : '' ?></p>
    </div>
     </div>
    </div>
    </div>

</div>
