
<?php
Class User extends CI_Model
{
	
	
 function login($dados)
 {
   
   $sql="SELECT * from UTILIZADORES where USERNAME='{$dados['USER']}' AND PASSWORD= '{$dados['PASS']}'";
   $query = $this->db->query($sql);

   if($query -> num_rows() == 1)
   {
     return true;
   }
   else
   {
     return false;
   }
 }
 
 
 function setdados($dados,$cookies)
 {
   $user = $dados['USER'];
   $idx = $this->usermodel->getidbyuser($user);
   $sql="UPDATE CISE set ID_UTILIZADOR = '$idx' , USERNAME = '$user' WHERE SESSION_ID='{$cookies}'";
   $query = $this->db->query($sql);
  return true; 
/*
   if($query -> num_rows() == 1)
   {
     return true;
   }
   else
   {
     return false;
   }*/
 }
 
 function getidbyuser($user)
 {

   $sql="SELECT ID_UTILIZADOR from UTILIZADORES WHERE USERNAME='$user'";
   
   if(isset($this->db->query($sql)->row()->ID_UTILIZADOR))
  		return $this->db->query($sql)->row()->ID_UTILIZADOR;
   else
       return 0;
 }
 
 
 function getID_UTILIZADOR($cookies)
 {

   $sql="SELECT ID_UTILIZADOR from CISE WHERE SESSION_ID='$cookies'";
   
   $query = $this->db->query($sql)->row()->IDX;
  return $query; 
 }



function get_user_by_name($name){
	$sql="SELECT * from UTILIZADORES WHERE USERNAME='$name'";

	return $this->db->query($sql);
	
}


function getuser($cookies)
 {

   $sql="SELECT USERNAME from CISE WHERE SESSION_ID='$cookies'";
   
   $query = $this->db->query($sql)->row()->USERNAME;
  if ($query == ' ')
  return FALSE;
  else
  return $query; 
 }

function getDataNbyNome($datan)
 {

   $sql="SELECT DATA_NASCIMENTO from UTILIZADORES WHERE USERNAME='$datan'";
   
   $query = $this->db->query($sql)->row()->DATA_NASCIMENTO;
  if ($query == ' ')
  return -1;
  else
  return $query; 
 }


		public function get_UTILIZADORESseqcurrval(){
			
			return $this->db->query('SELECT UTILIZADORES_seq.currval from dual')->result();
		}
	


public function get_Idadebydata($datan){
			
			return $this->db->query("select idade(to_date('$datan','dd-mm-yyyy')) as idade from dual")->row()->IDADE;
		}
	



	public function db_insert_UTILIZADORES($dados=NULL){
	
		if($dados!=NULL):
			/*$date1=$dados['DNM'];
			$date2=$dados['ES'];
			$this->db->set('DNM',"to_date('$date1','yyyy-mm-dd')",false);
			$this->db->set('ES',"to_date('$date2','yyyy-mm-dd')",false);*/
			//$this->db->insert('UTILIZADORES',$dados);
			$user = $dados['USERNAME'];
			$pass = $dados['PASS'];
			$email = $dados['EMAIL'];
			$datan = $dados['DATANASCIMENTO'];
			$avatar= $dados['AVATAR'];
			
			
			$query = "INSERT INTO UTILIZADORES VALUES (UTILIZADORES_SEQ.nextval,'$user','$email','$pass','$datan', '$avatar')";
			$this->db->query($query);
			$this->session->set_flashdata('registook','Registou-se com Sucesso');
			
		endif;		
	}
	
	
	
	
	public function db_editar_UTILIZADORES($dados=NULL,$condicao=NULL){
	
		if($dados!=NULL&&$condicao!=NULL):
			/*$date1=$dados['DNM'];
			$date2=$dados['ES'];
			$this->db->set('DNM',"to_date('$date1','yyyy-mm-dd')",false);
			$this->db->set('ES',"to_date('$date2','yyyy-mm-dd')",false);*/
			$this->db->update('UTILIZADORES',$dados,$condicao);
			$this->session->set_flashdata('edicaook','Editou com Sucesso');
			redirect(current_url());
		endif;		
	}
	

}

?>

