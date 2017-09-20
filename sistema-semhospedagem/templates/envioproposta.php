 <?php
   
	require_once(dirname(dirname(__FILE__)). '/app.php'); 
	    
	$idoferta = strval($_REQUEST['idoferta']);
	$nome_proposta = strval($_REQUEST['nome_proposta']); 
	$email_proposta = strval($_REQUEST['email_proposta']);
	$ddd_proposta = strval($_REQUEST['ddd_proposta']);
	$telefone_proposta = strval($_REQUEST['telefone_proposta']);
	$proposta = strval($_REQUEST['proposta']); 
	  
	$team  = Table::Fetch('team',$idoferta);
	$user  = Table::Fetch('user',$team['partner_id']);
	$link = $INI['system']['wwwprefix']."/produto/". $team['id']."/".urlamigavel( tratanome(buscaTituloAnuncio($team)));
    $nomesite = htmlentities($INI['system']['sitename'],ENT_COMPAT,'UTF-8');
 
	$dataenvio = date("d/m/Y H:i:s"); 
 ?>
<html><head></head><body><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="pt-br" />
  <div class="logo"><img style="max-width: 320px;" src="<?=$ROOTPATH?>/include/logo/logo.png" alt="<?= utf8_encode($nomesite) ?>"></div>
  <div class="subtitulo" style="text-align: center; font-family: arial; font-weight: bold; margin-top: 15px; border-bottom: 2px solid #FF9900; color:#FF9900"> PROPOSTA DE COMPRA</div>
	<div style="font-family: arial; font-size: 12px;">
	<b>
	<BR>Olá <?=$user['realname']?>,
	<BR>Você recebeu uma proposta de compra!
	</b>
	<br><br>
	<div><b>Características do Veículo:</b></div>
	<BR>Cód. Anuncio: <?=$team['id']?>
	<BR>Veículo: <?=$team['title']?>  
	<BR>Ano Modelo:  <?=$team['modelo_ano']?> 
	<BR>Preço: R$ <?=number_format($team['team_price'], 2, ',', '.');  ?>
	
	<br><br>
	<div><b>Dados do Interessado:</b></div>
	<BR>Nome: <?=$nome_proposta?>
	<BR>Email: <?=$email_proposta?>
	<BR>Telefone:  (<?=$ddd_proposta?>) <?=$telefone_proposta?>
	<BR>Envio: <?=$dataenvio?>
	<BR>Mensagem: <?=$proposta?>
	<BR>Anúncio: <?=$link?>
	<br><br>
	<div style="border-bottom: 2px solid #FF9900;border-top: 2px solid #FF9900;padding:3px;"><b>Observações:</b>
	
	<div>Você está recebendo esta mensagem porque o seu anúncio está publicado no site
	<?=$nomesite?> - <?=$INI['system']['wwwprefix']?></div>
	<div> Para alterar o seu an&uacute;ncio <a href="<?=$INI['system']['wwwprefix']?>/adminanunciante">clique aqui</a> ou nos envie um email <?=$INI['mail']['helpemail']?></div>
	</div>
	<br>
	<div>Dica: Responda as propostas em até 24hrs, quanto mais rápido o atendimento, maior é chance do negócio ser realizado.</div>
	 
	<div>
		<BR>Atenciosamente,
		<BR><b>Equipe <?=$nomesite ?></b>
	</div>
  </div>
	
</body>

</html>