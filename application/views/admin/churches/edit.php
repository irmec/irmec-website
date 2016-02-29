<?php
  //var_dump($anniversary_months);
?>

<div class="col-md-8">
<a href="<?php echo base_url()?>admin/churches/">Back to Churches List</a>
<h2>Edit a Church</h2>
<?php $errors =validation_errors(); ?>

<?php if($errors):?>
<div class="alert alert-warning">
    <?php echo $errors; ?>
</div>
<?php endif;?>
<div class="well">
<form method="post" role="form" enctype="multipart/form-data">
<div class="form-group">
<label>Name:</label>
<input type="text" name="name" value="<?php echo $church['name']; ?>"  class="form-control" />
</div>

<div class="form-group">
<label>Anniversary:</label>
<div class="row">
<!-- TODO : AJAX FETCHER, correct week display upon selection of month -->
    <div class="col-xs-3">
        <label>Month</label>
        <?php echo form_dropdown('month',$anniversary_months, $church['anniversary_month'],'class="form-control"') ?>
    </div>
    <div  class="col-xs-3" >
        <label>Week</label>
        <?php echo form_dropdown('week',$anniversary_weeks, $church['anniversary_week'],'class="form-control"') ?>

    </div>
</div>
</div>

<div class="form-group">
<label>Address:</label>
<textarea class="form-control large" name="address"><?php echo $church['address']; ?></textarea>
</div>

<div class="form-group">
<label>City/Town, Province:</label>
<?=form_dropdown('town_id', $towns, $church['town_id'],'class="form-control"');?>
</div>

<div class="form-group">
<label>Zip Code:</label>
<input type="text" name="zip_code" value="<?php echo $church['zip_code']; ?>"  class="form-control"  />
</div>

<div class="form-group">
<label>Map:</label>
<textarea class="form-control" name="map" rows="8" placeholder="Place Google Map embed code"><?php echo $church['map']?></textarea>
</div>

<div class="form-group">
<label>Longitude:</label>
<input type="text" name="longitude" value="<?php echo $church['longitude']; ?>"  class="form-control"  />
</div>

<div class="form-group">
<label>Latitude:</label>
<input type="text" name="latitude" value="<?php echo $church['latitude']; ?>"  class="form-control"  />
</div>


<div class="form-group">
<label>Photo:</label>
<div class="row">
    <div class="col-md-4">
        <input type="file" name="photo" class="form-control" />
    </div>
</div>
</div>


<div>
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>
</div>
</div>