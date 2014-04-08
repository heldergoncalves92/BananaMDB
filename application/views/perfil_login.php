	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/perfil.css">
	

	<?php 
		if(!$open)
			echo "<script> 
	  		$(document).ready(function() {
			    $('#Edit_Modal').modal('show');
			    $('#Edit_Modal').on('shown', function() {
			        $(\"#txtname\").focus();
			    });
			});
	</script>" ?>
	
	<div id="feed-block" class="well">
	  	<div class="block">
	  		
	  		<!-- Button trigger modal -->
				<button class="btn btn-primary btn-right" data-toggle="modal" data-target="#Edit_Modal">
				  Editar Perfil
				</button>
	 
			<h2 class="title">Perfil de <spam class="user"><?php echo $idz[0]->USERNAME;?></spam></h2>
			<hr>
			<div id="log">
				<div id="log-table">
					<div id="log-cell-1">
						<img class="img-thumbnail avatar" alt="Imagem não encontrada" src="<?php echo base_url(); ?>uploads/users/<?php  echo $idz[0]->AVATAR;?>" align="center">
						<?php echo form_open_multipart(base_url().'perfil','');?>
						<?php echo form_upload(array('name'=>'AVATAR'),set_value('AVATAR')); ?>
						<?php 	$attributes = 'class = "btn btn-sm btn-primary button"';
								echo form_submit('SUB_AVATAR', 'Mudar Avatar', $attributes); 
								echo form_close();?>
					</div>
					<div id="log-cell-2">
						<h4>Detalhes:</h4>
						<hr>
						<p class="destaque"><span class="destaque">Utilizador:</span> <?php  echo $idz[0]->USERNAME;?></p>
						<p class="destaque"><span class="destaque">E-mail:</span> <?php  echo $idz[0]->EMAIL;?></p>
						<p class="destaque"><span class="destaque">Data de Nascimento:</span> <?php  echo $idz[0]->DATA_NASCIMENTO;?></p>
						<?php 	
						if($open=='2'){
							if($erro!=' ')
								echo '<hr><div class="alert alert-danger "><p>' . $erro . '</p></div>';
							if($su_avatar!=' ')
								echo '<hr><div class="alert alert-success "><p>' . $su_avatar . '</p></div>';
							echo validation_errors('<div class="alert alert-danger erro"><p>','</p></div>');
						}	
					?>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal -->
		<div class="modal fade block" id="Edit_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Editar perfil de <spam class="user"><?php echo $idz[0]->USERNAME;?></spam></h4>
		      </div>
		      <div class="modal-body">
		      	<?php echo form_open(base_url().'perfil','');?>
		      	<p><span class="destaque">Password Actual:</span> <?php echo form_password(array('name'=>'PASS_ANT','class'=>'form-control input','placeholder'=>'Password Actual'));?></p>
				<p><span class="destaque">Nova Password:</span> <?php echo form_password(array('name'=>'PASS','class'=>'form-control input','placeholder'=>'Password'),set_value('PASS'));?></p>
				<p><span class="destaque"></span> <?php echo form_password(array('name'=>'PASS2','class'=>'form-control input','placeholder'=>'Repita a Password')); ?></p>
		        
	        	<?php 	if(!$open){
		        			if($erro!=' ')
								echo '<div class="alert alert-danger "><p>' . $erro . '</p></div>';
							if($sucesso!=' ')
								echo '<div class="alert alert-success "><p>' . $sucesso . '</p></div>';
							echo validation_errors('<div class="alert alert-danger erro"><p>','</p></div>');	
						}
					?>

		      </div>
		      <div class="modal-footer">
		      	<?php 	
		      		$attributes = 'class = "btn btn-primary btn-right"';
								echo form_submit('SUBMIT', 'Guardar Alterações', $attributes);?>
				<?php form_close();?>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->