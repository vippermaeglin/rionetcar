 <?php
 	 
	$limiteofertasemail = 8;  
   
	require_once(dirname(dirname(__FILE__)). '/app.php');
	require_once(dirname(dirname(__FILE__)). '/include/get_ofertas.php');
	$page = Table::Fetch('page', 'about_us');
	    
	$sobre = $page['value'];
	 
	/*Buscando os dados da oferta para envio*/
		$origem = "produto";
	   if($_REQUEST['tipo'] =="afiliado" or $_REQUEST['tipo'] =="anunciante"){
			$team = Table::Fetch('produtos_afiliados', $_REQUEST['idoferta']);			$origem = "websiteafiliado";
		}
		else{
			$team = Table::Fetch('team', $_REQUEST['idoferta']);
		}
		$city = Table::Fetch('category', $team['city_id']);
		
	/****************************************/
	    
	$economia = str_replace(".",",",number_format($team['market_price'] - $team['team_price'],2)) ;
 
	if($city['name'] ==""){
		$nomecidade  = " todo o Brasil";	
	}
	else{
		$nomecidade = utf8_decode($city['name']);
	}
 
  $nomesite = htmlentities($INI['system']['sitename'],ENT_COMPAT,'UTF-8');
  if($INI['other']['color_fundo_news'] ==""){
	   $INI['other']['color_fundo_news'] ="#004040";
	}
 ?>
<html><head>
<style type="text/css">
 
.titulo {
	color: #9F0;
	font-size:36px;
}
 
</style>
</head><body><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="pt-br" />
 
 

<table align="center" border="0" cellpadding="0" cellspacing="0" width="700">  <tbody><tr>    <td align="center" bgcolor="<?=$INI['other']['color_fundo_news']?>" height="10"></td>  </tr>
</tbody></table>

<table align="center" bgcolor="<?=$INI['other']['color_fundo_news']?>" border="0" cellpadding="0" cellspacing="6" width="700">
  <tbody><tr>
    <td align="center" valign="middle" width="36%"><a href="<?=$INI['system']['wwwprefix']?>" target="_blank">
    <!-- ********** LOGO DO SITE ********** -->
    <img  style="max-width:500px;max-height:132px;min-width:200px;min-height:91px;" src="<?=$INI['system']['wwwprefix']?>/include/logo/logo.png">
    <!-- ********** FIM LOGO DO SITE**********  -->
    </a></td>
    <td style="color: rgb(255, 255, 255); font-family: Tahmoma; font-size: 23px; font-weight: bold;" align="right" width="64%"><p align="center"><span class="titulo">Oferta do Dia<br>
    </span>em <?=$nomecidade?></p>

</td>
  </tr>
  <tr>
    <td height="2"></td>
    <td align="right"></td>
  </tr>
</tbody></table>
<table align="center" bgcolor="#ffffff" border="0" cellpadding="10" width="700">
  <tbody><tr>
    <td width="451" height="373">
    <a href="<?php echo $INI['system']['wwwprefix']; ?>/<?=$origem?>/<?php echo $team['id']; ?>&c=maillist"   title="<?php echo utf8_decode($team['title']); ?>"><img src="<?php echo team_image($team['image']); ?>" alt="<?php echo utf8_decode($team['title']); ?>" width="451" height="353" style="border:none;" title="<?php echo utf8_decode($team['title']); ?>" /></a>
    </td>
    <td valign="top" width="203">
	<table style="color: rgb(51, 51, 51); font-family: Georgia; font-size: 14px;" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody><tr>

        <td style="color: rgb(51, 51, 51); font-family: Georgia,Times,serif; font-size: 18px;" height="51" valign="top"><?php echo  htmlentities($team['title'],ENT_COMPAT,'UTF-8');   ?><br></td>
      </tr> 
      <tr>
        <td><strong>Por: </strong><span style="color: rgb(0, 51, 51); font-family: Georgia; font-size: 31px; font-weight: bold;">R$ <?php echo moneyit3($team['team_price']); ?></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><a title="<?php echo utf8_decode($team['title']); ?>" href="<?=$INI['system']['wwwprefix']?>/<?=$origem?>/<?=$team['id']; ?>" target="_blank">Clique para acessar</a></td>
      </tr>
 
    </tbody></table>
    </td>
  </tr>
</tbody></table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="700">  <tbody>
  <tr>    <td align="center" bgcolor="<?=$INI['other']['color_fundo_news']?>" height="2"></td>  
    </tr>
</tbody></table>
 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="700">  
  <tbody><tr>    <td align="center" bgcolor="<?=$INI['other']['color_fundo_news']?>" height="70"><p><span style="color: rgb(255, 255, 255); font-family: Tahoma,Geneva,sans-serif; font-size: 17px;">
    <?=$nomesite?> 
    - Todos os direitos reservados </span><span style="color: rgb(0, 136, 136); font-family: Tahoma,Geneva,sans-serif; font-size: 13px;"><br>
       <? if($INI['mail']['helpemail'] != ""){ echo "Para entrar em contato, envie um email para: ".$INI['mail']['helpemail'];}?>
       <? if($INI['mail']['helpphone'] != ""){ echo "Telefone de atendimento: ".$INI['mail']['helpphone'];}?>
    </span></p>
        <p style="color:#FFF">Caso n&atilde;o queira mais receber ofertas do <?php echo $INI['system']['abbreviation']; ?>, voc&ecirc; pode <a href="<?php echo $INI['system']['wwwprefix']; ?>/cancelarinscricao.php?code=<?php echo $_REQUEST['secret']; ?>" style="" title="Cancelar newsletter"><font color="#FFCC00">descadastrar</font></a> a qualquer momento.</p></td>  
</tr>
</tbody></table>
</body></html>