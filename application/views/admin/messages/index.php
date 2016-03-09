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

<p>&nbsp;</p>
<?php if(count($messages)):?>

<table class="table table-striped table-bordered table-hover table-condensed">
<thead>
<tr>
<th>#</th>
<th class="col-sm-2">Email</th>
<th>Subject</th>
<th>Messages</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($messages as $message):?>
    <tr>
        <td><?php echo $message['id']?></td>
        <td><?php echo $message['email']?></td>
		<td><?php echo $message['subject']?></td>
		<td><?php echo $message['message']?></td>
        <td>
        <a href="#" class="btn btn-success btn-xs" role="button">
        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a>        
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
