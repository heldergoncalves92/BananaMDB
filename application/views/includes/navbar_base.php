    
    <!-- Precisa ter estes includes na Pagina para os DROPDOWN funcionarem -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://code.jquery.com/jquery.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">&raquo;BananaMDB!</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      
      <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Início</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filmes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Listar Filmes</a></li>
                  <li><a href="#">Mais Caros</a></li>
                  <li><a href="#">Mais Rentáveis</a></li>
                  <li class="divider"></li>
                  <li><a href="#">TOP 10</a></li>
                </ul>
            </li>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Procura">
              </div>
              
            </form>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Registo</a></li>
              <li class="divider-vertical"></li>
          </ul>
             



      </div>




    </nav>