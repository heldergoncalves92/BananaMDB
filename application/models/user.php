
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
   $idx = $this->usermodel->getidxbyuser($user);
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
 
 function getidxbyuser($user)
 {

   $sql="SELECT ID_UTILIZADOR from UTILIZADORES WHERE USERNAME='$user'";
   
   $query = $this->db->query($sql)->row()->IDX;
  return $query; 
 }
 
 
 function getidx($cookies)
 {

   $sql="SELECT ID_UTILIZADOR from CISE WHERE SESSION_ID='$cookies'";
   
   $query = $this->db->query($sql)->row()->IDX;
  return $query; 
 }



function get_user_by_name($name){
	$sql="SELECT USERNAME from CISE WHERE USERNAME='$name'";

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



		public function get_UTILIZADORESseqcurrval(){
			
			return $this->db->query('SELECT UTILIZADORES_seq.currval from dual')->result();
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
			
			$query = "INSERT INTO UTILIZADORES VALUES (UTILIZADORES_SEQ.nextval,'$user','$email','$pass','$datan')";
			$this->db->query($query);
			$this->session->set_flashdata('registook','Registou-se com Sucesso');
			redirect('registo');
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

