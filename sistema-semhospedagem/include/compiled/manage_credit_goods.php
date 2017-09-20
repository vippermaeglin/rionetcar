<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_credit('goods'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Créditos para troca</h2>
					<ul class="filter">
						<li><a href="/vipmin/credit/ajax.php?action=edit" class="ajaxlink">Adicionar créditos para troca</a></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="50">ID</th><th width="350">Nome</th><th width="150">crédito trocado</th><th width="40" nowrap>Quantidade</th><th width="40" nowrap>Ordenar</th><th width="40" nowrap>Mostrar</th><th width="140">Operações</th></tr>
					<?php if(is_array($goods)){foreach($goods AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?>>
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['title']; ?></td>
						<td><?php echo $one['score']; ?></td>
						<td><?php echo $one['consume']; ?>/<?php echo $one['number']; ?></td>
						<td><?php echo $one['display']; ?></td>
						<td><?php echo $one['sort_order']; ?></td>
						<td class="op"><a href="/vipmin/credit/ajax.php?action=disable&id=<?php echo $one['id']; ?>" class="ajaxlink"><?php echo $one['enable']=='Y'?'forbid':'start'; ?></a>｜<a href="/vipmin/credit/ajax.php?action=edit&id=<?php echo $one['id']; ?>" class="ajaxlink">editar</a>｜<a href="/vipmin/credit/ajax.php?action=remove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Sure to delete this ?">deletar</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="8"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->


