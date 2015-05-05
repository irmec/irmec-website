<div class="row">       
    <div class="col-md-offset-4 col-md-4">
        <form method="get">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                <input type="text" name="keyword" class="form-control" placeholder="Churches">
            </div><!-- /input-group -->
            <br />
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-circle-arrow-down"></span></span>
                <select name="province" class="form-control" placeholder="Province">
                    <option value="47">Metro Manila</option>
                    <option value="17">Bulacan</option>
                    <option>All</option>
                    <option>-------</option>
                <?php foreach($select_province as $k=>$v):?>
                    <option value="<?=$k?>"><?=$v?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <br />
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </div>
        </form>
    </div>
</div>

<!-- For search results
<div class="row">
    <div class="container">
        <div class="col-md-6">
     	    <h3>Search Results</h3>
		    <h4 class="lead"><strong class="text-danger">3</strong> results were found for the search for <strong class="text-danger">Lorem</strong></h4>

        </div>
    </div>
</div>
-->

<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <h3>Churches:</h3>
        <?php echo $this->pagination->create_links(); ?>
        <table class="table-churches table-bordered  table-striped">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($featured_churches as $church):?>
            <tr>
                <td>
                <?php if(!empty($church['photo'])):?>
                    <img src="<?php echo base_url().'images/churches/'.$church['photo']?>" class="church-photo img-thumbnail img-responsive"/>
                <?php else:?>
                    <img src="<?php echo base_url().'images/no_image.jpg'?>" class="church-photo img-thumbnail img-responsive" />
                <?php endif;?>
                </td>
                <td>
                    <?=$church['name']?>
                </td>
                <td>
                    <?=$church['address']?>,
                    <br /><?=$church['town_name']?>, <?=$church['province_name']?>
                    <br />
                </td>
                <td>
                    <a href="<?php echo base_url()."churches/profile/{$church['id']}"?>" class="btn btn-primary btn-xs">
                    <span class="glyphicon glyphicon-link"></span>&nbsp;View Church</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>