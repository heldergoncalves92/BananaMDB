	<link rel="stylesheet" href="<?php echo base_url();?>css/filme.css">

	<div id="feed-block" class="well">

	<?php
	$idfilme = $this->uri->segment(3);
	if ($idfilme==NULL)
		redirect(base_url());//se entra sem id no url vai para pagina principal
	
	$query = $this->pesquisamodel->get_filmebyid($idfilme)->row();

	if ($query == FALSE)//não existe filme com esse id
		redirect(base_url());

	$generoid = $this->pesquisamodel->get_generosbyfilme($idfilme)->result();

	$realizador = $this->pesquisamodel->get_realizadorLbyid($query->ID_REALIZADOR)->result();
	$produtora = $this->pesquisamodel->get_produtoraLbyid($query->ID_PRODUTORA)->result();
	?>


	<script type="text/javascript">
		document.title = "<?= 'BananaMDB - ' . $query->TITULO;?>"
	</script>

	<div class="block">
		<h2 class="title"><?php  echo $query->TITULO ?> </h2>
		<hr>
		<!-- Main hero unit for a primary marketing message or call to action -->

		<div id="log-table">
			<div id="log-cell-1">
				<img class="img-thumbnail img-filme" src="<?php echo base_url() . 'uploads/posters/' . $query->POSTER;?>">
			</div>

			<div id="log-cell-2">

				<p class="destaque"><span class="destaque"></span> </p>	


				<div class="control-group" >
				<label >Realizador - </label> 
				<label class="control-label">
				<?php  $reals = '';
				foreach ($realizador as $linha) {
				$reals = $reals . '<a href=' .   base_url() . 'title/realizador/' . $linha->ID_REALIZADOR . '>' . $linha->NOME . '</a>';}
				echo $reals;?>
				</label>
				</div>


				<div class="control-group" >
				<label class="control-label">Produtora - </label>
				<label class="control-label">
				<?php  $prods = '';
				foreach ($produtora as $linha) {
				$prods = $prods . '<a href=' .   base_url() . 'title/produtora/' . $linha->ID_PRODUTORA . '>' . $linha->NOME . '</a>';}
				echo $prods;?>
				</label>

				</div>
				


				<div class="control-group" >
				<label >Género</label>
				<label class="control-label">
				<?php $gens = '';
				foreach ($generoid as $linha) {
				$gens = $gens . ' - ' . '<a href=' .   base_url() . 'title/genero/' . $linha->ID_GENERO . '>' . $linha->NOME . '</a>' ;}
				echo $gens;?>
				</label>
				</div>     		


				<div class="control-group" >
				<label class="control-label">ANO - </label>
				<label class="control-label"><?php echo '<a href=' .   base_url() . 'title/ano/' . $query->ANO . '>' . $query->ANO . '</a>' ;?></label>
				</div>

				<div class="control-group" >
				<label class="control-label">BUDGET - </label>
				<label class="control-label"><?php if ($query->BUDGET>0) echo $query->BUDGET . '€' ; else echo 'Sem Informações';?></label>
				</div>

				<div class="control-group" >
				<label class="control-label">GROSS - </label>
				<label class="control-label"><?php if ($query->GROSS>0) echo $query->GROSS . '€' ; else echo 'Sem Informações';?></label>
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
					<label class="control-label">RATING - </label>
					<?php 
						if( $query->RATING<=6)
							echo '<span class="label label-default">' .  'TODOS' . '</span>';
						else 	
							if( $query->RATING<=8)
								echo '<span class="label label-primary">' .  $query->RATING . '</span>'; 
							else 
								if( $query->RATING<=12)
									echo '<span class="label label-success">' .  $query->RATING . '</span>'; 
								else 
									if( $query->RATING<=16)
										echo '<span class="label label-warning">' .  $query->RATING . '</span>'; 
									else 
										if( $query->RATING<=18)
											echo '<span class="label label-danger">' .  $query->RATING . '</span>'; 
										else 
											echo '<span class="label label-xred">' .  'ADULTO' . '</span>';
					?>
				</div>
				<hr>
				<!-- Button trigger modal -->
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				  Ver Trailer
				</button>

				<!-- Modal -->
				<div class="modal fade block" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel"><?php  echo $query->TITULO ?></h4>
				      </div>
				      <div class="modal-body">
				        <?php
							if($query->RATING >= 18){

								if($idade>0){//Está logado
									if($idade>=18 && $idade<21)//maiores de 18 e menores de 21
										echo "<iframe width=\"100%\" src=\"//www.youtube.com/embed/<?php echo $query->TRAILER ?>\" frameborder=\"0\" allowfullscreen></iframe>";
									else 
										if($idade>=21)//para adultos
											echo "<iframe src=\"http://flashservice.xvideos.com/embedframe/$query->TRAILER\" frameborder=0 width=100% scrolling=no></iframe>";
										else//não tem idade e está logado
											echo "Não tem idade para ver";
								}
								else 
									echo "Conteúdo Susceptível de ferir a sensibilidade dos visitantes.";//Não está logado
							}
							else 
								echo "<iframe width=\"100%\" height=\"315\" src=\"//www.youtube.com/embed/$query->TRAILER\" frameborder=\"0\" allowfullscreen></iframe>";
						?>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				

			</div>
		</div>
		<div id="cast" class="panel panel-info">
			<div class="panel-heading">Cast</div>
				<?php $filmes = $this->pesquisamodel->get_actoresbyfilmeid($query->ID_FILME)->result();
					$nada = '0 Resultados';
					$cfilmes=0;
					foreach ($filmes as $linha) {
						if($linha==NULL)
							break;
						$this->table->add_row( '<a href=' .   base_url() . 'title/actor/' . $linha->ID_ACTOR . '><img src="' . base_url() . 'uploads/actores/' . $linha->IMAGEM . '" width="50px" height="auto""></a>',
						$linha->PERSONAGEM . ' - <a href=' .   base_url() . 'title/actor/' . $linha->ID_ACTOR . '>' . $linha->NOME . '</a><br> ');
						$cfilmes++;
					}
					if($cfilmes==0)
						$this->table->add_row($nada);
					echo $this->table->generate();
				?>
			</div>
		</div>
		
