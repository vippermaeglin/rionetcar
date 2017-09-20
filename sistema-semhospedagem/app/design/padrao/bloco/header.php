<div style="display:none;" class="tips"><?=__FILE__?></div>
<header>
   <?php 
   
    require_once(WWW_ROOT."/include/funcoes_contador.php"); ?>
 
	 <div class="viplogo"><a href="<?=$ROOTPATH?>"><img class="logotipo" border="0" src="<?=$ROOTPATH?>/include/logo/logo.png"></a></div>
      <!-- DIV DO MENUS TOP -->
	 <ul id="header_links"> 
		 <?php if($login_user){ ?> 
				  <li><a href="<?=$ROOTPATH?>/index.php?page=meusdados"><span class="spanmenu">Meus Dados</span></a></li>
				  <? if($INI['option']['anunciousuario']=="Y"){?><li class="about"><a  href="<?=$ROOTPATH?>/adminanunciante/"><span class="spanmenu">Meus anúncios</span></a></li><? } ?> 
				  <? if($INI['option']['anunciousuario']=="Y"){?><li class="about"><a href="<?=$ROOTPATH?>/adminanunciante/team/propostas.php"><span class="spanmenu">Propostas</span></a></li><? } ?> 
				   <li><a href="<?=$ROOTPATH?>/autenticacao/logout.php"><span class="spanmenu">Sair</span></a></li>
		<?php } else { ?>
		
				<li><a class='tk_logar' href="#"><span class="spanmenu">Entrar</span></a></li>
				<li><a class='tk_cadastrar' href="#"><span class="spanmenu">Cadastrar</span></a></li>
				<? if($INI['option']['anunciousuario']=="Y"){?><li><a  href="<?=$ROOTPATH?>/index.php?page=queroanunciar"><span class="spanmenu">Quero Anunciar</span></a></li><? } ?> 
			 
		<?php }?>
	   
	 </ul>
	
		 <script type="text/javascript"> 
            J(function() {
                var d=300;
                J('#navigation a').each(function(){
                    J(this).stop().animate({
                        'marginTop':'-80px'
                    },d+=150);
                });

                J('#navigation > li').hover(
                function () {
                    J('a',J(this)).stop().animate({
                        'marginTop':'-70px'
                    },200);
                },
                function () {
                    J('a',J(this)).stop().animate({
                        'marginTop':'-80px'
                    },200);
                }
            );
            });
 
        </script> 
    <!-- FIM MENUS TOP -->
    <div class="topo"  style="margin-top: 44px; background: transparent;">   
  
		<div class="cidade" id="divCidadeTotal">
	 
	  <?php 
	  // $ehome = true;
	  
	 if($INI['option']['bannertopo'] == "Y" or $INI['option']['bannertopo'] == "" ){
		require_once(DIR_BLOCO."/bannertopo.php"); 
	 }
	 else{?>
		  
		<div class="bktopoci">Escolha seu estado</div>
			<div class="bgcity">
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody><tr>
						<td style="height: 48px; width: 300px; padding-left: 10px;padding-top:9px;">
							<? 
						 
								if($_REQUEST['uf'] ) { 
									 $uf = $_REQUEST['uf']; 	
								}
								 else if($_COOKIE["coduf"] ) {
									 $uf = $_COOKIE["coduf"]; 	
								}
								 
								 setcookie("coduf",$uf, time()+60*60*24*30,"/");
								 echo retornaNomeEstado($uf) ;
							 
							
							?>
						</td>
						<td>
							<img style="cursor: pointer; display:none;" alt="Exibir Cidades" src="<?=$PATHSKIN?>/images/seta-up.png"  id="btabre" onclick="trocabjcidade(0)">
							<img style="cursor: pointer; display:block;" alt="Exibir Cidades" src="<?=$PATHSKIN?>/images/seta-down.png" id="btafecha" onclick="trocabjcidade(1)">
			
						</td>
					</tr>
				</tbody>
				</table>
				 
			</div>
			 <div class="menurol">
				 <ul id="myMenu"  class="the_menu"><!--margin-top:0;-->
			 
				 <li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/TODOS">Todos os Estados</a></li>
				 <li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/AC">Acre</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/AL">Alagoas</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/AM">Amazonas</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/AP">Amapá</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/BA">Bahia</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/CE">Ceará</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/DF">Distrito Federal</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/ES">Espírito Santo</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/GO">Goiás</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/MA">Maranhão</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/MG">Minas Gerais</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/MS">Mato Grosso do Sul</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/MT">Mato Grosso</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/PA">Pará</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/PB">Paraíba</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/PE">Pernambuco</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/PI">Piauí</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/PR">Paraná</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/RJ">Rio de Janeiro</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/RN">Rio Grande do Norte</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/RO">Rondônia</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/RR">Roraima</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/RS">Rio Grande do Sul</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/SC">Santa Catarina</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/SE">Sergipe</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/SP">São Paulo</a></li>
				<li><a href="<?php echo $INI['system']['wwwprefix']?>/veiculos/estado/TO">Tocantins</a></li>

				</ul>
			</div> 
		<? } ?> 
	</div>  
	
	<!--
	<div class="oferta">
		<div class="bktopo" onkeypress="javascript:return WebForm_FireDefaultButton(event, 'topo1_ibtCadastrar')" id="topo1_pnlOverta">

			Cadastre-se em nossa newsletter:
			<div class="city">
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody><tr>
						<td style="height: 48px; padding-left: 0px;">
							<input type="text" style="color:#333333;background-color:Transparent;border-width:0px;font-family:Georgia;font-size:21px;width:258px;margin-top:1px;height:21px;box-shadow:none;" id="emailnews" onfocus="if(this.value =='Insira seu e-mail' ) this.value=''" onblur="if(this.value=='') this.value='Insira seu e-mail'" value="Insira seu e-mail" >
						</td>
						<td valign="top" style="padding: 1px 0px 0px 5px;">
						<input  class="inputcamponewslettter" type="image" onclick="javascript:envianewsletter(J('#emailnews').val());" src="<?=$PATHSKIN?>/images/email-ok.png">
							<div  class="loadhead" id="loadingcontatoheader">  </div>
						</td>
					</tr>
				</tbody></table> 
			</div> 
		</div>
	</div>
	-->
	
</div>
 
<script>
//Codigo para tratar o tamanho do menu
	var w=0;
	 J('#myMenu').show();
	J('#myMenu li').each(function(){
	  w += J(this).width()
	})
	if(w>700){w=700} //tamanho maximo depois disto aumenta a altura
	J('#myMenu').css('width',w+'px');
	var l = 155 - (w/2);
	J('#myMenu').css('left',l+'px');
	J('#myMenu').hide(); 
</script>

<script>
	
 function trocabjcidade(tipo){
		 
		 if(tipo==1){
			J("#btabre").show();
			if(!document.addEventListener){ 
				J('ul.the_menu').hide(); 
			}
			J('ul.the_menu').show(); 
			J("#btafecha").hide(); 
		 }
		 else{
			if(!document.addEventListener){ 
				J('ul.the_menu').show(); 
			}
			J('ul.the_menu').hide();
			J("#btabre").hide();
			J("#btafecha").show();
		 }
	}
 
</script>
</header>

<? require_once(DIR_BLOCO."/bloco_menu.php"); ?>
 
	<div class="blocopesquisa">
		<? require(DIR_BLOCO."/bloco_formpesquisa.php"); ?>
	</div>
  
  <!-- DIV OCULTA QUE IRÁ ABRIR QUANDO A AUTENTICACAO FOR REQUISITADA -->
  
    <?php require_once(WWW_ROOT."/app/design/padrao/bloco/autenticacao.php"); ?>

  <!-- FIM - DIV OCULTA QUE IRÁ ABRIR QUANDO A AUTENTICACAO FOR REQUISITADA -->