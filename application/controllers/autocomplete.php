<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends CI_Controller {
	
		function __construct(){
		parent::__construct();
		$this->load->model('filmes','get_data');
		}

	function index()
	{
		$this->load->view('autocomplete');
	}

function autocomplete()
{
    
    $query= $this->get_data->get_autocomplete();
    
    foreach($query->result() as $row):
        echo "<li id='$row->ID_FILME'>".$row->TITULO."</li>";
    endforeach;    
} 
} ?>
