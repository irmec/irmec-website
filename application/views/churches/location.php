<div class="col-md-8">
<a href="/admin/workers/">Back to Workers List</a>
<h2>Add a Worker</h2>
<?php $errors =validation_errors(); ?>

<?php
    $message = $this->session->flashdata('message');
?>

<?php if($errors):?>
<div class="alert alert-warning">
    <?php echo $errors; ?>
</div>
<?php endif;?>
<div class="well">
<form method="post" role="form" enctype="multipart/form-data">

    <div class="form-group">
        
    <label>Church:</label>
        <select name="church" class="form-control">
           <?php foreach($select_church as $k=>$v):?>
                    <option value="<?=$k?>"><?=$v?></option>
                <?php endforeach; ?>
                </select>        </select>
    </div>
</div>
</div>

<div class="form-group">
<label>Latitude:</label>
<input type="text" name="latitude" value="<?php echo set_value('latitude'); ?>" placeholder="First name"  class="form-control" />
</div>

<div class="form-group">

<label>Longitude:</label>
<input type="text" name="longitude" value="<?php echo set_value('longtitude'); ?>"  placeholder="Last name" class="form-control"  />
</div>












<div>
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>
</div>
</div>