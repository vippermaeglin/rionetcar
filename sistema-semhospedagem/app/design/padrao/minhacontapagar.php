<?php  
 
need_login();
 
?>
<?php  require_once("include/head.php"); ?>

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
						<div>
							<div class="container">
							  <div class="col-6" style="width:96%;" >
							  	<div class="titulosecao2"><span class="txt7">	<a style="color:#000;" href="index.php?page=minhaconta">Meus Pedidos</a> | <a style="color:#000;" href="index.php?page=meuscupons">Meus Cupons</a> |<a style="color:#000;" href="index.php?page=meusconvites"> Meus Convites</a> |<a style="color:#000;" href="index.php?page=meuscreditos"> Meus Créditos</a> | <a style="color:#000;" href="index.php?page=meusdados">Meus Dados</a></span></div>
								 <div class="pgavulsafundominhaconta"> 
									 <br class="clear" />  
 
									<a href="javascript:history.go(-1)">voltar</a>
									<br class="clear" /> 

									<? 
									 $order = Table::Fetch('order',$_REQUEST['order_id']); 
									?>
									 <h2 style="color:InfoText;"><?=utf8_encode("Pedido: ")?> <?php echo $order['id']; ?> </h2>
										<span style="color:InfoText;font-size:12px;">Feito em: <?php echo date('d-m-Y H:i', strtotime($order['datapedido']) ); ?></span>
									 <div class="tail" style="margin-top:-12px;"></div>
									 
									 <br class="clear" /> 
									<?php 
										$order = Table::Fetch('order', $_REQUEST['order_id']);
										$team = Table::Fetch('team', $order['team_id']);
										 
										$team_id = $order['team_id'];
										$idproduto  = $team_id ;
										$titulopage =  $team["title"] ;
										$title 		= substr($team['title'],0,80) ."...";
										$now_number = $team["now_number"];
										$max_number = $team["max_number"];
										$quantity 	= $order["quantity"];
										
										$valor = $one['origin'];
										
										if($one['valorfrete']){
												$valor =  $one['valorfrete'] + $one['origin'];
										} 
										$state 		= $order["state"];

										if($state =="pay"){?>
											
											<div class="pgavulsafundominhacontapagar">
												<div class="titulosemfundo"> <span class="txt6">Você já pagou este pedido !</span></div>
											</div>
											
										<?  exit; }

										if( $now_number > $max_number ){?>
											
											<div class="pgavulsafundominhacontapagar">
												<div class="titulosemfundo"> <span class="txt6">Hum que pena! Esta oferta esgotou. Que tal comprar outras ofertas ?</span></div>
											</div>
											
										<? exit; }
 
										?>  
										  
										<?php    
										require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/include/formepay.php');
										?>	
								</div>
						</div>
					</div>
				</div>
			</div>
        </section>
       </div>
</div> 
 
 <?php require_once(DIR_BLOCO."/rodape.php"); ?>
 
</body>
</html>
