<ul class="nav pull-right">
          <li><a ><?php  $session_id = $this->session->userdata('session_id');
					 $idx = $this->usermodel->getuser($session_id);
					 echo $idx; ?>  </a></li>   	
          <li class="divider-vertical"></li>
          <li><a href="<?php echo base_url(); ?>login/logout?last_url=<?php echo urlencode(current_url())?>">Logout</a></li>
          
            
          </li>
        </ul>
             



      </div>




    </nav>