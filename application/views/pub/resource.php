<img src="<?php echo base_url()?>images/header_about.jpg"  class="img-responsive" width="100%" />
<div class="col-md-12">
<br />
<div class="container">
<h3>Download File</h3>
      <div class="panel panel-default">
<div class="panel-body">
  <p><b>Name</b>: <?=$resource['name']?></p>
  <p><b>Description</b>: <?=$resource['description']?></p>
  <p><b>Download</b>:        <?php if(!empty($resource['file'])):?>
    <a href="/downloads/<?=$resource['file']?>" target="_blank"><?=str_replace(' ', '_', $resource['name']).'.pdf'?></a>
  <?php endif; ?></p>



</div>
</div>

</div>

</div>