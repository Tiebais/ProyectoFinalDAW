<?php

	//funcion del carrousel
    function consultaVideojuegoCarrousel($conexion){
		$consulta = "SELECT idVideojuego, Imagen FROM videojuego ORDER BY rand() LIMIT 3";
		$resultado = mysqli_query($conexion, $consulta);v
		return $resultado;
	}

	//funcion para mostrar los vodeojuegos de una plataforma
	function datosVideojuegos($conexion, $IdPlataforma){
		$consulta = "SELECT * FROM productos INNER JOIN videojuego
		ON videojuego.IdVideojuego = productos.IdVideojuego
		Where productos.Idplataforma = '$IdPlataforma'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
	
	//funcion para mostrar lo datos del videojuego
	function infoVideojuegos($conexion, $idProductos){
		$consulta = "SELECT * FROM productos INNER JOIN videojuego
		ON videojuego.IdVideojuego = productos.IdVideojuego
		INNER JOIN plataforma
		ON plataforma.IdPlataforma = productos.IdPlataforma
		Where productos.idProductos = '$idProductos'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion del panel de administrador seccion videojuegos y plataforma
	function consultaVideojuegosYPlataforma($conexion){
		$consulta = "SELECT * FROM productos INNER JOIN videojuego
		ON videojuego.IdVideojuego = productos.IdVideojuego
		INNER JOIN plataforma
		ON plataforma.IdPlataforma = productos.IdPlataforma
		ORDER BY idProductos";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion del panel de administrador seccion videojuegos y plataforma
	function consultaVideojuegos($conexion){
		$consulta = "SELECT * FROM videojuego ORDER BY idVideojuego";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para consultar si existe el Titulo del videojuego
	function consultaTitulo($conexion, $Titulo){
		$consulta = "SELECT * FROM Videojuego WHERE Titulo= '$Titulo'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//crea un nuevo videojuego 
	function nuevoVideojuego($conexion, $Titulo, $Compania, $Publicacion, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Videojuego VALUES (default, '$Titulo', '$Compania', '$Publicacion', '$Descripcion', '$nombreImg')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para obtener datos del videojuegos
	function infoVideojuegosEdit($conexion, $idVideojuego){
		$consulta = "SELECT * FROM Videojuego WHERE idVideojuego= '$idVideojuego'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para obtener datos del videojuegos
	function eliminarVideojuego($conexion, $idVideojuego){
		$consulta = "DELETE FROM Videojuego WHERE idVideojuego= '$idVideojuego'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para editar un videojuego
	function editarVideojuego($conexion, $Compania, $Publicacion, $Descripcion, $imagen, $Titulo){
		$consulta = "UPDATE Videojuego SET `Compania` = '$Compania', `Publicacion` = '$Publicacion', `Descripcion` = '$Descripcion', `Imagen` = '$imagen'  WHERE (`Titulo` = '$Titulo')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que agrega un nuevo producto
	function nuevoVideojuegoPlataforma($conexion, $idVideojuego, $idPlataforma, $Stock, $Precio){
		$consulta = "INSERT INTO Productos VALUES (default, '$idVideojuego', '$idPlataforma', '$Stock', '$Precio')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	// eliminar un producto
	function eliminarVideojuegoPlataforma($conexion, $idProductos){
		$consulta = "DELETE FROM Productos WHERE idProductos= '$idProductos'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	// eliminar un producto
	function editarVideojuegoPlataforma($conexion, $idVideojuego, $idPlataforma, $Stock, $Precio, $idProductos){
		$consulta = "UPDATE Productos SET `idVideojuego` = '$idVideojuego', `idPlataforma` = '$idPlataforma', `Stock` = '$Stock', `Precio` = '$Precio'  WHERE (`idProductos` = '$idProductos')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
?>
