<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="help">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('upgrade'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
               
                <div class="sect">
				 <?php if($install){?>
					<div class="wholetip clear"><h3>ultima versão</h3></div>
					<div style="margin:0 20px;">
						<?php if(is_array($install)){foreach($install AS $v=>$l) { ?>
						<p><a href="<?php echo $l; ?>">Compco_<?php echo $v; ?></a></p>
						<?php }}?>
					</div>
				<?php }?>
				<?php if($upgrade){?>
					<div class="wholetip clear"><h3>Versões de atualização</h3></div>
					<div style="margin:0 20px;">
					<?php if(is_array($upgrade)){foreach($upgrade AS $v=>$l) { ?>
						<p><a href="<?php echo $l; ?>">Compco_Upgrade_<?php echo $v; ?></a></p>
					<?php if($upgradedesc[$v]){?>
						<p style="text-index:2em;"><?php echo $upgradedesc[$v]; ?></p>
					<?php }?>
					<?php }}?>
					</div>
				<?php }?>
				<?php if($patch){?>
					<div class="wholetip clear"><h3>Caminho</h3></div>
					<div style="margin:0 20px;">
					<?php if(is_array($patch)){foreach($patch AS $v=>$l) { ?>
						<p><a href="<?php echo $l; ?>">Compco_Patch_<?php echo SYS_VERSION; ?>_<?php echo $v; ?></a></p>
					<?php if($patchdesc[$v]){?>
						<p style="text-index:2em;"><?php echo $patchdesc[$v]; ?></p>
					<?php }?>
					<?php }}?>
					</div>
				<?php }?>
					<div class="wholetip clear"> <h3> passos para atualização </ h3> </ div>
<div style="margin:0 20px;">
<p> 1, primeiro atualize a estrutura do banco de dados, <b> atualizando a estrutura do banco de dados, não irá afetar os dados atuais. </ b> </ p>
<p> 2, baixar o pacote de atualização, substituir os dados existentes, as alterações que você fez no arquivo serão sobrescritas. Faça um backup de seus arquivos alterados. </p>
<p> 3, depois disso a atualização esta completa. </p>
					</div>

					<div class="wholetip clear"><h3> informações do sistema</h3></div>
					<div style="margin:0 20px;">
					<?php if(is_array($software)){foreach($software AS $n=>$meta) { ?>
						<p><?php echo $n; ?><?php if($meta[0]=='link'){?><a href="<?php echo $meta[1]; ?>" target="_blank"><?php echo $meta[1]; ?></a><?php } else { ?><?php echo $meta[1]; ?><?php }?></p>
					<?php }}?>
					</div>
				</div>
			</div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->


