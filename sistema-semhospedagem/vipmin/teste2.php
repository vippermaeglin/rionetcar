<?php
session_start();
echo "reload de pagina verificar sessao: --->".$_SESSION['iduserteste'];

echo "<BR>mostrando o array DE SESSAO <BR>";

print_r($_SESSION); 
 
?>