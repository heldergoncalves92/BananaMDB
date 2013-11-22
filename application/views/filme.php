

	     
<?php

$idfilme = $this->uri->segment(3);


if ($idfilme==NULL)redirect(base_url());//se entra sem id no url vai para pagina principal


$query = $this->filmesmodel->get_filmebyid($idfilme)->row();


if ($query == FALSE)//não existe filme com esse id
redirect(base_url());

$generoid = $this->filmesmodel->get_generosbyfilme($idfilme);

$genero = $this->filmesmodel->get_generosbyid($generoid);
$realizador = $this->filmesmodel->get_realizadorbyid($query->ID_REALIZADOR);
$produtora = $this->filmesmodel->get_produtorabyid($query->ID_PRODUTORA);

//echo form_open("user/editar/$iduser");
?>



    <div class="jumbotron">
	<h2><?php  echo $query->TITULO ?></h2>
      <!-- Main hero unit for a primary marketing message or call to action -->
      
      <div class="panel panel-default">
  
  
      
      <div class="col-md-5">
      	<?php echo '<img src="' . base_url() . 'uploads/posters/' . $query->POSTER . '" width="400px" height="auto""></img>';?>
      	
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
	      <label class="control-label">GROSS - </label>
		  <label class="control-label"><?php echo $query->GROSS;?></label>
</div>

<div class="control-group" >
	      <label class="control-label">BUDGET - </label>
		  <label class="control-label"><?php echo $query->BUDGET;?></label>
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
		  <label class="control-label"><?php echo $query->RATING;?></label>
</div>


<iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $query->TRAILER ?>" frameborder="0" allowfullscreen></iframe>


        
      </div>
      
      
      

</div>
