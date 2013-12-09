
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main_page.css">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 

    <!-- - - - - - -Carosel - - - - - - -->

   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div align="middle" class="carousel-inner">
      <div class="item active">
        <a href="#"><img id="carrosel" src="<?php echo base_url(); ?>img/Tron.jpg" ></a>
        <div class="carousel-caption">
         	<h1>TRON</h1>
        </div>
      </div>


       <div class="item">
        <img id="carrosel" src="<?php echo base_url(); ?>img/Hangover.jpg" >
        <div class="carousel-caption">
         
        </div>
      </div>

      <div  class="item">
      	<a href="title/filme/2">
        <img id="carrosel" src="<?php echo base_url(); ?>img/hobbit.jpg" ></a>
        <div class="carousel-caption">
         
        </div>
      </div>
    </div>
  

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
 </div>

    <!-- - - - - Noticias - - - - - -->
    <div id="feed-block" class="well ident">
      <h2><b>Notícias</b></h2>
      <hr>
      <div id="feed"> 
        <div id="feed-noticias">
            <div class="noticia">


              <?php 

              foreach ($feed as $value) {

                echo

                  "<div class=\"title\"><a class='l_noticia' href='#'><h3>". $value->TITULO ."</h3></a></div>
                  <p>[". $value->DATA."]</p>
                  <div class=\"contend\">
                    <p>".$value->SINOPSE ."</p>
                      <div align=\"center\">
                        <img  class=\"img-rounded img-feed\" src=\"". base_url() ."uploads/noticias/". $value->IMAGEM ."\">
                      </div>
                      
                  </div><hr>";
                
              }
              ?>
            </div>
            <div id='pagination' align='center'>
              <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class='active'><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
        </div>



        <div align="center" id="tops">
          <!-- - - - - - -Cinema de hoje - - - - - - -->
          <h4 class="title" align="center">Nos Cinemas</h4>
          <div id="tab-cin">
            <div id="cell-cin1">
              <div class="top-cin">
                <img id="S_today" class="img-rounded" src="<?php echo base_url(); ?>img/carrie.jpg" >
                <p>Carrie</p>
              </div>
              <div class="top-cin">
                <img id="S_today" class="img-rounded" src="<?php echo base_url(); ?>img/escape.jpg" >
                <p>Plano de Fuga</p>
              </div>
              
            </div>
            <div id="cell-cin2">
              <div class="top-cin">
                <img id="S_today" class="img-rounded" src="<?php echo base_url(); ?>img/thor.jpg" >
                <p>Thor 2</p>
              </div>
              <div class="top-cin">
                <img id="S_today" class="img-rounded" src="<?php echo base_url(); ?>img/moster.jpg" >
                <p>Mostros</p>
              </div>
            </div>
          </div>

          <h2>Mais cenas que nos apeteça meter!!</h2>

        </div>
      </div>


