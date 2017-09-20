<?php
	
/***********************************************************
Script de Processamento do retorno do pagseguro:
Implementação dos logs de gravação das etapas do processo.
Implementação do envio de email com dados da transação para o admin.
Implementação do envio de email de sucesso com dados da transação para o cliente.
Implementação do envio de email com o cupom para o cliente.
Tratamento de envio de email e suporte a smtp e sendmail

24-04-2011
@autor: Bruno Santos
brunosantos.em@gmail.com
www.brunowebstore.com.br
www.tkstore.com.br
www.sistemacomprascoletivas.com.br

release 1.29
*************************************************************/

class Util{
  	   
	public static function log($txt,$enviaemail=false){
		 
		 global $INI;
	 
			$DIR_LOGS = str_replace('\\','/',dirname(dirname(__FILE__)))."/log";
		  
			$fp = fopen($DIR_LOGS."/".date("Ymd").".txt", "a");
			
			if ($fp){
			
				fwrite($fp,date("d/m/Y H:i:s")." - ".$txt."\n");
				fclose($fp);
				chmod($DIR_LOGS."/".date("Ymd").".txt", 0755);
			}
			else{
			
				$msg = "Nao foi possivel abrir o arquivo ".$DIR_LOGS."/".date("Ymd").".txt para escrita";
				$msg .="<br>Texto: ".$txt;
				  
				self::postemail($msg );
			}
			if($enviaemail){
					//self::email($txt,true);
					self::postemail($txt);
			}

		}
		
	 public static function log2($txt,$enviaemail=false){
		 /*
		 global $INI;
	 
			$DIR_LOGS = str_replace('\\','/',dirname(dirname(__FILE__)))."/log";
		  
			$fp = fopen($DIR_LOGS."/".date("Ymd")."_nav.txt", "a");
			
			if ($fp){
			
				fwrite($fp,date("d/m/Y H:i:s")." - ".$txt."\n");
				fclose($fp);
				chmod($DIR_LOGS."/".date("Ymd")."_nav.txt", 0755);
			}
			else{
			
				$msg = "Nao foi possivel abrir o arquivo ".$DIR_LOGS."/".date("Ymd")."_nav.txt para escrita";
				$msg .="<br>Texto: ".$txt;
				  
				self::postemail($msg );
			}
			if($enviaemail){
					//self::email($txt,true);
					self::postemail($txt);
			}
			*/
		}
		
  
	   public static function getFrom(){
		
			global $INI;
			
			if($INI['mail']['mail'] == "smtp"){
				$from = $INI['mail']['user'];
				ini_set("SMTP", $INI['mail']['user']); 
			}
			else{
				$from = $INI['mail']['from'];
			}
			return $from;
			
	   }
	   
       public static function getHeader(){
		
	          global $INI;
			   
		    $HEADER = "MIME-Version: 1.0\r\n";
			$HEADER .= "Content-Type: text/html; charset='ISO-8859-1'\r\n";
			$HEADER .= "From: ".$INI['system']['sitename']." <".self::getFrom().">\r\n";
			$HEADER .= "X-Priority: 3\r\n"; 
			
			return $HEADER;
		}

  
		public static function postemail($body,$assunto=""){
            
			global $INI;
			if($assunto==""){
				$assunto=$body;
			}
			$Referencia 	= isset($_REQUEST['Referencia']) ? $_REQUEST['Referencia'] : ''; 
			 
			$template = Util::getTemplate($body);
			
			if($INI['mail']['mail'] == "smtp"){
				return enviar($INI['mail']['user'],$assunto,$template);
			}
			else{
				  
				if(mail(self::getFrom(),$assunto,$template,self::getHeader(),"-f ".self::getFrom())){
					return true;
				}
				else{
					return false;
				}
			}
		}
		
		public static function enviaemail($to,$subject, $message){
            	 
			//$template = Util::getTemplate($body);
		     global $INI;
			if($INI['mail']['bounce'] == ""){
				$INI['mail']['bounce'] = self::getFrom();
			}
			if(mail($to,$subject,$message,self::getHeader(),"-f ".$INI['mail']['bounce'])){
				return true;
			}
			else{
				return false;
			}
			 
		}	
		 
		 public static function smtpforce($to,$subject, $message){
               global $INI;
			   include ("smtp.class.php");
			    
			    $host = $INI['mail']['hostforce'];  
				$smtp = new Smtp($host);
				$smtp->user = $INI['mail']['userforce'];   
				$smtp->pass = $INI['mail']['passforce'];  
				$porta = $INI['mail']['portforce'];
				if($INI['mail']['portforce']==""){
					  $porta = 25;
				}
				
				$smtp->port = $porta;
				$smtp->debug =true; 
				 
				$from= $INI['mail']['userforce'];  
				$to = $to;  
				
				$subject = $subject;  
			    $msg = $message;
				
				$smtp->Send($to, $from, $subject, $msg); 
				
				if($smtp->Send($to, $from, $subject, $msg)){
					return true;
				}
				else{
					return false;
				}
			 
		}	
		
		public static function postemailCliente($body,$assunto,$emailcliente){
   
			//$template = Util::getTemplate($body);
			 $template = $body;
			 global $INI;
			
			if($INI['mail']['mail'] == "smtp"){
				return enviar($emailcliente,$assunto,$template);
			}
			else{
			
				if(mail($emailcliente,$assunto,$template,self::getHeader(),"-f ".self::getFrom())){
					return true;
				}
				else{
					return false;
				}
			}
			
		}

		
		public static function msgTec(){
				
				$mensagem_tecnica  =  "<br><br> ============  <b>Mapeamento</b> ============ <br>";			 
				$mensagem_tecnica .=  "<br> Arquivo executado: ".$_SERVER['SCRIPT_FILENAME'] ;			 
			   
				return $mensagem_tecnica;
			 
		}	
		 
		public static function getTemplate($body){
			global $INI;
			return
			'
			<style type="text/css">
			body,td { color:#2f2f2f; font:11px/1.35em Verdana, Arial, Helvetica, sans-serif; }
			</style>

			<div style="font:11px/1.35em Verdana, Arial, Helvetica, sans-serif;">
			<table cellspacing="0" cellpadding="0" border="0" width="98%" style="margin-top:10px; font:11px/1.35em Verdana, Arial, Helvetica, sans-serif; margin-bottom:10px;">
			<tr>
				<td align="center" valign="top">
					<!-- [ header starts here] -->
				 
					  <table cellspacing="0" cellpadding="0" border="0" width="650">
						<tr>
							<td valign="top"><a href="'.$INI['system']['wwwprefix'].'"><img src="'.$INI['system']['wwwprefix'].'/include/logo/logo.png" alt='.$INI['system']['sitename'].'  style="margin-bottom:10px;" border="0"/></a></td>
						</tr>
					  </table>
				
					<!-- [ middle starts here] -->
					<table cellspacing="0" cellpadding="0" border="0" width="650">
						<tr>
							<td valign="top">
							
								<p> '.$body.'</p>
								 
								<p>Atenciosamente</p>
								<p><b>'.$INI['system']['sitename'].'</b></p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			</table>
		</div>

		';
	}
}  


?>