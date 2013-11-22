
	<link rel="stylesheet" type="text/css" href="css/block.css">

  	<div id="feed-block" class="well">
	  	<div class="block">
			<h2 class="title">Login</h2>
			<hr>
			<div id="log">
								    
				<label>Utilizador</label>
				<?php echo form_open("login",'');?>
				<?php echo form_input(array('name'=>'USER','class'=>'form-control input','placeholder'=>'Utilizador'),set_value('USERNAME'),'autofocus');?>
				
				<label>Password</label>
				<?php echo form_password(array('name'=>'PASS','class'=>'form-control input','placeholder'=>'Password'),set_value('PASS'));?>
				<br>
				<?php $attributes = 'class = "btn btn-success button"';
				echo form_submit('submit', 'Login', $attributes); 
				echo form_close();
				?>
				<br>
				<?php 	if($erro!='')
							echo '<div class="alert alert-danger erro "><p>' . $erro . '</p></div>';
						echo validation_errors('<div class="alert alert-danger erro"><p>','</p></div>');		
				?>
			</div> 
	    </div>
	
        



