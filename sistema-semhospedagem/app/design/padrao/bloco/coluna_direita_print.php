<div class="col-2" style="margin-top:10px;">
  <div style="display:none;height:35px;" class="tips"><?=__FILE__?></div>
    <div class="box">
        <div class="indent-box" >  
			<?php
				$user = Table::Fetch('user', $team['partner_id']);
				if(!(empty($user['imagem']))) {
			?>
				<img style="max-width: 200px;" src="<?php echo $ROOTPATH; ?>/media/<?php echo $user['imagem']; ?>" alt="Logo revenda" title="Logo revenda">
			<?php
				}
			?> 
		<div class="ContatoPartner">
			<p class="ContatoTitle">Fixo:</p>
			<?php if(!(empty($user['telefonefixo']))) { ?><p class="TelefoneContato"><?php echo "(" . $user['ddd'] . ")" . $user['telefonefixo'];?></p><?php } ?>
			<p class="ContatoTitle">Celular:</p>
			<?php if(!(empty($user['celular']))) { ?><p class="TelefoneContato"><?php echo "(" . $user['ddd2'] . ")" . $user['celular'];?></p><?php } ?>
		</div>
		</div>     
	</div>