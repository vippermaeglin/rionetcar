<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
require_once(dirname(__FILE__) . '/current.php');

need_manager();
need_auth('team');
  
$id = abs(intval($_GET['id']));
$team = $eteam = Table::Fetch('team', $id);
if(!empty($team)){
	$edicao = true; 
}


$sql = "ALTER TABLE  `team` ADD  `maisinformacoes` text NULL  ";
$rs = @mysql_query($sql);

if ( is_get() && empty($team) ) {
	$team = array();
	$team['id'] = "";
	$team['user_id'] = $login_user_id;
	$team['begin_time'] = strtotime('+0 days');
	$team['begin_time2'] = date('H:i');
	$team['end_time2'] = date('H:i');
	$team['end_time'] = strtotime('+1 days');
	$team['expire_time'] = strtotime('+1 months +1 days');
	$team['min_number'] = 10;
	$team['per_number'] = 1;
	$team['minimo_pessoa'] = 1;
	$team['pre_number'] = 10;
	$team['max_number'] = 1000;
	//$team['market_price'] = 1;
	$team['team_price'] = 1;
	$team['delivery'] = 'coupon';
	$team['address'] = $profile['address'];
	$team['mobile'] = $profile['mobile'];
	$team['fare'] = 5;
	$team['farefree'] = 0;
	$team['bonus'] = abs(intval($INI['system']['invitecredit']));
	$team['conduser'] = $INI['system']['conduser'] ? 'Y' : 'N';
 
	
}
else if ( is_post() ) {
	$team = $_POST;
 
	$insert = array(
		'title', 'market_price', 'team_price', 'end_time',
		'begin_time', 'expire_time', 'min_number', 'max_number',
		'summary', 'notice', 'per_number', 'product',
		'image', 'image1', 'image2', 'flv', 'now_number',
		'gal_image1', 'gal_image2', 'gal_image3', 'gal_image4', 'gal_image5', 'gal_image6',
		'detail', 'userreview', 'card', 'systemreview',
		'conduser', 'buyonce', 'bonus', 'sort_order',
		'delivery', 'mobile', 'address', 'fare','maisinformacoes',
		'express', 'credit', 'farefree', 'pre_number',
		'user_id', 'city_id', 'group_id', 'partner_id',
		'team_type', 'sort_order', 'farefree', 'state','posicionamento','layout','preco_comissao','minimo_pessoa','semhtmldescricao','semhtmlregulamento','manterdimensao',
		'condbuy','categoria_valejunto','cidade_valejunto','categoria_apontaofertas','cidade_apontaofertas','categoria_dsconto','categoria_agrupi',
		'bonuslimite', 'metodo_pagamento','retornoparticipe','processo_compra','url_comprar','marcadagua','estatica_home','estatica_direita','estatica_detalhe','estatica_recentes',
		'frete','ceporigem','peso','altura','comprimento','largura','valorfrete','fretegratuito','republicacao','pontosgerados','pontos'
		);
 
	$idnovaoferta =	getUltimoIdOferta();
		
	$team['id'] = $idnovaoferta;
	$team['user_id'] = $login_user_id;
 
	$team['state'] = 'none';
	$team['team_price'] =  str_replace("R$ ","",str_replace(",",".",str_replace(".","",$team['team_price'])));
	 
	$team['valorfrete'] =   str_replace("R$ ","",$team['valorfrete']);
	$team['preco_comissao'] =  str_replace("R$ ","",str_replace(",",".",str_replace(".","",$team['preco_comissao'])));
	$team['market_price'] = str_replace("R$ ","",str_replace(",",".",str_replace(".","",$team['market_price']))); 
	$team['begin_time'] = strtotime(str_replace("/","-",$team['begin_time']). " ".$team['begin_time2']);
	$team['end_time'] = strtotime(str_replace("/","-",$team['end_time']). " ".$team['end_time2']);
	$team['expire_time'] = strtotime(str_replace("/","-",$team['expire_time']). " ".$team['end_time2']);
	$team['city_id'] = abs(intval($team['city_id']));
	$team['partner_id'] = abs(intval($team['partner_id']));
	$team['sort_order'] = abs(intval($team['sort_order']));
	$team['fare'] = abs(intval($team['fare']));
	$team['farefree'] = abs(intval($team['farefree']));
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
	
	// estaticas 
	$team['estatica_home'] = upload_image('estatica_home',$eteam['estatica_home'],'estatica');
	$team['estatica_direita'] = upload_image('estatica_direita',$eteam['estatica_direita'],'estatica');
	$team['estatica_detalhe'] = upload_image('estatica_detalhe',$eteam['estatica_detalhe'],'estatica');
	$team['estatica_recentes'] = upload_image('estatica_recentes',$eteam['estatica_recentes'],'estatica');

	//team_type == goods
	if($team['team_type'] == 'goods'){
		$team['min_number'] = 1;
		$tean['conduser'] = 'N';
	}

	if ( !$id ) {
		$team['now_number'] = $team['pre_number'];
	} else {
		$field = strtoupper($table->conduser)=='Y' ? null : 'quantity';
		$now_number = Table::Count('order', array(
					'team_id' => $id,
					'state' => 'pay',
					), $field);
		$team['now_number'] = ($now_number + $team['pre_number']);

		/* Increased the total number of state is not sold out */
		if ( $team['max_number'] > $team['now_number'] ) {
			$team['close_time'] = 0;
			$insert[] = 'close_time';
		}
	}

	$insert = array_unique($insert);
	$table = new Table('team', $team);
	$table->SetStrip('summary', 'detail', 'systemreview', 'notice');


	if ( $edicao ) {
		$table->SetPk('id', $id);
		$table->update($insert);
		Session::Set('notice', 'Informações modificadas com sucesso!');
		redirect( WEB_ROOT . "/vipmin/team/index.php");
	}
	else if ( $table->insert($insert) ) {
		 
		$idnovo = mysql_insert_id();
		if($idnovo){
			Session::Set('notice', 'Nova oferta adicionada ('.$idnovo.')' );	
			redirect( WEB_ROOT . "/vipmin/team/index.php");
		}
		else{
			Session::Set('error', 'Não foi possível cadastrar a nova oferta');
			redirect(null);
		}
	}
	else {
		Session::Set('error', 'Falha ao editar oferta '.$idnovaoferta);
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
include template('manage_team_pacote');



