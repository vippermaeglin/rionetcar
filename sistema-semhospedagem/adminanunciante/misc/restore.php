<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
import('backup');

need_anunciante();
need_auth('admin');

function _go_reload() {
	redirect( WEB_ROOT . '/adminanunciante/misc/restore.php' );
}

/* get tables */
$db_name = $INI['db']['name'];
$tables = DB::GetQueryResult("SHOW TABLE STATUS FROM `{$db_name}`", false);
/* end */

$backupdir = DIR_ROOT . '/data';
$handle = opendir($backupdir); $bs = array();
while ($file = readdir($handle)) {
    if(eregi("^[0-9]{8}[A-Z]{4}([0-9a-zA-Z_]+)(\.sql)$", $file))
        $bs[$file] = $file;
}
krsort($bs);
closedir($handle);

$action = strval($_REQUEST['action']);

if ($action=="restore") {
    if($_POST['restorefrom']=="server"){

		$serverfile = strval($_POST['serverfile']);
        if(!$serverfile) {
            Session::Set('error', "Você escolheu restaurar um backup do servidor, mais não especificou o arquivo.");
			_go_reload();
        }

        if(!eregi("_v[0-9]+", $serverfile)) {
            $filename = $backupdir . '/' . $serverfile;
            if( backup_import($filename)) {
               Session::Set('notice', "Arquivo de backup {$serverfile} foi importado para o banco de dados");
			}
            else {
                Session::Set('error', "Arquivo de backup {$serverfile} falhou ao ser importado");
			}
			_go_reload();

        }else{
            $filename = $backupdir . '/' . $serverfile;
            if( true === backup_import($filename)) {
                Session::Set('notice', "{$serverfile} foi importado para o banco de dados");
			}
            else {
                Session::Set('error', "{$serverfile} falhou ao ser importado");
				_go_reload();
            }

            $voltmp = explode("_v",$serverfile);
            $volname = $voltmp[0];
            $volnum = explode(".sq",$voltmp[1]);
            $volnum = intval($volnum[0])+1;
            $nextfile = $volname."_v".$volnum.".sql";
            if(file_exists("{$backupdir}/{$nextfile}")){
                Session::Set('notice', "Sistema importará automaticamente o proximo volume em 3 segundos: arquivo {$nextfile}");
                Session::Set('nextfile', $nextfile);
				_retore_script();
            }else{
                Session::Set('notice', "Todos os volumes foram importados com sucesso.");
            }

			_go_reload();
        }
    }

    if($_POST['restorefrom']=="localpc"){
        switch ($_FILES['myfile']['error']){
            case 1:
            case 2:
            $msgs = "Seu arquivo é maior que o limite de upload do servidor. Falha no envio.";
            break;
            case 3:
            $msgs = "Upload de arquivo de backup do seu computador não foi finalizado";
            break;
            case 4:
            $msgs = "Upload de arquivos de backup de seu computador falhou.";
            break;
            case 0:
            break;
        }
        if($msgs){
			Session::Set('error', $msgs);
			_go_reload();
        }

		if ( true === backup_import($_FILES['myfile']['tmp_name'])) {
			Session::Set('notice', "Arquivo de backup local enviado com sucesso.");
		}else {
			Session::Set('error', "Arquivo de backup local falou ao ser importado pelo banco de dados.");
		}
		_go_reload();
	}

	if($_SESSION['nextfile']) {

		$serverfile = strval($_SESSION['nextfile']);
		$filename = $backupdir .'/' .$serverfile;
		if( true === backup_import($filename)) {
			Session::Set('notice', "{$serverfile} foi importado para o banco de dados");
		}
		else {
			Session::Set('error', "{$serverfile} falhou ao ser importado");
			_go_reload();
		}

		$voltmp = explode("_v", $serverfile);
		$volname = $voltmp[0];
		$volnum = explode(".sq",$voltmp[1]);
		$volnum = intval($volnum[0])+1;
		$nextfile = $volname."_v".$volnum.".sql";
		if(file_exists("{$backupdir}/{$nextfile}")){
			Session::Set('notice', "Sistema irá importar automaticamente o proximo volume de backup em 3 segundos: {$nextfile}");
			Session::Set('nextfile', $nextfile);
			_retore_script();
		}else{
			Session::Set('notice', "O backup de multiplo volume foi importado.");
		}
		_go_reload();
	}
}

$show = array();
$show[] = "Isso irá restaurar todos os dados antigos após restaurar o banco de dados.";
$show[] = "Só pode restaurar arquivos gerados por esse sistema. Não pode ser restaurado arquivos gerados por outros sistemas.";
$show[] = "O tamanho max. para restaurar arquivos locais é de 2 MB.";
$show[] = "Se você usar backup de multiplo volume, você precisa restaurar o volume 1. os outros arquivos vão ser importados automaticamente pelo sistema.";

include template('manage_misc_restore');

function _retore_script() {
	$script = "<meta http-equiv='refresh' content='3; url=restore.php?action=restore' />" ;
	Session::Set('script', $script);
}
