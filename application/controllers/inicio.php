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
	//$this->load->library('MY_Form_validation');
	$this->load->model('inicio_model','inmodel');
	$this->load->model('user','usermodel');
	}
	
	
	
	
	public function index (){
		
		
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
		$this->load->view('mainpage.php');	
		$this->load->view('includes/footer');	
		
	}
	
	
	
	public function listar (){
		$dados = array (
		'data'=>$this->inmodel->get_users()->result());	
		
		$tbltmpl = array (
        'table_open'          => '<class="table table-striped table-bordered table-condensed">',
        'heading_row_start'   => '<tr>',
        'heading_row_end'     => '</tr>',
        'heading_cell_start'  => '<th>',
        'heading_cell_end'    => '</th>',
        'row_start'           => '<tr>',
        'row_end'             => '</tr>',
        'cell_start'          => '<td>',
        'cell_end'            => '</td>',
        'row_alt_start'       => '<tr>',
        'row_alt_end'         => '</tr>',
        'cell_alt_start'      => '<td>',
        'cell_alt_end'        => '</td>',
        'table_close'         => '</table>'
    );
	$this->table->set_template($tbltmpl);
	
	
		$this->load->view('includes/header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		if ($IDUTILIZADOR ==FALSE)
			{$this->load->view('includes/navbar_base');
			$this->load->view('includes/navbar_direitaLOGIN');	}
		else {
			$this->load->view('includes/navbar_base');	
			$this->load->view('includes/navbar_direitaLOGOUT');	
		}
		
		$this->load->view('listar',$dados);
		$this->load->view('includes/footer');
		
		
	}
	
	
	
	
	public function editar (){
		
		$this->form_validation->set_message('is_unique','O Username %s já existe');
		$this->form_validation->set_rules('USERNAME','Username','trim|required|alpha_numeric|max_length[20]|is_unique[UTILIZADORES.USERNAME]');
		$this->form_validation->set_rules('PASS','Password','trim|required|min_length[6]|max_length[32]');
		
		
		
		if($this->form_validation->run()==TRUE):
			$dados = elements(array('USERNAME','PASS'), $this->input->post());
			//para guardar a senha em MD5
			$dados['PASS']=md5($dados['PASS']);
			$this->inmodel->db_editar_UTILIZADORES($dados,array('EMAIL'=>$this->input->post('emailuser'),'IDUTILIZADOR'=>$this->input->post('iduser')));
		endif;
		
		
		
		
		
		$this->load->view('includes/header');
		$session_id = $this->session->userdata('session_id');
		$IDUTILIZADOR = $this->usermodel->getuser($session_id);
		
		if ($IDUTILIZADOR ==FALSE)
			{$this->load->view('includes/navbar_base');
			$this->load->view('includes/navbar_direitaLOGIN');	}
		else {
			$this->load->view('includes/navbar_base');	
			$this->load->view('includes/navbar_direitaLOGOUT');	
		}
		$this->load->view('editar');
		$this->load->view('includes/footer');
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
	