
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');	
		$this->load->library('session');
		$this->load->model('user','usermodel');
	}

	public function  index(){

		$this->load->view("header");

		$session_id = $this->session->userdata('session_id');
		$idx = $this->usermodel->getuser($session_id);
		
		if($idx){
			$utilizador=$this->usermodel->get_user_by_name($idx);
			var_dump($utilizador);
			$this->load->view("navbar_Login",array('idx' => $idx));
			$this->load->view("perfil_login");
		}
		else{
			$this->load->view("navbar_base");
			$this->load->view("not_session");
		}

		$this->load->view("footer");
		
	}
}
?>