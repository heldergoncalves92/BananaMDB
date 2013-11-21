<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class title extends CI_Controller {
	
	
	public function __construct() 
	{
	parent::__construct();
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->helper('array');
	$this->load->helper('form');
	$this->load->library('form_validation');	
	$this->load->library('session');
	$this->load->library('table');
	//$this->load->library('MY_Form_validation');
	$this->load->model('filmes','filmesmodel');
	$this->load->model('user','usermodel');
	}
	
	
	public function index (){
		
		redirect(base_url());
	}
	
	
	
	public function filme (){
		
		
			
			
		$this->load->view('includes/header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		if ($IDUTILIZADOR ==FALSE){
			$this->load->view('includes/navbar_base');
			$this->load->view('includes/navbar_direitaLOGIN');	
		}
		else {
			$this->load->view('includes/navbar_base');	
			$this->load->view('includes/navbar_direitaLOGOUT');	
		}


		$this->load->view('filme.php');
		$this->load->view('includes/footer');
		


	}
	
	
	
	
}