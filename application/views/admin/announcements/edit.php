<div class="col-md-8">
<a href="<?php echo base_url()?>admin/announcements/">Back to Announcement List</a>
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

<label>Message:</label>

<textarea name="message" class="form-control" rows="5"><?php echo $church['message']; ?></textarea>
<br />
<h6 class="pull-right">320 characters remaining</h6>
<button class="btn btn-info" type="submit">Post New Message</button>

</div>

<div class="form-group">
<label>Photo:</label>
<div class="row">
    <div class="col-md-4">
        <input type="file" name="photo" class="form-control" />
    </div>
</div>
</div>


</form>
</div>
</div>


