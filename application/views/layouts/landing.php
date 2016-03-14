<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- link rel="shortcut icon" href="../../assets/ico/favicon.ico" -->

    <title>IRM Evangelical Church : Redemption and Transformation of Nations</title>
     <?php $this->load->view('partials/fbmeta_default', $fbmeta_data);?>
    <!-- Bootstrap core CSS -->
<!-- CSS Styles -->
<link rel="stylesheet" href="<?=base_url()?>css/bootstrap/css/bootstrap.css" type="text/css" />
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?=base_url()?>css/irm-landing.css" type="text/css" />
<!-- Place somewhere in the <head> of your document -->
<link rel="stylesheet" href="<?=base_url()?>css/flexslider/flexslider.css" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>css/font-awesome/font-awesome.min.css" type="text/css">
<!-- additional css -->
<?php if(is_array($css)): ?>
    <?php foreach($css as $v):?>
         <link rel="stylesheet" href="<?=base_url()?>css/<?=$v?>"  type="text/css" />
    <?php endforeach; ?>
    <?php unset($v); ?>
<?php endif; ?>
<!-- Javascript -->
<script language="JavaScript" src="<?=base_url()?>javascript/jquery-1.7.1.min.js" type="text/javascript"></script>
<?php if(is_array($js)): ?>
    <?php foreach($js as $v): ?>
         <script language="JavaScript" src="<?=base_url()?>javascript/<?=$v?>" type="text/javascript"></script>
    <?php endforeach; ?>
    <?php unset($v); ?>
<?php endif; ?>

    <!-- Custom styles for this template -->
    <!-- GOOGLE FONT -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700" >

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>
  </head>

  <body>
    <?=$this->load->view('layouts/nav/home'); ?>

    <div class="container" >
        <div class="col-md-offset-2 col-md-8">
                <img src="<?php echo base_url()?>images/logo.jpg" class="img-responsive"  />
        </div>

    </div>

    <div class="container-fluid">
    <?php echo $content ?>

    </div>


        <!-- FOOTER -->
    <br />
    <div class="copyright_info">
		<div class="container">
		  <div class="row">
			<div class="col-md-6">
				<b><p>&copy; Copyright 2016 | <a href="http://irmec.org/" target="_blank">IRM Evangelical Church</a></p></b>
			</div>
			<div class="col-md-6">
			
			</div>
		  </div>
		</div>
	</div> 



        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script language="JavaScript" src="<?=base_url()?>javascript/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="<?=base_url()?>css/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="<?=base_url()?>css/bootstrap/js/docs.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="<?=base_url()?>css/flexslider/jquery.flexslider.js" type="text/javascript"></script>
  </body>
</html>
