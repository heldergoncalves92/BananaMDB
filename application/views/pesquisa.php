  <link rel="stylesheet" type="text/css" href="css/block.css">

  <div id="feed-block" class="well">
    <div class="block">
      <h2 class="title">Pesquisa</h2>
      <hr>
      <div id="log">
        <div id="log-table">
          <div id="log-cell-1">

            <div class="panel panel-default">
              <div class="panel-heading">Filmes</div>
              		<?php $nada = '0 Resultados';
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
<!--
            <div class="panel panel-default">
              <div class="panel-heading">Séries</div>
              <table>
                <td></td>
                <td>0 Resultados porque não fiz search</td>
              </table>
            </div>
-->
            <div class="panel panel-default">
              <div class="panel-heading">Actores</div>
              		<?php  $cactores=0;
			              foreach ($actores as $linha) {
			              	if($linha==NULL)
								break;
			             	$this->table->add_row( '<a href=' .   base_url() . 'title/actor/' . $linha->ID_ACTOR . '><img src="' . base_url() . 'uploads/actores/' . $linha->IMAGEM . '" width="50px" height="auto""></a>',
			              	'<a href=' .   base_url() . 'title/actor/' . $linha->ID_ACTOR . '>' . $linha->NOME . '</a> <br> ');
							$cactores++;
			              	}
						  if($cactores==0)
						  	$this->table->add_row($nada);
			              echo $this->table->generate();
              		?>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Realizadores</div>
             		 <?php  $crealizadores=0;
			              foreach ($realizadores as $linha) {
			              	if($linha==NULL)
								break;
			             	$this->table->add_row( '<a href=' .   base_url() . 'title/realizador/' . $linha->ID_REALIZADOR . '>' . $linha->NOME . '</a> <br> ');
							$crealizadores++;
			              	}
						  if($crealizadores==0)
						  	$this->table->add_row($nada);
			              echo $this->table->generate();
              		?>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Géneros</div>
                    <?php  $cgeneros=0;
			              foreach ($generos as $linha) {
			              	if($linha==NULL)
								break;
			             	$this->table->add_row( '<a href=' .   base_url() . 'title/genero/' . $linha->ID_GENERO . '>' . $linha->NOME . '</a> <br> ');
							$cgeneros++;
			              	}
						  if($cgeneros==0)
						  	$this->table->add_row($nada);
			              echo $this->table->generate();
              		?>
            </div>
          
          

            <div class="panel panel-default">
              <div class="panel-heading">Produtoras</div>
              		<?php  $cprodutoras=0;
			              foreach ($produtoras as $linha) {
			              	if($linha==NULL)
								break;
			             	$this->table->add_row( '<a href=' .   base_url() . 'title/realizador/' . $linha->ID_PRODUTURA . '>' . $linha->NOME . '</a> <br> ');
							$cprodutoras++;
			              	}
						  if($cprodutoras==0)
						  	$this->table->add_row($nada);
			              echo $this->table->generate();
              		?>
            </div>         
          
          </div>
          
          <div id="log-cell-2">
            <h4>Pesquisa Avançada</h4>
          		<?php   $cseries = 0; //fica aqui para nao esquecer
          				$ctodos = $cfilmes + $cseries + $cgeneros + $cactores +$crealizadores + $cprodutoras ?>
      
				<div class="bs-example">
				      
				      <br>
				      <ul class="nav nav-pills nav-stacked" style="max-width: 260px;">
				      	
				        <li class="active"><a href="#">
				            <span class="badge pull-right"><?php echo $ctodos ?></span>
				            Todos
				          </a></li>
				        
				        
				        <li><a href="#">
				            <span class="badge pull-right"><?php echo $cfilmes ?></span>
				            Filmes
				          </a></li>
				          
				          <!--
			           <li><a href="#">
				            <span class="badge pull-right"><?php echo $cseries ?></span>
				            Séries
				          </a></li>-->
				          
				       <li><a href="#">
				            <span class="badge pull-right"><?php echo $cactores ?></span>
				            Actores
				          </a></li>   
				          
				          
			           <li><a href="#">
				            <span class="badge pull-right"><?php echo $crealizadores ?></span>
				            Realizadores
				          </a></li>
				          
				          
				       <li><a href="#">
				            <span class="badge pull-right"><?php echo $cgeneros ?></span>
				            Géneros
				          </a></li>   
				          
				          
				       <li><a href="#">
				            <span class="badge pull-right"><?php echo $cprodutoras ?></span>
				            Produtoras
				          </a></li>   
				          
				      </ul>
				    </div>


		</div>
	</div>
  </div>
</div>




