<?php
/**
 * Autocomplete_Model
 *
 * @package autocomplete
 */

class Autocomplete_Model extends CI_Model
{
    function GetAutocomplete($options = array())
    {
	    $this->db->select('mystring');
	    $this->db->like('mystring', $options['keyword'], 'after');
   		$query = $this->db->get('mytable');
		return $query->result();
    }
}

?>