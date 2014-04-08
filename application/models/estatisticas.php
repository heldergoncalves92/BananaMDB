<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estatisticas extends CI_Model {


	public function get_acessos(){
		$sql="select to_char(acesso, 'mm') as MES,to_char(acesso, 'yyyy') as ANO, count(*) as acessos from userstats where acesso > sysdate-180 group by to_char(acesso, 'mm'),to_char(acesso, 'yyyy') order by ANO, MES";
		
		return $this->db->query($sql)->result();		
	}

	public function get_registos(){
		$sql="select to_char(registo, 'mm') as MES,to_char(registo, 'yyyy') as ANO, count(*) as registos from utilizadores where registo > sysdate-180 group by to_char(registo, 'mm'),to_char(registo, 'yyyy') order by ANO, MES";

		return $this->db->query($sql)->result();
	}

	public function get_ngeneros(){
		$sql="select nome , round(N_filmes/total*100) as Perc from filme_gen,(select count(*) total from lista_generos) order by Perc";
 		$result=$this->db->query($sql)->result();
		return $result;
	}

	public function get_Vfilme($idfilme){
		$sql="select pontuacao, count(*) as nvoto from tabela_ratings where id_filme=$idfilme group by pontuacao order by pontuacao";
		return $this->db->query($sql)->result();
	}

	public function get_fetarias(){
		$sql="select * from faixa1, faixa2, faixa3, faixa4";
		return $this->db->query($sql)->result()[0];
	}




	
}?>