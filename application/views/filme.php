<div id="feed-block" class="well">

	     
<?php

$idfilme = $this->uri->segment(3);


if ($idfilme==NULL)redirect(base_url());//se entra sem id no url vai para pagina principal


$query = $this->pesquisamodel->get_filmebyid($idfilme)->row();


if ($query == FALSE)//não existe filme com esse id
redirect(base_url());

$generoid = $this->pesquisamodel->get_generosbyfilme($idfilme)->result();

$realizador = $this->pesquisamodel->get_realizadorLbyid($query->ID_REALIZADOR)->result();
$produtora = $this->pesquisamodel->get_produtoraLbyid($query->ID_PRODUTORA)->result();



//echo form_open("user/editar/$iduser");
?>


<script type="text/javascript">
    document.title = "<?= 'BananaMDB - ' . $query->TITULO;?>"
</script>

	<h2><?php  echo $query->TITULO ?> </h2>
      <!-- Main hero unit for a primary marketing message or call to action -->
      
      <div class="panel panel-default">
  
  
      
      <div class="col-md-5"><br>
      	<?php echo '<img src="' . base_url() . 'uploads/posters/' . $query->POSTER . '" width="350px" height="auto""></img>';?>
      	
      </div>
      
      </div>
      <div class="col.-md-6">
      	
      		
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
	      <label >Realizador - </label>
		  <label class="control-label"><?php  '<a href=' .   base_url() . 'title/realizador/' . $realizador[0]->ID_REALIZADOR . '>' . $realizador[0]->NOME . '</a>';?></label>
</div>

    	
<div class="control-group" >
	      <label class="control-label">Produtora - </label>
		  <label class="control-label"><?php  '<a href=' .   base_url() . 'title/produtora/' . $produtora[0]->ID_PRODUTORA . '>' . $produtora[0]->NOME . '</a>';?></label>
</div>




<div class="control-group" >
	      <label class="control-label">ANO - </label>
		  <label class="control-label"><?php echo $query->ANO;?></label>
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
	      <?php if( $query->RATING<=6)
		  			echo '<span class="label label-default">' .  'TODOS' . '</span>';
				else if( $query->RATING<=8)
		  			echo '<span class="label label-primary">' .  $query->RATING . '</span>'; 
				else if( $query->RATING<=12)
		  			echo '<span class="label label-success">' .  $query->RATING . '</span>'; 
				else if( $query->RATING<=16)
		  			echo '<span class="label label-warning">' .  $query->RATING . '</span>'; 
				else if( $query->RATING<=18)
		  			echo '<span class="label label-danger">' .  $query->RATING . '</span>'; 
				else 
		  			echo '<span class="label label-xred">' .  'ADULTO' . '</span>'; 			  					  					  					  			
		  			
		  			?>
</div>

<hr>
<?php
if($query->RATING >= 18){
	
	if($idade>0){//Está logado
		if($idade>=18 && $idade<21)//maiores de 18 e menores de 21
			echo "<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/<?php echo $query->TRAILER ?>\" frameborder=\"0\" allowfullscreen></iframe>";
		else if($idade>=21)//para adultos
			echo "<iframe src=\"http://flashservice.xvideos.com/embedframe/$query->TRAILER\" frameborder=0 width=510 height=400 scrolling=no></iframe>";
		else//não tem idade e está logado
			echo "Não tem idade para ver";
	}
	else echo "Conteúdo Susceptível de ferir a sensibilidade dos visitantes.";//Não está logado
}
else echo "<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/$query->TRAILER\" frameborder=\"0\" allowfullscreen></iframe>";

?>





        <div id="log-table">
          <div id="log-cell-1">

            <div class="panel panel-default">
              <div class="panel-heading">Cast</div>
              		<?php $filmes = $this->pesquisamodel->get_actoresbyfilmeid($query->ID_FILME)->result();
              				$nada = '0 Resultados';
				  		  $cfilmes=0;
			              foreach ($filmes as $linha) {
			              	if($linha==NULL)
								break;
			              	$this->table->add_row( '<a href=' .   base_url() . 'title/actor/' . $linha->ID_ACTOR . '><img src="' . base_url() . 'uploads/actores/' . $linha->IMAGEM . '" width="50px" height="auto""></a>',
			              	$linha->PERSONAGEM . ' - <a href=' .   base_url() . 'title/actor/' . $linha->ID_ACTOR . '>' . $linha->NOME . '</a> (' . $linha->DATA_NASCIMENTO . ') <br> ');
							$cfilmes++;
						  	}
						  if($cfilmes==0)
						  	$this->table->add_row($nada);
			              echo $this->table->generate();
	              	?>
            </div>
         
          
          </div>
          
      
      

</div>