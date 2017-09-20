<?php
function current_frontend() {
   global $INI;
   global $city; # 2011-01-04 by Dvision

   $a = array(
         "/".$city['ename']."/oferta_do_dia" => 'Oferta do dia',             # 2011-01-04 by Dvision
         "/".$city['ename']."/ofertas_recentes" => 'Ofertas recentes',        # 2011-01-04 by Dvision
         "/".$city['ename']."/receba_email_diario" => 'Receba email diário',  # 2011-01-04 by Dvision
         "/".$city['ename']."/como_funciona" => 'Como funciona',              # 2011-01-04 by Dvision
//    	 "/".$city['ename']."/forum_de_discussao" => 'Forum',
   	      '/perguntas_frequentes' => 'FAQs',

         );
  // if(option_yes('navforum')) $a["/".$city['ename']."/forum_de_discussao"] = 'Forum';    # 2011-01-04 by Dvision
   $r = $_SERVER['REQUEST_URI'];
   if (preg_match('#/team#',$r)) $l = '/team/index.php';
   elseif (preg_match('#/help#',$r)) $l = '/help/tour.php';
   elseif (preg_match('#/subscribe#',$r)) $l = "/".$city['ename']."/subscribe.php"; # 2011-01-04 by Dvision
   else $l = '/index.php';
   return current_link(null, $a);
}

function current_link_principal($link, $links, $span=false) {
	global $ROOTPATH;
	$span = $span ? '<span></span>' : '';
	foreach($links AS $l=>$n) {
		if (trim($l,'/')==trim($link,'/')) {
			$html .= "<li><a href='$ROOTPATH/index.php?page=categorias&idcategoria=$l&pagina=1';>{$n} </a></li>";
		}
		else $html .= "<li><a href='$ROOTPATH/index.php?page=categorias&idcategoria=$l&pagina=1';>{$n}</a></li>";
	}
	return $html;
}

function current_backend() {
	global $INI;
	$a = array(
			'/manage/misc/index.php' => 'Painel',
			'/manage/system/background.php' => 'Layout',
			'/manage/system/logo.php' => 'Imagens',
			'/manage/team/index.php' => 'Ofertas',
			//'/manage/system/afiliados.php' => 'Afiliados',
			'/manage/order/index.php' => 'Pedidos',
			'/manage/coupon/index.php' => 'Cupons',
			'/manage/user/index.php' => 'Usuários',
			'/manage/parceiro/index.php' => 'Parceiros',
			//'/manage/market/index.php' => 'Marketing',
			'/manage/category/index.php' => 'Categorias',
			//'/manage/vote/index.php' => 'Pesquisa',
			//'/manage/credit/index.php' => 'Créditos',
			'/manage/system/index.php' => 'Sistema',
			);
	$r = $_SERVER['REQUEST_URI'];
	if (preg_match('#/manage/(\w+)/#',$r, $m)) {
		$l = "/manage/{$m[1]}/index.php";
	} else $l = '/manage/misc/index.php';
	return current_link($l, $a);
}

function current_biz() {
	global $INI;
	$a = array(
			'/lojista/index.php' => 'Pagina inicial',
			'/lojista/settings.php' => 'Configuração',
			'/lojista/coupon.php' => 'Lista de cupons',

			);
	$r = $_SERVER['REQUEST_URI'];
	if (preg_match('#/lojista/coupon#',$r)) $l = '/lojista/coupon.php';
	elseif (preg_match('#/lojista/settings#',$r)) $l = '/lojista/settings.php';
	else $l = '/lojista/index.php';
	return current_link($l, $a);
}

function current_forum($selector='index') {
	global $city;
	$a = array(
			//'/forum/index.php' => 'Todos',
			//'/forum/city.php' => "Forum de {$city['name']}",
			//'/forum/public.php' => 'Forum Publico',
			);
	if (!$city) unset($a['/forum/city.php']);
	$l = "/forum/{$selector}.php";
	return current_link($l, $a, true);
}

function current_invite($selector='refer') {
	$a = array(
			'/meus_convites' => 'Todos',
			'/meus_convites_pendentes' => "Pendente",
			'/meus_convites_recebidos' => 'Recebido',
			);
	$l = "/account/{$selector}.php";
	return current_link($l, $a, true);
}

function current_partner($gid='0') {
	$a = array(
			'/parceiro/index.php' => 'Todos',
			);
	foreach(option_category('partner') AS $id=>$name) {
		$a["/parceiro/index.php?gid={$id}"] = $name;
	}
	$l = "/parceiro/index.php?gid={$gid}";
	if (!$gid) $l = "/parceiro/index.php";
	return current_link($l, $a, true);
}

function current_city($cename, $citys) {
	$link = "/cidade.php?ename={$cename}";
	$links = array();
	foreach($citys AS $city) {
		$links["/cidade.php?ename={$city['ename']}"] = $city['name'];
	}
	return current_link($link, $links);
}

function current_coupon_sub($selector='index') {
	$selector = $selector ? $selector : 'index';
	$a = array(
		'/meus_cupons' => 'Não usados',
		'/meus_cupons_usados' => 'Usados',
		'/meus_cupons_expirados' => 'Expirado',
	);
	$l = "/coupon/{$selector}.php";
	return current_link($l, $a);
}

function current_account($selector='/configuracoes') {
	global $INI;
	$a = array(
		'/meus_cupons' => 'Meus Cupons',
		'/minhas_compras' => 'Minhas compras',
		'/meus_convites' => 'Meus Convites',
		'/meus_creditos' => 'Meus Créditos',
		'/configuracoes' => 'Configuracões',
		'/account/myask.php' => 'Perguntas',
	);
	if (option_yes('usercredit')) {
		$a['/credit/score.php'] = 'Usar pontos';
	}
	return current_link($selector, $a, true);
}

function current_about($selector='us') {
	global $INI;
	$a = array(
 		'/about/us.php' => 'Sobre Nós',
		//'/about/contact.php' => 'Contato',
		'/about/job.php' => 'Trabalho',
		'/about/terms.php' => 'Termos de uso',
		'/about/privacy.php' => 'Termo de Privacidade',
	);
	$l = "/about/{$selector}.php";
	return current_link($l, $a, true);
}

function current_help($selector='faqs') {
	global $INI;
	$a = array(
		'/help/tour.php' => 'Como Funciona ',
		'/help/faqs.php' => 'FAQ',
//		'/help/wroupon.php' => 'O que é ' . $INI['system']['abbreviation'],
	);
	$l = "/help/{$selector}.php";
	return current_link($l, $a, true);
}

function current_order_index($selector='index') {
	$selector = $selector ? $selector : 'index';
	$a = array(
		'/minhas_compras?s=index' => 'Todos',
		'/minhas_compras?s=unpay' => 'Nao pagos',
		'/minhas_compras?s=pay' => 'Pagos',
	);
	$l = "/minhas_compras?s={$selector}";
	return current_link($l, $a);
}

function current_credit_index($selector='index') {
	$selector = $selector ? $selector : 'index';
	$a = array(
		'/credit/score.php' => 'Meus pontos',
		'/credit/goods.php' => 'Converter pontos',
	);
	$l = "/credit/{$selector}.php";
	return current_link($l, $a);
}

function current_link($link, $links, $span=false) {
	$html = '';
	$span = $span ? '<span></span>' : '';
	foreach($links AS $l=>$n) {
		if (trim($l,'/')==trim($link,'/')) {
			$html .= "<span style=\"color:blue;\"><a href=\"{$l}\"> {$n} | </a>{$span}</span>";
		}
		else $html .= "<span><a href=\"{$l}\"> {$n} | </a>{$span}</span>";
	}
	return $html;
}

function current_link_recentes($link, $links, $span=false) {
	$html = '<span><a href="javascript:clicamenu(\'\');"> Todas as Ofertas</a>&nbsp; | &nbsp;</span>';
	$span = $span ? '<span></span>' : '';
	foreach($links AS $l=>$n) {
		if (trim($l,'/')==trim($link,'/')) {
			$html .= "<span><a href=javascript:clicamenu('$l');>{$n} </a>&nbsp; | &nbsp;</span>";
		}
		else $html .= "<span><a href=javascript:clicamenu('$l');>{$n}</a>&nbsp; | &nbsp;</span>";
	}
	return $html;
}

function current_link_home($link, $links, $span=false) {
	$html = '';
	$span = $span ? '<span></span>' : '';
	foreach($links AS $l=>$n) {
			$siz = rand(11,18);
			$html .= "<a href=\"{$l}\"  class=\"menurecentes\">{$n}</a>&nbsp;&nbsp;";
	}
	return $html;
}

/* manage current */
function mcurrent_misc($selector=null) {
	$a = array(
		//'/manage/misc/index.php' => 'Painel',
		//'/manage/market/down.php' => 'Relatorios',
		//'/manage/misc/ask.php' => 'Perguntas',
		//'/manage/misc/feedback.php' => 'Contatos',
		//'/manage/misc/subscribe.php' => 'Usuarios',
		//'/manage/misc/smssubscribe.php' => 'SMS',
		//'/manage/misc/invite.php' => 'Comissões',
		//'/manage/misc/ranking.php' => 'Ranking',
		//'/manage/misc/money.php' => 'Consulta recarga de créditos',
		//'/manage/misc/link.php' => 'Links dos Parceiros',
		//'/manage/misc/backup.php' => 'Backup',
		
	);
	$l = "/manage/misc/{$selector}.php";
	return current_link($l,$a,true);
}

function mcurrent_misc_money($selector=null){
	$selector = $selector ? $selector : 'store';
	$a = array(
		//'/manage/misc/money.php?s=store' => 'Recarga Offline',
		'/manage/misc/money.php?s=charge' => 'Recarga Online',
		//'/manage/misc/money.php?s=withdraw' => 'Registros de retirada',
		//'/manage/misc/money.php?s=cash' => 'Pagar em dinheiro',
		//'/manage/misc/money.php?s=refund' => 'Registros de restituição',
	);
	$l = "/manage/misc/money.php?s={$selector}";
	return current_link($l, $a);
}

function mcurrent_misc_backup($selector=null){
	$selector = $selector ? $selector : 'backup';
	$a = array(
		'/manage/misc/backup.php' => 'Backup do banco de dados',
		//'/manage/misc/restore.php' => 'Restaurar banco de dados',
	);
	$l = "/manage/misc/{$selector}.php";
	return current_link($l, $a);
}

function mcurrent_misc_invite($selector=null){
	$selector = $selector ? $selector : 'index';
	$a = array(
		'/manage/misc/invite.php?s=index' => 'Pendentes',
		'/manage/misc/invite.php?s=record' => 'Aprovados',
		//'/manage/misc/invite.php?s=naocomprado' => 'Ainda não fizeram compras',
		'/manage/misc/invite.php?s=cancel' => 'Cancelados',
	);
	$l = "/manage/misc/invite.php?s={$selector}";
	return current_link($l, $a);
}
function mcurrent_order($selector=null) {
	$a = array(
		'/manage/order/index.php' => 'Oferta atual',
		'/manage/order/pay.php' => 'Ofertas pagas',
		'/manage/order/credit.php' => 'Ofertas Creditadas',
		'/manage/order/unpay.php' => 'Ofertas nao pagas',
	);
	$l = "/manage/order/{$selector}.php";
	return current_link($l,$a,true);
}

function mcurrent_user($selector=null) {
	$a = array(
		'/manage/user/index.php' => 'Lista de usuáios',
		'/manage/user/manager.php' => 'Administradores',
		'/manage/parceiro/index.php' => 'Lista de parceiros',
		'/manage/parceiro/create.php' => 'Novo parceiro',
	);
	$l = "/manage/user/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_team($selector=null) {
	$a = array(
		'/manage/team/index.php' => 'Oferta atual',
		'/manage/team/success.php' => 'Ofertas validas',
		'/manage/team/failure.php' => 'Ofertas canceladas',
		'/manage/team/edit.php' => 'Nova oferta',
	);
	$l = "/manage/team/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_websiteafiliado($selector=null) {
	$a = array(
		'/manage/afiliado/produto.php' => 'Produtos de anunciantes',
	);
	$l = "/manage/team/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_afiliados($selector=null) {
	$a = array(

		//'/manage/system/afiliados.php' => 'Programa de Afiliados', 
		//'/manage/afiliado/index.php' => 'Anunciante', 
		//'/manage/afiliado/create.php' => 'Novo anunciante', 
		//'/manage/afiliado/produto.php' => 'Produtos de anunciantes', 
		//'/manage/afiliado/produtoedit.php' => 'Novo produto de anunciante',
	);
	$l = "/manage/team/{$selector}.php";
	return current_link($l,$a,true);
}

function mcurrent_feedback($selector=null) {
	$a = array(
		'/manage/feedback/index.php' => 'Ver todas',
	);
	$l = "/manage/feedback/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_coupon($selector=null) {
	$a = array(
		'/manage/coupon/index.php' => 'Não usados',
		'/manage/coupon/consume.php' => 'Usados',
		'/manage/coupon/expire.php' => 'Expirados',
		//'/manage/coupon/card.php' => 'Cupons',
		//'/manage/coupon/cardcreate.php' => 'Novo Cupom',
	);
	$l = "/manage/coupon/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_category($selector=null) {
	$zones = get_zones();
	$a = array();
	foreach( $zones AS $z=>$o ) {
		$a['/manage/category/index.php?zone='.$z] = $o;
	}
	$l = "/manage/category/index.php?zone={$selector}";
	return current_link($l,$a,true);
}
function mcurrent_partner($selector=null) {
	$a = array(
		'/manage/user/index.php' => 'Lista de usuários',
		'/manage/user/manager.php' => 'Administradores',
		'/manage/parceiro/index.php' => 'Gerenciar Parceiros',
		'/manage/parceiro/create.php' => 'Criar novo Parceiro',
	);
	$l = "/manage/parceiro/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_market($selector=null) {
	$a = array(
		'/manage/market/index.php' => 'Email marketing',
		'/manage/market/sms.php' =>  'SMS Marketing',
		'/manage/market/down.php' => 'Download de Relatórios',
	);
	$l = "/manage/market/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_market_down($selector=null) {
	$a = array(
		'/manage/market/down.php' => 'Numero do celular',
		'/manage/market/downemail.php' => 'Email',
		'/manage/market/downorder.php' => 'Pedido',
		'/manage/market/downcoupon.php' => 'Cupom',
		'/manage/market/downuser.php' => 'info do Usuário',
	);
	$l = "/manage/market/{$selector}.php";
	return current_link($l,$a,true);
}

function mcurrent_system($selector=null) {
	$a = array(
		//'/manage/system/index.php' => 'Informações Básicas',
		//'/manage/system/option.php' => 'Configurações',
		//'/manage/system/bulletin.php' => 'Avisos',
		//'/manage/system/pay.php' => 'Pagamento',
		//'/manage/system/email.php' => 'Email',
		//'/manage/system/sms.php' => 'SMS',
		//'/manage/system/page.php' => 'Paginas',
		//'/manage/system/agregador.php' => 'Agregadores de Ofertas',
	//	'/manage/system/cache.php' => 'Cache',
		//'/manage/system/skin.php' => 'Skin',
		//'/manage/system/template.php' => 'Template',
		//'/manage/system/upgrade.php' => 'Upgrade',
	);
	$l = "/manage/system/{$selector}.php";
	return current_link($l,$a,true);
}

function mcurrent_system_layout($selector=null) {
	$a = array(
		//'/manage/system/background.php' => 'Background',   
		//'/manage/system/topo.php' => 'Topo',   
		//'/manage/system/cores.php' => 'Alteração de cores',   
		//'/manage/system/recentes.php' => 'Ofertas Recentes',  
	);
	$l = "/manage/system/{$selector}.php";
	return current_link($l,$a,true);
}

function mcurrent_credit($selector=null) {
	$a = array(
		'/manage/credit/index.php' => 'Registros de crédito',
		//'/manage/credit/settings.php' => 'Regras de crédito',
		//'/manage/credit/goods.php' => 'Converter Créditos',
	);
	$l = "/manage/credit/{$selector}.php";
	return current_link($l,$a,true);
}
 
