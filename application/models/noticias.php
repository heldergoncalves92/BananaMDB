<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Model {


	public function get_FeedNoticias($n_page = 0){

		$sql_count='select count(*) as count from Noticias n';
		$result= (INT)$this->db->query($sql_count)->result()[0]->COUNT;
		if($n_page){
			
			$count=$result-(5*$n_page);
			if($count>0)
				$sql="select * FROM Noticias WHERE ROWNUM <= 5 AND ID_NOTICIA<=$count ORDER BY id_noticia DESC";
			else
				$sql="select * FROM Noticias WHERE ROWNUM <= 5 ORDER BY id_noticia DESC";
		}else
			$sql="select * FROM Noticias WHERE ROWNUM <= 5 ORDER BY id_noticia DESC";
		
		
		return array('feed'=> $this->db->query($sql)->result(), 'pages'=>($result/5)+1);
	}


}?>