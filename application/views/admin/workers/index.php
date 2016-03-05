<div class="col-md-12">
<h2><span class="glyphicon glyphicon-user"></span>&nbsp;Workers</h2>
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
      All Workers
</div>
<div class="panel-body">
<div class="row">
<form  role="search">
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
<a href="<?php echo base_url()?>admin/workers/add" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Row</a>
</div>
</div>
<p>&nbsp;</p>
<?php if(count($workers)):?>

<table class="table table-striped table-bordered table-hover table-condensed">
<thead>
<tr>
<th>#</th>
<th class="col-sm-2">Photo</th>
<th>Gender</th>
<th>Name</th>
<th>Phone</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($workers as $worker):?>
    <tr>
        <td><?php echo $worker['id']?></td>
        <td class="col-md-2"><?php if(!empty($worker['photo'])):?>
            <img width="100" src="<?php echo base_url().'images/workers/'.$worker['photo']?>" class="img-thumbnail" >
        <?php else:?>
            <img width="100" src="<?php echo base_url().'images/no_image.jpg'?>" class="img-thumbnail" >
        <?php endif;?>
        </td>
        <td><?php echo $worker['gender']?></td>
        <td><?=$worker['lastname'].', '.$worker['firstname'].' '.substr($worker['middlename'],0,1).'.'?></td>
        <td><small><?php echo $worker['cell_phone']?></small></td>
        <td>
        <a href="<?php echo base_url().'admin/workers/view/'.$worker['id']?>" class="btn btn-success btn-xs" role="button">
        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a>
        <a href="<?php echo base_url().'admin/workers/edit/'.$worker['id']?>" class="btn btn-info btn-xs" role="button">
        <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
        <a href="<?php echo base_url().'admin/workers/remove/'.$worker['id']?>" onclick="return confirm('Remove record ?')" class="btn btn-danger btn-xs" role="button">
        <span class="glyphicon glyphicon-trash"></span>&nbsp;
        Remove</a>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
<div class="alert alert-warning">
No results found.
</div>
<?php endif; ?>
</div>
</div>
</div>

