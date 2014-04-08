<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	
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
	$this->load->model('user','usermodel');
	$this->load->model('noticias','notmodel');
	}
	
	public function index (){
		
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');
			
		else
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $IDUTILIZADOR));
		
		$feed=$this->notmodel->get_FeedNoticias();
		$this->load->view('mainpage.php',array('feed'=>$feed['feed'],'pages' => $feed['pages'], 'n_pag'=> 1));
		$this->load->view('footer');	
		
	}

	public function page($n_page=0){

		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');
		else
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $IDUTILIZADOR));
		
		if($n_page<=1){
			$feed=$this->notmodel->get_FeedNoticias();
			$this->load->view('mainpage.php',array('feed'=>$feed['feed'],'pages' => $feed['pages'], 'n_pag'=> 1));	
		}
		else{
			$feed=$this->notmodel->get_FeedNoticias($n_page-1);
			$this->load->view('mainpage.php',array('feed'=>$feed['feed'],'pages' => $feed['pages'], 'n_pag'=> $n_page));	
		}
		$this->load->view('footer');
	}

}?>
	