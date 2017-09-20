<?php include template("manage_header");?>

<?php
  
require ( WWW_ROOT."/include/configure/db.php");
  
$conecta = mysql_connect($value['host'],$value['user'],$value['pass']);
$bda = mysql_select_db($value['name']);

if(!$conecta){
	echo mysql_error();
	exit;
}
if(!$bda){
	echo mysql_error();
	exit;
}

if(!empty($_GET['id']) && empty($_POST)){ 
	
		$sql 					 = "update enquete_oferta set status='0' where id_enquete_oferta='".$_GET['id']."'";
		$show 					 =  mysql_query($sql);
		echo "<script>alert('O registro foi alterado com sucesso!');
					redireciona();
				  </script>";
	
} 
if(!empty($_POST) && empty($_GET['id'])){

	$img = new canvas();

	$nome	=	$_POST['nome'];
	$foto	=	$_FILES['enviashow'];
	$path	=	WWW_ROOT.'/skin/padrao/upload/';	
	$path_n	=	'/skin/padrao/upload/'; 
	
	@set_time_limit(0);
	$extensao	=	strtolower(end(explode('.',$foto['name'])));
	$array_formato	=	array("png","jpg","gif","jpeg","bmp");
							  
	if(in_array($extensao,$array_formato)){ 
	
	    $imagem_nome 	= md5(time(uniqid($foto['name']))).md5(uniqid(time())). "." .$extensao;			    		    
	    $imagem_dir 	= $path.$imagem_nome;		   
		 
		$up = $img->carrega($foto["tmp_name"])->redimensiona( null,162 )->grava($imagem_dir); 
		
		$imgGrava 		= $path_n.$imagem_nome;
	 
		$qry = "insert into enquete_oferta (imagens_oferta,nome,status)
								  values ('{$imgGrava}','{$nome}',1)";
		mysql_query($qry) or die('<script>alert("Erro: '.mysql_error().'");</script>');
		echo "<script>alert('Registro salvo com sucesso!');
				var url = window.location;
				 window.location=url;
			  </script>"; 
	    	  
	}else{
		echo "<script>alert('Formato n�o suportado!')</script>";
	}

}
?>


<style>
.img_upload{
	width:200px;
	height:140px;
}
</style>
<script>
	function deleta_(id){

		if(confirm('tem certeza que quer apagar este registro ?')){
			window.location="?id="+id;
		}else{
			alert('Cancelado!');
		}
		}	
	
	function redireciona(){
		
		var url = window.location;
		url = url.toString()
		url = url.split('?');
	 window.location=url[0];
	}
</script>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
           
                <div class="sect">
                 
                    <?php 
                /*******************************************/
                if(!empty($_GET['show'])){
                	
                	$show	=	addslashes($_GET['show']);
                	
                	$sql	=	"select 
									en.id_enquete_oferta,
									en_s.imagens_oferta,
									en_s.nome,
									ca.name,
									SUM(1) As tot
							
								from enquete AS en
							
								inner join enquete_oferta AS en_s
								on en.id_enquete_oferta = en_s.id_enquete_oferta
							
								inner join category AS ca
								on en.id_cidade = ca.id
								
								where 
									en.id_enquete_oferta='$show'
									and 
									ca.zone='city'
								GROUP BY ca.name
									";
                	
                	$show 	=  mysql_query($sql);
                	$show_n	=  mysql_num_rows($show);
                	
                	if( $show_n > 0){
                		
                		
                		$i=0;
						while($show_ = mysql_fetch_assoc($show)){
							
							if($i==0){
								echo '
								<a href="#" onclick="redireciona();">
									Voltar
								</a>
								<br/>  
								'.strtoupper($show_["nome"]).' 
                				<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
								<tr>
									<th width="40">ID</th>
									<th width="400">Cidade</th>
									<th width="40">Total</th>
								</tr>';
							}
							
							echo '
								<tr>
									<td >'.$show_["id_enquete_oferta"].'</td>
									<td >'.$show_["name"].'</td>
									<td >'.$show_["tot"].'</td>
								</tr>
								';
							$i++;
						}
                	}else{
                		echo 'N&atilde;o h&aacute; votos para esta oferta at&eacute; momento.
                				<br/><br/>	
                				<a href="#" onclick="redireciona();">
									Voltar
								</a>';
                	}
                  }else{
                  	
                  	
	                /*******************************************/
	                //	listagem
	                ?>	
                	<form onsubmit="if(document.getElementById('enviashow').value !=''){return true;}else{return false;}" id="form" method="post" action="" enctype="multipart/form-data" >
	                
					<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Cadastro de opção de oferta</h4></div>
							<div class="the-button" style="width:120px;"> 
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<div style="float:left;"><button  name="Cadastrarnovo" id="Cadastrar_novo" class="input-btn" type="submit"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Salvar</div></button></div>
							 </div> 
					</div> 
					
					<div class="option_box">
						 <div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">   
										<div style="clear:both;"class="report-head">Título da Oferta: <span class="cpanel-date-hint"> Note que estas opções irão aparecer na página Enquete para a votação dos usuários.</span></div>
										<div class="group">
											<input type="text" name="nome"  maxlength="162" id="nome" class="format_input" value="<?php echo  $team['largura'] ; ?>" /> 
										</div>
									<div style="clear:both;"class="report-head">Imagem:  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="enviashow"  id="enviashow" class="format_input" />     
									</div> 
									
										
									</div> 
								</div> 
							</div> 
						</div>
					</div> 
					
					
                	</form>
                	
                	
                	
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="40">ID</th><th width="700">Título</th><th width="200">Imagem</th> <th width="200">Ações</th></tr>
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
					<?php $oldstate = $one['id_enquete_oferta']; ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td id="<?=$count_?>"><?php echo $one['id_enquete_oferta']; ?></td>
						<td>
							 <?php echo $one['nome'];	 ?>
						</td>
						<td>
							 <?php echo "<img src='".$ROOTPATH.$one['imagens_oferta']."' style='max-width:170px;max-height:64px;'>";	 ?>
						</td>
						<td class="op" nowrap>
							<a style="color:#fff;" href="#<?=$count_?>" onclick="window.location='?show=<?=$one['id_enquete_oferta']?>';" >Visualizar Votos</a>
							<a style="color:#fff;" href="#<?=$count_?>" onclick="deleta_('<?=$one['id_enquete_oferta']?>');" >deletar</a>
						</td>
					</tr>
					<?php $count_++; }} ?>
					<tr><td colspan="7"><?php //echo $pagestring; ?></tr>
                    </table>
                    <?php
                  }
                ?>  
				  </div>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->




<?php


?>

