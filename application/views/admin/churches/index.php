<div class="col-md-12">
<h2><span class="glyphicon glyphicon-home"></span>&nbsp;Churches</h2>
<?php
    $message = $this->session->flashdata('message');
?>

<?php if($message):?>
<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
<?php echo $message ?>
</div>

<?php endif;?>
<br />
<div class="panel panel-primary">
<div class="panel-heading">
      All Churches
</div>
<div class="panel-body">
<div class="row">
<form  method="post" role="search">
<div class="col-lg-4">
    <div class="input-group">
      <input type="text" name="keyword" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
        <span class="glyphicon glyphicon-search"></span>&nbsp;
        Search!</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</form>
<div class="col-lg-offset-6 col-lg-2">
<a href="/admin/churches/add" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Row</a>
</div>
</div>
<p>&nbsp;</p>

<?php if(!empty($churches)):?>
<?php echo $this->pagination->create_links(); ?>
<table class="table table-striped table-bordered table-hover">
<tr>
<th>#</th>
<th>Name</th>
<th>Action</th>
</tr>
<?php foreach($churches as $church):?>
    <tr>
        <td><?php echo $church['id']?></td>
        <td><?php echo $church['name']?></td>
        <td>
        <a href="<?php echo base_url().'admin/churches/view/'.$church['id']?>" class="btn btn-success btn-xs" role="button">
        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a>
        <a href="<?php echo base_url().'admin/churches/edit/'.$church['id']?>" class="btn btn-info btn-xs" role="button">
        <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
        <a href="<?php echo base_url().'admin/churches/remove/'.$church['id']?>" onclick="return confirm('Remove record ?')" class="btn btn-danger btn-xs" role="button">
        <span class="glyphicon glyphicon-trash"></span>&nbsp;
        Remove</a>
        </td>
    </tr>


<?php endforeach; ?>
</table>
<?php echo $this->pagination->create_links(); ?>
<?php else: ?>
<div class="alert alert-warning">
No results found.
</div>
<?php endif; ?>

</div>
</div>
</div>