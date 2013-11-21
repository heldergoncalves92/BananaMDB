<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class filmes extends CI_Model {//Filmes e Géneros
	
	
	
		public function pesquisa1($nome){//Pesquisa por nome .
			return $this->db->query("Select f.* from FILMES f
where UPPER(f.titulo) like UPPER('%$nome%')"); 
			
		}
		
		public function pesquisa2($nome,$ano){//Pesquisa por nome e ano
			return $this->db->query("Select f.* from FILMES f
where UPPER(f.titulo) like UPPER('%$nome%') and f.ano = '%$ano%");
			
		}
		
		

	
	public function get_filmebyid($id=NULL){
			$this->db->from('FILMES');
			$this->db->where('ID_FILME',$id);	
			return $this->db->get();
			
		}

	
	
	public function get_generosbyfilme($id=NULL){
			if ($id!=NULL):
				$sql="SELECT ID_GENERO from LISTA_GENEROS WHERE ID_FILME = '$id'";
				$this->db->query($sql);
				$val = $this->db->query($sql)->row()->ID_GENERO;
				return $val;
		else:
			return FALSE;
			
		endif;
			
		}
	
	public function get_generos(){
			$this->db->from('GENEROS');
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get();
			
		}

	public function get_generosbyid($id=NULL){
			$this->db->from('GENEROS');
			$this->db->where('ID_GENERO',$id);
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get()->row()->NOME;
			
		}
	
		
		
		
	public function get_realizadorbyid($id=NULL){
			$this->db->from('REALIZADORES');
			$this->db->where('ID_REALIZADOR',$id);
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get()->row()->NOME;
			
		}		
		
	public function get_produtorabyid($id=NULL){
			$this->db->from('PRODUTORAS');
			$this->db->where('ID_PRODUTORA',$id);
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get()->row()->NOME;
			
		}		
		
		
		
		
		
		
		
}

?>