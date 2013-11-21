<div class="container">
    <hr class="">
    <div class="row">
        <div class="col-md-6">
        	<div class="panel panel-default">
  <!-- Default panel contents  -->
  <div class="panel-heading">Filmes</div>


	
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
</div></div></div>


<div class="container">
    <hr class="">
    <div class="row">
        <div class="col-md-6">
        	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Séries</div>

<table>
	
	<td></td><td>0 Resultados porque não fiz search</td>
</table>

</div>
</div></div></div>



<div class="container">
    <hr class="">
    <div class="row">
        <div class="col-md-6">
        	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Realizadores</div>

<table>
	
	<td></td><td>0 Resultados porque ainda não fiz search</td>
</table>

</div>
</div></div></div>




<div class="container">
    <hr class="">
    <div class="row">
        <div class="col-md-6">
        	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Actores</div>

<table>
	
	<td></td><td>0 Resultados porque ainda não fiz search</td>
</table>

</div>
</div></div></div>



<div class="container">
    <hr class="">
    <div class="row">
        <div class="col-md-6">
        	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Géneros</div>

<table>
	
	<td></td><td>0 Resultados porque ainda não fiz search</td>
</table>

</div>
</div></div></div>