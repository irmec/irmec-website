<div class="col-md-8">
<a href="/admin/workers
/">Back to Worker's List</a>
<h2>Edit a Worker</h2>
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
<input type="text" name="firstname" value="<?=!empty($worker['firstname']) ? $worker['firstname'] : set_value('firstname') ?>"  class="form-control" />
</div>

<div class="form-group">

<label>Last Name:</label>
<input type="text" name="lastname" value="<?=!empty($worker['lastname']) ? $worker['lastname'] : set_value('lastname') ?>"  class="form-control"  />
</div>

<div class="form-group">
<label>Middle Name:</label>
<input type="text" name="middlename" value="<?=!empty($worker['middlename']) ? $worker['middlename'] : set_value('middlename') ?>"  class="form-control" />
</div>

<div class="form-group">

    <div class="row">
    <div class="col-md-4">
    <label>Gender:</label>
        <select name="gender" class="form-control">
            <option <?=$worker['gender']=='Male' ? 'selected' : ''; ?>>Male</option>
            <option <?=$worker['gender']=='Female' ? 'selected' : ''; ?>>Female</option>
        </select>
    </div>

    <div class="col-md-4">
    <label>Relationship Status:</label>
        <select name="status" class="form-control">
            <option <?=$worker['status']=='Single' ? 'selected' : ''; ?>>Single</option>
            <option <?=$worker['status']=='Married' ? 'selected' : ''; ?>>Married</option>
            <option <?=$worker['status']=='Widowed' ? 'selected' : ''; ?>>Widowed</option>
        </select>
    </div>
    </div>

</div>

<div class="form-group">
<label>Birthday:</label>
<div class="row">
    <div class="col-xs-2">
      <input type="text"  name="month" class="form-control" value="<?=!empty($worker['month']) ? $worker['month'] : set_value('month') ?>"  placeholder="Month" />
    </div>
    <div  class="col-xs-2" >
      <input type="text" name="day" class="form-control" value="<?=!empty($worker['day']) ? $worker['day'] : set_value('day') ?>" placeholder="Day" />
    </div>
    <div class="col-xs-2" >
      <input type="text" name="year" class="form-control" value="<?=!empty($worker['year']) ? $worker['year'] : set_value('year') ?>"  placeholder="Year" />
    </div>
</div>
</div>


<div class="form-group">

<div class="row">
    <div class="col-md-4">
    <label>Phone:</label>
        <input type="text" name="phone" value="<?=!empty($worker['phone']) ? $worker['phone'] : set_value('phone') ?>"  class="form-control" placeholder="Phone" />
    </div>
        <div class="col-md-4">
    <label>Type:</label>
        <select name="type" class="form-control">
            <option <?=$worker['type']=='Ministry Assistant' ? 'selected' : ''; ?> >Ministry Assistant</option>
            <option <?=$worker['type']=='Deaconess' ? 'selected' : ''; ?> >Deaconess</option>
            <option <?=$worker['type']=='Pastor' ? 'selected' : ''; ?>>Pastor</option>
            <option <?=$worker['type']=='Reverend' ? 'selected' : ''; ?>>Reverend</option>
            <option <?=$worker['type']=='Bishop' ? 'selected' : ''; ?>>Bishop</option>
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
    <?php if(!empty($worker['photo'])):?>
        <img src="<?=base_url().'images/workers/'.$worker['photo']?>" height="150" />
    <?php endif; ?>
        <input type="file" name="photo" class="form-control" />
    </div>
</div>
</div>

<div>
<input type="submit" name="submit" value="Save" class="btn btn-primary" />
</div>
</form>
</div>
</div>