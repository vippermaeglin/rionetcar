<?php include template("manage_header"); ?>
<link rel="stylesheet" href="/media/css/template.css" />
<div id="bdw" class="bdw">
	<div id="bd" class="cf">
		<div id="help">
			<div class="dashboard" id="dashboard">
				<ul><?php echo mcurrent_misc('index'); ?></ul>
			</div>
			<div id="content" class="coupons-box clear mainwide">
				<div class="box clear">
					<div class="box-top"></div>
					<div class="box-content">
						<!-- inicio : novo index -->
						<div class="m">
							<div class="adminform">
								<div class="cpanel-left">
									<div class="cpanel">
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/team/index.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/Bookmark-add-icon.png" ><span>Gerenciar anúncios</span></a></div>
										</div>
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/system/index.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/Sign-Info-icon.png"><span>Informações do Site</span></a></div>
										</div>
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/system/option.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/app-settings-icon.png"><span>Configurar Sistema</span></a></div>
										</div>
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/system/bulletin.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/announcements-icon.png"><span>Gerenciar Banners <br /> e Avisos</span></a></div>
										</div>
									 
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/user/index.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/user-group-icon.png"><span>Gerenciar Usuários</span></a></div>
										</div>
								 
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/category/index.php?zone=group">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/Actions-view-list-tree-icon.png"><span>Categorias e Menus</span></a></div>
										</div>
									 
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/misc/feedback.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/message-already-read-icon.png"><span>Sugestões e Contatos</span></a></div>
										</div>
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/system/email.php">
													<img width="68" height="68" alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/configuration-settings-icon.png"><span>Configurar Envio <br /> de E-mails</span></a></div>
										</div>
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/order/index.php">
												<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/shop-cart-add-icon.png"><span>Gerenciar Planos</span></a></div>
										</div>
									 
										<div id="plg_quickicon_joomlaupdate" class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/system/logo.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/logo.png"><span>Alterar Logo</span></a></div>
										</div>
										   
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/system/page.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/Document-Write-icon.png"><span>Criar Páginas</span></a></div>
										</div>
									 
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/user/index.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/Office-Customer-Male-Light-icon.png"><span>Gerenciar Anunciantes</span></a></div>
										</div>
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/misc/backup.php">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/cd-burner-copy-icon.png"><span> Backup do Banco de Dados</span></a></div>
										</div>
									 
									 
										<div class="icon-wrapper"><div class="icon"><a href="<?= $ROOTPATH ?>/vipmin/system/redes.php?pg=redessociais">
													<img alt="" src="<?= $ROOTPATH ?>/skin/padrao/icones/social-facebook-box-blue-icon.png" ><span>Redes Sociais</span></a></div>
										</div>
										
										<!--<div class="icon-wrapper" id="plg_quickicon_extensionupdate"><div class="icon"><a href="<?=$ROOTPATH ?>/vipmin/misc/subscribe.php">
													<img src="<?=$ROOTPATH?>/skin/padrao/icones/Actions-news-subscribe-icon.png" alt=""><span>Inscritos em Newsletter</span></a></div>
										</div>-->
									</div>

								</div>
					  			
					 
						<div class="box-bottom"></div>
					</div>
				</div>
			</div>
		</div> <!-- bd end -->
	</div> <!-- bdw end -->
	<script type="text/javascript" src="<?=$ROOTPATH?>/js/jquery.cookie.js" ></script>
	<?
	  
	 
		function getNav(){
		
			$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
			$firefox = strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox') ? true : false;
			$safari = strpos($_SERVER["HTTP_USER_AGENT"], 'Safari') ? true : false;
			$chrome = strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') ? true : false;
			
			if($msie){
					return "IE";
			}
			else if($firefox){
					return "firefox";
			}
			else if($chrome){
					return "chrome";
			}
		 }
	 

	// verifica pendencias de configuração:
	  $navegador = getNav();
	 
	  if($INI['mail']['from'] == "" and $INI["mail"]["mail"] =="mail" ) { ?>  
		 <script> 
		 jQuery(document).ready(function(){
			 jQuery.colorbox({html:"<div style='font-size:12px;height:100px;'><img src=<?=$ROOTPATH?>/media/css/i/excla.jpg>Você ainda não configurou nenhum email. <br>Por favor, vá na opção Sistema->Configurar e-mails e informe o seu email de remetente.</div>"});
		 });
		</script>
	  <? }  	 
	   
	   
	  if($navegador=="firefox" and !$_COOKIE['navegadorfire']) { ?>  
		 <script> 
		 jQuery(document).ready(function(){
			 jQuery.colorbox({html:"<div style='font-size:12px;height:130px;'><img src=<?=$ROOTPATH?>/media/css/i/excla.jpg>Notei que você está usando o navegador firefox, foi verificado que o upload de imagens pelo editor web (tinymce)<br> está dando conflito em algumas versões mais recentes do firefox, se este for o seu caso, sugerimos logar nesta administração <br> com o navegador Chrome. Estamos trabalhando para verificar a causa e atualizar o mais rápido possível.</div>"});
			 jQuery.cookie('navegadorfire', '1', { expires: 3 });
		 });
		</script>
	  <? }  
	  
	 if($navegador=="IE" and !$_COOKIE['navegadorie']) { ?>  
		 <script> 
		 jQuery(document).ready(function(){
			 jQuery.colorbox({html:"<div style='font-size:12px;height:130px;'><img src=<?=$ROOTPATH?>/media/css/i/excla.jpg>Notei que você está usando o navegador Internet Explorer. Para que você possa usufruir <br> de todas os recursos desta administração, sugiro que acesse com o navegador Chrome. </div>"});
			 jQuery.cookie('navegadorie', '1', { expires: 3 });
		 });
		</script>
	  <? } ?>
	  
	<?php include template("manage_footer"); ?>
	