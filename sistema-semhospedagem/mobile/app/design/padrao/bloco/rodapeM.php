<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
<div class="rodapeM">
	<div class="titleFooter">
		<p>
			Links úteis
		</p>
	</div>
	<ul>
		<?php if(!($login_user)) { ?>
		<li class="linksItemFooter">
			<a href="<?php echo $ROOTPATH; ?>/mlogin">
				Cadastrar
			</a>
		</li>		
		<li class="linksItemFooter lastList">
			<a class="linksItemFooter" href="<?php echo $ROOTPATH; ?>/mlogin">
				Entrar
			</a>
		</li>
		<?php } else { ?>
		<li class="linksItemFooter lastList">
			<a class="linksItemFooter" href="<?php echo $ROOTPATH; ?>/?page=meusdados">
				Minha conta
			</a>
		</li>		
		<?php } ?>
		<li class="linksItemFooter firstList">
			<a href="<?php echo $ROOTPATH; ?>/page/about_us">
				Quem somos
			</a>
		</li>		
		<li class="linksItemFooter">
			<a href="<?php echo $ROOTPATH; ?>/page/about_terms">
				Termos de uso
			</a>
		</li>		
		<li class="linksItemFooter">
			<a href="<?php echo $ROOTPATH; ?>/parceiros">
				Seja nosso parceiro
			</a>
		</li>		
		<li class="linksItemFooter">
			<a href="<?php echo $ROOTPATH; ?>/contato">
				Entre em contato
			</a>
		</li>		
	</ul>
</div>	