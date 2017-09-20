<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_afiliados('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Anunciantes</h2>
					<ul class="filter"><li><form method="get">Anunciante:<input type="text" name="ptitle" class="h-input" value="<?php echo htmlspecialchars($ptitle); ?>" > <input type="submit" value="selecionar" class="formbutton"  style="padding:1px 6px;"/><form></li></ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="40">ID</th><th width="320">nome</th> <th width="130">Link produtos</th><th width="60">Ofertas publicadas</th><th width="60">Pageviews totais</th><th width="40">Enviados totais</th><th width="100">operação</th></tr>
					<?php if(is_array($partners)){foreach($partners AS $index=>$one) { 
					
						$sql = "select SUM(visualizados) as visualizados, SUM(enviados) as enviados from produtos_afiliados where partner_id=".$one['id'];
						$rs = mysql_query($sql );
						$linha = mysql_fetch_assoc($rs );
						$qte_visualizacao = $linha['visualizados'];
						$qte_enviados = $linha['enviados'];
						if($qte_visualizacao==""){ $qte_visualizacao =0;}
						if($qte_enviados==""){ $qte_enviados =0;}
						
					    $sql = "select COUNT(id) as qtde_ofertas from produtos_afiliados where partner_id=".$one['id'];
						$rs = mysql_query($sql );
						$linha = mysql_fetch_assoc($rs );
						$qtde_ofertas = $linha['qtde_ofertas'];
						
					?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td style="text-align:left;"><a class="deal-title" href="/vipmin/parceiro/edit.php?id=<?php echo $one['id']; ?>"><?php echo $one['title']; ?></a></td>
						<td nowrap><a target="_blank" href="<?php echo $INI['system']['wwwprefix'] ?>/index.php?page=produtos_website_afiliado&idparceiro=<?php echo $one['id']; ?>"> clique para copiar o link </a></td>
						<td nowrap><?php echo $qtde_ofertas; ?></td>
						<td nowrap><?php echo $qte_visualizacao ?></td>
						<td nowrap><?php echo $qte_enviados ?></td>
						<td class="op" nowrap><a href="/vipmin/afiliado/edit.php?id=<?php echo $one['id']; ?>">editar</a> | <a href="/ajax/manage.php?action=partnerremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="tem certeza que quer apagar o parceiro?">deletar</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="7"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->


