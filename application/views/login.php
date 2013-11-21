


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
						<?php echo form_input(array('name'=>'USER'),set_value('USER'),'autofocus');?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label" for="input01">Password</label>
					<div class="controls">
						<?php echo form_password(array('name'=>'PASS'));?>
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
        



