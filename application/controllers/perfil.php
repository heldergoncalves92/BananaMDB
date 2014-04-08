
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

		$config['upload_path'] = './uploads/users';
		$config['allowed_types'] = 'jpg|png|gif|jpeg';
		$config['max_size']	= '1024';
		$config['encrypt_name']  = 'TRUE';
		$this->load->library('upload',$config);
	}

	public function  index(){

		$this->load->view("header");
		

		$session_id = $this->session->userdata('session_id');
		$ID_UTILIZADOR = $this->usermodel->getuser($session_id);
		
		if($ID_UTILIZADOR){
			$this->load->view("navbar_Login",array('ID_UTILIZADOR' => $ID_UTILIZADOR));
			$utilizador=$this->usermodel->get_user_by_name($ID_UTILIZADOR)->result();
			$dados = elements(array('PASS_ANT','PASS2','SUBMIT','SUB_AVATAR', 'AVATAR' ), $this->input->post());
			

			if($dados['SUBMIT']){

				$this->form_validation->set_rules('PASS_ANT','Password Actual','trim|required|min_length[6]|max_length[32]');
				$this->form_validation->set_rules('PASS','Password','trim|required|min_length[6]|max_length[32]');
				$this->form_validation->set_message('matches','O campo %s está diferente de %s ');
				$this->form_validation->set_rules('PASS2','Repita a Password','trim|required|max_length[32]|min_length[6]|matches[PASS]|md5');

				if($this->form_validation->run()==TRUE){

					$dados['PASS_ANT']=md5($dados['PASS_ANT']);
					if($dados['PASS_ANT']==$utilizador[0]->PASSWORD){
						$this->load->usermodel->setPassword($utilizador[0]->USERNAME,$dados['PASS2']);
		
						$this->load->view("perfil_login",array('idz' => $utilizador ,'erro' =>' ', 'sucesso'=> 'Dados Alterados com Sucesso!', 'open' => NULL));
					}else
						$this->load->view("perfil_login",array('idz' => $utilizador, 'erro' =>'Password Actual errada!', 'sucesso'=> ' ', 'open' => NULL));
				}else
					$this->load->view('perfil_login',array('idz' => $utilizador ,'erro' =>' ', 'sucesso'=> ' ', 'open' => NULL));
			}else
				if($dados['SUB_AVATAR']){
					if ( ! $this->upload->do_upload('AVATAR')){	
						$this->load->view('perfil_login',array('idz' => $utilizador ,'erro' =>$this->upload->display_errors(), 'su_avatar'=> ' ', 'sucesso'=> ' ', 'open' => '2'));
					}else{	

						$da=$this->upload->data();
						if($utilizador[0]->AVATAR!='default.jpg')
							$bol=unlink('./uploads/users/'.$utilizador[0]->AVATAR);
						$utilizador[0]->AVATAR = $da['file_name'];
						$this->load->usermodel->setAvatar($utilizador[0]->USERNAME,$da['file_name']);
						$this->load->view('perfil_login',array('idz' => $utilizador ,'erro' =>' ','su_avatar'=> 'Avatar Alterado com Sucesso!!', 'sucesso'=> ' ', 'open' => '2'));	
				}

				}else
					$this->load->view('perfil_login',array('idz' => $utilizador ,'erro' =>' ', 'sucesso'=> ' ', 'open' => '1'));
		}
		else{
			$this->load->view("navbar_base");
			$this->load->view("not_session");
		}
		$this->load->view("footer");
	}


	

	function do_upload()
	{
		$config['upload_path'] = './uploads/users';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '600';
		$config['max_height']  = '800';
		$config['encrypt_name']  = 'TRUE';
		

		$this->load->library('upload', $config);

		
	}
}
?>