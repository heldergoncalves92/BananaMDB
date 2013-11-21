
    
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>">&raquo;SuperSeller!</a>
          <div class="collapse navbar-collapse">
          	
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo base_url(); ?>">Início</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filmes <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  
                    <li><a href="<?php echo base_url(); ?>title/">Listar Filmes</a></li>
                    <li><a href="<?php echo base_url(); ?>chart/budget">Mais Caros</a></li>
                    <li><a href="<?php echo base_url(); ?>chart/gross">Mais Rentáveis</a></li>
                    <li><a href="<?php echo base_url(); ?>chart/top">TOP 10</a></li>

                  </ul>
                </li>
              <li ><a href="<?php echo base_url(); ?>pesquisa">Pesquisar</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url(); ?>inicio/registo">Registo</a></li>
              <li class="divider-vertical"></li>
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">Login <strong class="caret"></strong></a>
                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <!-- Form do Login  aqui em baixo -->
              
              	     
		<?php
		
			$atopen = array('action'=>'login', 'method'=>'post', 'accept-charset'=>'UTF-8');
			$atuser = array('id'=>'USER',/*'style'=>'margin-bottom: 15px',*/ 'name'=>'USER'/*, 'size'=>'30'*/,'class'=>'form-control');
			$atpass = array('id'=>'PASS',/*'style'=>'margin-bottom: 15px',*/ 'name'=>'PASS'/*, 'size'=>'30'*/,'class'=>'form-control');
			
			
    		
			
			
		//	$atlemb = array('id'=>'LEMB','style'=>'float: left; margin-right: 10px', 'name'=>'PASS', 'size'=>'30','value'=>'1');
			
			//$query = $this->usermodel->login($dados,$attributes);
				
			echo form_open("login",$atuser);
			
			
			
		?>
<!--
            
  <input id="user_username" style="margin-bottom: 15px;" type="text" name="user[username]" size="30" />
  <input id="user_password" style="margin-bottom: 15px;" type="password" name="user[password]" size="30" />
  
  <input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="user[remember_me]" value="1" />
 -->
<?php
echo form_input($atuser);
echo form_password($atpass);
echo validation_errors('<p>','</p>');

 ?>
  <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Entrar" />
<?php
echo form_close();
?>
  </form>
            </div>
          </li>
        </ul><!-- User e Pass na barra
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Entrar</button>
            <ul class="nav pull-right">
              <li class="active nav"><a href="<?php echo base_url(); ?>registo">Registar</a></li>
              </ul
            </form>
          -->
          </div><!--/.navbar-collapse -->
        </div>
      </div>
    </div>
    
