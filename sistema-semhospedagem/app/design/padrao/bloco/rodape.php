<div style="display:none;" class="tips"><?=__FILE__?></div>

	
<!--suporte   

<div class="atendimento">  
	<a href="javascript:void(window.open('<?=$ROOTPATH?>/suporte/chat.php','','width=590,height=580,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))"><img src="<?=$PATHSKIN?>/images/atendimentoonline.png"></a>
</div>

suporte-->  
   
 <div id="rodape" <? if($navegador != "firefox"){?> style="position:absolute;" <? } ?>>
    <div class="rodape_curva"></div>
    <div id="content_rodape">
          <div class="caixa">
            <p class="marcador">Quem Somos</p>
            <p>O <?=utf8_decode($INI["system"]["sitename"])?> ajuda as pessoas a explorarem as cidades onde moram. Realizamos a filtragem e moderação de todos os anúncios. Levamos a você o que há de melhor em produtos e serviços, novos ou usados...</p>
            <div>Ver mais <a href="/page/about_us">detalhes</a></div>
        </div>	
        <div class="caixa">
            <p class="marcador">Parceria</p>
            <p>Visibilidade para uma audiência qualificada de milhões de pessoas. Ferramenta de marketing extremamente eficiente e livre de risco. Resultados imediatos e mensuráveis</p>
            <div>Ver mais <a href="/parceiros">detalhes</a></div>
			</div>
        <div id="seguranca" class="caixa">
            <p class="marcador">Compre com  SEGURANÇA! </p>
            <p>"Cabe exclusivamente ao usuário certificar-se da idoneidade do anunciante, da existência, propriedade e estado do produto/serviço que pretende adquirir."</p>
          
        </div>
        <hr>
		
        <div id="navegacao_rapida" class="caixa">
            <p class="marcador">Navegação Rápida </p>
            <ul>
                <li>
				<h3 style="color:#FFF;font-weight:bold;font-size:12px;"> Conheça </h3>
                    <ul>
                        <li><a href="/page/about_us">Quem Somos</a></li> 
                        <li><a href="/page/about_terms">Termos de Uso</a></li> 
                    </ul>
                </li>
                <li><h3 style="color:#FFF;font-weight:bold;font-size:12px;"> Participe </h3>
                    <ul>
                        <li><a href="/parceiros">Seja nosso parceiro</a></li>
                        <li><a href="/contato">Entre em contato</a></li>
                    </ul>
                </li>
                <li id="controle"><h3 style="color:#FFF;font-weight:bold;font-size:12px;"> Controle </h3>
                    <ul>
                        <!--{if $login_user}-->
                       <?php if($login_user){ ?> <li><a class="account" href="/conta">Minha Conta</a>  | <a href="/sair">Sair</a>  </li><?php } ?>
                        <!--{else}-->
                        <?php if(!$login_user){ ?> <li><a class='tk_cadastrar' href="#">Cadastre-se</a> | <a class='tk_logar' href="#">Entrar</a></li><?php } ?>
                        <!--{/if}--> 
                        <?php if (is_manager(false, true)){?>
							<li><a href="/vipmin">Administração</a></li>
						<?php } ?>
                        <!--{/if}-->
                    </ul>
                </li>
            </ul>
        </div>
        <div id="acompanhe" class="caixa">
            <p class="marcador">Acompanhe</p>
            <div id="compartilhe">
                <h3 style="color:#FFF;font-weight:bold;font-size:12px;"> Compartilhe </h3>
              	<ul class="acompanhe" style="width: 291px;">
						<!-- <li class="titulo">Acompanhe</li> -->
						<li style="padding-left:0px">
							 <?php if( $INI['other']['twitter']  != ""){ ?><a href="<?=$INI['other']['twitter']?>" target="_blank"><img src="<?=$PATHSKIN?>/images/twitter.png" /></a><?php } ?>
							 <?php if( $INI['other']['facebook']  != ""){ ?><a href="<?=$INI['other']['facebook']?>" target="_blank"><img style="margin-top:-2px" src="<?=$PATHSKIN?>/images/facebook.png" /></a><?php } ?>
							 <?php if( $INI['other']['orkut']  != ""){ ?><a href="<?=$INI['other']['orkut']?>" target="_blank"><img style="width: 53px; margin: -4px;" src="<?=$PATHSKIN?>/images/instagram.png" /></a><?php } ?>
						</li>
					</ul>
            </div> 
        </div>
        <hr>	
      <div id="copyright">
		<p>&copy;  <?= utf8_decode($INI["system"]["sitename"])?> Ltda - Todos os direitos reservados.</p>
      </div> 



    </div>

</div>
<div style="display:none;" class="webdeveloper"><a  style="margin-left:10px;"href="#" onclick="javascript:J('.tips').css('display', 'block')">Ver local dos arquivos</a> | <a href="#" onclick="javascript:J('.tips').css('display', 'none')">Ocultar local dos arquivos</a>  | <a href="#" onclick="javascript:J('.webdeveloper').css('display', 'none')">Desligar Tkstore developer</a> <a style="float:left;" href="http://www.sistemacomprascoletivas.com.br" target="_blank"><img title="Vipcom - O seu sistema de compras coletivas definitivo - o melhor script de compra coletiva da atualidade." alt="Vipcom - O seu sistema de compras coletivas definitivo - o melhor script de compra coletiva da atualidade." src="<?=$PATHSKIN?>/images/logoweb.png" /></a></div>



<? if($INI['option']['bloco_tkdeveloper'] == "Y"){?>
	<script>
		J('.webdeveloper').css('display', 'block')
	</script>
<? } ?>

<?  if( mostratopo()){?> 
		<script>
			J(document).ready(function() {
				J(".toptopo").show();
		 });
	</script>

<?  } ?>
