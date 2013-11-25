<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesquisas extends CI_Model {
	
	
	//  FILMES
	
		public function getfilmesbynome($nome){//Pesquisa por nome .
			return $this->db->query("Select f.* from FILMES f
where UPPER(f.titulo) like UPPER('%$nome%')"); 
			
		}
		
		public function getfilmesbynomeano($nome,$ano){//Pesquisa por nome e ano
			return $this->db->query("Select f.* from FILMES f
where UPPER(f.titulo) like UPPER('%$nome%') and f.ano = '%$ano%");
			
		}
		
		

	public function get_filmebyidactor($id=NULL){
			return $this->db->query("SELECT f.*, af.personagem from filmes f, actores_filme af, actores ac WHERE af.id_filme = f.id_filme AND ac.id_actor = af.id_actor AND ac.id_actor = '$id' ORDER BY ANO desc");
			
		}
	
	public function get_filmebyid($id=NULL){
			$this->db->from('FILMES');
			$this->db->where('ID_FILME',$id);	
			return $this->db->get();
			
		}

	
	
	// GENEROS
	
	
	
	public function getgenerosbynome($nome){//Pesquisa por nome .
			return $this->db->query("Select f.* from GENEROS f
where UPPER(f.NOME) like UPPER('%$nome%')"); 
			
		}
	
	
	
	public function get_generosbyfilme($id=NULL){
			if ($id!=NULL):
				$sql="SELECT gen.* from LISTA_GENEROS lg, generos gen WHERE lg.ID_FILME = $id AND lg.id_genero = gen.id_genero";
				$this->db->query($sql);
				return $this->db->query($sql);
				
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
			return $this->db->get();
			
		}
	
		
		//   REALIZADORES
		
		
		

	public function getrealizadoresbynome($nome){//Pesquisa por nome .
			return $this->db->query("Select f.* from REALIZADORES f
where UPPER(f.NOME) like UPPER('%$nome%')"); 
			
		}
		
	public function get_realizadorbyid($id=NULL){
			if($id == null)
				return 0;
			$this->db->from('REALIZADORES');
			$this->db->where('ID_REALIZADOR',$id);
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get()->row()->NOME;
			
		}
		
	public function get_realizadorLbyid($id=NULL){
			if($id == null)
				return 0;
			$this->db->from('REALIZADORES');
			$this->db->where('ID_REALIZADOR',$id);
			return $this->db->get();
			
		}		
		
		
		//  PRODUTORAS
		

	public function getprodutorasbynome($nome){//Pesquisa por nome .
			return $this->db->query("Select f.* from PRODUTORAS f
where UPPER(f.NOME) like UPPER('%$nome%')"); 
			
		}		
	
	
	public function get_produtorabyid($id=NULL){
		if($id == null)
				return 0;
			$this->db->from('PRODUTORAS');
			$this->db->where('ID_PRODUTORA',$id);
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get()->row()->NOME;
			
		}		
		
	public function get_produtoraLbyid($id=NULL){
		if($id == null)
				return 0;
			$this->db->from('PRODUTORAS');
			$this->db->where('ID_PRODUTORA',$id);
			return $this->db->get();
			
		}		
	
	
		//  ACTORES
		

	public function getactoresbynome($nome){//Pesquisa por nome .
			return $this->db->query("Select f.* from ACTORES f
where UPPER(f.NOME) like UPPER('%$nome%')"); 
			
		}		
	public function get_actornomebyid($id=NULL){
		if($id == null)
				return 0;
			$this->db->from('ACTORES');
			$this->db->where('ID_ACTOR',$id);
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get()->row()->NOME;
			
		}			
	public function get_actorbyid($id=NULL){
		if($id == null)
				return 0;
			$this->db->from('ACTORES');
			$this->db->where('ID_ACTOR',$id);
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get();
			
		}		
				
	public function get_actoresbyfilmeid($id=NULL){
		if($id == null)
				return 0;
		
		return $this->db->query("SELECT af.*,ac.imagem,ac.nome,ac.DATA_NASCIMENTO  from actores ac, actores_filme af, filmes f where f.id_filme = af.id_filme AND af.id_actor = ac.id_actor AND f.id_filme = $id ORDER BY NOME desc");
			
		}		

		
}

?>