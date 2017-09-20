	<div style="display:none;" class="tips"><?=__FILE__?></div> 
	
	<?php
	
	$base_system_url = str_replace('/mobile','', $ROOTPATH);
	?>
	
	<div class="headerM">
		<div class="logo">
			<a href="<?php echo $ROOTPATH; ?>">
				<img style="max-width:250px;" src="<?php echo str_replace("/mobile", "", $ROOTPATH); ?>/include/logo/logo.png" alt="Logo" title="Logo">
				<!-- <img src="<?php echo $ROOTPATH; ?>/include/logo/logo.png" alt="Logo" title="Logo">-->
			</a>
		</div>
		<div class="navigation">
			<a href="#">
				<img src="<?php echo $PATHSKIN; ?>/images/navigation.png" />
			</a>
		</div>
	</div>
	<div class="navigationMobile hidden">
		<ul>		
			<li class="linkPanel">
				<span class="navigationText">
				<?php if($login_user) { ?>
					<a href="<?php echo $ROOTPATH; ?>">Olá <?php echo utf8_decode($login_user['realname']); ?>!</a>
					<a class="navigationLogout" href="<?php echo $INI['system']['wwwprefix']; ?>/sair">
						Sair
					</a>
				<?php } else { ?>
					<a href="<?php echo $ROOTPATH; ?>/mlogin">Acessar conta</a>
				<?php } ?>
				</span>
			</li>			
			<?php if($login_user) { ?>
			
			<li>
				<a href="<?php echo $ROOTPATH; ?>">
					<span class="navigationText">
						<a href="<?php echo $base_system_url; ?>/adminanunciante">Anunciar</a>
					</span>
				</a>
			</li>	
			<li>
				<a href="<?php echo $ROOTPATH; ?>">
					<span class="navigationText">
						<a href="<?php echo $ROOTPATH; ?>/?page=meusdados">Meus dados</a>
					</span>
				</a>
			</li>			
			<li>
				<a href="<?php echo $ROOTPATH; ?>">
					<span class="navigationText">
						<a href="<?php echo $ROOTPATH; ?>/?page=propostas">Propostas recebidas</a>
					</span>
				</a>
			</li>
			<?php } ?>
			<li>
				<a href="<?php echo $ROOTPATH; ?>/?page=planos">
					Planos
				</a>
			</li>				
			<li>
				<a href="<?php echo $ROOTPATH; ?>/revendas">
					Revendas
				</a>
			</li>				
			<li>
				<a href="<?php echo $ROOTPATH; ?>/page/about_us">
					Quem somos
				</a>
			</li>		
			<li>
				<a href="<?php echo $ROOTPATH; ?>/page/about_terms">
					Termos de uso
				</a>
			</li>		
			<li>
				<a href="<?php echo $ROOTPATH; ?>/contato">
					Seja nosso parceiro
				</a>
			</li>		
			<li>
				<a href="<?php echo $ROOTPATH; ?>/contato">
					Entre em contato
				</a>
			</li>
		</ul>
	</div>
	<!--<div class="searchMobile">
		<div class="searchWord">
			<form method="POST" action="<?php echo $ROOTPATH; ?>/index.php?busca=true">
				<input maxlength="50" placeholder="O que você procura ? Ex: Gol" type="text" name="cppesquisa" id="cppesquisa">
				<input class="buttonSubmitSearch" type="image" src="<?php echo $INI['system']['wwwprefix']; ?>/skin/padrao/images/email-ok.png" onclick="javascript:pesquisa();">
			</form>
		</div>
	</div>-->