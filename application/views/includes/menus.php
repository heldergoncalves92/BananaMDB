</head>
  <body>

    
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url(); ?>">&raquo;SuperSeller!</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url(); ?>">Início</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filmes <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  
                  <li><a href="<?php echo base_url(); ?>title/">Listar Filmes</a></li>
                  
                </ul>
              </li>
              <li class="active"><a href="<?php echo base_url(); ?>pesquisa">Pesquisar</a></li>
            </ul>
             <ul class="nav pull-right">
          <li><a href="inicio/registo">Registo</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Login <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <!-- Form do Login  aqui em baixo -->
              
              	     
		<?php
		
			$atopen = array('action'=>'login', 'method'=>'post', 'accept-charset'=>'UTF-8');
			$atuser = array('id'=>'USER','style'=>'margin-bottom: 15px', 'name'=>'USER', 'size'=>'30');
			$atpass = array('id'=>'PASS','style'=>'margin-bottom: 15px', 'name'=>'PASS', 'size'=>'30');
			
			
    		
			
			
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
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
