      
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="<?php echo base_url(); ?>js/chartJS/jquery-2.0.3.min.js"></script>
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
            <li><a href="<?php echo base_url(); ?>estatistica">Estatística</a></li>
            <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">TOP 10<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>chart/topbudget">Mais Caros</a></li>
                  <li><a href="<?php echo base_url(); ?>chart/topprofit">Mais Rentáveis</a></li>
                  <li><a href="<?php echo base_url(); ?>chart/topfilmes">Melhor Classificados</a></li>
                  <li><a href="<?php echo base_url(); ?>chart/topvotos">Mais Votados</a></li>
                  <li><a href="<?php echo base_url(); ?>chart/topgross">Maiores Ganhos</a></li>
                 <!-- <li class="divider"></li>-->
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
          <li style="text-transform:capitalize;"><a href="<?php echo base_url();?>perfil"><?php echo $ID_UTILIZADOR; ?></a></li>   	
          <li class="divider-vertical"></li>
          <li><a href="<?php echo base_url(); ?>login/logout?last_url=<?php echo current_url(); ?>">Logout</a></li>
          
            
          </li>
        </ul>
      </div>
    </nav>