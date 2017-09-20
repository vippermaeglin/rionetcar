<?php

class Layout{
  	
	public function temMp3Evento($id){ 
			 
			$dir =  WWW_ROOT."/util/flashmp3player/mp3/oferta/$id";
			$dh = opendir($dir);
			
			if($dh){
				while ($file = readdir($dh)){
					if($file =="." or $file == ".."){
						continue;
					}
					return true;
				}
			}
			return false;
	}
	 
}


?>