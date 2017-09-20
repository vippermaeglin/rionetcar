<?php include template("manage_header");?>
<?php 
if($_REQUEST['consume']=="Y") { 
	$select_consu="selected";
}
if($_REQUEST['consume']=="N") { 
	$select_naoconsu="selected";
}
if($_REQUEST['envioucupom']=="1") { 
	$select_sim="selected";
}
if($_REQUEST['envioucupom']=="0") { 
	$select_nao="selected";
}
?>


<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
			<div class="option_box">
				<div class="top-heading group"> <div class="left_float"><h4>Cupons Gerados</h4></div> 
					
					<div style="padding: 10px;">
							<ul id="log_tools"> <li id="log_switch_referral"><a title="Consultar cupons" href="/vipmin/coupon/index.php">Todos os Cupons</a></li> </ul>
							<ul id="log_tools"> <li id="log_switch_referral"><a title="Consultar cupons expirados" href="/vipmin/coupon/index.php?expire=true">Cupons Expirados</a></li> </ul> 
					</div>
							
				</div> 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>
				  
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<form method="get">
						<tr>
						<th width="60">Cupom <input value ="<?=$_REQUEST['coupon']?>" type="text"  name="coupon"  id="coupon" style="width: 90%;color:#303030;font-size:11px;"> </th>
						<th width="30">Senha </th>
						<th width="30">Gerado </th>
						<th width="230">   
						<select name="tid"  id="tid" style="width: 86%;color:#303030;font-size:11px;font-weight:normal;" >
						<option value="">Todas as ofertas</option>
						<?   
							$others_now = time();
							$sql = "select * from team order by title";
							$rs = mysql_query($sql);
							 
							while($row = mysql_fetch_object($rs)){?>
							<option value="<?=$row->id?>" <? if( $_REQUEST['tid'] ==$row->id ) { echo " selected ";} ?> ><?=$row->id?> - <span class="inputtip"> <?=$row->title?></span></option>
						<?} ?>
		
						</select> 
						</th>
						<th width="100">Usuário <input type="text"  value="<?=$_REQUEST['uname']?>" name="uname"  id="uname" style="width: 90%;color:#303030;font-size:11px;"></th>
						<th width="130" nowrap><select id="partner_id" name="partner_id" class="f-input"   style="width:93%;height:23px;font-weight:normal;font-size:11px;height:23px;"> <option value="">Todos os parceiros</option><?php echo Utility::Option($partners, $_REQUEST['partner_id']); ?></select> </th>
						<th width="50">Pedido <input type="text"  value="<?=$_REQUEST['order_id']?>" name="order_id"  id="order_id" style="width: 80%;color:#303030;font-size:11px;"></th>
						<th width="90">    
						<select name="consume"  id="consume" style="width: 96%;color:#303030;font-size:11px;height:19px;font-weight:normal;" >
						<option value="">Status</option>
						<option <?=$select_consu?> value="Y">Consumido</option>
						<option <?=$select_naoconsu?> value="N">Não consumido</option> 
						</select>
						</th>
						<th width="100">Utilizador<input type="text"  value="<?=$_REQUEST['nome']?>" name="nome"  id="nome" style="width: 90%;color:#303030;font-size:11px;"></th>
						<th width="50">Prazo</th>
						<th width="100">Enviado   
						<select name="envioucupom"  id="envioucupom" style="width: 46%;color:#303030;font-size:11px;font-weight:normal;" >
						<option value=""></option>
						<option <?=$select_sim?> value="1">Sim</option>
						<option <?=$select_nao?> value="0">Não</option> 
						</select>
						</th>
						
						<th width="190">  
						<button style="width: 60px;" type="submit"><span>Buscar</span></button>
						<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button>

						<button style="width: 60px"  onclick="gerarPDF()" type="button"><span>PDF</span></button>

						</th>
						</tr>
						</form>
						
						
						<?php if(is_array($coupons)){foreach($coupons AS $index=>$one) { $bregistro =  true; ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['id']; ?></td> 
							<td nowrap><?php echo  $one['secret']  ?></td> 
							 
							<td nowrap><?php echo date('d/m/Y',$one['create_time']); ?></td> 
							<td><?php echo $one['team_id']; ?>&nbsp; ( <?php echo  substr($teams[$one['team_id']]['title'],0,62)."..." ; ?>)
							</td>	

							<td nowrap><?php echo $users[$one['user_id']]['email']; ?><br/><?php echo $users[$one['user_id']]['username']; ?></td>						
							<td nowrap> <?php echo $partner[$one['partner_id']]['title']; ?></td>   
							<td nowrap><?php echo  $one['order_id']  ?></td>  
							<td nowrap><?php  if($one['consume']=="N"){ echo "Não consumido";} else { echo "<font color=#FAC899>Consumido</font>";}  ?></td>   
							<td nowrap><?php echo  $one['nome'] ; ?></td>  
							<td nowrap><?php echo date('d-m-Y',$one['expire_time']); ?></td>  
							<td nowrap><?php  if($one['envioucupom']=="1"){ echo "<font color=#FAC899>Sim</font>";} else { echo "Não";}  ?></td>   
							<td class="op" nowrap> 
							<?php  if($one['consume']=="N"){?><a onclick="javascript:msg_consume();" href="/ajax/manage.php?action=cupomconsume&id=<?php echo $one['id']; ?>" class="processar"><img alt="Colocar o cupom como consumido. Note que essa ação irá bloquear esse cupom no parceiro caso o usuário ainda não o tenha consumido." title="Colocar o cupom como consumido. Note que essa ação irá bloquear esse cupom no parceiro caso o usuário ainda não o tenha comsumido." src="/media/css/i/Stop-Normal-Red-icon.png"  ></a><?}?> 
							<?php  if($one['consume']=="Y"){?><a onclick="javascript:msg_nao_consume();" href="/ajax/manage.php?action=cupomnaoconsume&id=<?php echo $one['id']; ?>" class="processar"><img title="Colocar o cupom como não consumido." alt="Colocar o cupom como não consumido." src="/media/css/i/Play-1-Normal-icon.png" style="width: 26px;" ></a><? } ?>  
							<a onclick="javascript:msg_reenvia();" href="/ajax/manage.php?origem=cupom&action=reenviacupomforce&id=<?php echo $one['id']; ?>" class="processar"><img alt="Reenviar cupom" title="Reenviar cupom" src="/media/css/i/reenviar.png" style="width: 22px;"></a> 
							<a href="/ajax/manage.php?action=cupomremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar esse cupom ?" ><img alt="Excluir" title="Excluir" style="width: 22px;" src="/media/css/i/excluir.png"></a>
							</td>
							
						</tr>
						<?php }}?>
						<?if(!$bregistro){?><tr><td colspan="13" style="text-align: center;">Nenhum registro encontrado. Redefina sua pesquisa</tr><? } ?>
						<tr><td colspan="13"><?php echo $pagestring; ?></tr>

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
function msg_reenvia(){
	jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'>  Aguarde, o cupom está sendo enviado...</div>"});
		});
}

function msg_consume(){
	jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'>  Aguarde. O cupom está sendo consumido..</div> "});
		});
}

function msg_nao_consume(){
	jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'>  Aguarde. Revertendo o consumo.</div> "});
		});
}
	 		
</script>



 <script> 
 function resetFilter(){
	location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
 } 

  function msg(){
	jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando este cupom...</div>"});
}
function gerarPDF(){
	var url = <?php echo "'" . $INI['system']['wwwprefix'] . "';"; ?>

	if($('#coupon').val() != ''){
		var coupon = $('#coupon').val();
	}else{
		var coupon = 'undefined';
	}

	if($('#tid option:selected').val() != ''){
		var tid = $('#tid option:selected').val();
	}else{
		var tid = 'undefined';
	}

	if($('#partner_id option:selected').val() != ''){
		var partner_id = $('#partner_id option:selected').val();
	}else{
		var partner_id = 'undefined';
	}

	if($('#uname').val() != ''){
		var uname = $('#uname').val();
	}else{
		var uname = 'undefined';
	}

	if($('#order_id').val() != ''){
		var order_id = $('#order_id').val();
	}else{
		var order_id = 'undefined';
	}

	if($('#consume option:selected').val() != ''){
		var consume = $('#consume option:selected').val();
	}else{
		var consume = 'undefined';
	}

	if($('#nome').val() != ''){
		var nome = $('#nome').val();
	}else{
		var nome = 'undefined';
	}

	if($('#envioucupom option:selected').val() != ''){
		var envioucupom = $('#envioucupom option:selected').val();
	}else{
		var envioucupom = 'undefined';
	}

	var params = 'coupon='+coupon+'&tid='+tid+'&uname='+uname+'&partner_id='+partner_id+'&order_id='+order_id+'&consume='+consume+'&nome='+nome+'&envioucupom='+envioucupom;
	window.open(url + '/vipmin/coupon/pdf.php?'+params, '_blank');
}
 </script>