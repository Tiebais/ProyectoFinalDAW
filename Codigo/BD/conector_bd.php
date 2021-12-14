<?php
	
	function conectar($esRemota){
		if ($esRemota){
			$servidor = "...";
			
		} else {
			$servidor = "localhost:3306";
			$usuario = "debianDB";
			$password = "debianDB";
			$bd = "tienda_online";
		}

		//para establever una conexcion con una bd necesitamos usar la funcion mysqli_connect();
		$conexion = mysqli_connect($servidor,$usuario,$password) or die ("No se ha podido conectar al servidor de Base de datos");
		
		$db = mysqli_select_db($conexion,$bd) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
		
		if ($conexion){
			return $conexion;
		} else {
			echo "Error no se ha podido conectar con la BD <br>";
			//funcion que indica el error al conectar
			echo mysqli_connect_error();
		}
	}
?>
