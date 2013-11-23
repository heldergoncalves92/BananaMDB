<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class title extends CI_Controller {
	
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');	
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('pesquisas','pesquisamodel');
		$this->load->model('user','usermodel');
	}
	
	
	public function index (){
		
		redirect(base_url());
	}
	

	public function filme (){
			
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');

		else 
			$this->load->view('navbar_Login');	

		$this->load->view('filme.php');
		$this->load->view('footer');
	}
}?>
