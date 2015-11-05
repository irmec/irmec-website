<div class="col-md-12">
<a href="<?php echo base_url()?>admin/churches/">Back to Church List</a>
<br />
    <div class="panel panel-primary">
    <div class="panel-heading">
    Church Profile
    </div>
    <div class="panel-body">
     <div class="row">
     <div class="col-md-3">
        <?php if(!empty($church['photo'])):?>
            <img src="<?php echo base_url().'images/churches/'.$church['photo']?>" class="img-thumbnail"/>
        <?php else:?>
            <img src="<?php echo base_url().'images/no_image.jpg'?>" class="img-thumbnail" />
        <?php endif;?>
    </div>
    <div class="col-md-4">
        <p><strong>Name</strong>: <?=$church['name']?></p>
        <p><strong>Address</strong>: <?=$church['address']?></p>
        <p><strong>Anniversary</strong>: <?=!empty($church['anniversary_month']) ? $anniversary_months[$church['anniversary_month']] : '' ?>  <?=!empty($church['anniversary_week']) ? '/'.$anniversary_weeks[$church['anniversary_week']].' week' : '' ?></p>
        <p><strong>City/Town, Province</strong>: <?=!empty($church['town_id']) ? $church['town_id'] : '' ?></p>
    </div>
     <div class="col-md-4">
        <p><strong>Zip Code</strong>: <?=!empty($church['zip_code']) ? $church['zip_code'] : '' ?></p>
        <p><strong>Longitude</strong>: <?=$church['longitude']?></p>
        <p><strong>Latitude</strong>: <?=$church['latitude']?></p>

    </div>

    <div class="col-md-3">
     <?php if(!empty($church['map'])):?>
        <?=$church['map']?>
     <?php endif;?>
    </div>

     </div>
    </div>
    </div>

</div>