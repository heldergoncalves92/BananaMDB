<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class estatistica extends CI_Controller {
	
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');	
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('user','usermodel');
		$this->load->model('estatisticas','estmodel');
	}
	
	
	public function index (){
		
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');
			
		else
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $IDUTILIZADOR));

		$acessos=$this->estmodel->get_acessos();

		$registos=$this->estmodel->get_registos();

		$ngeneros=$this->estmodel->get_ngeneros();

		$fetarias=$this->estmodel->get_fetarias();
		//var_dump($ngeneros);

		
		$this->load->view('estatistica', array('acessos' =>$acessos, 'registos'=>$registos,'ngeneros'=> $ngeneros,'fetarias'=>$fetarias));
		$this->load->view('footer');	

	}
}