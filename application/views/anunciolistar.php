

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h2>Listagem de Anúncios!</h2>
        
      </div>

    

<table id ="anunciostable" class="table table-striped table-bordered table-condensed">
<tr><td>IDA</td><td>TITULO</td><td>VENDEDOR</td><td>CATEGORIA</td><td>PREÇO</td><td>DATAINICIO</td><td>DATAVENDA</td>
    <td>COMPRADOR</td><td>CLASSIFICAÇÃO</td><td>EDITAR</td></tr>

<?php

foreach ($data as $linha) {
	$this->table->add_row( $linha->IDA,$linha->TITULO,$linha->VENDEDOR,$linha->CATEGORIA,$linha->PRECO,$linha->DATAINICIO,
	$linha->DATAVENDA,$linha->COMPRADOR,$linha->CLASSIFICACAO,
	anchor("anuncio/editar/$linha->IDA",'Editar')    );
	
}
echo $this->table->generate();
?>
</table>      




<div class="hero-unit">
        <h2>Listagem das Descrições e da Imagem Principal dos Anúncios!</h2>
        
      </div>

<table id ="anunciosdesctable" class="table table-striped table-bordered table-condensed">
<tr><td>IDA</td><td>Descrições</td><td>Imagem</td></tr>


<?php
foreach ($data as $linha) {
$desc = html_entity_decode($linha->DESCRICAO);
$this->table->add_row( $linha->IDA,$desc,'<img src="/ci/uploads/' . $linha->IMAGEM . '" width="200px" height="auto""></img>');
}
echo $this->table->generate();
?>


</table>      

