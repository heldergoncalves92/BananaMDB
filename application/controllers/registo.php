s<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registo extends CI_Controller {
	
	
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

		$config['upload_path'] = base_url() .'uploads/users/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']	= '2048';
		$config['remove_spaces']= TRUE;
		$config['overwrite']= TRUE;
		$this->load->library('upload',$config);

	}
	
	
	
	
	public function index (){
		
		$this->load->view('header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		if ($IDUTILIZADOR ==FALSE){
			$this->load->view('navbar_base');

			$this->form_validation->set_message('is_unique','O %s já existe');
			$this->form_validation->set_rules('USERNAME','Username','trim|min_length[5]|required|alpha_numeric|max_length[20]|is_unique[UTILIZADORES.USERNAME]');
			$this->form_validation->set_rules('EMAIL','E-Mail','trim|valid_email|strtolower|required|max_length[32]|is_unique[UTILIZADORES.EMAIL]');
			$this->form_validation->set_rules('PASS','Password','trim|required|min_length[6]|max_length[32]');
			$this->form_validation->set_message('matches','O campo %s está diferente de %s ');
			$this->form_validation->set_rules('PASS2','Repita a Password','trim|required|max_length[32]|min_length[6]|matches[PASS]');
			$this->form_validation->set_rules('DATANASCIMENTO','Data de Nascimento','required|date');
			$this->form_validation->set_message('date', 'Formato é dd-mm-aaaa');
			
			if($this->form_validation->run()==TRUE){

				if ( ! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_errors());	
					
					$this->load->view('registo');

				}else{	

					$dados = elements(array('USERNAME','EMAIL','PASS','DATANASCIMENTO','AVATAR'), $this->input->post());
					var_dump($data);

					//para guardar a senha em MD5
					$dados['PASS']=md5($dados['PASS']);			
					$this->usermodel->db_insert_UTILIZADORES($dados);
					session_start();
					$_SESSION['registado'] = true;
					
					$this->load->view('registo_sucesso');
				}
			}else{
				$erros = array('erro'=>'');
				$this->load->view('registo',$erros);
			}
		}else{
			$this->load->view('navbar_Login',array('ID_UTILIZADOR' => $IDUTILIZADOR));
			$this->load->view('registo_erroLogin');
		}
		$this->upload->display_errors('<p>', '</p>');

		$this->load->view('footer');
		
	}

	
}