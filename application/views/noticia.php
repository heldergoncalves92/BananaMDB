
		
		<link rel="stylesheet" href="<?php echo base_url();?>css/noticia.css">

		<div id="feed-block" class="well">
			<div class="block">
				<h2 class="title"><?php  echo $noticia->TITULO; ?> </h2>
				<hr>
				<div id="feed-noticias">
            		<div class="noticia">

						<?php echo

			                  "<p>[". $noticia->DATA."]</p>
			                  <div class=\"contend\">
			                    <p>".$noticia->SINOPSE ."</p>
			                      <div align=\"center\">
			                        <img  class=\"img-rounded img-noticia\" src=\"". base_url() ."uploads/noticias/". $noticia->IMAGEM ."\">
			                      </div>
			                      <p>". $noticia->CORPO ."
			                      
			                  </div><hr>";
		                
		              
		              ?>
		             <div align='center'>
		             	<iframe width="70%" height="315" src="http://www.youtube.com/embed/<?php  echo $noticia->VIDEO;?>" frameborder='0'></iframe>
		             </div> 
		             
		          	</div>
		        </div>
		      	
		      	
			</div>