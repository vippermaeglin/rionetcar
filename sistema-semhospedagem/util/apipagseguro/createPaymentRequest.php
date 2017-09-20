<?php
/*
************************************************************************
Copyright [2011] [PagSeguro Internet Ltda.]

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
************************************************************************
*/



/**
 * Class with a main method to illustrate the usage of the domain class PagSeguroPaymentRequest
 */
class createPaymentRequest {
	
	public static function main () {
		
		global $INI,$title,$valor_original,$idpedido,$ROOTPATH,$login_user,$nomes ;
		// Instantiate a new payment request
		$paymentRequest = new PagSeguroPaymentRequest();
		
		// Sets the currency
		$paymentRequest->setCurrency("BRL");
		
		// Add an item for this payment request
		//$paymentRequest->addItem('0001', 'Notebook prata', 2,430.00);
		
		// Add another item for this payment request
		$valor_original =  str_replace(",",".",$valor_original);
		$paymentRequest->addItem($idpedido, $title, 1, $valor_original);
		
		// Sets a reference code for this payment request, it is useful to identify this payment in future notifications.
		$paymentRequest->setReference($idpedido);
		
		// Sets shipping information for this payment request
		//$CODIGO_SEDEX = PagSeguroShippingType::getCodeByType('SEDEX');
		//$paymentRequest->setShippingType($CODIGO_SEDEX);
		//$paymentRequest->setShippingAddress( $login_user['zipcode'], $login_user['address'],   $login_user['numero'], $login_user['complemento'], $login_user['bairro'], $login_user['cidadeusuario'],  $login_user['estado'], 'BRA');
		
		// Sets your customer information.
		$sobrenome = $nomes[1];
		if($nomes[1]==""){
					$sobrenome = "atualizar sobrenome"; 
		}
		$nome =  $nomes[0]. " ".$sobrenome;
		$paymentRequest->setSender($nome, $login_user['email']);
		
		$paymentRequest->setRedirectUrl($ROOTPATH);
		
		try {
			
			/*
			* #### Crendencials ##### 
			* Substitute the parameters below with your credentials (e-mail and token)
			* You can also get your credentails from a config file. See an example:
			* $credentials = PagSeguroConfig::getAccountCredentials();
			*/			
			$credentials = new PagSeguroAccountCredentials($INI["pagseguro"]["acc"],  $INI['pagseguro']['mid'] );
			 
			// Register this payment request in PagSeguro, to obtain the payment URL for redirect your customer.
			$url = $paymentRequest->register($credentials);
			 ?>
			<input type="hidden" value="<?=$url?>" name="urlapipg" id="urlapipg">
			<?
			
			//self::printPaymentUrl($url);
			
		} catch (PagSeguroServiceException $e) {
			die($e->getMessage());
		}
		
	}
	
	 public static function printPaymentUrl($url) {
		if ($url) { 
			//echo "<p><a title=\"URL do pagamento\" href=\"$url\">Ir para URL do pagamento.</a></p>";
		}
	}
	
}

createPaymentRequest::main();

?>
