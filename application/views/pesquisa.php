<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Filmes</div>

<!-- <table class="table table-striped">
-->
	
	<?php
if($data=='0 Resultados')
	echo $data;
else{
foreach ($data as $linha) {
	$this->table->add_row( '<a href=' .   base_url() . 'title/' . $linha->ID_FILME . '><img src="' . base_url() . 'uploads/posters/' . $linha->POSTER . '" width="50px" height="auto""></a>',
	'<a href=' .   base_url() . 'title/' . $linha->ID_FILME . '>' . $linha->TITULO . '</a> (' . $linha->ANO . ') <br> ');
	
}
echo $this->table->generate();}
?>
	


</div>