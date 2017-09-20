<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_anunciante(); 

$daytime =  date('Y-m-d') ;
 
$team_count = Table::Count('team');
$order_count = Table::Count('order');
$user_count = Table::Count('user'); 
$subscribe_count = Table::Count('subscribe');

/*********************** total ofertas no site */
$sql =  "select count(id) as total from  `team` where posicionamento <> 5 and begin_time < '".time()."' and end_time > '".time()."' and now_number < max_number";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$ofertas_site = $row->total; 
if(!$ofertas_site) $ofertas_site = 0; 


/*********************** total ofertas encerrando hoje */
$sql =  "select count(id) as total from  `team` where posicionamento <> 5 and DATE(FROM_UNIXTIME(`end_time`)) = '$daytime'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$ofertas_encerrando_hoje = $row->total; 
if(!$ofertas_encerrando_hoje) $ofertas_encerrando_hoje = 0; 

/*********************** total cupons gerados */
$sql =  "select count(id) as total from  `coupon`";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$cupons_total = $row->total; 
if(!$cupons_total) $cupons_total = 0; 

/*********************** total cupons nao consumidos */
$sql =  "select count(id) as total from  `coupon` where consume = 'N'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$cupons_nao_consumidos = $row->total; 
if(!$cupons_total) $cupons_nao_consumidos = 0; 

/*********************** cupons gerados hoje */
$sql =  "select count(id) as total from  `coupon` where DATE(FROM_UNIXTIME(`create_time`)) = '$daytime'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$cupons_hoje = $row->total; 
if(!$cupons_hoje) $cupons_hoje = 0; 

/*********************** cupons expirando hoje */
$sql =  "select count(id) as total from  `coupon` where consume = 'N' and DATE(FROM_UNIXTIME(`expire_time`)) = '$daytime'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$cupons_expirando_hoje = $row->total; 
if(!$cupons_expirando_hoje) $cupons_expirando_hoje = 0;

/*********************** total cupons expirados */
$sql =  "select count(id) as total from  `coupon` where consume = 'N' and DATE(FROM_UNIXTIME(`expire_time`)) > '$daytime'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$cupons_expirados = $row->total; 
if(!$cupons_expirados) $cupons_expirados = 0; 


/*********************** rendimentos de hoje */
$sql =  "select sum(origin) as income_pay from `order` where state='pay' and DATE(`datapedido`)  = '$daytime'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$rendimento_hoje = $row->income_pay; 
if(!$rendimento_hoje) $rendimento_hoje = 0; 

/*********************** rendimentos do mes */
$sql =  "select sum(origin) as income_pay from `order` where state='pay' and MONTH(`datapedido`) = MONTH(NOW())";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$rendimento_mes = $row->income_pay;
if(!$rendimento_mes) $rendimento_mes = 0; 
/*********************** rendimentos do ano */
$sql =  "select sum(origin) as income_pay from `order` where state='pay' and YEAR(`datapedido`) = YEAR(NOW())";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs); 
$rendimento_ano = $row->income_pay; 
if(!$rendimento_ano) $rendimento_ano = 0; 

/*********************** tabela de hoje
/********************** total de pedidos*/
$sql =  "select count(id) as order_today_count, sum(money) as income_pay from `order` where create_time=0 and DATE(  `datapedido` )  = '$daytime'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs);
$order_today_count = $row->order_today_count;
$income_pay = $row->income_pay;

$sql =  "select count(id) as order_today_count, sum(money) as income_pay from `order` where  DATE(FROM_UNIXTIME(`create_time`)) = '$daytime' and datapedido is null";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs);
$order_today_count2 = $row->order_today_count;
$income_pay2 = $row->income_pay;
$income_pay = $income_pay + $income_pay2;

$order_today_count = $order_today_count + $order_today_count2;
/**********************fim total de pedidos*/
	
/*********************** tabela do mes
/********************** total de pedidos*/
$sql =  "select count(id) as order_today_count, sum(money) as income_pay  from `order` where create_time=0 and MONTH(`datapedido`) = MONTH(NOW())";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs);
$order_month_count = $row->order_today_count;
$income_pay_month = $row->income_pay;

$sql =  "select count(id) as order_today_count, sum(money) as income_pay from `order` where  MONTH(FROM_UNIXTIME(`create_time`)) = MONTH(NOW()) and datapedido is null";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs);
$order_month_count2 = $row->order_today_count;
$income_pay2month = $row->income_pay;
$income_paymonth = $income_paymonth + $income_pay2month;

$order_month_count = $order_month_count + $order_month_count2;
/**********************fim total de pedidos*/
	
/*********************** tabela do ano
/********************** total de pedidos 
$sql =  "select count(id) as order_today_count, sum(money) as income_pay  from `order` where create_time=0 and YEAR(`datapedido`) = YEAR(NOW())";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs);
$order_year_count = $row->order_today_count;
$income_pay_year = $row->income_pay;

$sql =  "select count(id) as order_today_count, sum(money) as income_pay from `order` where  YEAR(FROM_UNIXTIME(`create_time`)) = YEAR(NOW()) and datapedido is null";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs);
$order_year_count2 = $row->order_today_count;
$income_pay2year = $row->income_pay;
$income_payyear = $income_payyear + $income_pay2year;

$order_year_count = $order_year_count + $order_year_count2;
/**********************fim total de pedidos*/


/********************** total de pedidos pagos hoje*/
$sql =  "select count(id) as order_today_pay_count from `order` where  DATE(FROM_UNIXTIME(`create_time`)) = '$daytime' and datapedido is null and state = 'pay'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs);
$order_today_pay_count2 = $row->order_today_pay_count;

$sql =  "select count(id) as order_today_pay_count from `order` where create_time=0 and DATE(  `datapedido` )  = '$daytime' and state = 'pay'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs);
$order_today_pay_count = $row->order_today_pay_count;

$order_today_pay_count = $order_today_pay_count2 + $order_today_pay_count;
/********************** fim total de pedidos pagos*/

 /********************** total de usuarios cadastratos hoje*/ 
$sql =  "select count(id) as user_today_count from `user` where  DATE(FROM_UNIXTIME(`create_time`)) = '$daytime'";
$rs = mysql_query($sql);
$row = mysql_fetch_object($rs);
$user_today_count = $row->user_today_count;
 /********************** fim total de usuarios*/ 
 
 
 
 

$income_charge = Table::Count('flow', array(
	"create_time > {$daytime}",
	'action' => 'charge',
), 'money');

$income_store= Table::Count('flow', array(
	"create_time > {$daytime}",
	'action' => 'store',
), 'money');
 

include template('manage_misc_index');
