
    <div class="container">
<div class="hero-unit">
        <h2>Listagem de dados!</h2>
        
      </div>

<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Tabelas estilo 1</a></li>
    <li><a href="#tab2" data-toggle="tab">Tabelas estilo 2</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <p></p>
      
<table id ="datatables" class="table table-striped table-bordered table-condensed">
<tr><td>Número</td><td>Nome</td><td>D.Nascimento</td></tr>
<?php print_r( $titulo); ?>
</table>      /*
              * tabela normal com os css do bootstrap iniciais
              */
      
    </div>
    <div class="tab-pane" id="tab2">
      <p></p>
      
      
      <style type="text/css">
      	#corpo(background:#f4f4f4; height:500px;)
      	
      </style>
      
      <div id="corpo">
<table  id="tabela1" class="display"  cellpadding="0" cellspacing="0" border="0" >

<thead><tr><th>Número</th><th>Nome</th><th>D.Nascimento</th></tr></thead>
<tbody>
<?php print_r( $titulo); ?>
</tbody>
</table>
      </div>
   
    </div>
  </div>
</div>



