<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class filmes extends CI_Model {//Filmes e Géneros
	
	
	
		public function pesquisa1($nome){//Pesquisa por nome
			return $this->db->query("Select f.* from FILMES f
where UPPER(f.titulo) like UPPER('%$nome%')");
			
		}
		
		public function pesquisa2($nome,$ano){//Pesquisa por nome e ano
			return $this->db->query("Select f.* from FILMES f
where UPPER(f.titulo) like UPPER('%$nome%') and f.ano = '%$ano%");
			
		}
		
		

	
	
	public function get_generos(){
			$this->db->from('GENEROS');
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get();
			
		}

	public function get_get_generosbyid($id=NULL){
			$this->db->from('GENEROS');
			$this->db->where('ID_GENERO',$id);
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get();
			
		}
	
		
		
}

?>