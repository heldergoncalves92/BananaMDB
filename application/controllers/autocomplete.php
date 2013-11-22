<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends CI_Controller {

	function index()
	{
		$this->load->view('autocomplete');
	}

	function suggestions()
	{
		// Search term from jQuery
		$term = $this->input->post('term');

		// Do mysql query or what ever
		$arr = array($term, 'item1', 'item2', 'item3');

		// Return data
		echo json_encode($arr);
	}
} ?>
