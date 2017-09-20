<?php

class Parceiro{
  
	public function getParceiros(){ 
	
		$sql 	= "select * from user where tipoanunciante = 'Revenda'  order by rand()";
		$result = mysql_query($sql); 
		return $result;
		 
	}
	public function getParceiro($partner_id){ 
	
		$sql 	= "select * from user where  display='Y' and id =  $partner_id";
		$result = mysql_query($sql); 
		$dados 	= mysql_fetch_assoc($result);
		return $dados;	
	}
}


?>