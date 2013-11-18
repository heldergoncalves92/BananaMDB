<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio_model extends CI_Model {
	
	

	
		public function get_userxpseqcurrval(){
			
			return $this->db->query('SELECT userxp_seq.currval from dual')->result();
		}
	
	
	public function get_categorias(){
			$this->db->from('CATEGORIAS');
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get();
			
		}

	public function get_catbyid($id=NULL){
			$this->db->from('CATEGORIAS');
			$this->db->where('categoria',$id);
			//$this->db->order_by("NOME", "asc");	
			return $this->db->get();
			
		}
	
		public function get_users(){
			$this->db->from('USERXP');
			$this->db->order_by("IDX", "asc");
			return $this->db->get();
			
		}
		



		public function checkminhaspropostas($id=NULL){
			
			
			return $this->db->query("SELECT p.* from propostas_troca p, anuncios a WHERE a.vendedor=$id AND p.id1=a.ida")->result();  
		}
		
		
		
		public function checkvendatroca($id=NULL){
			
			
			return $this->db->query("SELECT v.* from VENDAS v WHERE v.idv = $id")->row();  
		}
		
		

		public function getadsdispuser($id=NULL){
			
			
			return $this->db->query('SELECT * from ANUNCIOS WHERE
DATAVENDA IS  NULL')->result();  
		}
		
		
		public function get_anuncios(){
			$this->db->from('ANUNCIOS');
			$this->db->order_by("IDA", "asc");
			return $this->db->get();  
		}
	
	public function get_byidd($id=NULL)
	{
		if ($id!=NULL):

		$this->db->where('IDX',$id);
		//$this->db->limit(1);
		return $this->db->get('USERXP');
		else:
			return FALSE;
			
		endif;
	}
	
	
	public function get_byvend($id=NULL)
	{
		if ($id!=NULL):

		$this->db->where('VENDEDOR',$id);
		//$this->db->limit(1);
		return $this->db->get('ANUNCIOS');
		else:
			return FALSE;
			
		endif;
	}





	public function acabouida($id=NULL,$leilao)
	{
		
		if ($leilao!=0):
		$sql="SELECT timestamp_diff (current_timestamp, data_fim) AS TEMPO FROM LEILOES WHERE IDL=$id";
		$val = $this->db->query($sql)->row()->TEMPO;
		
		
		return (substr_count((string)$val, '-'));
		else:
			return 100;
			
		endif;
	}


	public function get_byida($id=NULL)
	{
		if ($id!=NULL):

		$this->db->where('IDA',$id);
		//$this->db->limit(1);
		return $this->db->get('ANUNCIOS');
		else:
			return FALSE;
			
		endif;
	}
	
	
	public function get_idabytitulo($nome=NULL)
	{
		if ($nome!=NULL):
		$sql="SELECT IDA from ANUNCIOS WHERE TITULO = '$nome'";
		$this->db->query($sql);
		$val = $this->db->query($sql)->row()->IDA;
		return $val;
		else:
			return FALSE;
			
		endif;
	}
	

	public function get_leilaobyida($id=NULL)
	{
		if ($id!=NULL):

		$this->db->where('IDL',$id);
		//$this->db->limit(1);
		return $this->db->get('Leiloes');
		else:
			return FALSE;
			
		endif;
	}
	
	public function get_vendabyida($id=NULL)
	{
		if ($id!=NULL):

		$this->db->where('IDV',$id);
		//$this->db->limit(1);
		return $this->db->get('Vendas');
		else:
			return FALSE;
			
		endif;
	}
	
	
	public function db_insert_userxp($dados=NULL){
	
		if($dados!=NULL):
			/*$date1=$dados['DNM'];
			$date2=$dados['ES'];
			$this->db->set('DNM',"to_date('$date1','yyyy-mm-dd')",false);
			$this->db->set('ES',"to_date('$date2','yyyy-mm-dd')",false);*/
			//$this->db->insert('USERXP',$dados);
			$user = $dados['USERNAME'];
			$pass = $dados['PASS'];
			$email = $dados['EMAIL'];
			
			$query = "INSERT INTO userxp VALUES (userxp_seq.nextval,'$user',0,0,'$email','$pass')";
			$this->db->query($query);
			$this->session->set_flashdata('registook','Registou-se com Sucesso');
			redirect('inicio/registo');
		endif;		
	}
	
		public function db_insert_anuncio($dadosfinal=NULL){
	
		if($dadosfinal!=NULL):
			/*$date1=$dados['DNM'];
			$date2=$dados['ES'];
			$this->db->set('DNM',"to_date('$date1','yyyy-mm-dd')",false);
			$this->db->set('ES',"to_date('$date2','yyyy-mm-dd')",false);*/
			
			
			$atit = $dadosfinal['TITULO'];
			$ades = $dadosfinal['DESCRICAO'];
			$acat = $dadosfinal['CATEGORIA'];
			$apre = (float)$dadosfinal['PRECO'];
			$adat = $dadosfinal['DATAINICIO'];
			$aven = $dadosfinal['VENDEDOR'];
			$aimg = $dadosfinal['IMAGEM'];
			$alic = (float)$dadosfinal['licitacao_minima'];
			$atro = (bool)$dadosfinal['aceita_troca'];
			$afim = $dadosfinal['data_fim'];
			$leilao = (bool)$dadosfinal['leilao'];
			//anuncio
			$aida = $query = "INSERT INTO anuncios VALUES (anuncios_seq.nextval,'$atit','$ades','$aven','$acat',$apre,unixts_to_oraclets($adat),NULL,NULL,NULL,'$aimg')";
			$this->db->query($query);
			
			//leilao
			if($leilao==TRUE){
			$aida = $query = "INSERT INTO leiloes VALUES (anuncios_seq.currval,$alic,unixts_to_oraclets($afim))";
			$this->db->query($query);}
			else{
			//venda
			$aida = $query = "INSERT INTO vendas VALUES (anuncios_seq.currval,'$atro')";
			$this->db->query($query);
			}
			
			$this->session->set_flashdata('anunciook','Inseriu Anuncio com Sucesso');
			
		endif;		
	}
		
		
		public function db_editar_anuncio($dados=NULL,$condicao=NULL){
	
		if($dados!=NULL):
			/*$date1=$dados['DNM'];
			$date2=$dados['ES'];
			$this->db->set('DNM',"to_date('$date1','yyyy-mm-dd')",false);
			$this->db->set('ES',"to_date('$date2','yyyy-mm-dd')",false);*/
			$this->db->update('ANUNCIOS',$dados,$condicao);
			$this->session->set_flashdata('edicaook','Editou com Sucesso');
			
		endif;		
	}
	
	
	public function db_editar_userxp($dados=NULL,$condicao=NULL){
	
		if($dados!=NULL&&$condicao!=NULL):
			/*$date1=$dados['DNM'];
			$date2=$dados['ES'];
			$this->db->set('DNM',"to_date('$date1','yyyy-mm-dd')",false);
			$this->db->set('ES',"to_date('$date2','yyyy-mm-dd')",false);*/
			$this->db->update('USERXP',$dados,$condicao);
			$this->session->set_flashdata('edicaook','Editou com Sucesso');
			redirect(current_url());
		endif;		
	}



		
		function _createWatermark($fileName) { 
		$config['image_library'] = 'gd2'; 
		//$config['source_image'] = base_url() . 'uploads/' . $fileName;
		$config['source_image'] = 'C:/xampp/htdocs/ci/uploads/' . $fileName;  
		$config['wm_text'] = '»SuperSeller!'; 
		$config['wm_type'] = 'text'; 
		$config['wm_font_path'] = 'C:/xampp/htdocs/ci/uploads/arialrb.ttf'; 
		$config['wm_font_size'] = '16'; 
		$config['wm_font_color'] = '#ff2052'; 
		$config['wm_vrt_alignment'] = 'center'; 
		$config['wm_hor_alignment'] = 'center'; 
		$config['wm_padding'] = '20'; 
		
		$this->image_lib->initialize($config); 
		echo $config['source_image'];
		if(!$this->image_lib->watermark()) 
		echo $this->image_lib->display_errors(); 
		} 
		
		
		
		public function pesquisa($nome,$min,$max,$cat){
			return $this->db->query("Select a.* from anuncios a, categorias c
where c.categoria=a.categoria and c.categoria='$cat' and UPPER(a.titulo) like UPPER('%$nome%') and a.preco>$min and a.preco<$max");
			
		}
		
		public function pesquisa1($nome,$min,$max){
			return $this->db->query("Select a.* from anuncios a
where UPPER(a.titulo) like UPPER('%$nome%') and a.preco>$min and a.preco<$max");
			
		}



	
}	
		
