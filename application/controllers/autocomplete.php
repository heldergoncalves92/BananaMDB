<?
    class Autocomplete extends CI_Controller
    {
        function index()
        {
            $this->load->view('autocompleteView');
        }
        function getResult($title)
        {
            $this->db->like('title',$title);
           echo json_encode( $this->db->get('topic')->result() );
            
        }
    }