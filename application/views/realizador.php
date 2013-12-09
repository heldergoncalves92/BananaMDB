<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/filme.css">

	<div id="feed-block" class="well">
	
	<?php
		$idrealizador = $this->uri->segment(3);
		if ($idrealizador==NULL)
			redirect(base_url());//se entra sem id no url vai para pagina principal
		if($idrealizador == 'masterduarte')
			$query = $this->pesquisamodel->get_realizadorbyid(13);
		else	
			if(is_numeric($idrealizador)==TRUE)
				$query = $this->pesquisamodel->get_realizadorbyid($idrealizador);
			else
				redirect(base_url());
			
		
		if ($query == FALSE)//não existe filme com esse id
			redirect(base_url());
	?>


	<script type="text/javascript">
		document.title = "<?= 'BananaMDB - ' . $query->NOME;?>"
	</script>

		<div class="block">
			<h2 class="title"><?php  echo $query->NOME ?> </h2>
			<hr>
	      	
	      	<div id="log-table">
				<div id="log-cell-1">
					<img class="img-thumbnail img-filme" src="<?php echo base_url() . 'uploads/realizadores/' . $query->IMAGEM;?>">
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
						<label class="control-label">SEXO - </label>
						<label class="control-label"><?php echo $query->SEXO;?></label>
					</div>
					<hr>       
		            <div class="panel panel-info">
		              	<div class="panel-heading">Filmes Realizados</div>
		          		<?php $filmes = $this->pesquisamodel->get_filmebyidrealizador($query->ID_REALIZADOR)->result();
		          				$nada = '0 Resultados';
					  		  $cfilmes=0;
					  		  
				              foreach ($filmes as $linha) {
				              	if($linha==NULL)
									break;
				              	$this->table->add_row( '<a href=' .   base_url() . 'title/filme/' . $linha->ID_FILME . '><img src="' . base_url() . 'uploads/posters/' . $linha->POSTER . '" width="50px" height="auto""></a>',
				              	'<a href=' .   base_url() . 'title/filme/' . $linha->ID_FILME . '>' . $linha->TITULO . '</a> (' . $linha->ANO . ') <br> ');
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