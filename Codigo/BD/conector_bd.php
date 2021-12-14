<?php
	
	function conectar($esRemota){
		if ($esRemota){
			$servidor = "...";
			
		} else {
			$servidor = "127.0.0.1";
			$usuario = "debianDB";
			$password = "debianDB";
			$bd = "tienda_online";
		}

		//para establever una conexcion con una bd necesitamos usar la funcion mysqli_connect();
		$conector = mysqli_connect($servidor, $usuario, $password, $bd, 3306);
        	if ($conexion) {
            	     return $conexion;
        	}
        	else{
            	     echo mysqli_connect_error();
        	}
		
		if ($conexion){
			return $conexion;
		} else {
			echo "Error no se ha podido conectar con la BD <br>";
			//funcion que indica el error al conectar
			echo mysqli_connect_error();
		}
	}
?>
