<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
import('backup');

need_anunciante();
need_auth('admin');


function _go_reload() {
	redirect( WEB_ROOT . '/adminanunciante/misc/backup.php' );
}

/* get tables */
$db_name = $INI['db']['name'];
$tables = DB::GetQueryResult("SHOW TABLE STATUS FROM `{$db_name}`", false);
/* end */

if (is_get()) {
	$results = DB::GetQueryResult("SHOW TABLE STATUS FROM `{$db_name}`", false);
	$option_table = Utility::OptionArray($results, 'name', 'name');
	die(include template('manage_misc_backup'));
}

$bftype=$_POST['bfzl'];
if($bftype=="quanbubiao"){
	if(!$_POST['fenjuan']){ //Not a sub roll
		$sql = null;
		foreach($tables AS $one) {
			$table = $one['name'];
			$sql .= backup_make_header($table);
			$query = DB::Query("SELECT * FROM `{$table}`");
			while($r = DB::NextRecord($query) ) {
				$sql .= backup_make_record($table, $r);
			}
		}
		$filename = date("Ymd").Utility::GenSecret(4).'_all.sql';
		if($_POST['weizhi']=="localpc") {
			backup_down_file($sql, $filename);
		}
		elseif($_POST['weizhi']=="server"){
			if( true === backup_write_file($sql,$filename)) {
				Session::Set('notice', "Backup de todas as tabelas completo");
			}
			else {
				Session::Set('error', "Falha no Backup");
			}
		}
		_go_reload();
	}else{  //Sub-volume backup
		if(!$_POST['filesize']){
			Session::Set('error', "Please fill in the sub-volume size of the backup file!");
			_go_reload();
		}

		$filenamep = date("Ymd").Utility::GenSecret(4).'_all';
		$p=1; $sql = null;

		foreach($tables AS $one) {
			$table = $one['name'];
			$sql .= backup_make_header($table);
			$query = DB::Query("SELECT * FROM `{$table}`");
			while($r = DB::NextRecord($query) ) {
				$sql .= backup_make_record($table, $r);
				if(strlen($sql)>=$_POST['filesize']*1024){
					$filename = $filenamep  . ("_v".$p.".sql");
					if( true !== backup_write_file($sql,$filename)) {
						Session::Set('error',  "Backup failed");
						_go_reload();
					}
					$p++; $sql = null;
				}
			}
		}

		if($sql) {
			$filename = $filenamep  . ("_v".$p.".sql");
			if( true !== backup_write_file($sql,$filename)) {
				Session::Set('error', "Backup failed");
				_go_reload();
			}
		}

		Session::Set('notice', "Backup all data tables success!");
		_go_reload();
	}
} elseif($bftype=="danbiao") {

	$table = mysql_escape_string(strval($_POST['tablename']));

	if(!$table) {
		Session::Set('error', "Please select the data to back up the table");
		_go_reload();
	}

	if(!$_POST['fenjuan']){ //Regardless of volume
		$sql = null;
		$sql .= backup_make_header($table);
		$query = DB::Query("SELECT * FROM `{$table}`");
		while($r = DB::NextRecord($query)){
			$sql .= backup_make_record($table, $r);
		}
		$filename = date("Ymd").Utility::GenSecret(4)."_{$table}.sql";
		if($_POST['weizhi']=="localpc") {
			backup_down_file($sql, $filename);
		}
		elseif($_POST['weizhi']=="server"){
			if( true === backup_write_file($sql, $filename)) {
				Session::Set('notice', "Table-{$table}-Data backup is complete");
			} else {
				Session::Set('error', "BackUp table-{$table}-Failure");
			}
			_go_reload();
		}
	} else { //Sub-volume backup
		if(!$_POST['filesize']){
			Session::Set('error', "Please fill in the sub-volume size of the backup file!");
			_go_reload();
		}

		$sql = null;
		$sql .= backup_make_header($table);
		$p=1;
		$filenamep = date("Ymd").Utility::GenSecret(4)."_{$table}";

		$query = DB::Query("SELECT * FROM `{$table}`");
		while($r = DB::NextRecord($query)){
			$sql .= backup_make_record($table, $r);
			if(strlen($sql)>=$_POST['filesize']*1024){
				$filename = $filenamep . ("_v".$p.".sql");
				if( true !== backup_write_file($sql,$filename)){
					Session::Set('error',"Backup table-{$table}-{$p}-Failure");
					_go_reload();
				}
				$p++; $sql = null;
			}
		}

		if($sql) {
			if( true !== backup_write_file($sql,$filename)){
				Session::Set('error', "Backup table-{$table}-Failure");
				_go_reload();
			}
		}
		Session::Set('notice', "Table-{$table}-Data backup is complete");
		_go_reload();
	}

	if($_POST['weizhi']=="localpc" && $_POST['fenjuan']=='yes') {
		Session::Set('error', "Select the backup to the serverï¼ŒTo use the sub-volume backup");
		_go_reload();
	}

	if($_POST['fenjuan']=="yes" && !$_POST['filesize']) {
		Session::Set('error', "Select a sub-volume backup, file size does not fill in sub-volumes");
		_go_reload();
	}

	$backupdir = DIR_ROOT . '/data';
	if($_POST['weizhi']=="server" && is_writeable($backupdir)) {
		Session::Set('error', "Backup files directory {$backupdir} Can not write, modify directory attributes");
		_go_reload();
	}
	_go_reload();
}
