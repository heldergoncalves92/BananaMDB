

	     
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

//echo form_open("inicio/editar/$iduser");
?>



    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2><?php  echo $query->TITULO ?></h2>
      </div>
      <?php
echo "REALIZADOR - " . $realizador . "<p>";
echo "PRODUTORA - " . $produtora . "<p>";
echo "ANO - " . $query->ANO . "<p>";
echo "BUDGET - " . $query->BUDGET . "<p>";
echo "PREMIOS_NOMEADO - " . $query->PREMIOS_NOMEADO . "<p>";
echo "PREMIOS_VENCIDOS - " . $query->PREMIOS_VENCIDOS . "<p>";
echo "RATING - " . $query->RATING . "<p>";
echo "TRAILER - " . $query->TRAILER . "<p>";
echo "POSTER - " . $query->POSTER . "<p>";


?>

</div>