	<link rel="stylesheet" type="text/css" href="css/registo.css">

  	<div id="feed-block" class="well">
	  	<div class="block">
			<h2 class="title">Registo</h2>
			<hr>
			<div id="log">
				<div id="log-table">
					<div id="log-cell-1">
					
						<?php if ($this->session->flashdata('registook'))
								echo'<p>'.$this->session->flashdata('registook').'</p>';
						?>


						<?php echo form_open('Registo','');?>
						
						<h5>Utilizador</h5>
						<?php echo form_input(array('name'=>'USERNAME','class'=>'form-control input','placeholder'=>'USERNAME'),set_value('USERNAME'),'autofocus');?>
										
						<h5>E-Mail</h5>
						<?php echo form_input(array('name'=>'EMAIL','class'=>'form-control input','placeholder'=>'E-MAIL'),set_value('EMAIL'));?>
						
						<h5>Data de Nascimento</h5>
						<?php echo form_input(array('name'=>'DATANASCIMENTO','class'=>'form-control input','placeholder'=>'DD-MM-AAA'),set_value('DATANASCIMENTO'));?>
						
						<h5>Password</h5>
						<?php echo form_password(array('name'=>'PASS','class'=>'form-control input','placeholder'=>'PASSWORD'),set_value('PASS'));?>
						
						<h5>Repita a Password</h5>
						<?php echo form_password(array('name'=>'PASS2','class'=>'form-control input','placeholder'=>'REPITA A PASSWORD'),set_value('PASS2')); ?>

						<h5>Avatar</h5>
						<?php echo form_upload(array('name'=>'AVATAR'),set_value('AVATAR')); ?>

						<br>
						<?php 	$attributes = 'class = "btn btn-success button"';
								echo form_submit('submit', 'Registar', $attributes); 
								echo form_close();?>
						<br>
						
							
						
					</div>
					<div id="log-cell-2">
						<br><br>
						<?php 	if($erro!='')
										echo '<div class="alert alert-danger "><p>' . $erro . '</p></div>';
									echo validation_errors('<div class="alert alert-danger erro"><p>','</p></div>');	
							?>
						</div>
				</div>
			</div>
		</div>
	
	





