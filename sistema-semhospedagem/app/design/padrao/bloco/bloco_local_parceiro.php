 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>  
 <div class="carro-detalhe" style="clear:both;">
	 <div class="span-16 raio-5 last avaliacao fundobranco"> 
		<div class="titulocc borda-bottom-1 padding-bottom-10">   
			<div class="span-8 borda-bottom-1 fundosecao" style="width:615px;">
				<div class="alturasecao" style="margin-top:-10px;"> 
						<div class="titfipe">Dados do Anunciante
					</div> 
				</div>
			</div>
			
			<div class="jump-1 margin-top-10" style="margin-bottom:21px;">
				<div style="float:left;width:100%;">
					<span class="span-4 size-12">	
						 
						<?php  
							$user  = Table::Fetch('user', $team['partner_id']);
						 if($user['tipoanunciante'] !="Particular"){?> 
							<?
							$endereco="";
							if($user['address']!=""){
							$endereco.=$user['address']. " ";
							$endegoogle .= $user['address']. " ";}
							if($user['numero']!=""){
							$endereco.= $user['numero']. ", ";
							$endegoogle .= $user['numero']. " ";}
							//if($user['chavesms']!="")
							//$endereco.=$user['chavesms']. " ";
							if($user['bairro']!=""){
							$endereco.=$user['bairro']. " ";}
							if($user['cidadeusuario']!=""){
							$endereco.=$user['cidadeusuario']. " ";
							$endegoogle .= $user['cidadeusuario']. " - ";}
							if($user['estado']!="") {
							$endereco.= "- ".$user['estado']. " "; 
							$endegoogle .= $user['estado']. " "; }
							if($user['zipcode']!="") {
							$endereco.=$user['zipcode']. " ";}

							$endegoogle = retira_acentos($endegoogle);

							?> 
							<div style="float:left;margin-right:20px;width:182px;">						
								<div style="margin-left: -23px;margin-bottom: 9px;font-size: 16px;"> <b><?php echo  utf8_decode($user['realname']) ; ?></b></div>
								<div style="float:right;width:204px;">
								<?php if(isset($user['imagem']) && !empty($user['imagem'])){ ?>
									<img style="max-width: 240px;"src='<?php echo $ROOTPATH."/media/".substr($user['imagem'],0,-4).".jpg";?>' title='<?php echo utf8_decode($user['realname']); ?>' alt='<?php echo utf8_decode($user['realname']); ?>'> 
									<br /><br />
								<?php } ?>
									Endereço: <br /> <?=utf8_decode($endereco)  ; ?> 
								 <?php if($user['site'] != ""){?>
									<div><br />Site: <br /><a   href="<?php echo $user['site']; ?>" target="_blank"><?php echo utf8_decode(domainit($user['site'])); ?></a></div>
								<?php } ?>
								<?php if(isset($user['cnpj'])){ ?>
									<div>  <br />CNPJ: <br /><?=$user['cnpj']; ?></div>
								<?php } ?>								
								</div>  
							</div>
							<div style="float:right;margin-right: 10px;"> <a class="linknew" href="javascript:getfones('<?=$team['partner_id']?>');"><img  src='<?php echo $PATHSKIN."/images/iconetel.png"?>'> Ver telefone </a>
							</div>
							<div style="margin-top:8px;clear:both;float:left;margin-left:-22px; ">	 
								Ao ligar, informe ter visto o an&uacute;ncio no site <?=utf8_decode( $INI['system']['sitename'])?>
							</div>
							<?php  if($user['address'] != "" and $INI['option']['bloco_googlemaps'] == "Y" ){?>
								<div style="clear:both;margin-top:-9px; width: 627px;margin-left:-49px;"> <iframe frameborder="0" height="573" width="624" scrolling="no" src="<?=$ROOTPATH?>/maps.php?endereco=<?=$endegoogle;?>" id="imaps"></iframe></div>
							<? } ?>   
						<? } 
						else {?>	 
				
							<div style="float:left;margin-right:20px;width:182px;">						
								<div> Falar com <b><?php echo getnomeanunciante($team['partner_id']); ?></b></div> 
							</div>
							<div style="float:right;margin-right: 10px;">  <a class="linknew" href="javascript:getfones('<?=$team['partner_id']?>');"><img  src='<?php echo $PATHSKIN."/images/iconetel.png"?>'> Ver telefone </a>
							</div>
							<div style="clear:both;"> Ao ligar, informe ter visto o an&uacute;ncio no site <?=utf8_decode( $INI['system']['sitename'])?></div>
							  			  
						<? } ?>
						<script>
						function getfones(iduser,partner_id){
						
							J.ajax({
							   type: "POST", 
							   cache: false,
							   async: false,
							   url: "<?php echo $INI['system']['wwwprefix']?>/include/funcoes.php",
							   data: "acao=getfones&iduser="+iduser+"&partner_id="+partner_id, 
							   success: function(retorno){ 
									 jQuery.colorbox({html:retorno});  	 
								}
							});
						
						
						}
						</script>
	
					</span> 
				</div>
				 
				 
			</div>
		  </div>
	 	<div class="tfipeendegoogle">   </div>
	 </div>
 </div> 
	