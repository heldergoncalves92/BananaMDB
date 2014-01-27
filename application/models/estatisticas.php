<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estatisticas extends CI_Model {


	public function get_acessos(){
		$sql="select to_char(acesso, 'mm') as MES,to_char(acesso, 'yyyy') as ANO, count(*) as acessos from userstats group by to_char(acesso, 'mm'),to_char(acesso, 'yyyy') order by ANO, MES";
		
		return $this->db->query($sql)->result();		
	}

	public function get_registos(){
		$sql="select to_char(registo, 'mm') as MES,to_char(registo, 'yyyy') as ANO, count(*) as registos from utilizadores group by to_char(registo, 'mm'),to_char(registo, 'yyyy') order by ANO, MES";

		return $this->db->query($sql)->result();
	}

	public function get_ngeneros(){
		$sql="select nome , round(N_filmes/total*100) as Perc from filme_gen,(select count(*) total from lista_generos)";
 		$result=$this->db->query($sql)->result();
		return $result;

	}




	
}?>