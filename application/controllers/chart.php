<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class chart extends CI_Controller {
	
	
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
	



	public function topfilmes (){
			
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		
		$filmes = $this->pesquisamodel->getviewtopratings()->result();
		
		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');

		else 
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $IDUTILIZADOR));	

		$this->load->view('topfilmes.php',array("filmes"=>$filmes));
		$this->load->view('footer');
	}
	

	public function topvotos (){
			
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		
		$filmes = $this->pesquisamodel->getviewtopvotos()->result();
		
		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');

		else 
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $IDUTILIZADOR));	

		$this->load->view('topvotos.php',array("filmes"=>$filmes));
		$this->load->view('footer');
	}	
	
	
	public function topgross (){
			
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		
		$filmes = $this->pesquisamodel->getviewtopgross()->result();
		
		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');

		else 
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $IDUTILIZADOR));	

		$this->load->view('topgross.php',array("filmes"=>$filmes));
		$this->load->view('footer');
	}
	
	public function topbudget (){
			
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		
		$filmes = $this->pesquisamodel->getviewtopbudget()->result();
		
		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');

		else 
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $IDUTILIZADOR));	

		$this->load->view('topbudget.php',array("filmes"=>$filmes));
		$this->load->view('footer');
	}
	
	
	public function topprofit (){
			
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		
		$filmes = $this->pesquisamodel->getviewtopprofit()->result();
		
		if ($IDUTILIZADOR ==FALSE)
			$this->load->view('navbar_base');

		else 
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $IDUTILIZADOR));	

		$this->load->view('topprofit.php',array("filmes"=>$filmes));
		$this->load->view('footer');
	}


}?>
