<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Model {


	public function get_FeedNoticias($n_page = 0){

		$sql_count='select count(*) as count from Noticias n';
		$result= (INT)$this->db->query($sql_count)->result()[0]->COUNT;
		if($n_page){
			$count=$result-(5*$n_page);
			if($count>0){
				$count_min=$count-5;
				$sql="select  Titulo, data, Sinopse, Imagem FROM (select rownum rn, n.* from Noticias n) N where  RN> $count_min and RN<=$count ORDER BY RN DESC";
			}else{
				$count_min= $result-5;
				$sql="select  Titulo, data, Sinopse, Imagem FROM (select rownum rn, n.* from Noticias n) N where  RN> $count_min and RN<=$result ORDER BY RN DESC";
			}
		}else{
			$count_min= $result-5;
			$sql="select  Titulo, data, Sinopse, Imagem FROM (select rownum rn, n.* from Noticias n) N where  RN> $count_min and RN<=$result ORDER BY RN DESC";
		}
		return array('feed'=> $this->db->query($sql)->result(), 'pages'=>($result/5)+1);
	}


}?>