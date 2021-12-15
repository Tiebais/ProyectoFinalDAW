<?php
class conexion {
	function conectar($esRemota){
		$database = 'mysql:dbname=tienda_online;host=localhost';
		$usurio = 'debianDB';
		$password = 'debianDB';
		try {
		   $base = new PDO($dbs, $usuario, $password);
		   echo "Conexion exitosa <br>";
		   return $base;
		}
		catch (PDOException $e) {
		   echo 'Falló la conexion: ' . $e->getMessage();
		}
	}
}

?>
