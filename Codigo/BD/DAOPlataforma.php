<?php
	//funcion para el carrousel de las plataformas
	function consultarPlataformaCarrousel($conexion){
		$consulta = "SELECT idPlataforma, ImagenP FROM plataforma ORDER BY rand() LIMIT 3";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
	
	//funcion que muestra todas las plataformas
	function consultarPlataforma($conexion){
		$consulta = "SELECT * FROM plataforma ORDER BY idPlataforma";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para consultar el id y nombre de la plataforma (selector de plataforma)
	function consultaPlataformaVideojuego($conexion){
		$consulta = "SELECT idPlataforma, Nombre FROM plataforma";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para mostrar la informacion de la plataformas
	function infoPlataforma($conexion, $idPlataforma){
		$consulta = "SELECT * FROM plataforma WHERE idPlataforma='".$idPlataforma."'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para eliminar la videoconsola
	function eliminarPlataforma($conexion, $id){
		$consulta = "DELETE FROM plataforma WHERE idPlataforma = '$id'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para editar la videoconsola
	function editarPlataforma($conexion, $lanzamiento, $precioP, $stockP, $DescripcionP, $imagenP, $logo, $nombre){
		$consulta = "UPDATE plataforma SET `Lanzamiento` = '$lanzamiento', `PrecioP` = '$precioP', `StockP` = '$stockP', `DescripcionP` = '$DescripcionP', `ImagenP` = '$imagenP' , `Logo` = '$logo' WHERE (`Nombre` = '$nombre');";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para consultar si existe el nombre de la plataforma
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM plataforma WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
	
	//crea una nueva plataforma 
	function nuevaPlataforma($conexion, $nombre, $lanzamiento, $precioP, $stockP, $descripcionP, $nombreImg, $nombreLogo){
		$consulta = "INSERT INTO plataforma VALUES (default, '$nombre', '$lanzamiento', '$precioP', '$stockP', '$descripcionP', '$nombreImg', '$nombreLogo')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
?>
