

	<h2>Deactivate User</h2>

	<div class="alert">Are you sure you want to deactivate the user '<?php echo $user['username']; ?>'</div>
	
    <?php echo form_open("auth/deactivate/".$user['id']);?>
    	
      <div class="control-group">
      	<label for="confirm">Yes:</label>
		<input type="radio" name="confirm" value="yes" checked="checked" />
      	<label for="confirm">No:</label>
		<input type="radio" name="confirm" value="no" />
      </div>

      <?php echo form_hidden($csrf); ?>
      <?php echo form_hidden(array('id'=>$user['id'])); ?>
      
      <p><?php echo form_submit('submit', 'Submit');?></p>

    <?php echo form_close();?>


