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

    


</head>

<body>


        <div class="container">
        <!-- start Main -->
        <div class="row">

  <div class="col-md-8">&nbsp;</div>
  <div class="col-md-4">&nbsp;</div>

        </div>
             <?php echo $content?>

        <!-- end Main =-->
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