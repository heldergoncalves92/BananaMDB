

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h2>Listagem de dados!</h2>
        
      </div>

    

<table id ="userstable" class="table table-striped table-bordered table-condensed">
<tr><td>ID</td><td>Username</td><td>E-MAIL</td><td>CLASSIFICACAO</td><td>NEGOCIOS</td><td>PASS</td><td>OPERAÇÕES</td></tr>

<?php

foreach ($data as $linha) {
	$this->table->add_row( $linha->IDX,$linha->USERNAME,$linha->EMAIL,$linha->CLASSIF,$linha->NEGOC,$linha->PASS,
	anchor("inicio/editar/$linha->IDX",'Editar').' - '.anchor("inicio/apagar/$linha->IDX",'Apagar')    );
}


echo $this->table->generate();


?>



</table>      
