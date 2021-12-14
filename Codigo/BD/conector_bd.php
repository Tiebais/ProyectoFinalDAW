<?php
	
	function conectar($esRemota){
		if ($esRemota){
			$servidor = "...";
			
		} else {
			$servidor = "localhost:3306";
			$usuario = "debian";
			$password = "debian";
			$bd = "tienda_online";
		}

		//para establever una conexcion con una bd necesitamos usar la funcion mysqli_connect();
		$conexion = mysqli_connect($servidor,$usuario,$password,$bd);

		if ($conexion){
			return $conexion;
		} else {
			echo "Error no se ha podido conectar con la BD <br>";
			//funcion que indica el error al conectar
			echo mysqli_connect_error();
		}
	}
?>
