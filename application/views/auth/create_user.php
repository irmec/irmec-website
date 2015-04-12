<h2>Create User</h2>
<div class="alert alert-info">Please enter the users information below.</div>

<?php echo form_open(base_url()."auth/create_user");?>
<div class="control-group">
  <label class="control-label">First Name:</label>
  <div class="controls">
    <?php echo form_input($first_name);?>
  </div>
</div>

<div class="control-group">
    <label class="control-label">Last Name:</label>
    <div class="controls">
     <?php echo form_input($last_name);?>
     </div>
</div>

<div class="control-group">
    <label class="control-label">Company Name:</label>
    <div class="controls">
        <?php echo form_input($company);?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Email:</label>
    <div class="controls">
      <?php echo form_input($email);?>
    </div>
</div>

<div class="control-group">
  <label class="control-label">Phone:</label>
  <div class="controls">
  <?php echo form_input($phone1,'','class="input-mini"');?>-<?php echo form_input($phone2,'','class="input-mini"');?>-<?php echo form_input($phone3,'','class="input-mini"');?>
  </div>
</div>

<div class="control-group">
  <label class="control-label">Password:</label>
  <div class="controls">
  <?php echo form_input($password);?>
  </div>
</div>

<div class="control-group">
  <label class="control-label">Confirm Password:</label>
  <div class="controls">
  <?php echo form_input($password_confirm);?>
  </div>
</div>

<div class="form-actions">
  <?php echo form_submit('submit', 'Create User','class="btn btn-primary"');?>
</div>


<?php echo form_close();?>


