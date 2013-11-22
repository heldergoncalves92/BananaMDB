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
	$this->load->model('filmes','filmesmodel');
	$this->load->model('user','usermodel');
	}
	
	
	
	
	public function index (){

		$pesquisaquery = $this->filmesmodel->pesquisa1($this->input->post('PESQUISA'));
		$pesquisa = $anuncios = array ('data'=>$pesquisaquery->result());
		$quantos = $pesquisaquery->num_rows();
		$dadospesqisa = array ('data'=>$pesquisa);	
			
			
			
		if($this->input->post('PESQUISA')=='')
			redirect(base_url());
			
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		

		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');

		else
			$this->load->view('navbar_Login');	


		if($quantos==0)
			$pesquisa=array ('data'=>'0 Resultados');
		
		$this->load->view('pesquisa.php',$pesquisa);
		$this->load->view('footer');	

	}
		public function pe(){
			
			
			$this->load->view('xml.html');
		}
			public function auto(){
			
			
			$this->load->view('london.xml');
		}
			
			
} ?>