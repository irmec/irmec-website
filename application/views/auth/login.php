<div class="row">
<div class="col-md-offset-3 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Login</h3>
</div>
<div class="panel-body">

    <?php if(!empty($message)):?>
	<div class="alert alert-info"><?php echo $message;?></div>
    <?php endif; ?>

    <?php echo form_open(base_url()."auth/login", array('role'=>'form'));?>

    <p>Please login with your email address and password below.</p>
      <div class="form-group">
      	<label  for="email">Email:</label>
      	<?php echo form_input($email, null, 'class="form-control"');?>
      </div>



      <div class="form-group">
      	<label class="control-label" for="password">Password:</label>
        <div class="controls">
      	<?php echo form_input($password, null, 'class="form-control"');?>
        </div>
      </div>




      <div class="control-group">
      <div class="controls">
	      <label class="checkbox" for="remember">Remember Me:
	      <?php echo form_checkbox('remember', '1', FALSE);?>
          </label>
      </div>
	  </div>

      <div class="form-actions">
      <?php echo form_submit('submit', 'Login','class="btn btn-primary"');?>
      </div>

    <?php echo form_close();?>

</div>
</div>
</div>

</div>

