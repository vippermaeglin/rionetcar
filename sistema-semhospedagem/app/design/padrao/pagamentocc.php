<?php
require_once("include/code/pagamentocc.php");
require_once("include/head.php");
?> 
 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/funcoespg.js"></script> 
<body id="page1">
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top">
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?> 
    <div class="main">
       <?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content">
            <div class="inside">
				<div class="container">
					<div class="col-1c">
						<div class="container">
						   <div class="col-6" >
							   <br class="clear" />
									<h3><?php echo $pagetitle ?> </h3>
									
								   <?php  if ($_POST['acao']=="") { ?>
									
									 <form id="formcadpg" name="formcadpg" method="post" action="">
										<table width="629" border="0" class="oferdir">
										 <tr>  <td colspan="3"> &nbsp; </td>  </tr>
										  <tr>
										   <td colspan="3">
										        <input style="width:15px;" type="radio" id="bandeira" name="bandeira" value="visa"> &nbsp;<img  title="Visa" alt="Visa"  src="<?=$PATHSKIN?>/images/bandeira_visa_off.png" />&nbsp;
										        <input style="width:15px;"type="radio" id="bandeira"  name="bandeira" value="martercard"> &nbsp;<img title="Mastercard" alt="Mastercard" src="<?=$PATHSKIN?>/images/bandeira_master_off.png" />&nbsp;
										        <input style="width:15px;"type="radio" id="bandeira"  name="bandeira" value="diners club"> &nbsp;<img title="Diners Club" alt="Diners Club" src="<?=$PATHSKIN?>/images/bandeira_diners_off.png" />&nbsp; 
										        <input style="width:15px;"type="radio" id="bandeira"  name="bandeira" value="american express"> &nbsp;<img title="America Express" alt="America Express" src="<?=$PATHSKIN?>/images/bandeira_amex_off.png" />&nbsp; 
										        <input style="width:15px;"type="radio" id="bandeira"  name="bandeira" value="aura">&nbsp;<img title="Aura" alt="Aura" src="<?=$PATHSKIN?>/images/bandeira_aura_off.png" />&nbsp;
										  </td>
										  </tr>
										  <tr>
											<td width="277">Número do Cartão</td>
											<td width="33">&nbsp;&nbsp;&nbsp;&nbsp;</td>
											<td width="305">Validade Cartão (mm/aa)</td>
										  </tr>
										  <tr>
											<td><label for="nomeuso2"></label>
											  <input maxlength="16" size="18" name="numerocartao" id="numerocartao" onKeyPress="return isNumberKey(event);" style="width:324px;font-size:11px;color:#000;" value="" /> 
											</td>
											<td>&nbsp;</td>
											<td><label for="email"></label> 
												 <input maxlength="5" size="12" name="validadecartao" id="validadecartao" style="width:324px;font-size:11px;color:#000;" value="" /> 
											</td>
										  </tr>
										  
										 <tr>
											<td width="277">Código de Segurança:</td>
											<td width="33">&nbsp;&nbsp;&nbsp;&nbsp;</td>
											<td width="305">Nome Impresso no Cartão:</td>
										  </tr>
										  <tr>
											<td><label for="nomeuso2"></label>
											  <input maxlength="5" size="6" name="segurancacartao" id="segurancacartao" onKeyPress="return isNumberKey(event);"  style="width:324px;font-size:11px;color:#000;"  value="" />
											  </td>
											<td>&nbsp;</td>
											<td><label for="email"></label> 
											 <input maxlength="50" size="40" name="nomecartao" id="nomecartao"  value=""  style="width:324px;font-size:11px;color:#000;" />
											</td>
											
											<input type='hidden' readonly="readonly" name='valor' value='<?php echo $_POST["valor"]   ?>'>
											<input type="hidden" readonly="readonly" name="pedido" value="<?php echo  $_POST["pedido"] ?>">
											<input type="hidden" readonly="readonly" name="team_id" value="<?php echo  $_POST["team_id"] ?>">
											<input type="hidden" readonly="readonly" id="bandeirainput" name="bandeirainput" value="">
											<input type="hidden" readonly="readonly" name="acao" value="1">
										  </tr>
										  <tr>
											<td colspan="3"> &nbsp;	</td>
										  </tr>
										  
										  <tr>
											<td colspan="3">
											<a  href="#" onclick="return enviaPg();"  class="link-1"><em><b>ENVIAR</b></em></a> 
											</td>
										  </tr>
										</table>
									 </form>
									 <? } ?>
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
J("#menu4").attr("class","")

</script>

<script language="javascript">
	  
 
	function isNumberKey(Key)
	{
       var charCode = (Key.which) ? Key.which : event.keyCode
       if (charCode > 47 && charCode < 58 || charCode == 8)
          return true;
       return false;
    }

	
	function isCardDate(valor)
	{
		ano = new Date();
		hoje = ano.getFullYear();
		h = String(hoje).substr(2,2);
		m = Number(valor.substr(0,2));
		a = Number(valor.substr(3,2));
		if((isNaN(m))||(isNaN(a))||(m<1)||(m>12)||(a<Number(h)-1)||(a>Number(h)+10))
		    return false;
        else
		    return true;
	}
	 
	function enviaPg()
	{
	    f = document.formcadpg;
	   bandeira = J('input:radio[name=bandeira]:checked').val();
	    if (!bandeira)
			{
				alert("Favor informar a bandeira do cartão de crédito.");
			 
				return false;
			}
			

        J('#bandeirainput').val(bandeira);
	 
	 
	    if (f.numerocartao.value == "")
			{
				alert("Favor preencher o número do cartão.");
				f.numerocartao.focus();
				return false;
			}

		 
		if (f.numerocartao.value.length < 14)
			{
				alert("Número de cartão inválido.");
				f.numerocartao.focus();
				return false;
			}
			
			
		if (f.validadecartao.value == "")
			{
				alert("Favor preencher a validade do cartão.");
				f.validadecartao.focus();
				return false;
			}
        if (isCardDate(f.validadecartao.value) == false)
            {
				alert("Favor preencher a validade do cartão no formato mm/aa.");
				f.validadecartao.focus();
				return false;
            }
		if (f.segurancacartao.value == "")
			{
				alert("Favor preencher o código de segurança do cartão.");
				f.segurancacartao.focus();
				return false;
			}
		if (f.nomecartao.value == "")
			{
				alert("Favor o nome impresso no cartão.");
				f.nomecartao.focus();
				return false;
			}
			
	    J("#formcadpg").submit();
		 
	}
 
  	 
</script>		
 <?php if ($_POST['acao']=="1" and $_SESSION['PG']=="sim") {
 	$_SESSION['PG'] =  "";
 ?>
	 <script>
		J(document).ready(function(){   
		J.colorbox({html:"<div style='text-align:center;width:350px;heigth:300px;margin-top:3px;'><img width='160' src='"+URLWEB+"/include/logo/logo.jpg'></div><br><span style='margin-left:26px;font-size:13px;color:#303030'><?=$pagetitle?></span>"});
	});		
	</script>
 <? }?>
		
</body>
</html>
