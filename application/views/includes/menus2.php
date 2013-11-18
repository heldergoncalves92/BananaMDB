
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Anúncios <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>anuncio/criar">Criar Anúncio</a></li>
                  <li><a href="<?php echo base_url(); ?>anuncio/listar">Listar Anúncios</a></li>
                  
                </ul>
              </li>
              <li class="active"><a href="<?php echo base_url(); ?>pesquisa">Pesquisar</a></li>
            </ul>
             <ul class="nav pull-right">
          <li><a ><?php  $session_id = $this->session->userdata('session_id');
					 $idx = $this->usermodel->getuser($session_id);
					 echo $idx; ?>  </a></li>   	
          <li class="divider-vertical"></li>
          <li><a href="<?php echo base_url(); ?>login/logout?last_url=<?php echo urlencode(current_url())?>">Logout</a></li>
          
            
          </li>
        </ul>
        </div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

