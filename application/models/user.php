
<?php
Class User extends CI_Model
{
	
	
 function login($dados)
 {
   
   $sql="SELECT * from UTILIZADORES where USERNAME='{$dados['USER']}' AND PASS= '{$dados['PASS']}'";
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
   $sql="UPDATE CISE set IDX = '$idx' , USERNAME = '$user' WHERE SESSION_ID='{$cookies}'";
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

   $sql="SELECT IDX from UTILIZADORES WHERE USERNAME='$user'";
   
   $query = $this->db->query($sql)->row()->IDX;
  return $query; 
 }
 
 
 function getidx($cookies)
 {

   $sql="SELECT IDX from CISE WHERE SESSION_ID='$cookies'";
   
   $query = $this->db->query($sql)->row()->IDX;
  return $query; 
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


}

?>

