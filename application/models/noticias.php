<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Model {


	public function get_FeedNoticias($n_page = 0){

		$n_por_page=3;
		$sql_count='select count(*) as count from Noticias n';
		$result= (INT)$this->db->query($sql_count)->result()[0]->COUNT;
		if($n_page){
			$count=$result-($n_por_page*$n_page);
			if($count>0){
				$count_min=$count-$n_por_page;
				$sql="select  ID_Noticia, Titulo, data, Sinopse, Imagem FROM (select rownum rn, n.* from Noticias n) N where  RN> $count_min and RN<=$count ORDER BY RN DESC";
			}else{
				$count_min= $result-$n_por_page;
				$sql="select  ID_Noticia, Titulo, data, Sinopse, Imagem FROM (select rownum rn, n.* from Noticias n) N where  RN> $count_min and RN<=$result ORDER BY RN DESC";
			}
		}else{
			$count_min= $result-$n_por_page;
			$sql="select  ID_Noticia, Titulo, data, Sinopse, Imagem FROM (select rownum rn, n.* from Noticias n) N where  RN> $count_min and RN<=$result ORDER BY RN DESC";
		}
		return array('feed'=> $this->db->query($sql)->result(), 'pages'=>($result/$n_por_page)+1);
	}


	public function get_NoticiaByID($id=0){
		$sql="select * from Noticias where ID_Noticia=$id";
		return $this->db->query($sql)->result();
	}


}?>