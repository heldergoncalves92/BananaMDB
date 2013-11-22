	   <!-- Precisa ter estes includes na Pagina para os DROPDOWN funcionarem -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="<?php echo base_url(); ?>js/jquery-1.8.3.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>


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
            <?php
		
			$atopen = array('class'=>'navbar-form navbar-left','action'=>'pesquisa', 'method'=>'post', 'role'=>'search');
			$pesquisatext= array('class'=>'form-control','placeholder'=>'Procura' ,'name'=>'PESQUISA', 'size'=>'20');
			
			echo form_open("pesquisa",$atopen);
			
		echo"<div class=\"form-group\">";
			echo form_input($pesquisatext);
            echo"</div>"
           ?>
              <button type="submit" class="btn btn-warning">Procurar</button>
            
            
            <?php
			echo form_close();
			?>
          </ul>


		<ul class="nav navbar-nav navbar-right">
          <li><a ><?php  $session_id = $this->session->userdata('session_id');
					 $idx = $this->usermodel->getuser($session_id);
					 echo $idx; ?>  </a></li>   	
          <li class="divider-vertical"></li>
          <li><a href="<?php echo base_url(); ?>login/logout?last_url=<?php echo urlencode(current_url())?>">Logout</a></li>
          
            
          </li>
        </ul>
      </div>
    </nav>