
	<link rel="stylesheet" type="text/css" href="css/login.css">

  	<div id="feed-block" class="well">
	  	<div class="container">
			<div class="row">
			  <div class="span8">
				
				
				    <legend>Login</legend>	     
					<?php
						echo form_open("login",'');
					?>
					<?php
						
						if($erro!='')
							echo '<div class="alert alert-danger"><p>' . $erro . '</p></div>';
						echo validation_errors('<div class="alert alert-danger"><p>','</p></div>');
						
					?>
						<div class="form-group">
						<label class="control-label" for="input01">Username</label>
						<div class="controls">
						<?php echo form_input(array('name'=>'USER','style'=>'margin-bottom:.5em;width:20%','class'=>'form-control','placeholder'=>'USERNAME'),set_value('USERNAME'),'autofocus');?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="input01">Password</label>
						<div class="controls">
						<?php echo form_password(array('name'=>'PASS','style'=>'margin-bottom:.5em;width:20%','class'=>'form-control','placeholder'=>'PASSWORD'),set_value('PASS'));?>
						</div>
					</div>
					<div class="form-group">
						<div class="controls">
							<?php $attributes = 'class = "btn btn-success"';
								echo form_submit('submit', 'Login', $attributes); 
								echo form_close();
							?>
						</div>
					</div>
				 
			  </div>
			</div>
	    </div>
	
        



