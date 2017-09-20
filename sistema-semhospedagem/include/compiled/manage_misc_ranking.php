<?php include template("manage_header");?>
<?php  
$systeminvitecredit = $INI['system']['invitecredit'] ;
?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
				 <div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Ranking de Indicações</h4></div> </div> 
				 
					<div class="sect" style="padding:0 10px;">
						<form name="nform" method="get" onsubmit="return verifica();">
							<input type="hidden" name="s" value="<?php echo $s; ?>" />
							<p style="margin:5px 0;">
							Nome:<input type="text" name="iuser" value="<?php echo htmlspecialchars($iuser); ?>" class="h-input" /> &nbsp;
							<!-- Bairro:<input type="text" name="bairro" value="<?php echo htmlspecialchars($bairro); ?>" class="h-input" /> &nbsp; -->
							Mês: 
								<select class="h-input"  name="mes">
								<option value="">Selecione o mês...</option>
								<?
								foreach($arr_meses as $mes => $meses) {             
									print("<option value=\"$mes\"");
								if ($mes == $mes_selecionado){ print("selected"); }
									print(">$meses ($mes)");
								}
								?>
								</select>&nbsp;
		  
							Ano:<input type="text" class="h-input"  name="ano" value="<?php echo $ano; ?>" /> &nbsp;
							<input type="submit" value="Pesquisar" class="formbutton"  style="padding:1px 6px;"/></p>
						<form>
					</div>
					<div class="sect">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						
						<tr><th width="350">Ranking</th><th width="150">Nome</th><th width="150">Indicações</th><!-- <th width="150">Bairro</th>--><th width="140">Mes/Ano</th> </tr>
						
						<?php 
						 
						$contador=0;
						if( is_array($vetoruser)){ 
						foreach($vetoruser as $key=>$value)
						{ 
						 
						 if($iuser){
							 if(strtolower($key) != strtolower($iuser) and strtolower($value["realname"]) != strtolower($iuser) ){
								continue;
							 }
						 }
						 if($mes_selecionado){
						 
							 if(  date('m', $value["data"]) != $mes_selecionado  ){
								continue;
							 }
						 }	 
						 if($ano){
						 
							 if(  date('Y', $value["data"]) != $ano  ){
								continue;
							 }
						 }
						  
						?>
						<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $value["id"] ; ?>">
							<td width="10%"><?php echo $value["ranking"]; ?> </td>
							<td width="30%" nowrap><a class="ajaxlink" href="/ajax/manage.php?action=userview&id=<?php echo $value["id"] ; ?>"> <?php echo $value["realname"] ?></a><br/><?php echo $value["ip"]; ?> </td>
							<td nowrap width="10%"> <?php echo $value["quantidadeindicacoes"]; ?> </td>
							<td nowrap width="40%"> Bairro </td>
							<td nowrap width="10%"><?php echo date('m', $value["data"]); ?> / <?php echo date('Y', $value["data"]); ?></td>
							<!-- <td class="op" nowrap><?php if('index'==$s){?><a href="/ajax/manage.php?action=inviteok&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Confirma o pagamento da comissão?">Confirmado</a> | <a href="/ajax/manage.php?action=inviteremove&id=<?php echo $one['id']; ?>" ask="Tem certeza que deseja cancelar sua comissão?" class="ajaxlink">Cancelar</a><?php } else { ?><?php echo $users[$one['admin_id']]['email']; ?><br/><?php echo $users[$one['admin_id']]['username']; ?><?php }?></td> -->
						</tr>
						<?php }} else {?>
						
							<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $value["id"] ; ?>">
							 <td colspan="5" width="100%" style="text-align:center;"> Registro não encontrado </td>
							</tr>
						
						<? } ?>
						
						<tr><td colspan="8"><?php echo $pagestring; ?></tr>
						</table>
					</div>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->
<script>

function verifica(){
 
if(document.nform.iuser.value=="" & document.nform.mes.value=="" & document.nform.ano.value=="" ){
	alert("Favor informar pelo menos um parâmetro");
	 return false;
	}

}

</script>

