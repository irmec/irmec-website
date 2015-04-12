<?php
$uri = uri_string();
?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php echo empty($uri) ? 'class="active"' : ''?>><a href="<?php echo base_url()?>">HOME</a></li>
            <li <?php echo $uri=='about' ? 'class="active"' : ''?>><a href="<?php echo base_url()?>about">ABOUT</a></li>
            <!-- li <?php echo $uri=='history' ? 'class="active"' : ''?>><a href="<?php echo base_url()?>history">HISTORY</a></li -->
            <li <?php echo $uri=='churches' ? 'class="active"' : ''?>><a href="<?php echo base_url()?>churches">CHURCHES</a></li>
            <!-- li><a href="<?php echo base_url()?>workers">WORKERS</a></li -->
            <li <?php echo $uri=='foreign' ? 'class="active"' : ''?>><a href="<?php echo base_url()?>foreign">FOREIGN MISSIONS</a></li>
            <li <?php echo $uri=='council' ? 'class="active"' : ''?>><a href="<?php echo base_url()?>council">COUNCIL OF ELDERS</a></li>
            <li <?php echo $uri=='pub/resources' ? 'class="active"' : ''?>><a href="<?php echo base_url()?>pub/resources">RESOURCES</a></li>
            <li <?php echo $uri=='contact' ? 'class="active"' : ''?>><a href="<?php echo base_url()?>contact">CONTACT</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
