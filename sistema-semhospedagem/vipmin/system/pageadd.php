	<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_auth('market');
   

$sql = "ALTER TABLE  `page` ADD  `destaque` VARCHAR(10) NULL  ";
$rs = @mysql_query($sql);

$sql =  "select * from page";
$rs =  mysql_query($sql);
  
while ( $row = mysql_fetch_array($rs) )
{
	  $row2 = array_change_key_case($row, CASE_LOWER);
	  $pages[$row['id']] = $row['value'];
	 
}
 
$id = strval($_GET['id']);
if ( $id && !in_array($id, array_keys($pages))) {
	redirect( WEB_ROOT . "/vipmin/system/page.php");
}
$n = Table::Fetch('page', $id);
 
$ordenacao 	 	= $n['ordenacao'];
$value 			= $n['value'];
$destaque 		= $n['destaque'];
$status 		= $n['status'];
$category_id 	= $n['category_id'];
$titulo 		= $n['titulo']; 

include template('manage_system_pageadd'); 