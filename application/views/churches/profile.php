<div class="row">
<div class="col-md-12">

<div class="container">
        <div class="panel panel-default">
        <div class="panel-body">
    <div class="row">
    <div class="container">
    <div class="col-md-offset-1 col-md-5">

    <?php if(!empty($church['photo'])):?>
            <img src="<?php echo base_url().'images/churches/'.$church['photo']?>" class="img-thumbnail"/>
        <?php else:?>
            <img src="<?php echo base_url().'images/no_image.jpg'?>" class="img-thumbnail" />
        <?php endif;?>
    </div>
    <div class="col-md-5">
        <table class=" table table-striped">
              <tr><td valign="top"><strong>Name</strong>:</td><td><?=$church['name']?></td></tr>
              <tr><td valign="top"><strong>Address</strong>:</td><td>
                <?=$church['address']?>,
                <br /><?=$church['town_name']?>, <?=$church['province_name']?>
              </td>
              </tr>
              <?php if(!empty($church['phone'])):?>
               <tr><td><strong>Phone</strong>: </td><td><?=!empty($church['phone']) ? $church['phone'] : 'Not Available' ?>    </td></tr>

              <?php endif;?>

        </table>

                <?php if(!empty($church['map'])):?>
        <?=$church['map']?>
     <?php endif;?>
    </div>

    </div>
    </div>
</div>
</div>
</div>
</div>
</div>