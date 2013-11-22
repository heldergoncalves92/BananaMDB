	<link rel="stylesheet" type="text/css" href="css/block.css">

  	<div id="feed-block" class="well">
	  	<div class="block">
			<h2 class="title">Registo</h2>
			<hr>
			<div id="log">
				
				<?php if ($this->session->flashdata('registook'))
						echo'<p>'.$this->session->flashdata('registook').'</p>';
				?>


				<?php echo form_open('Registo','');?>
				
				<label>Utilizador</label>
				<?php echo form_input(array('name'=>'USERNAME','class'=>'form-control input','placeholder'=>'USERNAME'),set_value('USERNAME'),'autofocus');?>
								
				<label>E-Mail</label>
				<?php echo form_input(array('name'=>'EMAIL','class'=>'form-control input','placeholder'=>'E-MAIL'),set_value('EMAIL'));?>
				
				<label>Data de Nascimento</label>
				<?php echo form_input(array('name'=>'DATANASCIMENTO','class'=>'form-control input','placeholder'=>'DATA'),set_value('DATANASCIMENTO'));?>
				
				<label>Password</label>
				<?php echo form_password(array('name'=>'PASS','class'=>'form-control input','placeholder'=>'PASSWORD'),set_value('PASS'));?>
				
				<label>Repita a Password</label>
				<?php echo form_password(array('name'=>'PASS2','class'=>'form-control input','placeholder'=>'REPITA A PASSWORD'),set_value('PASS2')); ?>

				<br>
				<?php 	$attributes = 'class = "btn btn-success button"';
						echo form_submit('submit', 'Registar', $attributes); 
						echo form_close();?>
				<br>
				<div class="alert alert-danger">      
					<?php echo validation_errors('<p>','</p>');?>
				</div>

			</div>
		</div>
	
	





