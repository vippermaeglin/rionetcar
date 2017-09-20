<?php 

require_once(dirname(dirname(__FILE__)). '/app.php');

 
 //FEED RSS
$rss = '<?xml version="1.0" encoding="iso-8859-1"?>';
$rss .= '<rss version="2.0">';
$rss .= '<channel>';
$rss .= '<title><![CDATA[ '.utf8_decode($INI['system']['sitename']).' - Ofertas da Semana]]></title>';
$rss .= '<description><![CDATA[ '.utf8_decode($INI['system']['sitename']).' - Descontos de até 90%]]></description>';
$rss .= '<link>'.$INI['system']['wwwprefix'].'</link>'; 
$rss .= '<docs>http://www.sistemacomprascoletivas.com.br</docs>'; 
$rss .= '<image>'; 
$rss .= '<url>'.$INI['system']['imgprefix'].'/skin/padrao/images/logofeed.png</url>'; 
$rss .= '<title><![CDATA[ '.utf8_decode($INI['system']['sitename'].' - '.$INI['system']['sitetitle']).']]></title>'; 
$rss .= '<link>'.$INI['system']['wwwprefix'].'</link>'; 
$rss .= '<width>144</width>'; 
$rss .= '<height>60</height>'; 
$rss .= '<description><![CDATA[ '.utf8_decode($INI['system']['seodescricao']).']]></description>'; 
$rss .= '</image>'; 


$rss .= '<language>pt-br</language>';
 
$consulta = "SELECT * FROM team where begin_time < '".time()."' and end_time > '".time()."' and  (anunciogratis = 's' or pago='sim') and status = '1' ORDER BY  id DESC";
$resultado = mysql_query($consulta);
 
while ($linha = mysql_fetch_assoc($resultado))
{
 
$id = $linha["id"];
$descricao = $linha["summary"];
$descricao =  str_replace("&nbsp;","",$descricao );
$descricao =  str_replace("&;","",$descricao );
$descricao =  str_replace("!;","",$descricao );
$descricao =  str_replace("?;","",$descricao );

$cidade_id = $linha["city_id"]; 
if ($cidade_id == "0"){$nome_cidade = "Nacional";}
	else {
		$consulta2 = "SELECT * FROM category WHERE id = '$cidade_id' LIMIT 1";
		$resultado2 = mysql_query($consulta2);
		while ($linha2 = mysql_fetch_assoc($resultado2))
		{		$nome_cidade = $linha2["name"];		}
	}
$id_parceiro = $linha["partner_id"];
	$consulta3 = "SELECT * FROM partner WHERE id = '$id_parceiro' LIMIT 1";
		$resultado3 = mysql_query($consulta3);
		while ($linha3 = mysql_fetch_assoc($resultado3))
		{		
		$endereco_parceiro = $linha3["address"];
		$nome_parceiro = $linha3["title"];
		}
	
	$url_site = $INI['system']['wwwprefix'];
	
	$imagem = $linha["image"];
	$titulo = $linha["title"];
    $titulo  =  str_replace("&nbsp;","",$titulo);
	$titulo =  str_replace("&;","",$titulo );
	$titulo =  str_replace("!;","",$titulo );
	$titulo =  str_replace("?;","",$titulo );

	//$url_imagem = "$url_site/media/$imagem";	
	$url_imagem = "$url_site/media/".substr($imagem,0,-4)."_thumb.jpg";	
	
	$desconto = (100 * ($linha['market_price'] - $linha['team_price']) / $linha['market_price']);
	$desconto_final = ceil($desconto);
	
	$preco_final = str_replace(".", ",", $linha["market_price"]); // Caso o agregador necessite de virgula
	$preco_desconto = str_replace(".", ",", $linha["team_price"]); // Caso o agregador necessite de virgula
	
	$timestamp_inicial = $linha["begin_time"];
	$data_inicial = date("Y-m-d H:i:s", $timestamp_inicial); // Caso o agregador necessite de um formato diferente

	$timestamp_final = $linha["end_time"];
	$data_final = date("Y-m-d H:i:s", $timestamp_final); // Caso o agregador necessite de um formato diferente
	
	$timestamp_validade = $linha['expire_time'];
	$validade_final = date("Y-m-d H:i:s", $timestamp_validade); // Caso o agregador necessite de um formato diferente
	
	$var = ereg_replace("[ÁÀÂÃ]","A", utf8_decode($titulo) );
	$var = ereg_replace("[áàâãª]","a",$var);
	$var = ereg_replace("[ÉÈÊ]","E",$var);
	$var = ereg_replace("[éèê]","e",$var);
	$var = ereg_replace("[Í]","I",$var);
	$var = ereg_replace("[ÓÒÔÕ]","O",$var);
	$var = ereg_replace("[óòôõº]","o",$var);
	$var = ereg_replace("[ÚÙÛ]","U",$var);
	$var = ereg_replace("[í]","i",$var);
	$var = ereg_replace("[úùû]","u",$var);
	$var = str_replace("Ç","C",$var);
	$var = str_replace("ç","c",$var);

	$nomeurl =    urlamigavel( $var) ;
						
	if ($timestamp_inicial >= time()) {  }
	else {
 
           $descricao = substr( utf8_decode($descricao),0,590)."...";
		   $titulo = utf8_decode($titulo);
		   $conteudo .= '<item>';
		   $conteudo .= "<title><![CDATA[". $titulo."]]></title>"; 
		   $conteudo .= "<description><![CDATA[&lt;a href='".$INI['system']['wwwprefix']."/produto/". $id."/".$nomeurl."' &gt;&lt;img border='0' src='$url_imagem' /&gt;&lt;/a&gt;&lt;br /&gt; ".$descricao."]]></description>";
		   $conteudo .= "<pubDate>$data_inicial</pubDate>"; 
		   $conteudo .= "<link>".$INI['system']['wwwprefix']."/produto/". $id."/".$nomeurl."</link>";
		   $conteudo .= '</item>';
  
		}
	}

	mysql_close($conecta);

	// Aqui a var xml recebe todo conteudo da vare mais da var conteudo
	$xml = $rss.$conteudo;

	// Fechamos nossas TAG
	$xml .= '</channel></rss>';

	// Depois de criarmos nosso rss, vamos gravar ele em disco para podermos utilizar.

	// Abre o arquivo para leitura e escrita; coloca o ponteiro do arquivo no começo
	// e diminui (trunca) o tamanho do arquivo para zero. Se o arquivo não existe,
	// tenta criá-lo (w+).
	$arquivo = fopen('xml/rss.xml','w+');

	// gravamos os dados no arquivo.xml
	fwrite($arquivo,$xml);

	// fechamos nosso arquivo
	fclose($arquivo);
	  
	

?>