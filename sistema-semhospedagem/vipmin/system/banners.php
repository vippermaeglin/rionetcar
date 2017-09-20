<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');
 
$system = Table::Fetch('system', 1);
 
if ($_POST) {
	
	need_manager(true);
	if(!empty($_POST['totalbanners'])){
	
		$sql = "delete from linkbanners";
		mysql_query($sql);

		for($i = 1; $i <= $_POST['totalbanners']; $i ++){
			
			$nomefile 	= $_POST['nomefile_'.$i];
			$nomefileurl = str_replace("." , "_" , $nomefile);
			$nomefileurl = str_replace(" " , "_" , $nomefileurl);
			$urlfile	=	$_POST[$nomefileurl];


			$nomefile = str_replace("_" , "." , $nomefile);
			$nomefile = str_replace(" ", "", $nomefile);

			$sql = "insert into linkbanners (file,link) values ('$nomefile','$urlfile')";
			mysql_query($sql);		
		}
	} 
	 
	unset($_POST['commit']);
	$INI = Config::MergeINI($INI, $_POST);
	$INI = ZSystem::GetUnsetINI($INI);
	save_config();

	$value = Utility::ExtraEncode($INI);
	$table = new Table('system', array('value'=>$value));
	if ( $system ) $table->SetPK('id', 1);
	$flag = $table->update(array( 'value'));

	Session::Set('notice', 'Informações atualizadas com sucesso!');
	redirect( WEB_ROOT . '/vipmin/system/banners.php');
}


include template('manage_system_banners');

?>