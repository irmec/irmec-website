<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel :: IRM Website</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>css/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?=base_url()?>css/dashboard.css" rel="stylesheet">
     <!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url().'admin/'?>">IRM Evangelical Church</a>           
        </div>                 
        <div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?=site_url()?>admin/churches">Churches</a></li>
				<li><a href="<?=site_url()?>admin/workers">Workers</a></li>
				<li><a href="<?=site_url()?>admin/downloads">Downloads</a></li>
			</ul>  
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url().'admin/'?>">Dashboard</a></li>
            <li><a href="<?=site_url()?>admin/messages">Messages</a></li>             
            <li><a href="<?php echo base_url()?>logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a> </li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <!-- start Main -->
        <div class="col-sm-12 col-md-12 main">
             <?php echo $content?>
        </div><!-- end Main =-->
      </div>
    </div>




    <!-- JavaScript -->
    <script src="<?=base_url()?>javascript/jquery-1.7.1.min.js"></script>
    <script src="<?=base_url()?>css/bootstrap/js/bootstrap.js"></script>
    <script src="<?=base_url()?>css/bootstrap/js/bootstrap.js"></script>

    <!-- Custom JavaScript for the Menu Toggle -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script>
</body>

</html>
