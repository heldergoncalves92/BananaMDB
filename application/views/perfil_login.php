	<link rel="stylesheet" type="text/css" href="css/perfil.css">

	<div id="feed-block" class="well">
	  	<div class="block">
	  		<a href="<?php echo base_url();?>perfil/editar"><button type="button" class="btn btn-primary btn-right">Editar Perfil</button></a>

			<h2 class="title">Perfil de <spam class="user"><?php echo $idz[0]->USERNAME;?></spam></h2>
			<hr>
			<div id="log">
				<div id="log-table">
					<div id="log-cell-1">
						<img class="img-thumbnail avatar" alt="Imagem não encontrada" src="<?php echo base_url(); ?>uploads/users/<?php  echo $idz[0]->AVATAR;?>" align="center">
					</div>
					<div id="log-cell-2">
						<h4>Detalhes:</h4>
						<hr>
						<p class="destaque"><span class="destaque">Utilizador:</span> <?php  echo $idz[0]->USERNAME;?></p>
						<p class="destaque"><span class="destaque">E-mail:</span> <?php  echo $idz[0]->EMAIL;?></p>
						<p class="destaque"><span class="destaque">Data de Nascimento:</span> <?php  echo $idz[0]->DATA_NASCIMENTO;?></p>
					</div>
				</div>
			</div>
		</div>