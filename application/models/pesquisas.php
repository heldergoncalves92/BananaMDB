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
		
		public function getfilmesbyano($ano){//Pesquisa por nome e ano
			return $this->db->query("Select f.id_filme,f.titulo, f.ano, f.poster from FILMES f
where f.ano = $ano");
			
		}		

	public function get_filmebyidactor($id=NULL){
			return $this->db->query("SELECT f.*, af.personagem from filmes f, actores_filme af, actores ac WHERE af.id_filme = f.id_filme AND ac.id_actor = af.id_actor AND ac.id_actor = '$id' ORDER BY ANO desc");
			
		}

	public function get_filmebyidrealizador($id=NULL){
			return $this->db->query("SELECT * from filmes f WHERE  f.ID_REALIZADOR = '$id' ORDER BY ANO desc");	
		}

	public function get_filmebyidprodutora($id=NULL){
			return $this->db->query("SELECT * from filmes f WHERE  f.ID_PRODUTORA = '$id' ORDER BY ANO desc");	
		}
	
	public function get_filmebyid($id=NULL){
			$this->db->from('FILMES');
			$this->db->where('ID_FILME',$id);	
			return $this->db->get();
			
		}



	public function get_filmesbygeneroid($id=NULL){
		if($id == null)
				return 0;
		
		return $this->db->query("SELECT f.id_filme,f.titulo, f.ano, f.poster  from lista_generos lg, filmes f where f.id_filme = lg.id_filme AND lg.id_genero = '$id' ORDER BY ANO desc");
			
		}	
	
	
	public function get_topfilmes($id=NULL){
		if($id == null)
				return 0;
		
		return $this->db->query("SELECT f.id_filme,f.titulo, f.ano, f.poster  from lista_generos lg, filmes f where f.id_filme = lg.id_filme AND lg.id_genero = '$id' ORDER BY ANO desc");
			
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

	public function get_generobyid($id=NULL){
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
			//return $this->db->get()->row()->NOME;
			return $this->db->get()->row();
			
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
			return $this->db->get()->row();
			
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
			$dataf = $this->db->query("SELECT a.data_morte FROM ACTORES a where a.id_actor = '$id'")->row()->DATA_MORTE;
			
			if ($dataf=='')
				return $this->db->query("SELECT a.*,idade(to_date(data_nascimento,'dd-mm-yyyy')) as anos FROM ACTORES a where a.id_actor = '$id'");
			else
				return $this->db->query("SELECT a.*,idade2(to_date(data_morte,'dd-mm-yyyy'),to_date(data_nascimento,'dd-mm-yyyy')) as anos FROM ACTORES a where a.id_actor = '$id'");
			
		}		
				
	public function get_actoresbyfilmeid($id=NULL){
		if($id == null)
				return 0;
		
		return $this->db->query("SELECT af.*,ac.imagem,ac.nome,ac.DATA_NASCIMENTO  from actores ac, actores_filme af, filmes f where f.id_filme = af.id_filme AND af.id_actor = ac.id_actor AND f.id_filme = $id ORDER BY NOME desc");
			
		}		
	
	//RATINGS
	
	public function insereRating($idfilme,$iduser,$rating)
	{
		$this->db->query("INSERT INTO tabela_ratings values ( Lista_Ratings_seq.nextval,$idfilme,$iduser,$rating)");
		return NULL;
	}

	
	public function getmediabyidview($id=NULL)
	{
		return $this->db->query("SELECT * from viewratingsfilmes WHERE ID_FILME = $id");
	}
	
	public function getviewratings()
	{
		return $this->db->query("SELECT * from viewratingsfilmes");
	}
	
	public function getviewtopratings()
	{
		return $this->db->query("SELECT * from viewtopratingfilmes");
	}
	
	public function getviewtopvotos()
	{
		return $this->db->query("SELECT * from viewtopvotosfilmes");
	}
		
	public function getviewtopbudget()
	{
		return $this->db->query("SELECT * from viewtopbudgetfilmes");
	}
	
	
	public function getviewtopgross()
	{
		return $this->db->query("SELECT * from viewtopgrossfilmes");
	}
	
	public function getviewtopprofit()
	{
		return $this->db->query("SELECT * from viewtopprofitfilmes");
	}

	public function getvotosfilmebyuser($idfilme, $iduser)
	{
		//if($iduser>0)
			return $this->db->query("Select * from tabela_ratings where id_utilizador=$iduser AND id_filme = $idfilme");
		//else
			//return null;
	}
	
	
}

?>