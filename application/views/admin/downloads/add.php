<?php
$singular_name = singular($name);
$humanize_name = humanize($name);
$plural_name = plural($name);
?>

<div class="col-md-8">
<a href="<?php echo base_url()?>admin/<?=$name?>/">Back to <?=$humanize_name?> List</a>
<h2>Add a <?=singular($humanize_name)?></h2>
<?php $errors =validation_errors(); ?>

<?php if($errors):?>
<div class="alert alert-warning">
    <?php echo $errors; ?>
</div>
<?php endif;?>

<?php
//retrieve if there is a flash data error
$error = $this->session->flashdata('error');
if(!empty($error)):?>
<div class="alert alert-warning">
    <?php echo $error; ?>
</div>
<?php endif;?>
<div class="well">
<form method="post" role="form" enctype="multipart/form-data">
<div class="form-group">
<label>Name:</label>
<input type="text" name="name" value="<?php echo set_value('name'); ?>"  class="form-control" placeholder="Name" />
</div>

<div class="form-group">
<label>Description:</label>
<textarea class="form-control large" name="description" placeholder="Description"><?php echo set_value('description'); ?></textarea>
</div>


<div class="form-group">
<label>File:</label>
<div class="row">
    <div class="col-md-4">
        <input type="file" name="file" class="form-control" />
    </div>
</div>
</div>

<div>
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>
</div>
</div>