<div class="col-md-8">
<a href="/admin/workers/">Back to Workers List</a>
<h2>Add a Worker</h2>
<?php $errors =validation_errors(); ?>

<?php if($errors):?>
<div class="alert alert-warning">
    <?php echo $errors; ?>
</div>
<?php endif;?>
<div class="well">
<form method="post" role="form" enctype="multipart/form-data">

    <div class="form-group">

<div class="row">
    <div class="col-md-4">
    <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo set_value('phone')?>"  class="form-control" placeholder="Phone" />
    </div>
        <div class="col-md-4">
    <label>Type:</label>
        <select name="type" class="form-control">
            <option>Ministry Assistant</option>
            <option>Deaconess</option>
            <option>Pastor</option>
            <option>Reverend</option>
            <option>Bishop</option>
        </select>
    </div>
</div>
</div>

<div class="form-group">
<label>Latitude:</label>
<input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="First name"  class="form-control" />
</div>

<div class="form-group">

<label>Longitude:</label>
<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>"  placeholder="Last name" class="form-control"  />
</div>












<div>
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>
</div>
</div>