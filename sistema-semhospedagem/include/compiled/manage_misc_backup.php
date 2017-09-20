<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">  </div>
                <div class="sect">
				<form method="post">
					<div class="option_box"  >
						<div class="top-heading group">
							<div class="left_float"><h4>Backup do banco de dados</h4></div>
								<div class="the-button"> 
									<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
										<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div>
										<div id="spinner-text"  >Salvar</div>
									</button>
								</div> 
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group">
									<!-- =============================   coluna esquerda   =====================================-->
									<div class="starts">  
									
									 <table width="96%" border="0" align="center" class="coupons-table">
										<tr><td width="510px">Sugerimos realizar este backup diariamente.</td><td rowspan="11" valign="top" style="padding-left:20px"> </td></tr>
										<tr><td width="510px"><input type="radio" name="bfzl" value="quanbubiao" checked>Todos os dados: <span class="gray"> Gravar tudo em um único arquivo de backup.</span></td></tr>
										<tr><td width="510px"><input type="radio" name="bfzl" value="danbiao">Apenas uma tabela: &nbsp;<select name="tablename"><?php echo Utility::Option($option_table, null, 'Selecione a tabela'); ?></select>&nbsp;&nbsp;<span class="gray"> Backup de uma tabela para um arquivo</span></td></tr>
										<tr><td width="510px"><hr style="border:1px dashed; height:1px" color="#DDDDDD"></td></tr>
										
									 </table>

									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends"> 	
								 	 <table width="96%" border="0" align="center" class="coupons-table">
									 
										<tr><td width="510px">Backup em múltiplo volume</td></tr>
										<tr><td width="510px"><input type="checkbox" name="fenjuan" value="yes"> backup em múltiplo volume <input name="filesize" type="text" value="512" size="10"> K</td></tr>
										<tr><td width="510px"><hr style="border:1px dashed; height:1px" color="#DDDDDD"></td></tr>
										<tr><td width="510px">Selecione o local</td></tr>
										<tr style="display:none;" ><td width="510px"><input type="radio" name="weizhi" value="server" checked>backup no server</td></tr><tr class="cells">
										<td width="510px"> <input type="radio" name="weizhi" checked="checked" value="localpc">backup no meu computador</td></tr>
									 </table>
										 
									  </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div>
					</div> 
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end --> 
 <script>
	function validador(){
		return true;
	}
</script>
