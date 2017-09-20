<?php  
 $navegador = getNavegador();
 
 if( $navegador=="ie"){?>
 <style>
 .detalhe_principal{
	margin-left:7px;
 }
 </style>
 <? } ?>

<div class="detalhe_principal" style="clear:both;">
 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
 <table cellpadding="0" cellspacing="0" border="0" width="947" bgcolor="#FFFFFF"> 
 <tr>
    <td colspan="3" width="720" valign="top" align="left">
		<div class="destaque_box_op">
			<?php   
				require_once(DIR_BLOCO."/ofertas_populares.php"); 
			  
			?>
		</div> 	  
	</td>
	
	<td width="20" valign="top"> &nbsp; </td>
    <!--COLUNA DE OFERTAS-->
    <td width="215" valign="top">
     	<?php  require_once(DIR_BLOCO."/coluna_direita.php"); ?>  
    </td>
 </tr> 
</table>

</div> 
	 
 <script> 	
	J(".secaotitulo").corner("round 2px");
</script>	