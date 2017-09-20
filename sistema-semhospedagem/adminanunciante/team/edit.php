<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
require_once(dirname(__FILE__) . '/current.php');

need_anunciante(); 
   
$id = abs(intval($_GET['id']));
$tipo =  $_REQUEST['team_type']; 
$url = "index.php"; 

 $sql = "ALTER TABLE  `team` ADD  `gal_image7` VARCHAR(200) NULL  ";
$rs = @mysql_query($sql);

$team = $eteam = Table::Fetch('team', $id);
if(!empty($team)){
	$edicao = true; 
} 
    $login_user_id = $_SESSION['user_id']; 
	$saldo = get_saldo( $login_user_id);
	 
	if ($saldo > 0) { 
		$pago = 'sim'; 
	}else{ 
		$pago = 'nao';
	} 
	
	if($INI['option']['moderacaoanuncios']=="N" or $edicao){
		$status_oferta = '1';
	}
	else  {
		$status_oferta = '0';
	}
 if ( is_get() && empty($team) ) {
	$team = array();
	$team['id'] = "";
	$team['user_id'] = $login_user_id;
	$team['begin_time'] = strtotime('+0 days');
	$team['begin_time2'] = date('H:i');
	$team['end_time2'] =   strtotime('+1 months +1 days');
	$team['end_time'] =   strtotime('+1 months +1 days');
	$team['expire_time'] = strtotime('+1 months +1 days');  
	$team['pago'] = $pago;
	$team['usou_bonus'] = $usoubonus; 
}
else if ( is_post() ) {
	$team = $_POST;
	
	 if(!empty($_FILES['video1']['name'])){
		$nomevideo = $_FILES['video1']['name'];
		$_tamanho = $_FILES['video1']['size'];
		$extensao = pathinfo($_FILES['video1']['name']);
		$_extValidas = array("avi","mp4");
	 
		if(!in_array($extensao['extension'], $_extValidas)) {
			Session::Set('error', '<div style=margin-top:11px>A extenção do vídeo1 é inválida. Utilize apenas vídeos MPEG, AVI ou MP4. Você enviou uma extenção <b>'.$extensao.'</b></div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		} 
		if($_tamanho > 2100000){
			Session::Set('error', '<div style=margin-top:11px>O seu vídeo1 ultrapassou o tamanho permitido de 2MB </div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		}
		
		atualiza_usou_video($login_user_id);
	}
	
	 if(!empty($_FILES['video2']['name'])){
		$nomevideo = $_FILES['video2']['name'];
		$_tamanho = $_FILES['video2']['size'];
		$extensao = pathinfo($_FILES['video2']['name']);
		$_extValidas = array("avi","mp4"); 
 
		if(!in_array($extensao['extension'], $_extValidas)) {
			Session::Set('error', '<div style=margin-top:11px>A extensão do vídeo2 é inválida. Utilize apenas vídeos MPEG, AVI ou MP4. Você enviou uma extensão <b>'.$extensao.'</b></div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		} 
		if($_tamanho > 2100000){
			Session::Set('error', '<div style=margin-top:11px>O seu vídeo2 ultrapassou o tamanho permitido de 2MB </div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		}
		atualiza_usou_video($login_user_id);
	}
	
    $idplano 	 =  busca_plano_cliente($login_user_id );
	
	if($idplano){
		$dias 					=  getdiasplanocliente($idplano);
		$team['begin_time']  	=  strtotime('+0 days');
		$team['end_time']		=  strtotime('+'.$dias.' days'); 
		$team['begin_time2'] 	= date('H:i');  
		$team['end_time2'] 		=   date('H:i');   
		$team['expire_time'] 	= strtotime('+1 months +1 days'); 
		Util::log("secao 878:  Data Fim : ".$team['end_time']); 
	}
	else{
		if(!$edicao){
			$dataaux = explode("/",$team['end_time']);
			$dafafim = $dataaux['2']."-".$dataaux['1']."-".$dataaux['0']; 
			$team['begin_time'] = strtotime(str_replace("/","-",$team['begin_time']). " ".$team['begin_time2']);
			$team['end_time'] = strtotime($dafafim); 
			$team['expire_time'] = strtotime(str_replace("/","-",$team['expire_time']). " ".$team['end_time2']);
			Util::log("secao 999:  Data Fim : $dafafim : ".$team['end_time']);
		}
	}

	
	$ehdestaquebusca = atualiza_usou_destaque_busca($login_user_id);
	$ehvitrine = atualiza_usou_vitrine($login_user_id);
	
	$insert->user_type = $login_user['tipoanunciante'];
	
	$insert = array(
		'title',  'team_price',
		'summary', 'image', 'image1', 'image2', 
		'gal_image1', 'gal_image2', 'gal_image3', 'gal_image4', 'gal_image5', 'gal_image6', 'gal_image7',
		'sort_order', 'user_id', 'user_type', 'city_id', 'group_id', 'user_id','video1','video2','placa','renavam','ehdestaquebusca','partner_id',
		'team_type','mostrarpreco','create_time','mostrarseguranca','anunciogratis','vea_promocoes','vea_necessidades','promooutros','precorevendas','temprecoespecial',
		'car_tipo', 'car_fabricante', 'car_modelo', 'car_ano', 'car_carroceria', 'moto_estilo', 'km','numero_portas','cor','combustivel','motor','transmissao','cilindros','tracao','vea_caracter','estadoveiculo','modelo_ano','uf','ehvitrine','imgdestaque'
		);
    
		if(!$edicao){
			$insert[]="begin_time";
			$insert[]="end_time";
			$insert[]="usou_bonus";
			$insert[]="pago";
			$insert[]="status";
	  }
	 
	if(empty($team['motor'])){ unset($insert[ array_search('motor', $insert) ]); }
	if(empty($team['numero_portas'])){ unset($insert[ array_search('numero_portas', $insert) ]); }
	if(empty($team['cor'])){ unset($insert[ array_search('cor', $insert) ]); }
	if(empty($team['combustivel'])){ unset($insert[ array_search('combustivel', $insert) ]); }
	if(empty($team['transmissao'])){ unset($insert[ array_search('transmissao', $insert) ]); }
	if(empty($team['cilindros'])){ unset($insert[ array_search('cilindros', $insert) ]); }
	if(empty($team['tracao'])){ unset($insert[ array_search('tracao', $insert) ]); } 
	if(empty($team['estadoveiculo'])){ unset($insert[ array_search('estadoveiculo', $insert) ]); } 
	
	 
	$idnovaoferta =	getUltimoIdOferta(); 
	if($INI['option']['moderacaoanuncios']=="N" or $edicao){
		$status='1';
	}
	else  {
		$status='0';
	}
	$tituloanuncio = buscaTituloAnuncio($team);
	
	//$team['ehdestaquebusca'] = $ehdestaquebusca;
		
		if($ehdestaquebusca == "DESTAQUE") {
			$team['ehdestaquebusca'] = 1;
		}else {
			$team['ehdestaquebusca'] = 0;
		}

		if($ehvitrine > 0) {
			$team['ehvitrine'] = "Y";
		} else {
			$team['ehvitrine'] = "N";
		}

	//$dataaux = explode("/",$team['end_time']);
	//$dafafim = $dataaux['2']."-".$dataaux['1']."-".$dataaux['0'];
	$team['id'] = $idnovaoferta;
	$team['user_id'] = $login_user_id;
	$team['user_type'] = $login_user['tipoanunciante'];
	$team['create_time'] = date('Y-m-d');
	$team['status'] = $status;
	$team['usou_bonus'] = $usoubonus;
	$team['title'] = $tituloanuncio;
    $team['team_price'] =  str_replace("R$ ","",str_replace(",",".",str_replace(".","",$team['team_price'])));
	if($team['precorevendas'] == ""){
		$team['precorevendas'] = 0.00;
	}
	else{
		$team['precorevendas'] =  str_replace("R$ ","",str_replace(",",".",str_replace(".","",$team['precorevendas'])));
	}
	$team['expire_time'] = strtotime(str_replace("/","-",$team['expire_time']). " ".$team['end_time2']);
	$team['city_id'] = abs(intval($team['city_id']));
	$team['partner_id'] = $login_user_id;
	$team['sort_order'] = abs(intval($team['sort_order']));
	$team['pre_number'] = abs(intval($team['pre_number']));  
	$team['image'] = upload_image('upload_image',$eteam['image'],'team',true, $_POST['marcadagua']);
	$team['image1'] = upload_image('upload_image1',$eteam['image1'],'team',false,$_POST['marcadagua']);
	$team['image2'] = upload_image('upload_image2',$eteam['image2'],'team',false,$_POST['marcadagua']);

	// galeria de imagens
	$team['gal_image1'] = upload_image('gal_upload_image1',$eteam['gal_image1'],'team');
	$team['gal_image2'] = upload_image('gal_upload_image2',$eteam['gal_image2'],'team');
	$team['gal_image3'] = upload_image('gal_upload_image3',$eteam['gal_image3'],'team');
	$team['gal_image4'] = upload_image('gal_upload_image4',$eteam['gal_image4'],'team');
	$team['gal_image5'] = upload_image('gal_upload_image5',$eteam['gal_image5'],'team');
	$team['gal_image6'] = upload_image('gal_upload_image6',$eteam['gal_image6'],'team');  
	$team['gal_image7'] = upload_image('gal_upload_image7',$eteam['gal_image7'],'team');  
	$team['imgdestaque'] = upload_image('imgdestaque',$eteam['imgdestaque'],'estatica');
	$team['video1'] = upload_video('video1',$eteam['video1'],'team');
	$team['video2'] = upload_video('video2',$eteam['video2'],'team');
	
	$insert = array_unique($insert);
	$table = new Table('team', $team);
	$table->SetStrip('summary');

	//print_r($team);
	//exit;
 
	if ( $edicao ) {
		$table->SetPk('id', $id);
		$table->update($insert);
		Session::Set('notice', '<div style=margin-top:11px;font-size:13px>Informações modificadas com sucesso!</div>');
		redirect( WEB_ROOT . "/adminanunciante/team/");
	}
	else if ( $table->insert($insert) ) {
		 
		$idnovo = mysql_insert_id();
		
		$team['id'] = $idnovo;
		$tituloanuncio = buscaTituloAnuncio($team);
		
		$sql = "update team set title = '" . $tituloanuncio . "' where id = " . $idnovo;
		$rs = mysql_query($sql);
		
		if($pago=="sim"){ 
			$partner_plano_id = get_partner_plano_id($_SESSION['user_id']);
			atualiza_partner_plano_id($idnovo,$partner_plano_id );
		} 
		
		if($idnovo){
			Session::Set('notice', '<div style=margin-top:11px;font-size:13px>Novo anúncio adicionado ('.$idnovo.')</div>'  );	 
			
			$body = 
			"<html><head></head><body style='font-size:12px;'><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><meta http-equiv='Content-Language' content='pt-br' />
			<div> O an&uacute;ncio ".$idnovo." foi criado. Ap&oacute;s a efetiva&ccedil;&atilde;o do pagamento por parte do anunciante voc&ecirc; ir&aacute; receber um email para moder&aacute;-lo antes de sua publica&ccedil;&atilde;o.</div><br>
			
			<b> Dados do An&uacute;ncio</b>

			<p>T&iacute;tulo: ".buscaTituloAnuncio($team)."</p> 
			<p>Pre&ccedil;o: ".$team['team_price']."</p> 
			<p>Descri&ccedil;&atilde;o: ".$team['summary']."</p></body></html>" ;
			
			$emailadmin = $INI['mail']['from'];
			
			 if(enviar( $emailadmin,$INI["system"]["sitename"]." - Anúncio ".$idnovo." aguardando pagamento", $body )){
				 $enviou =  true;
			 }
			 else{
				$enviou =  false;
			 }
			if ($pago == 'nao') {
				if($INI["pagseguro"]["acc"] != ""){
				  
						Session::Set('notice', '<div style=margin-top:11px;font-size:13px>Por favor, selecione um plano para publicar seu anúncio.</div>');	
						redirect( WEB_ROOT . "/adminanunciante/team/index.php");
						exit;  
				}
				else {
					 echo "Email do pagseguro não configurado. Por favor, acesse Sistema->Métodos de Pagamento";
					 exit;
				}
			 } else {
				if ($status_oferta == '0') {
					Session::Set('notice', '<div style=margin-top:11px;font-size:13px>Novo anúncio adicionado e aguardando modera&ccedil;&atilde;o do administrador ('.$idnovo.')</div>' );	
					 redirect( WEB_ROOT . "/adminanunciante/team/".$url);
				} else {
					Session::Set('notice', '<div style=margin-top:11px;font-size:13px>Novo anúncio adicionado e publicado ('.$idnovo.')</div>' );	
					redirect( WEB_ROOT . "/adminanunciante/team/".$url);
				}
			 } 

			exit; 
		}
		else {
			Session::Set('error', utf8_encode('<div style=margin-top:11px;font-size:13px>Não foi possível cadastrar o novo anúncio</div>'));
			 redirect(null);
		}
	}
	else {
		Session::Set('error', utf8_encode('<div style=margin-top:11px;font-size:13px>Falha ao atualizar o anúncio'.$idnovaoferta.'</div>'));
	   redirect(null);
	}
}

$groups = DB::LimitQuery('category', array(
			'condition' => array( 'zone' => 'group', ),
			));
$groups = Utility::OptionArray($groups, 'id', 'name');


$condition[] = " tipo = 'parceiro' or tipo is null";


$partners = DB::LimitQuery('partner', array(
			'condition' => array( $condition ),
			'order' => 'ORDER BY id DESC',
			));
$partners = Utility::OptionArray($partners, 'id', 'title');
$selector = $team['id'] ? 'edit' : 'create';

$partner_plano_id = get_partner_plano_id($_SESSION['user_id']);


include template('manage_team_anunciante_edit');


