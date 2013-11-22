      
      <hr>


      <footer>
        <p>&copy; Banana Corp 2013/2014 | 
        	<?php $dia = mktime(date("h")-1,date("i"),date("s"),date("m"),date("d")+0,date("Y"));
			echo " >.> ".date("d/m/Y H:i:s", $dia);?></p>
			
    	<?php
        if ( $this->session->userdata('login_state') == TRUE ) 
     	echo "LOGADO";
	    ?>
		
	
      </footer>

    </div> <!-- feed-block fecha aqui -obrigatorio para todos-->
  </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  </body>
</html>
