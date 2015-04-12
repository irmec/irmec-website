<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?php echo $title;?></title>
<!-- CSS Styles -->
<link rel="stylesheet" href="<?=base_url()?>css/bootstrap/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>css/justified-nav.css" type="text/css" />
<!-- additional css -->
<? if(is_array($css)): ?>
    <? foreach($css as $v):?>
         <link rel="stylesheet" href="<?=base_url()?>css/<?=$v?>"  type="text/css" />
    <? endforeach; ?>
    <? unset($v); ?>
<? endif; ?>
<!-- Javascript -->
<script language="JavaScript" src="<?=base_url()?>javascript/jquery-1.7.1.min.js" type="text/javascript"></script>
<? if(is_array($js)): ?>
    <? foreach($js as $v): ?>
         <script language="JavaScript" src="<?=base_url()?>javascript/<?=$v?>" type="text/javascript"></script>
    <? endforeach; ?>
    <? unset($v); ?>
<? endif; ?>
</head>
<body>
<div class="container">
    <div class="masthead">
         <h3 class="text-muted">IRMEC Site</h3>
         <ul class="nav nav-justified">
             <li><a href="<?=base_url()?>">Home</a></li>
             <li><a href="#">About Us</a></li>
             <li><a href="#">Pastor's</a></li>
             <li><a href="#">Churches</a></li>
             <li><a href="#">Foreign Mission</a></li>
             <li><a href="#">Announcements</a></li>
             <li><a href="<?php echo base_url().'contactus'?>">Contact Us</a></li>
         </ul>
    </div>

<div class="row">
<?php echo $content?>
</div>

<? $this->load->view('partials/footer.php'); ?>

</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


</body>

</html>