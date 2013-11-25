	<link rel="stylesheet" type="text/css" href="css/perfil.css">

	<div id="feed-block" class="well">
	  	<div class="block">
	  		<a href="<?php echo base_url();?>perfil/editar"><button type="button" class="btn btn-primary btn-right">Editar Perfil</button></a>

			<h2 class="title">Perfil de <spam class="user"><?php echo $idz[0]->USERNAME;?></spam></h2>
			<hr>
			<div id="log">
				<div id="log-table">
					<div id="log-cell-1">
						<img class="img-thumbnail avatar" alt="Imagem não encontrada" src="<?php echo base_url(); ?>uploads/users/<?php  echo $idz[0]->AVATAR;?>" align="center"/>
					</div>
					<div id="log-cell-2">
						<h4>Detalhes:</h4>
						<hr>
						
						<nav class="navbar " role="navigation">
						<div class="navbar-header">
						
						<a class="navbar-brand" href="#">Utilizador: </a>
						</div>
						<div id="bs-example-navbar-collapse-4" class="collapse navbar-collapse">
						<p class="navbar-text"><?php  echo $idz[0]->USERNAME;?></p>
						</div>
						</nav>
						<nav class="navbar" role="navigation">
						<div class="navbar-header">
						
						<a class="navbar-brand" href="#">E-mail: </a>
						</div>
						<div id="bs-example-navbar-collapse-4" class="collapse navbar-collapse">
						<p class="navbar-text"><?php  echo $idz[0]->EMAIL;?></p>
						</div>
						</nav>
						</nav>
						<nav class="navbar " role="navigation">
						<div class="navbar-header">
						
						<a class="navbar-brand" href="#">Data de Nascimento: </a>
						</div>
						<div id="bs-example-navbar-collapse-4" class="collapse navbar-collapse">
						<p class="navbar-text"><?php  echo $idz[0]->DATA_NASCIMENTO;?></p>
						</div>
						</nav>
						
						
						
						
						<div class="panel panel-info">
						<div class="panel-heading">
						<h3 class="panel-title">Utilizador</h3>
						</div>
						<div class="panel-body"> <?php  echo $idz[0]->EMAIL;?> </div>
						</div>
						
						<div class="panel panel-info">
						<div class="panel-heading">
						<h3 class="panel-title">E-mail</h3>
						</div>
						<div class="panel-body"> <?php  echo $idz[0]->EMAIL;?> </div>
						</div>
						
						<div class="panel panel-info">
						<div class="panel-heading">
						<h3 class="panel-title">Data de Nascimento: </h3>
						</div>
						<div class="panel-body"> <?php  echo $idz[0]->DATA_NASCIMENTO;?> </div>
						</div>

					</div>
				</div>
			</div>
		</div>