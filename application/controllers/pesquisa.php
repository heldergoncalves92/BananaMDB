<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesquisa extends CI_Controller {
	
	
	public function __construct() 
	{
	parent::__construct();
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->helper('array');
	$this->load->library('form_validation');	
	$this->load->library('session');
	$this->load->library('table');
	//$this->load->library('MY_Form_validation');
	$this->load->model('pesquisas','pesquisamodel');
	$this->load->model('user','usermodel');
	}
	
	
	
	
	public function index (){

		//FILMES
		$filmesquery = $this->pesquisamodel->getfilmesbynome($this->input->post('PESQUISA'));
		$filmespesquisa = $filmesquery->result(); 
		
		//ACTORES
		$actoresquery = $this->pesquisamodel->getactoresbynome($this->input->post('PESQUISA'));
		$actorespesquisa = $actoresquery->result(); 		
						
		//GENEROS
		$generosquery = $this->pesquisamodel->getgenerosbynome($this->input->post('PESQUISA'));
		$generospesquisa = $generosquery->result(); 
		
		//REALIZADORES
		$realizadoresquery = $this->pesquisamodel->getrealizadoresbynome($this->input->post('PESQUISA'));
		$realizadorespesquisa = $realizadoresquery->result(); 
				
		//PRODUTORAS
		$produtorasquery = $this->pesquisamodel->getprodutorasbynome($this->input->post('PESQUISA'));
		$produtoraspesquisa = $produtorasquery->result(); 


			
			
		if($this->input->post('PESQUISA')=='')
			redirect(base_url());
			
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		

		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');

		else
			$this->load->view('navbar_Login');	



		$pesquisa = array ('filmes'=>$filmespesquisa, 'generos'=>$generospesquisa, 'actores'=>$actorespesquisa, 'produtoras'=>$produtoraspesquisa, 'realizadores'=>$realizadorespesquisa);
		$this->load->view('pesquisa.php',$pesquisa);
		$this->load->view('footer');	

	}




public function search(){
        
        $search = $this->input->post('term');
        
        $data['response'] = 'false';
        
        $this->db->select('*');
        $this->db->from('FILMES');
        $this->db->like('TITULO', $search); 
        $locations = $this->db->get()->result();

        
        if(count($locations) > 0){
            $data['message'] = array();
            
            foreach($locations as $location){
               $data['message'][] = array(  'label' => $location->name . ', ' . $location->name . ' ' . $location->name,
                                            'item'  => $location->name,
                                            'value' => $location->name ); 
            }
            
            $data['response'] = 'true';
        }
        echo json_encode($data);       
} 

			
} ?>