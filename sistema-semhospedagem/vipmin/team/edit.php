<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
require_once(dirname(__FILE__) . '/current.php');

need_manager();
need_auth('team');
  
$id = abs(intval($_GET['id']));
$tipo =  $_REQUEST['team_type']; 
$url = "index.php"; 

$sql = "ALTER TABLE  `team` ADD  `ehdestaquebusca` INT NULL after renavam";
$rs = @mysql_query($sql);
 
$sql = "ALTER TABLE  `team` ADD  `gal_image7` VARCHAR(200) NULL  ";
$rs = @mysql_query($sql);

$team = $eteam = Table::Fetch('team', $id);
 
if(!empty($team)){
	$edicao = true; 
	
	if(empty($team[admineditou]) and $team['pago'] =="nao" and $team['anunciogratis'] !="s"  ){
 
		$idplano 				=  busca_plano_cliente($team['partner_id']);
		$dias 					=  getdiasplanocliente($idplano);
		$team['begin_time']  	=  strtotime('+0 days');
		$team['end_time']		=  strtotime('+'.$dias.' days');
	}
}
 
if ( is_get() && empty($team) ) {
	$team = array(); 

	$team['user_id'] = $login_user_id;
	$team['begin_time'] = strtotime('+0 days');
	$team['begin_time2'] = date('H:i');
	$team['end_time2'] = date('H:i');
	$team['end_time'] = strtotime('+1 days');
	$team['expire_time'] = strtotime('+1 months +1 days');  
}
else if ( is_post() ) {
	$team = $_POST;
 
	 if(!empty($_FILES['video1']['name'])){
		$nomevideo = $_FILES['video1']['name'];
		$_tamanho = $_FILES['video1']['size'];
		$extensao = explode(".", $nomevideo);
		$extensao = $extensao[1];
		$_extValidas = array(".mpeg",".avi","mp4");
	 
		if(!in_array($extensao,$_extValidas)) {
			Session::Set('error', '<div style=margin-top:11px>A extenção do vídeo1 é inválida. Utilize apenas vídeos MPEG, AVI ou MP4. Você enviou uma extenção <b>'.$extensao.'</b></div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		} 
		if($_tamanho > 2100000){
			Session::Set('error', '<div style=margin-top:11px>O seu vídeo1 ultrapassou o tamanho permitido de 2MB </div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		}
	}
	
	 if(!empty($_FILES['video2']['name'])){
		$nomevideo = $_FILES['video2']['name'];
		$_tamanho = $_FILES['video2']['size'];
		$extensao = explode(".", $nomevideo);
		$extensao = $extensao[1];
		$_extValidas = array(".mpeg",".avi","mp4"); 
 
		if(!in_array($extensao,$_extValidas)) {
			Session::Set('error', '<div style=margin-top:11px>A extenção do vídeo2 é inválida. Utilize apenas vídeos MPEG, AVI ou MP4. Você enviou uma extenção <b>'.$extensao.'</b></div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		} 
		if($_tamanho > 2100000){
			Session::Set('error', '<div style=margin-top:11px>O seu vídeo2 ultrapassou o tamanho permitido de 2MB </div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		}
	}
	 
	if($team['pago'] =="anunciogratis"){
			$team['pago']="";
			$team['anunciogratis'] ="s";
	}
	else if($team['pago'] ==""){
			$team['pago']="";
			$team['anunciogratis'] ="";
	}
	else if($team['pago'] =="sim"){
			$team['pago']="sim";
			$team['anunciogratis'] ="";
			verificaatualizacao($_POST['id']);
	}
	
	$insert->user_type = $login_user['tipoanunciante'];
	
	$insert = array(
		'title',  'team_price', 'end_time',
		'begin_time', 'expire_time',
		'summary', 'image', 'image1', 'image2', 
		'gal_image1', 'gal_image2', 'gal_image3', 'gal_image4', 'gal_image5', 'gal_image6', 'gal_image7',
		'sort_order', 'user_id', 'user_type', 'city_id', 'group_id', 'partner_id','video1','video2','placa','renavam', 
		'team_type','mostrarpreco','create_time','mostrarseguranca','status','pago','anunciogratis','vea_promocoes','vea_necessidades', 'promooutros','ehdestaquebusca','precorevendas','temprecoespecial',
		'car_tipo', 'car_fabricante', 'car_modelo', 'car_ano', 'car_carroceria', 'moto_estilo', 'km','numero_portas','cor','combustivel','motor','transmissao','cilindros','tracao','vea_caracter','estadoveiculo' ,'modelo_ano','uf','imgdestaque','ehvitrine','admineditou'
		);
    
	if(empty($team['motor'])){ unset($insert[ array_search('motor', $insert) ]); }
	if(empty($team['numero_portas'])){ unset($insert[ array_search('numero_portas', $insert) ]); }
	if(empty($team['cor'])){ unset($insert[ array_search('cor', $insert) ]); }
	if(empty($team['combustivel'])){ unset($insert[ array_search('combustivel', $insert) ]); }
	if(empty($team['transmissao'])){ unset($insert[ array_search('transmissao', $insert) ]); }
	if(empty($team['cilindros'])){ unset($insert[ array_search('cilindros', $insert) ]); }
	if(empty($team['tracao'])){ unset($insert[ array_search('tracao', $insert) ]); } 
	if(empty($team['estadoveiculo'])){ unset($insert[ array_search('estadoveiculo', $insert) ]); } 
	
	 
	$idnovaoferta =	getUltimoIdOferta();
	$tituloanuncio = buscaTituloAnuncio($team);
		
	$team['id'] = $idnovaoferta;
	
	if($INI['option']['moderacaoanuncios']=="N"){
		$status='1';
	}
	else  {

		$status='0';
	}
	//OVERRIDE MODERA ANÚNCIO, PARA TESTES
	// $status = 1;
	
	$team['user_id'] = $login_user_id;
	$team['title'] = $tituloanuncio;
	$team['create_time'] = date('Y-m-d');
    $team['team_price'] =  str_replace("R$ ","",str_replace(",",".",str_replace(".","",$team['team_price']))); 
	if($team['precorevendas'] == ""){
		$team['precorevendas'] = 0.00;
	}
	else{
		$team['precorevendas'] =  str_replace("R$ ","",str_replace(",",".",str_replace(".","",$team['precorevendas'])));
	}
	$team['begin_time'] = strtotime(str_replace("/","-",$team['begin_time']). " ".$team['begin_time2']);
	$team['end_time'] = strtotime(str_replace("/","-",$team['end_time']). " ".$team['end_time2']);
	$team['expire_time'] = strtotime(str_replace("/","-",$team['expire_time']). " ".$team['end_time2']);
	$team['city_id'] = abs(intval($team['city_id']));
	$team['partner_id'] = abs(intval($team['partner_id']));
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
 
	if ( $edicao ) {
		$table->SetPk('id', $id);
		$table->update($insert);
		Session::Set('notice', '<div style=margin-top:11px;font-size:13px>Informações modificadas com sucesso!</div>');
		redirect( WEB_ROOT . "/vipmin/team/".$url);
	}
	else if ( $table->insert($insert) ) {
		 
		$idnovo = mysql_insert_id();
		if($idnovo){
			Session::Set('notice', '<div style=margin-top:11px;font-size:13px>Novo anúncio adicionado ('.$idnovo.')</div>' );	
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		}
		else{
			Session::Set('error', '<div style=margin-top:11px;font-size:13px>Não foi possível cadastrar o novo anúncio</div>');
			redirect(null);
		}
	}
	else {
		Session::Set('error', '<div style=margin-top:11px;font-size:13px>Falha ao atualizar o anúncio '.$idnovaoferta."</div>");
		redirect(null);
	}
}

$groups = DB::LimitQuery('category', array(
			'condition' => array( 'zone' => 'group', ),
			));
$groups = Utility::OptionArray($groups, 'id', 'name');
$condition_p[] = " id <> 1";
$users = DB::LimitQuery('user', array( 
	'condition' => array( $condition_p ),
			'order' => 'ORDER BY id DESC',
			));
$users = Utility::OptionArray($users, 'id', 'realname');
$selector = $team['id'] ? 'edit' : 'create';
include template('manage_team_edit');



