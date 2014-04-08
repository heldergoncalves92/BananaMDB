    
   
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
             <li><a href="<?php echo base_url(); ?>registo">Registo</a></li>
             <li class="divider-vertical"></li>
              
             <li class="dropdown"> 
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">Login <strong class="caret"></strong></a>

                  <div class="dropdown-menu" style="padding:10px;min-width:240px;">

                  
                  <?php
    
                    $atopen = array('action'=>'login', 'method'=>'post', 'accept-charset'=>'UTF-8','role'=>'form');
                    $atuser = array('id'=>'USER','style'=>'margin-bottom:.5em','class'=>'form-control','placeholder'=>'USERNAME' ,'name'=>'USER', 'size'=>'30');
                    $atpass = array('id'=>'PASS','style'=>'margin-bottom:.5em', 'class'=>'form-control','placeholder'=>'PASSWORD' ,'name'=>'PASS', 'size'=>'30');
  
                    //  $atlemb = array('id'=>'LEMB','style'=>'float: left; margin-right: 10px', 'name'=>'PASS', 'size'=>'30','value'=>'1'); 
                    //$query = $this->usermodel->login($dados,$attributes);
                      
                    echo form_open("login",$atopen);   
                  
                    echo form_input($atuser);
                    echo form_password($atpass);
                    
                    echo validation_errors('<p>','</p>');
                    
                     ?>
                    <input class="btn btn-primary" style="margin-top:.75em;width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Entrar" />
                    <?php echo form_close();?>

                  
                  </div>
            </li>    
          </ul>
      </div>
  </nav>



    
