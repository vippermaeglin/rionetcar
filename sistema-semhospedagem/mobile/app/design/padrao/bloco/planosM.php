<div style="display:none;" class="tips"><?=__FILE__?></div>  
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/responsive.css">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/planos.css">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css"> 
	<?php
		$sql = "SELECT plano_id AS plano FROM `partner_planos` WHERE status = 'gratis' AND partner_id = " . $login_user['id']. " ORDER BY id DESC LIMIT 1";
		$rs = mysql_query($sql);
		$num = mysql_num_rows($rs);
		$rst = mysql_fetch_assoc($rs);
		$rule = 0;
		if($num == 1) {
			/* Caso o usuário já tenha adquirido um plano grátis, e enviado o ID do plano grátis . */
			$rule = $rst['plano'];
		}
		/* Para cada tipo de usuário, uma sql diferente. */
		if($login_user['tipoanunciante'] == "Revenda" || ($login_user['tipoanunciante'] == "Concessionaria")){
			$sql = "select * from planos_publicacao where ativo = 's' and type_plan = 'Revenda' and id <> " . $rule;
		}
		else if($login_user['tipoanunciante'] == "Particular" || empty($login_user['tipoanunciante'])){
			$sql = "select * from planos_publicacao where ativo = 's' and type_plan = 'Particular' and id <> " . $rule;
		}	
		$rs = mysql_query($sql);
		if(isset($_REQUEST['idpedido'])){
			$idpedido = $_REQUEST['idpedido'];
		}
	?>
	<div class="block">
	<?
	$cont = 0;				
	while($row = mysql_fetch_array($rs)){
		$cont++;
		if($cont==1){
			$cor = "yel";
		}
		else if($cont==2){
			$cor = "green";
		}	
		else if($cont==3){
			$cor = "blue";
		}
		else if($cont==4){
			$cor = "red";
		}
		else if($cont==5){
			$cor = "red";
		}	
		$destaque = $row['ehdestaque'] == "DESTAQUE" ? "Ativo" : "Desativado";
		$video = $row['temvideo'] == "VIDEO" ? "Ativo" : "Desativado";
		?>
		<div class="listPlans">
			<ul class="pricing p-<?=$cor?>">
				<li>
					<img src="http://bread.pp.ua/n/settings_g.svg" alt="">
					<big><?=utf8_decode($row['nome'])?></big>
				</li>
				<li>Destaque na busca <br /> <b><?php echo $destaque; ?></b></li>
				<li>Foto no resultado da busca <br /> <b>Ativo</b></li>
				<li>Vídeo no anúncio <br /> <b><?php echo $video; ?></b></li>
				<li>Saiba quantos acessos o anúncio recebeu <br /> <b>Ativo</b></li>
				<li>Receba propostas de compra em seu e-mail sem intermediários <br /> <b>Ativo</b></li>
				<li>Período de publicação <br /> <b><?php echo $row['atevender'] == "S" ? " Até vender" : $row['dias'] . " dias"; ?></b></li>
				<li>Fotos no anúncio <br /> <b>10 fotos</b></li>
				<li>Anúncios da vitrine <br /> <b><?php echo $row['qtd_vitrine']; ?> anúncios</b></li>
				<li>Quantidade de anúncios <br /> <b><?php echo $row['qtdeanuncio']; ?> anúncios</b></li>
				<?php if($row['gratis'] != 's') { ?>								
				<li>
					R$<h3> <?= number_format($row[valor],2, ',', '.')?></h3>
					<span>por <? if($row['dias']=="1"){echo " 1 dia "; } else { echo $row['dias']." dias";}?> </span>
				</li>	
				<?php } else { ?>															
				<li>				
					<big><?=utf8_decode($row['nome'])?></big> 
					<br>
					<br>
					<br>									
				</li>																
				<?php } ?>
				<li> 									
				<?php //if($row['gratis'] != 's') { ?>
					<input id="planoanuncio" class="cinput inputradio" type="radio" value="<?php echo $row['valor'] . "##" .  $row['id'] . "##" . $row['nome']; ?>" name="planoanuncio" onclick="calc('<?php echo $row['valor'] . "##" .  $row['id'] . "##" . $row['nome']; ?>');">
					<br/>
					<br/>
					<b>Escolher plano #<?php echo $row['id']; ?> <?=utf8_decode($row['nome'])?></b>
					<?php //} else { ?>	
					<!--<button onclick="location.href='<?php echo $ROOTPATH; ?>'"; data-type="<?php echo $row['gratis']; ?>" data-id="<?php echo $row['id']; ?>" <?php if(!$login_user){ ?> class="tk_logar" <? }else {?> class="submit_form_pg" <?}?>>Permanecer grátis</button>-->
					<?php //} ?>
				</li>
			</ul>
		</div>
	<? } ?> 
	</div>
	<div class="titlePage">
		<p>Faça um upgrade</p>
	</div>
	<div class="listPlans">
		<ul class="pricing p-red">
		<?php
			$sql = "select * from planos_upgrade where status=1";
			$rs = mysql_query($sql); 
			$bg="linhasub";
			while($row = mysql_fetch_array($rs)){ 
				if($bg=="linhasub"){
					$bg="";
				} 
				else{
					$bg="linhasub";
				} 
		?> 
		<li>
			<h2>
				<input onclick="calc('<?php echo $row['preco'] . "##" .  $row['id'] . "##" . $row['nome']; ?>');" class="classupgrade" type="checkbox" id="upgrade" name="upgrade" idupgradec="<?=$row[id]?>" value="<?=$row[preco]?>">
				<?=utf8_decode($row['nome'])?>
			</h2>
			<p style="padding-left:0;"><?=utf8_decode($row['descricao'])?></p>
			<br />
			 R$
			<h3><?=number_format($row['preco'],2, ',', '.') ?></h3>
		</li>
		<?php } ?>
		</ul>
		<b><div id="totalpagar" class="ptotal"> </div></b>
	</div>
	<input style="margin-top: 85px; margin-bottom: -85px;" onclick="javascript: enviapag_normal('pagseguro');" type="button" class="btnSubmit" value="Concluir e avançar" id="btnBuscar" name="btnBuscar">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
	<form id="pagseguro" name="pagseguro"  method="post" sid="" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
		<input type="hidden" readonly="readonly" name="email_cobranca" value="<?php echo $INI["pagseguro"]["acc"]; ?>">
		<input type="hidden" readonly="readonly" name="tipo" value="CP">
		<input type="hidden" readonly="readonly" name="moeda" value="BRL">
		<input type="hidden" readonly="readonly" id="ref_transacao" name="ref_transacao" value="">
		<input type="hidden" readonly="readonly" id="reference" name="reference" value="">
		<input type="hidden" readonly="readonly" id="item_id_1" name="item_id_1" value="">
		<input type="hidden" readonly="readonly" id="item_descr_1" name="item_descr_1" value="">
		<input type="hidden" readonly="readonly" id="item_quant_1" name="item_quant_1" value="1">
		<input type="hidden" readonly="readonly" id="item_valor_1" name="item_valor_1" value="">
	</form>
 <script>
//var www = jQuery("#www").val();
var idplano;
var www = "<?=$ROOTPATH?>";
var team_id = '<?php echo $idpedido; ?>';
var gratis="";
var idpagamento="";
var nomeplano="";
<?php if(isset($login_user[id])) { ?>
var idusuariologado = <?=$login_user[id]?>;
<?php } ?>
 function calc(){
    var valortotal = 0  
    var valorplano = 0  
    var totalpagarsemformatacao = 0  
	planoanunciocheck = J("input[type=checkbox][name=planoanuncio]:checked").val()
    var checkplano="";
	J(".cinput:checked").each(function(){
		checkplano =  this.value;
	});    
	arrvalor = checkplano.split("##"); 
	valorplano = arrvalor[0]; 
	idplano = arrvalor[1]; 
	nomeplano = arrvalor[2]; 
	var totalupgrade=0;  
	J(".classupgrade:checked").each(function(){   
		totalupgrade+=parseFloat(J(this).val()) || 0; 
	}); 
	var idupgrades="";  
	J(".classupgrade:checked").each(function(){    	
		idupgrades+=J(this).attr("idupgradec")+","
	}); 
	//alert(totalupgrade + ", " + valorplano);
	if(valorplano!="on"){
		if(valorplano == "" || valorplano == undefined) {
			valorplano = 0;
		}
		valortotal =  parseFloat(totalupgrade) + parseFloat(valorplano) || 0;
		totalpagarsemformatacao =  parseFloat(totalupgrade) + parseFloat(valorplano) || 0;
	}
	else{
		valortotal =  parseFloat(totalupgrade) || 0;
	}
	//alert(valortotal);
	valortotal 	=  float2moeda(valortotal); 
	//alert(valortotal)
   //$valor_original = number_format($team['team_price'], 2, ',', '.');
   J("#totalpagar").html( "Total a Pagar: R$ "+ valortotal );
   J("#ref_transacao").val( "AREAPUBLICA"+idupgrades);
   J("#reference").val( "AREAPUBLICA"+idupgrades);
   J("#item_valor_1").val( valortotal);
	 return true; 
}
function enviapag_normal(valorform){
	    var checkplano="";
		J(".cinput:checked").each(function(){
			checkplano =  this.value  ;
		});  
		if(checkplano=="on"){
			alert("Por favor, escolha um plano")
			return;
		}
		/*
		var aceitar=''; 
		aceitar = J("input[type=checkbox][name=termosplano]:checked").val() 
		if( aceitar != "on" & aceitar != "1") {
				alert("Você precisa aceitar a política de uso para prosseguir.")
				return;
		}  
		*/
	    gravaplano();   
}   
function fecharanunciogratis(){
	plano  = J("input[name='planos_publicacao']:checked").val();
	planoarr = plano.split('##');
	 idplano = planoarr[0];
	 valor = planoarr[1];
	 gratis = planoarr[2]; 
		if(gratis=="s"){  
			finalizaanunciogratis(idusuariologado);
		}
		else{
			alert('Este anúncio não é grátis. Por favor, escolha um plano grátis.');
		}
}
function mostravalor(){
	 plano  = J("input[name='planos_publicacao']:checked").val();
	 planoarr = plano.split('##');
	 idplano = planoarr[0];
	 valor = planoarr[1];
	 gratis = planoarr[2];
	descricao = "Pagamento de <?="anúncio"?> - Plano R$ "+valor; 	 
	J("#valoranuncio").val(valor); 
	J("#item_descr_1").val(descricao); 
   <? if($_REQUEST['republica']=="true"){?>
		J("#reference").val("republicaWW"+idplano); 
		J("#ref_transacao").val("republicaWW"+idplano);  
	<? } 
	else {?>
		J("#reference").val(idplano); 
		J("#ref_transacao").val(idplano);
	<? }?>
	jQuery('#item_valor_1').val(valor)
	if(gratis=="s"){
		 J('.termo_uso').fadeOut('slow', function() {
		   J('.termo_uso').hide()
		 }); 
		 J('.botaogratis').fadeIn('slow', function() {
		 J('.botaogratis').show()
		 });
	}
	else{
		J('.botaogratis').fadeOut('slow', function() {
		   J('.botaogratis').hide()
		 }); 
		 J('.termo_uso').fadeIn('slow', function() {
		 J('.termo_uso').show()
		 });
	}
}
 var iduser=""; 
function gravaplano(){  
	var erro = false;
	if(iduser==""){
			iduser  = LOGINUID
		}	
		if(iduser==""){
			//alert('O usuário está vazio. Por favor, entre em contato conosco')
			location.href  = "<?php echo $ROOTPATH; ?>/mlogin";			
			return;
		}
		J.ajax({
			   type: "POST",
			   cache: false,
			   async: false,
			   url: "<?php echo $INI['system']['wwwprefix']?>/include/funcoes.php",
			   data: "acao=verifica_situacao_plano_atual&idusuarioplano="+iduser,
			   success: function(retorno){
			   retorno = jQuery.trim(retorno);
				//alert("|"+retorno+"|")
			   if(jQuery.trim(retorno)!=""){   
					if(retorno=="0" || retorno=="-1" || retorno=="-2"  || retorno=="" || retorno=="-99"){
					}
					else{  		    
						alert("Já existe um plano ativo em sua conta. Você deve publicar todos os anúncios restantes antes de adquirir um novo plano de anúncios");
						erro = true ;			 
					}
				} 
			   else {  		    
					alert( "Codigo 134 "+retorno);
					erro = true ;		 
				}		  
			}
		});
		if(!erro){
			 var idupgrades;
			 var idupgrades = J("#reference").val();
			 var tipopag; 
			 valorcompra  = J("#item_valor_1").val(); 
			 valorcompra = valorcompra.replace(".", ","); 
			 //valorcompra =  parseFloat(valorcompra);
			 //alert("valor 2: " + valorcompra);
			 if(valorcompra == '0,00'){
				tipopag = "tdgratis";
				finalizaanunciogratis(iduser);
			 }
			 else{ 
				 J.colorbox({html:"<font color='black' size='2'> Redirecionando para a realização do pagamento em ambiente seguro...</font>", width:"95%"});
				 J.get("<?php echo $INI['system']['wwwprefix']; ?>/include/funcoes.php?acao=gravaplano&idupgrades="+idupgrades+"&partner_id="+idusuariologado+"&idplano="+idplano,
				  function(data){ 
						idpartnerplano = jQuery.trim(data);
						//alert(idpartnerplano);
					   J("#item_id_1").val(idpartnerplano); 
				      J("#item_descr_1").val( "Aquisição de Plano: "+nomeplano+ " Cod Aquisicao "+idpartnerplano ); 
						 J("#pagseguro").submit(); 	 
				}); 
			}		
		}	 
}
function finalizaanunciogratis(idcliente){  
		 J.get("<?php echo $INI['system']['wwwprefix']; ?>/include/funcoes.php?acao=finalizaanuncio&partner_id="+idcliente+"&idplano="+idplano,
		  function(data){
			  if(jQuery.trim(data)!=""){ 
					alert(data)
			 }
			 else{ 
				//J.colorbox({html:"<font color='black' size='2'> Você será redirecionado para iniciar o cadastro do seu anúncio !</font>"}); 
				location.href  = "<?php echo $INI['system']['wwwprefix']; ?>/adminanunciante";
			}
		});  
}
 </script>