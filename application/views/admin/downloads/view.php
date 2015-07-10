<?php
$singular_name = singular($name);
$humanize_name = humanize($name);
$plural_name = plural($name);
?>

<div class="col-md-12">
<a href="<?php echo base_url()?>admin/<?=$this->name?>">Back to <?=$humanize_name?> List</a>
<br />
    <div class="panel panel-primary">
    <div class="panel-heading">
    <?=ucfirst($singular_name)?> Profile
    </div>
    <div class="panel-body">
     <div class="row">
     <div class="col-md-3">
        <?php if(!empty($value['file'])):?>
            <a href="/downloads/<?=$value['file']?>"><?=$value['file']?></a>
        <?php endif; ?>
    </div>
    <div class="col-md-4">
        <p><strong>Name</strong>: <?=$value['name']?></p>
        <p><strong>Description</strong>: <?=$value['description']?></p>
    </div>

     </div>
    </div>
    </div>

</div>