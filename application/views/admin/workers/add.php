<div class="col-md-8">
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
<div class="form-group">
<label>First Name:</label>
<input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="First name"  class="form-control" />
</div>

<div class="form-group">

<label>Last Name:</label>
<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>"  placeholder="Last name" class="form-control"  />
</div>


<div class="form-group">
<label>Middle Name:</label>
<input type="text" name="middlename" value="<?php echo set_value('middlename'); ?>"  placeholder="Middle name" class="form-control" />
</div>

<div class="form-group">

    <div class="row">
    <div class="col-md-4">
    <label>Gender:</label>
        <select name="gender" class="form-control">
            <option >Male</option>
            <option >Female</option>
        </select>
    </div>

    <div class="col-md-4">
    <label>Relationship Status:</label>
        <select name="status" class="form-control">
            <option >Single</option>
            <option >Married</option>
            <option >Widowed</option>
        </select>
    </div>
    </div>

</div>

<div class="form-group">
<label>Birthday:</label>
<div class="row">
    <div class="col-xs-2">
      <input type="text"  name="month" class="form-control" placeholder="Month" />
    </div>
    <div  class="col-xs-2" >
      <input type="text" name="day" class="form-control" placeholder="Day" />
    </div>
    <div class="col-xs-2" >
      <input type="text" name="year" class="form-control" placeholder="Year" />
    </div>
</div>
</div>




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
    <label>Notes:</label>

            <textarea name="notes" class="form-control" placeholder="Notes" cols="12" rows="5"><?=!empty($worker['notes']) ? $worker['notes'] : null ;?></textarea>

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