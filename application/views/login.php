


  	<div class="container">
		<div class="row">
		  <div class="span8">
			
			<form class="form-horizontal"  method='post' action=''>
			  <fieldset>
			    <legend>Login</legend>	     
				<?php
					echo form_open("login",'');
				?>
				<div class="alert alert-danger">      
					<?php
						echo $erro;
						echo validation_errors('<p>','</p>');
					?>
				</div>
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
			  </fieldset>
			</form>
		  </div>
		</div>
    </div><!--/row-->
        



