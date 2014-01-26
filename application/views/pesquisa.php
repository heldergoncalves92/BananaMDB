  <link rel="stylesheet" type="text/css" href="css/block.css">

  	<script>

    var table= new Array("filmes","actores", "realizadores", "generos","produtoras");
    var lis= new Array("todosli","filmesli","actoresli","realizadoresli","generosli","produtorasli");
    var navs= new Array("nav-todos","nav-filmes","nav-actores", "nav-realizadores", "nav-generos","nav-produtoras");

   	function showAll(){
		var i=0;
      	while(i<table.length){
    		document.getElementById(table[i]).style.display="";
   			i++;
   		}
   		for(i=1;i<navs.length;i++){
   			document.getElementById(lis[i]).setAttribute("class", "");
      	}
      	document.getElementById(lis[0]).setAttribute("class", "active");
      	
    }
    
    function showID(show){
		var i=0;
      	while(i<table.length){
    		document.getElementById(table[i]).style.display="none";
   			i++;
   		}
      	document.getElementById(table[show]).style.display="";

      	for(i=0;i<lis.length;i++){
      		document.getElementById(lis[i]).setAttribute("class", "");
      	}
      	document.getElementById(lis[show+1]).setAttribute("class", "active");

    }
  </script>

  <div id="feed-block" class="well">
    <div class="block">
      <h2 id="titu" class="title">Pesquisa</h2>
      <hr>
      <div id="log">
        <div id="log-table">
          <div id="log-cell-1">

            <div id="filmes" class="panel panel-info">
              <div class="panel-heading"><h3 class = "panel-title">Filmes</h3></div>
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

            <div id="actores" class="panel panel-info">
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

            <div id="realizadores" class="panel panel-info">
              <div class="panel-heading">Realizadores</div>
             		 <?php  $crealizadores=0;
			              foreach ($realizadores as $linha) {
			              	if($linha==NULL)
								break;
			             	$this->table->add_row( '<a href=' .   base_url() . 'title/realizador/' . $linha->ID_REALIZADOR . '><img src="' . base_url() . 'uploads/realizadores/' . $linha->IMAGEM . '" width="50px" height="auto""></a>',
			             		'<a href=' .   base_url() . 'title/realizador/' . $linha->ID_REALIZADOR . '>' . $linha->NOME . '</a> <br> ');
							$crealizadores++;
			              	}
						  if($crealizadores==0)
						  	$this->table->add_row($nada);
			              echo $this->table->generate();
              		?>
            </div>

            <div id="generos" class="panel panel-info">
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
          
          

            <div id="produtoras" class="panel panel-info">
              <div class="panel-heading">Produtoras</div>
              		<?php  $cprodutoras=0;
			              foreach ($produtoras as $linha) {
			              	if($linha==NULL)
								break;
			             	$this->table->add_row( '<a href=' .   base_url() . 'title/produtora/' . $linha->ID_PRODUTORA . '>' . $linha->NOME . '</a> <br> ');
							$cprodutoras++;
			              	}
						  if($cprodutoras==0)
						  	$this->table->add_row($nada);
			              echo $this->table->generate();
              		?>
            </div>         
          
          </div>
          
          <div id="log-cell-2">
            <h4>Pesquisa Avançada:</h4>
          		<?php   $cseries = 0; //fica aqui para nao esquecer
          				$ctodos = $cfilmes + $cseries + $cgeneros + $cactores +$crealizadores + $cprodutoras ?>
      
				<div class="pesquisa-avc">
				      <br>
				      <ul class="nav nav-pills nav-stacked" style="max-width: 260px;">
				        <li id="todosli" class="active">
				        	<a href="#" id="nav-todos" onclick="showAll()">
				            	<span id="bdg-todos" class="badge pull-right"><?php echo $ctodos ?></span>
				            	Todos
				          	</a>
				        </li >
				        <li id="filmesli">
				        	<a href="#" id="nav-filmes" onclick="showID(0)">
				            	<span  id="bdg-filmes"class="badge pull-right"><?php echo $cfilmes ?></span>
				            	Filmes
				          	</a>
				        </li>
				       	<li id="actoresli">
				       		<a href="#" id="nav-actores" onclick="showID(1)">
				            	<span id="bdg-actores" class="badge pull-right"><?php echo $cactores ?></span>
				            	Actores
				          	</a>
				        </li>   
					    <li id="realizadoresli">
					    	<a href="#" id="nav-realizadores" onclick="showID(2)">
				            	<span id="bdg-realizadores" class="badge pull-right"><?php echo $crealizadores ?></span>
				            	Realizadores
				          	</a>
				        </li>
				        <li id="generosli">
				        	<a href="#" id="nav-generos" onclick="showID(3)">
				            	<span id="bdg-generos" class="badge pull-right"><?php echo $cgeneros ?></span>
				            	Géneros
				          	</a>
				        </li>   
				        <li  id="produtorasli">
				        	<a href="#" id="nav-produtoras" onclick="showID(4)">
				            	<span id="bdg-produtoras" class="badge pull-right"><?php echo $cprodutoras ?></span>
				            	Produtoras
				          	</a>
				        </li>   
				      </ul>
				    </div>
				</div>
			</div>
  		</div>
	</div>




