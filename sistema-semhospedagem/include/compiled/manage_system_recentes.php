<?php include template("manage_header");?>
 
<?

$option_modelo= array(
	"1"=>"Padrão",
	"2"=>"Moderno",        
);

$option_paginacao= array(
	"3"=>"3",
	"6"=>"6",        
	"9"=>"9",        
	"12"=>"12",        
);

$option_posicao= array(
	"balao_mod_dir"=>"Direita",
	"balao_mod_esq"=>"Esquerda",               
);

if($INI['option']['modelo']  == "" ){
	$INI['option']['modelo'] = "1";
}
 if($INI['option']['paginacao']  == "" ){
	$INI['option']['paginacao'] = "6";
}
 
 
?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
			<ul><?php echo mcurrent_system_layout(); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Configuração de Ofertas Recentes</h2></div>
                <div class="sect">
                    <form method="post"> 
						<div class="field" style="display:none;">
                            <label style="width:178px;">Layout do bloco</label>

							<select name="option[modelo]"> 
								<?php echo Utility::Option($option_modelo, $INI['option']['modelo']); ?>
							</select>
                        </div>	
						<br> 
						<div class="field">
							
                            <label style="width:178px;">Balão de ofertas</label>
 
								<select name="option[balao]"><?php echo Utility::Option($option_yn, option_yesv('balao')); ?>  </select>
                        </div>	
						
						<div class="field">
							
                            <label style="width:178px;">Produtos Websites Afiliados</label>
 
								<select name="option[mostrar_ofertas_websites_afiliados_recentes]"><?php echo Utility::Option($option_yn, option_yesv('mostrar_ofertas_websites_afiliados_recentes')); ?>  </select>
								<span class="inputtip">Se 'Não', esses produtos não irão aparecer nos blocos de ofertas recentes e nem nas colunas: direita, esquerda e central. Porém, independente se 'Sim' ou 'Não' esses produtos serão visualizados pelo link direto do website afiliado</span>
								 
						</div>
	
						<br> 
						<div class="field" style="display:none;">
							 <label style="width:178px;">Posição do Balão</label>
							 <select name="option[posicao_balao]"><?php echo Utility::Option($option_posicao, $INI['option']['posicao_balao']); ?>  </select>
                        </div>
  
						<br> 
						<div class="field" style="display:none;">
							<label style="width:178px;">Contador</label>
							<select name="option[contador]"><?php echo Utility::Option($option_yn, option_yesv('contador')); ?> </select> 
                        </div>

						<div class="field" style="display:none;">
                            <label style="width:205px;">Número de ofertas por página</label>
							<select name="option[paginacao]"><?php echo Utility::Option($option_paginacao, $INI['option']['paginacao']  ); ?>  </select>
                        </div>	

<!-- hidedn -->

<select style="display:none;"  name="option[email_home]"><?php echo Utility::Option($option_yn, option_yesv('email_home')); ?></select> 
<input  style="display:none;" type="text" size="30"  name="option[email_home_cookie_time]" class="f-input" value="<?php echo $INI['option']['email_home_cookie_time']; ?>"  /> 
<input  style="display:none;" type="hidden" name="option[botaocomprar]" value="Y">
<select style="display:none;" name="option[bloco_tkdeveloper]"><?php echo Utility::Option($option_yn, option_yesv('bloco_tkdeveloper')); ?></select> 
<select style="display:none;"  name="option[cpf]"><?php echo Utility::Option($option_yn, option_yesv('cpf')); ?></select> 
<select style="display:none;"  name="option[bloco_googlemaps]"><?php echo Utility::Option($option_yn, option_yesv('bloco_googlemaps')); ?></select> 
<select style="display:none;"  name="option[ofertasdestaquerand]"><?php echo Utility::Option($option_yn, option_yesv('ofertasdestaquerand')); ?></select> 
<select style="display:none;"  name="option[convidados_newsletter]"><?php echo Utility::Option($option_yn, option_yesv('convidados_newsletter')); ?></select> 
<select style="display:none;"  name="option[enviaamigos]"><?php echo Utility::Option($option_yn, option_yesv('enviaamigos')); ?></select> 
<select style="display:none;"  name="option[importarcontatos]"><?php echo Utility::Option($option_yn, option_yesv('importarcontatos')); ?></select>

<!-- hidden -->

						<div class="act">
                            <input type="submit" value="Salvar" name="commit" class="formbutton" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php 

?>
