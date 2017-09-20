<?php
require_once("include/code/indique.php");
?> 
<?php  require_once("include/head.php"); ?>
<body id="page1">
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top"> 
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
    <div class="main">
       <?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content"> 
			
			<?php  require_once(DIR_BLOCO."/bannertopo.php"); ?>
            <div class="inside">
				<div class="container">
					<div class="col-1c">
						<div class="container">
						  <div class="col-6" style="width:98%;" >
								 <?php if( $login_user['username'] == "") { ?>
								 
									<div style="float:left;width:549px;font-size:13px;">
									<form id="formcad" name="formcad"  METHOD="POST" >
									 <H2> Convide seus amigos e ganhe <BR>R$ <?php echo number_format($systeminvitecredit,2,',',''); ?> em créditos   </H2>	
									  
									<div class="tail"></div><span  style="color:303030;font-size:12px;"> Receba <?php echo number_format($systeminvitecredit,2,',',''); ?>  de crédito quando o seu convidado fizer a primeira compra.</span>
									<div class="tail"></div><span  style="color:303030;font-size:12px;"> Convide todos os amigos que puder! Não há limite de quanto você pode ganhar.</span>
									<div class="tail"></div><span  style="color:303030;font-size:12px;">Por favor <a class='tk_logar' href="#" style="color:blue;"> faça seu login</a> ou  <a class='tk_cadastrar' href="#" style="color:blue;"> cadastre-se </a>  para você poder fazer seus convites</span>
									<br><br>
								   </form>
									 
									</div>
									
									<?php
									 require_once(DIR_BLOCO."/pgavulsaconvida.php");
									?>
									  
								 <? } else if( $_REQUEST['acao'] == "" or $_POST["recipients"]) { ?>
									
								<div style="float:left;margin-top:13px;width:561px;font-size:16px;">
								<form id="formcadconvida" name="formcadconvida"  METHOD="POST" >
								<?php if($_POST["recipients"]){ ?>
								<h3>   <?php echo $mensagem ?> </h3>  
								<? } 
								else{ ?>
								<h3> Convide seus amigos e ganhe <br>R$ <?php echo number_format($systeminvitecredit,2,',',''); ?> em créditos</h3> 
								<? } ?>
								<div   class="tail"> </div>
								<h2 style="font-size:16px;"> Você ganha R$ <?php echo number_format($systeminvitecredit,2,',',''); ?> em crédito para cada amigo que efetuar o cadastro e realizar uma compra.</h2>


								<!-- AddThis Button BEGIN -->
								  
								<div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="width:405px;">
								<a class="addthis_button_preferred_1" addthis:url="<?php echo $ROOTPATH; ?>/convite/<?php echo $login_user_id; ?>"></a>
								<a class="addthis_button_preferred_2" addthis:url="<?php echo $ROOTPATH; ?>/convite/<?php echo $login_user_id; ?>"></a>
								<a class="addthis_button_preferred_3" addthis:url="<?php echo $ROOTPATH; ?>/convite/<?php echo $login_user_id; ?>" ></a>
								<a class="addthis_button_preferred_4" addthis:url="<?php echo $ROOTPATH; ?>/convite/<?php echo $login_user_id; ?>" ></a>
								<a class="addthis_button_preferred_5" addthis:url="<?php echo $ROOTPATH; ?>/convite/<?php echo $login_user_id; ?>"></a>
								<a class="addthis_button_preferred_11" addthis:url="<?php echo $ROOTPATH; ?>/convite/<?php echo $login_user_id; ?>"></a>
								<a class="addthis_button_compact"  addthis:url="<?php echo $ROOTPATH; ?>/convite/<?php echo $login_user_id; ?>"></a>
								</div>
							 
								<!-- AddThis Button END -->
								<br>		 
								<span style="font-size:13px;"> Convide seus amigos digitando os e-mails separados por vírgula.</span>

								<textarea name="recipients" id="recipients" style="font-size:13px;width:548px;height:80px;padding:2px;color:#000;"></textarea>
								<br class="clear" /> 

								<span style="font-size:13px;">Conteúdo do convite</span>
								<br class="clear" /> 
								<textarea style="font-size:12px;height:84px;width:517px;"name="invitation_content" id="invitation_content" cols="50" rows="3"  >Olá, eu estava navegando quando encontrei o site <?php echo utf8_decode($INI['system']['sitename']); ?>, e achei simplesmente ofertas incriveis. Por que você não da uma olhada? Vale a pena! </textarea>
								<br class="clear" /> <br class="clear" /> 
								<input type="hidden" name="acao" value="enviadados">
								<input type="hidden" name="realname" value="<?= $login_user['realname']?>">
								<a href="javascript:cadastro();" class="link-1"><em><b>Convidar amigos</b></em></a>
								<br class="clear" /> 
								<br> 
								
							 

								<input type="hidden" id="login_user_id" name="login_user_id" value="<?=$login_user_id?>">
								<input type="hidden" id="login_user_email" name="login_user_email" value="<?=$login_user['email']?>">
								</form>
								</div>
									 
									<?php
									 require_once(DIR_BLOCO."/pgavulsaconvida.php");
									?>
									
								 <? }  ?>
							 </div>
						</div>
					</div>
				</div>
			</div>
        </section>
    </div>
</div> 
 
 <?php require_once(DIR_BLOCO."/rodape.php"); ?>
 
 
 
<script language="javascript">
  
J("#menu1").attr("class","")
J("#menu2").attr("class","")
J("#menu3").attr("class","")
J("#menu4").attr("class","current")

</script>

<script language="javascript">
	  
	function cadastro(){
	  
			if(J("#invitation_content").val() == ""){
				alert("Insira alguma mensagem para o seu convidado.")
				document.getElementById("invitation_content").focus();
				return;
			}
 
			if(J("#recipients").val() == ""){
				alert("Informe o(s) email(s) do(s) seu(s) convidado(s).")
				document.getElementById("recipients").focus();
				return;
			}		
			 
			 
		   J("#formcadconvida").submit();
			
	}	
  
 <?php  
	   if($enviou){ ?> 
			J(document).ready(function(){   
		     J.colorbox({html:"<span style='margin-left:26px;font-size:13px;color:#303030'>Parabéns ! Os seus convites foram enviados com sucesso.</span>"});
		 });
 <? }?>
<?php  
	   if(!$enviou and $_POST['recipients']){ ?> 
			J(document).ready(function(){   
		     J.colorbox({html:"<span style='margin-left:26px;font-size:13px;color:#303030'>Não foi possível enviar o(s) email(s). Por favor, entre em contato conosco relatando este ocorrido. Obrigado.</span>"});
		 });
 <? }?>
	 
</script>		
</body>
</html>
