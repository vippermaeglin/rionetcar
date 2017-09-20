<?php

session_start();

echo "<BR>--- ANTES ".$_SESSION['iduserteste'];
$_SESSION['iduserteste'] =  "999";
echo "<BR>--- DEPOIS ".$_SESSION['iduserteste'];
 
?>