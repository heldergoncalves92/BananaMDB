
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');	
		$this->load->library('session');
		$this->load->model('user','usermodel');
	}


	public function  logout(){
		$this->session->sess_destroy();
		redirect(base_url());
		//redirect($this->input->get('last_url'));
	}
 

	public function  index(){

		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$ID_UTILIZADOR = $this->usermodel->getuser($session_id);
		$ultimo = $this->session->userdata('ultimo');
		
		if ($ID_UTILIZADOR !=FALSE)
		redirect($ultimo);

		$erros = array('erro'=>'');

		//validação do form
		//trim »»» limpa espaços

		//$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		$this->form_validation->set_rules('USER','Username','trim|min_length[5]|required|alpha_numeric|max_length[20]');
		$this->form_validation->set_rules('PASS','Password','required|max_length[32]');


		/*$this->form_validation->set_rules('CP','CP','required');
		$this->form_validation->set_rules('L','L','required');*/

		if($this->form_validation->run()==TRUE){
			$dados = elements(array('USER','PASS'), $this->input->post());
			//para guardar a senha em MD5
			$dados['PASS']=md5($dados['PASS']);

			$resultado = $this->usermodel->login($dados);


			//$sql="SELECT * from UTILIZADORES where USERNAME='{$dados['USERNAME']}' AND PASS= '{$dados['PASS']}'";
			//$query = $this->db->query($sql);
			//$row = $query->num_rows();


			if ($resultado == true){
				$this->session->set_userdata('login_state', TRUE);
				$SShash = uniqid($this->input->ip_address(), TRUE);

				$this->session->set_userdata("SShash", md5($SShash));
				$SShash = $this->session->userdata('SShash');
				//   echo $SShash; echo ' <- sshash cookie | ';
				$sessid = $this->session->userdata('session_id');
				//	   echo $sessid; echo ' <- sessid cookie | ';

				$this->usermodel->setdados($dados,$sessid);

				$ID_UTILIZADOR = $this->usermodel->getID_UTILIZADOR($sessid);
				//		   echo $ID_UTILIZADOR.' <- id| ';
				$user = $this->usermodel->getuser($sessid);
				
				
				
				$this->usermodel->incstat($ID_UTILIZADOR);
				
				//			   echo $user.' <- user| ';
				$erros = array('erro'=>'');
				redirect(current_url());
				//		echo ' | validou no form | ';
			}
			else
				$erros = array('erro'=>'Username e/ou Password errada');

		}

		$this->load->view('navbar_base');
		$this->load->view('login',$erros);
		$this->load->view('footer');

	}
}
?>

