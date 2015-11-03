<div class="col-md-offset-4 col-md-4">
	<h2>Church Location</h2>
<div class="well">


<?php $errors =validation_errors(); ?>

<?php
    $message = $this->session->flashdata('message');
?>

<?php if($errors):?>
<div class="alert alert-warning">
    <?php echo $errors; ?>
</div>
<?php endif;?>

<form method="post" role="form" enctype="multipart/form-data">

    <div class="form-group">
        
    <label>Church:</label>
        <select name="church" class="form-control">
        	<option>- Select Church -</option>
           <?php foreach($select_church as $k=>$v):?>
                    <option value="<?=$v->id?>"><?=$v->name?></option>
                <?php endforeach; ?>
                </select>
    </div>

<div class="form-group">
<label>Latitude:</label>
<input type="text" name="latitude" value="<?php echo set_value('latitude'); ?>" placeholder="Latitude"  class="form-control" />
</div>

<div class="form-group">
<label>Longitude:</label>
<input type="text" name="longitude" value="<?php echo set_value('longitude'); ?>" placeholder="longitude"  class="form-control" />
</div>



<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</form>

