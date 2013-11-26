	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/filme.css">

	<div id="feed-block" class="well">
	
	<?php
		$idactor = $this->uri->segment(3);
		if ($idactor==NULL)
			redirect(base_url());//se entra sem id no url vai para pagina principal

		$query = $this->pesquisamodel->get_actorbyid($idactor)->row();

		if ($query == FALSE)//não existe filme com esse id
			redirect(base_url());

		//echo form_open("user/editar/$iduser");
	?>


	<script type="text/javascript">
		document.title = "<?= 'BananaMDB - ' . $query->NOME;?>"
	</script>

		<div class="block">
			<h2 class="title"><?php  echo $query->NOME ?> <span class = "glyphicon glyphicon-star gold" \> </h2>
	      	
	      	<div id="log-table">
				<div id="log-cell-1">
					<img class="img-thumbnail img-filme" src="<?php echo base_url() . 'uploads/actores/' . $query->IMAGEM;?>">
				</div>

				<div id="log-cell-2">
	    			<div class="control-group" >
				      	<label class="control-label">NOME - </label>
					  	<label class="control-label"><?php echo $query->NOME;?></label>
					</div>

					<div class="control-group" >
						<label class="control-label">DATA de  NASCIMENTO - </label>
						<label class="control-label"><?php echo $query->DATA_NASCIMENTO;?></label>
					</div>

					<div class="control-group" >
						<label class="control-label">NACIONALIDADE - </label>
						<label class="control-label"><?php echo $query->NACIONALIDADE;?></label>
					</div>

					<div class="control-group" >
						<label class="control-label">PRÉMIOS NOMEADO - </label>
						<label class="control-label"><?php echo $query->PREMIOS_NOMEADO;?></label>
					</div>

					<div class="control-group" >
						<label class="control-label">PRÉMIOS VENCIDOS - </label>
						<label class="control-label"><?php echo $query->PREMIOS_VENCIDOS;?></label>
					</div>

					<div class="control-group" >
						<label class="control-label">SEXO - </label>
						<label class="control-label"><?php echo $query->SEXO;?></label>
					</div>
					<hr>       

		            <div class="panel panel-info">
		              	<div class="panel-heading">Presenças em Filmes</div>
		          		<?php $filmes = $this->pesquisamodel->get_filmebyidactor($query->ID_ACTOR)->result();
		          				$nada = '0 Resultados';
					  		  $cfilmes=0;
					  		  
				              foreach ($filmes as $linha) {
				              	if($linha==NULL)
									break;
				              	$this->table->add_row( '<a href=' .   base_url() . 'title/filme/' . $linha->ID_FILME . '><img src="' . base_url() . 'uploads/posters/' . $linha->POSTER . '" width="50px" height="auto""></a>',
				              	$linha->PERSONAGEM . ' - <a href=' .   base_url() . 'title/filme/' . $linha->ID_FILME . '>' . $linha->TITULO . '</a> (' . $linha->ANO . ') <br> ');
								$cfilmes++;
							  	}
							  if($cfilmes==0)
							  	$this->table->add_row($nada);
				              echo $this->table->generate();
		              	?>
		            </div>
		      	</div>    
			</div>
		</div>


