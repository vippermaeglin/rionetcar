<?php
/*
* Rafael Piza
* rafael.piza@yahoo.com.br
* atualizado em: 03/10/2016
*/
include("../app.php");


function conectar(){
	global $INI;
	
	$servidor = $INI['db']['host'];	
	$usuario  = $INI['db']['user'];	
	$senha    = $INI['db']['pass'];		
	$baseDados	=	$INI['db']['name'];

	
	try{
		$pdo = new PDO("mysql:host=".$servidor.";dbname=".$baseDados,$usuario,$senha);
		return $pdo;
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	
}

function gravarMarcas($id,$nomeFabricante,$tipo){
	
	try{
		
		$sql 				= "SELECT id FROM 
							   fabricante_new 
							   WHERE 
							   id =  = :codigo_marca";
							   
		$procurarRegistro 	= conectar()->prepare($sql);
		$procurarRegistro->bindValue(":id",$id);
		$procurarRegistro->execute();
		
	
		
		if($procurarRegistro->rowCount() == 0){
			
			$tipo = verificaTipo($tipo);
			
			$sql				= "INSERT INTO fabricante_new (id,nome,tipo) VALUES 
								   (:id,:nome,:tipo)";
			$cadastrarMarca 	= conectar()->prepare($sql);
			$cadastrarMarca->bindValue(":id",$id,PDO::PARAM_INT);
			$cadastrarMarca->bindValue(":nome",$nomeFabricante);
			$cadastrarMarca->bindValue(":tipo",$tipo);
			$cadastrarMarca->execute();
		
		}
		
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function gravarModelos($codigoMarca,$codigoFipe,$nomeModelo,$tipo){
	

		try{
		
		$sql 				= "SELECT id FROM 
							   modelo_new 
							   WHERE 
							   id = :codigo_fipe";
							   
		$procurarRegistro 	= conectar()->prepare($sql);
		$procurarRegistro->bindValue(":codigo_fipe",$codigoFipe);
		$procurarRegistro->execute();
		
		if($procurarRegistro->rowCount() == 0){
			
			$tipo = verificaTipo($tipo);
			
			$sql				= "INSERT INTO modelo_new (fabricante,id,nome,tipo) VALUES 
							      (:fabricante,:id,:nome,:tipo)";
			$cadastrarModelo 	= conectar()->prepare($sql);
			
			$cadastrarModelo->bindValue(":fabricante",$codigoMarca,PDO::PARAM_INT);
			$cadastrarModelo->bindValue(":id",$codigoFipe);
			$cadastrarModelo->bindValue(":nome",$nomeModelo);
			$cadastrarModelo->bindValue(":tipo",$tipo);
			$cadastrarModelo->execute();
			
		}
		
	}catch(PDOException $e){
		return $e->getMessage();
	}
}
function gravarAno($codigoFipe, $anoModeloFipe, $combustivelFipe, $codigoModelo,$valorFipe,$tipo){
		try{
			$sql 				= "SELECT * FROM 
								   ano_modelo_new 
								   WHERE 
								   modelo = :modelo
								   AND
								   nome = :nome ";
								   
			$procurarRegistro 	= conectar()->prepare($sql);
			$procurarRegistro->bindValue(":modelo",$codigoModelo);
			$procurarRegistro->bindValue(":nome",$anoModeloFipe+$combustivelFipe);
			$procurarRegistro->execute();
			
			if($procurarRegistro->rowCount() == 0){
				
				$tipo = verificaTipo($tipo);
				
				$sql				= "INSERT INTO ano_modelo_new (id, nome, modelo, valor, tipo) VALUES 
									  (:codigo_fipe,:nome,:codigo_modelo,:valor_fipe, :tipo)";
				$cadastrarAno 	= conectar()->prepare($sql);
				$cadastrarAno->bindValue(":codigo_modelo",$codigoModelo,PDO::PARAM_INT);
				$cadastrarAno->bindValue(":codigo_fipe",$codigoFipe);
				$cadastrarAno->bindValue(":nome",$anoModeloFipe+$combustivelFipe);
				$cadastrarAno->bindValue(":valor_fipe",$valorFipe);
				$cadastrarAno->bindValue(":tipo",$tipo);
				$cadastrarAno->execute();
			
			}
			
	}catch(PDOException $e){
		return $e->getMessage();
	}
}


function newUpdate($tipo){
	if($tipo < 3){
		header("Location: ".$ROOTPATH."/include/fipe/fipe.php?tipo=".$tipo+1);
	}else{
		tablesReplaces();
		die("ATUALIZAÇÃO FINALIZADA!");
	}
}

	function verificaTipo($tipo){
		if($tipo == 1){
			$tipo = "carro";
		}else if($tipo == 2){
			$tipo = "moto";
		}else{
			$tipo = "caminhao";
		}
		
		return $tipo;
	}
	
	function tablesExists(){
	global $INI;

		$sql = 'SELECT table_name FROM information_schema.tables WHERE table_schema = :database
		AND table_name = :tabela';

		$stmt = conectar()->prepare($sql);
		$stmt->bindValue(':database', $INI['db']['name']);
		$stmt->bindValue(':tabela', 'fabricante_new');
		$stmt->execute();
		$tabelas = $stmt->rowCount();

		if($tabelas == 0 ){
			$sql_anomodelo = "CREATE TABLE IF NOT EXISTS `ano_modelo_new` (
							  `id` int(11) NOT NULL AUTO_INCREMENT,
							  `nome` varchar(100) NOT NULL,
							  `modelo` varchar(10) NOT NULL,
							  `valor` double(10,2) NOT NULL,
							  `tipo` varchar(20) NOT NULL,
							  PRIMARY KEY (`id`)
							) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=870007 ;";
							
			$sql_fabricante = "CREATE TABLE IF NOT EXISTS `fabricante_new` (
								  `id` int(11) NOT NULL,
								  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
								  `tipo` varchar(20) CHARACTER SET utf8 NOT NULL,
								  UNIQUE KEY `codigo_marca` (`id`)
								) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
								
			$sql_modelo	= 	"CREATE TABLE IF NOT EXISTS `modelo_new` (
							  `fabricante` int(11) NOT NULL,
							  `id` varchar(10) NOT NULL,
							  `nome` varchar(100) NOT NULL,
							  `tipo` varchar(20) NOT NULL
							) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
							
			conectar()->exec($sql_anomodelo);	
			conectar()->exec($sql_fabricante);	
			conectar()->exec($sql_modelo);				
			
		}
	}
	
	function tablesReplaces(){
		
		global $INI;
		
		$sql = 'SELECT table_name FROM information_schema.tables WHERE table_schema = :database
		AND table_name = :tabela';

		$stmt = conectar()->prepare($sql);
		$stmt->bindValue(':database', $INI['db']['name']);
		$stmt->bindValue(':tabela', 'fabricante_old');
		$stmt->execute();
		$tabelas = $stmt->rowCount();
		
		if($tabelas > 0 ){
			$sql_anomodelo = "DROP TABLE ano_modelo_old;";	
			$sql_fabricante = "DROP TABLE fabricante_old;";		
			$sql_modelo	= 	"DROP TABLE modelo_old;";
							
			conectar()->exec($sql_anomodelo);	
			conectar()->exec($sql_fabricante);	
			conectar()->exec($sql_modelo);		
		}
		
		$sql_anomodelo_old = "RENAME TABLE ano_modelo TO ano_modelo_old;";				
		$sql_fabricante_old = "RENAME TABLE fabricante TO fabricante_old;";					
		$sql_modelo_old	= 	"RENAME TABLE modelo TO modelo_old;";
		
		conectar()->exec($sql_anomodelo_old);	
		conectar()->exec($sql_fabricante_old);	
		conectar()->exec($sql_modelo_old);
		
		$sql_anomodelo_new = "RENAME TABLE ano_modelo_new TO ano_modelo;";				
		$sql_fabricante_new = "RENAME TABLE fabricante_new TO fabricante;";					
		$sql_modelo_new	= 	"RENAME TABLE modelo_new TO modelo;";
		
		conectar()->exec($sql_anomodelo_new);	
		conectar()->exec($sql_fabricante_new);	
		conectar()->exec($sql_modelo_new);
		
	}
?>