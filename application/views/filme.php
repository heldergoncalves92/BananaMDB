<div id="feed-block" class="well">

	     
<?php

$idfilme = $this->uri->segment(3);


if ($idfilme==NULL)redirect(base_url());//se entra sem id no url vai para pagina principal


$query = $this->pesquisamodel->get_filmebyid($idfilme)->row();


if ($query == FALSE)//não existe filme com esse id
redirect(base_url());

$generoid = $this->pesquisamodel->get_generosbyfilme($idfilme);

$genero = $this->pesquisamodel->get_generosbyid($generoid);
$realizador = $this->pesquisamodel->get_realizadorbyid($query->ID_REALIZADOR);
$produtora = $this->pesquisamodel->get_produtorabyid($query->ID_PRODUTORA);




//echo form_open("user/editar/$iduser");
?>


<script type="text/javascript">
    document.title = "<?= 'BananaMDB - ' . $query->TITULO;?>"
</script>

	<h2><?php  echo $query->TITULO ?></h2>
      <!-- Main hero unit for a primary marketing message or call to action -->
      
      <div class="panel panel-default">
  
  
      
      <div class="col-md-5"><br>
      	<?php echo '<img src="' . base_url() . 'uploads/posters/' . $query->POSTER . '" width="350px" height="auto""></img>';?>
      	
      </div>
      
      </div>
      <div class="col.-md-6">
      	
<div class="control-group" >
	      <label >Realizador - </label>
		  <label class="control-label"><?php echo $realizador;?></label>
</div>

    	
<div class="control-group" >
	      <label class="control-label">Produtora - </label>
		  <label class="control-label"><?php echo $produtora;?></label>
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
	      <?php if( $query->RATING<13)
		  			echo '<span class="label label-success">' .  $query->RATING . '</span>';
				else if( $query->RATING>17)
		  			echo '<span class="label label-danger">' .  $query->RATING . '</span>'; ?>
</div>

<hr>
<iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $query->TRAILER ?>" frameborder="0" allowfullscreen></iframe>


        
      
      

</div>