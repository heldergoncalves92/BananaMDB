<div id="feed-block" class="well">


<?php

if ($this->session->flashdata('registook')):
	echo'<p>'.$this->session->flashdata('registook').'</p>';
	
endif




?>




  <div class="container">
	
  <div class="row">
	
	
  <div class="span8">
	
	<form class="form-horizontal"  method='post' action=''>
	  <fieldset>
	    <legend>Registo</legend>
	    
	    
	
	    
	
	     
<?php

echo form_open('Registo','');?>

 <div class="alert alert-danger">      
<?php

echo validation_errors('<p>','</p>');
?>

</div>
<div class="control-group">
	      <label class="control-label" for="input01">Username</label>
<div class="controls">

<?php

echo form_input(array('name'=>'USERNAME','style'=>'margin-bottom:.5em;width:20%','class'=>'form-control','placeholder'=>'USERNAME'),set_value('USERNAME'),'autofocus');?>
</div></div>




<div class="control-group">
	      <label class="control-label" for="input01">E-Mail</label>
<div class="controls">

<?php

echo form_input(array('name'=>'EMAIL','style'=>'margin-bottom:.5em;width:20%','class'=>'form-control','placeholder'=>'E-MAIL'),set_value('EMAIL'));?>
</div></div>



<div class="control-group">
	      <label class="control-label" for="input01">Data de Nascimento</label>
<div class="controls">

<?php

echo form_input(array('name'=>'DATANASCIMENTO','style'=>'margin-bottom:.5em;width:20%','class'=>'form-control','placeholder'=>'DATA'),set_value('DATANASCIMENTO'));?>
</div></div>



<div class="control-group">
	      <label class="control-label" for="input01">Password</label>
<div class="controls">

<?php

echo form_password(array('name'=>'PASS','style'=>'margin-bottom:.5em;width:20%','class'=>'form-control','placeholder'=>'PASSWORD'),set_value('PASS'));?>
</div></div>



<div class="control-group">
	      <label class="control-label" for="input01">Repita a Password</label>
<div class="controls">
	
<?php

echo form_password(array('name'=>'PASS2','style'=>'margin-bottom:.5em;width:20%','class'=>'form-control','placeholder'=>'REPITA A PASSWORD'),set_value('PASS2')); ?>

</div></div>
	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	      	
	      	
	      	

<?php


$attributes = 'class = "btn btn-success"';
echo form_submit('submit', 'Registar', $attributes); 
echo form_close();?>

</div></div>



	    
	<!-- //ComboBox
	 <div class="control-group">
		<label class="control-label" for="input01">Especialidade</label>
	      <div class="controls">
	        <select name="gender" id="gender" >
            				<option value="OFT">OFT</option>
			                <option value="CARD">CARD</option>
			                <option value="CG">CG</option>
			
			               
			              </select>
	       
	      </div>
	
	</div> -->
	
	
	   
	  </fieldset>
	</form>
	</div>
	
		</div>
        
        
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->



