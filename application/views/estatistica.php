	
	<link rel="stylesheet" href="<?php echo base_url();?>css/estatistica.css">

		
		 <?php //var_dump($ngeneros);?>

		<div id="feed-block" class="well">
			<div class="block">
				<h2 class="title">Estatísticas</h2>
				<hr>
				<div id="feed-noticias" width='100%'>
					<div class='table big'>
            			<div id="ngeneros" class='cell1' width='100%'></div>
		             	
            		</div>

            		<div class='table'>
            			<div id="n_acessos" class='cell1' width='50%'></div>
		             	<div id="n_registos" class='cell2' width='50%'></div>
            		</div>
            		
            		          	
		        </div>
			</div>



	<script>

		var meses = Array('','Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro')

		$(document).ready(function(){

			var n_acessos =[
				<?php foreach ($acessos as $value) {
					echo "{mes: meses[$value->MES], acessos: $value->ACESSOS },";}?>   
	        ];

	       var n_registos =[
				<?php foreach ($registos as $value) {
					echo "{mes: meses[$value->MES], registos: $value->REGISTOS },";}?>      
	        ];

	        var ngeneros =[
				
			<?php	foreach ($ngeneros as $value) {
					echo "{genero:'$value->NOME', val: $value->PERC },";}?>      
	        ];

			$("#n_acessos").dxChart({
                dataSource: n_acessos,
                commonSeriesSettings: {
                    argumentField: 'mes',
                    type: 'area'
                },
                series: [
                    { valueField: 'acessos', name: 'Nº acessos' }
                ],
                legend: {
                    verticalAlignment: 'bottom',
                    horizontalAlignment: 'center'
                },
                title: {
                    text: 'Número de acessos mensais'
                }
            });

           $("#n_registos").dxChart({
                dataSource: n_registos,
                commonSeriesSettings: {
                    argumentField: 'mes',
                    type: 'area'
                },
                series: [
                    { valueField: 'registos', name: 'Nº registos' }
                ],
                legend: {
                    verticalAlignment: 'bottom',
                    horizontalAlignment: 'center'
                },
                title: {
                    text: 'Número de registos mensais'
                }
            });

           	$("#ngeneros").dxPieChart({
			    dataSource: ngeneros,
			    title: "Percentagem de Filmes por Género",
				tooltip: {
					enabled: true,
					
					percentPrecision: 2,
					
				},
				legend: {
					horizontalAlignment: "right",
					verticalAlignment: "top",
					margin: 0
				},
				series: [{
					type: "doughnut",
					argumentField: "genero",
					label: {
						visible: true,
						
						connector: {
							visible: true
						}
					}
				}]
			});

           
		});
		

	</script>


	