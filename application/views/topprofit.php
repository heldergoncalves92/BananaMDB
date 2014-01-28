  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/block.css">

  	

  <div id="feed-block" class="well">
    <div class="block">
      <h2 id="titu" class="title">Pesquisa</h2>
      <hr>
      <div id="log">
        <div id="log-table">
          <div id="log-cell-1">

            <div id="filmes" class="panel panel-info">
              <div class="panel-heading"><h3 class = "panel-title">TOP 10 Filmes MAIS RENTÁVEIS</h3></div>
              		<?php $nada = '0 Resultados';
					
				  		  $cfilmes=0;
			              foreach ($filmes as $linha) {
			              	if($linha==NULL)
								break;
			              	$this->table->add_row( '<a href=' .   base_url() . 'title/filme/' . $linha->ID_FILME . '><img src="' . base_url() . 'uploads/posters/' . $linha->POSTER . '" width="50px" height="auto""></a>',
			              	number_format($linha->PROFIT,0,'.',' ') . ' €',
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




