<ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url(); ?>inicio/registo">Registo</a></li>
              <li class="divider-vertical"></li>
              
              <li class="dropdown"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">Login <strong class="caret"></strong></a>

                    <div class="dropdown-menu" style="padding: 10px;min-width:240px;">

                  
                  <?php
		
			$atopen = array('action'=>'login', 'method'=>'post', 'accept-charset'=>'UTF-8','role'=>'form');
			$atuser = array('id'=>'USER','style'=>'margin-bottom:.5em','class'=>'form-control','placeholder'=>'USERNAME' ,'name'=>'USER', 'size'=>'30');
			$atpass = array('id'=>'PASS','style'=>'margin-bottom:.5em', 'class'=>'form-control','placeholder'=>'PASSWORD' ,'name'=>'PASS', 'size'=>'30');
			
			
    		
			
			
		//	$atlemb = array('id'=>'LEMB','style'=>'float: left; margin-right: 10px', 'name'=>'PASS', 'size'=>'30','value'=>'1');
			
			//$query = $this->usermodel->login($dados,$attributes);
				
			echo form_open("login",$atopen);
			
		
			echo form_input($atuser);
			echo form_password($atpass);
			
			echo validation_errors('<p>','</p>');
			
			 ?>
  					<input class="btn btn-primary" style="margin-top:.75em;width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Entrar" />
			<?php
			echo form_close();
			?>

                  
                  </div>
       	 	</li>    
          </ul>
      </div>
	</nav>


