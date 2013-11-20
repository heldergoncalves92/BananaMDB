    
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
        <a class="navbar-brand" href="<?php echo base_url(); ?>">&raquo;BananaMDB</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      
      <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url(); ?>">Início</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filmes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                   <li><a href="<?php echo base_url(); ?>title/">Listar Filmes</a></li>
                  <li><a href="<?php echo base_url(); ?>chart/budget">Mais Caros</a></li>
                  <li><a href="<?php echo base_url(); ?>chart/gross">Mais Rentáveis</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url(); ?>chart/top">TOP 10</a></li>
                </ul>
            </li>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Procura">
              </div>
              <button type="submit" class="btn btn-warning">Procurar</button>
            </form>
          </ul>
<<<<<<< HEAD
          <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Registo</a></li>
              <li class="divider-vertical"></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                   <li id="login">
                    <form  role="form">
                      <input class="form-control" id="focusedInput" type="text" value="Utilizador">
                      <br>
                      <input class="form-control" id="focusedInput" type="text" value="Palavra-Passe">
                      <hr>
                      <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                   </li>
                  </ul>
              </li>
          </ul>
             



      </div>




    </nav>
=======
          
>>>>>>> af0f83974efbcceb601e9a8007d6aff54de5dfb7
