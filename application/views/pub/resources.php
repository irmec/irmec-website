<img src="<?php echo base_url()?>images/header_about.jpg"  class="img-responsive" width="100%" />
<div class="col-md-12">
<br />
<div class="container">
<h3>Resources</h3>
      <div class="panel panel-default">
<div class="panel-body">
<table class="table table-striped ">
<thead>
<tr><th>Title</th>
<th>Description</th>
<th>View</th>
</tr>
</thead>
<tbody>
<?php foreach($resources as $resource):?>
<tr>
<td><?=$resource['name']?></td>
<td><?=$resource['description']?></td>
<td><span class="glyphicon glyphicon-download-alt"></span>&nbsp;<a href="/pub/resource/<?=$resource['id']?>" ><?=str_replace(' ', '_', $resource['name']).'.pdf'?></a></td>
</tr>
<?php endforeach; ?>
</tbody>

</table>


</div>
</div>

</div>

</div>