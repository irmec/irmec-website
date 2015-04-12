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
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url().'admin/'?>">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a> </li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
                <li><a href="/admin/announcements">Announcements</a></li>
                <li><a href="/admin/workers">Workers</a>
                </li>
                <li><a href="/admin/churches">Churches</a>
                </li>
                <li><a href="/admin/downloads">Downloads</a></li>

          </ul>

        </div>
        <!-- start Main -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
             <?php echo $content?>
        </div><!-- end Main =-->
      </div>
    </div>




    <!-- JavaScript -->
    <script src="<?=base_url()?>javascript/jquery-1.7.1.min.js"></script>
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