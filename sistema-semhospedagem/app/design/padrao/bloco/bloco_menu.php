<?php
$sql = "select idpai,id,name,tipo,link,linkexterno,target from category where ( idpai=0 or idpai is null) and zone='group' and display = 'Y' order by sort_order desc";
$rs = mysql_query($sql); 										
?>
<div style="display:none;" class="tips"><?=__FILE__?></div>
 
<div id="menu">
	<div id="tmcategories">
		<ul class="menu" id="cat">
		<?php 
		while($l = mysql_fetch_assoc($rs)){
		 
			$tipocategoria = "categorias";
			$linkid ="";
			
			if($l['linkexterno']!=""){?>
				<li style="z-index:1000;" class="parent" id="<?=$l['id']?>"> <a target="<?=$l['target']?>" title="<?=utf8_decode($l['name'])?>" href="<?=$l['linkexterno']?>"><span><span><?=utf8_decode($l['name'])?></span></span></a><? 
			 }else if($l['tipo']=="pagina"){
			
				$tipocategoria = "pagina";
				$sqlc = "select id,value,titulo,data_criacao from page where status = 1 and category_id =".$l['id'] ;
				$rsc = mysql_query($sqlc);
				$linha = mysql_fetch_object($rsc);
				
				$titulo  = tratanome($linha->titulo);
				$id  = $linha->id;
				if($id!=""){
					$linkid = $id."/".$titulo;
				} 
				if($linkid !=""){
				?>
					<li style="z-index:1000;" class="parent" id="<?=$l['id']?>"> <a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/page/<?=$linkid?>"><span><span><?=utf8_decode($l['name'])?></span></span></a>
				<?
				}
				else{
				?>
					<li style="z-index:1000;" class="parent" id="<?=$l['id']?>"> <a title="<?=utf8_decode($l['name'])?>" href="#"><span><span><?=utf8_decode($l['name'])?></span></span></a>
				<?	
				}
				
			}
			else if($l['tipo']=="sistema"){
				?>
				<li style="z-index:1000;" class="parent" id="<?=$l['id']?>"> <a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/index.php?page=<?=$l['link']?>&idcategoria=<?=$l['id']?>&pagina=1&nome=<?=utf8_decode($l['name'])?>"><span><span><?=utf8_decode($l['name'])?></span></span></a>
				<? 
			}
			else{
			?>
				<li style="z-index:1000;" class="parent" id="<?=$l['id']?>"> <a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/index.php?page=<?=$tipocategoria?>&idcategoria=<?=$l['id']?>&pagina=1"><span><span><?=utf8_decode($l['name'])?></span></span></a>
			<? 
			}
			lista_filhos($l['id']); 
		
		} 
		?> 
		</ul>
	</div>
</div>
 <?php
 function lista_filhos($id_categoria){
	 
	$sql = "select idpai,id,name,tipo, link ,linkexterno,target from category where idpai=$id_categoria and display = 'Y' order by sort_order desc";
	$rs  = mysql_query($sql);
	$zindex=1000;
	
	while($l = mysql_fetch_assoc($rs)){ 
		$idpai = $l['idpai'];
		$zindex++;
		 $linkid ="";
		 
		if($idpai and $pai!=$idpai){
				$pai = $idpai;
		?>
			<div class="subcat">
				<ul class="redonde"> 
		<?}
		else{?>
			</li>
		<?}
		
		$tipocategoria = "categorias";
		
		if($l['linkexterno']!=""){?>
				<li style="z-index:1000;" class="parent" id="<?=$l['id']?>"> <a target="<?=$l['target']?>" title="<?=utf8_decode($l['name'])?>" href="<?=$l['linkexterno']?>"><span><span><?=utf8_decode($l['name'])?></span></span></a><? 
			 }
		else if($l['tipo']=="pagina"){
		
			$tipocategoria = "pagina";
			$sqlc = "select id,value,titulo,data_criacao from page where status = 1 and category_id =".$l['id'] ;
			$rsc = mysql_query($sqlc);
			$linha = mysql_fetch_object($rsc);
			
			$titulo  = tratanome($linha->titulo);
			$id  = $linha->id;
			if($id!=""){
				$linkid = $id."/".$titulo;
			}
			if($linkid !=""){
			?>
				<li class="parent" style="z-index:1000;" class=""> <a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/page/<?=$linkid?>"><span><span><?=utf8_decode($l['name'])?></span></span></a>
			<? 
			}
			else{
			?>
				<li class="parent" style="z-index:1000;" class=""> <a title="<?=utf8_decode($l['name'])?>" href="#"><span><span><?=utf8_decode($l['name'])?></span></span></a>
			<? 	
			}
		}
		else if($l['tipo']=="sistema"){
				?>
				<li style="z-index:1000;" class="parent" id="<?=$l['id']?>"> <a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/index.php?page=<?=$l['link']?>&idcategoria=<?=$l['id']?>&pagina=1&nome=<?=utf8_decode($l['name'])?>"><span><span><?=utf8_decode($l['name'])?></span></span></a>
				<? 
		}
		else{
		?>
			<li class="prim" style="z-index:<?=$zindex?>" > <a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/index.php?page=<?=$tipocategoria?>&idcategoria=<?=$l['id']?>&pagina=1"><span><span><?=utf8_decode($l['name'])?></span></span></a>
		<? 
		}
		?>
		<script> 
			J("#<?=$id_categoria?>").attr("class","") 
		</script>
		<?
		lista_filhos($l["id"]);
	}?>
	<?if($idpai){?>	
		
			</ul>
		</div> 
	</li>
	<? } ?>

<? } ?>
  