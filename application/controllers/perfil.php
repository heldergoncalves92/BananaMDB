
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
		$ID_UTILIZADOR = $this->usermodel->getuser($session_id);
		
		if($ID_UTILIZADOR){
			$utilizador=$this->usermodel->get_user_by_name($ID_UTILIZADOR)->result();
			//var_dump($utilizador);
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $ID_UTILIZADOR));
			$this->load->view("perfil_login",array('idz' => $utilizador));
		}
		else{
			$this->load->view("navbar_base");
			$this->load->view("not_session");
		}

		$this->load->view("footer");
		
	}

	public function  editar(){

		$this->load->view("header");

		$session_id = $this->session->userdata('session_id');
		$ID_UTILIZADOR = $this->usermodel->getuser($session_id);
		
		if($ID_UTILIZADOR){
			$utilizador=$this->usermodel->get_user_by_name($ID_UTILIZADOR)->result();
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $ID_UTILIZADOR));
			$this->load->view("perfil_editar",array('idz' => $utilizador));
		}
		else{
			$this->load->view("navbar_base");
			$this->load->view("not_session");
		}

		$this->load->view("footer");
		
	}
}
?>