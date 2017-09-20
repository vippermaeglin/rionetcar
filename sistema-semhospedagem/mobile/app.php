<?php

global $INI;

/* Atualiza com novos valores. */
unset($ROOTPATH, $PATHSKIN, $ROOTDESIGN, $ROOTBLOCO);

$ROOTPATH 	 = $INI['system']['wwwprefix'] . "/mobile";
$PATHSKIN 	 = $ROOTPATH . "/skin/padrao";
$ROOTDESIGN  = $ROOTPATH . "/app/design/padrao";
$ROOTBLOCO   = $ROOTPATH . "/app/design/padrao/bloco";
$ROOTMEDIA   = $INI['system']['wwwprefix']  . "/media";

/* Defines utilizado apenas no layout responsivo. */
define('DIR_ROOT_M', str_replace('\\','/',dirname(__FILE__)));
define('DIR_BLOCO_M', dirname(DIR_ROOT_M) . "/mobile/app/design/padrao/bloco");
define('DIR_DESIGN_M', dirname(DIR_ROOT_M) . "/mobile/app/design/padrao");
 
?>