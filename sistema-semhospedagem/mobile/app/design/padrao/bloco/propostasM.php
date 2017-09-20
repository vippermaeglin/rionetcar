<div style="display:none;" class="tips"><?=__FILE__?></div> 
<div class="listProposals">
	<ul>
		<?php
			while($row = mysql_fetch_assoc($rsP)) {
			
				$telefone = !(empty($row['telefone_proposta'])) ? $row['telefone_proposta'] : "-";
				$ddd = !(empty($row['ddd_proposta'])) ? "(" . $row['ddd_proposta'] . ")" : "";
		?>
		<li>
			<h2> #<?php echo $row['id']; ?> <?php echo $row['title']; ?></h2>
			<p>
				Nome: <?php echo $row['nome_proposta']; ?>
			</p>
			<p>
				Email: <?php echo $row['email_proposta']; ?>
			</p>
			<p>
				Telefone: <?php echo $ddd . " " . $telefone; ?>
			</p>			
			<p>
				Proposta: <?php echo $row['proposta']; ?>
			</p>
		</li>
		<?php
			}
		?>
	</ul>
</div>