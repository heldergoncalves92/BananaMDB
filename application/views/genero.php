	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/filme.css">

	<div id="feed-block" class="well">
	
	<?php
		$idgenero = $this->uri->segment(3);
		if ($idgenero==NULL)
			redirect(base_url());//se entra sem id no url vai para pagina principal

		$query = $this->pesquisamodel->get_generobyid($idgenero)->row();

		if ($query == FALSE)//não existe filme com esse id
			redirect(base_url());

		//echo form_open("user/editar/$iduser");
	?>


	<script type="text/javascript">
		document.title = "<?= 'BananaMDB - ' . $query->NOME ;?>"
	</script>

		<div class="block">
			<h2 class="title"><?php  echo $query->NOME ;?></h2>
	      	
	      	
					<hr>       

		            <div class="panel panel-info">
		              	<div class="panel-heading">Filmes</div>
		          		<?php $filmes = $this->pesquisamodel->get_filmesbygeneroid($query->ID_GENERO)->result();
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
		


