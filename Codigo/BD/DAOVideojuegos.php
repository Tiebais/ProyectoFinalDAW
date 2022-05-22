<?php

	//funcion del carrousel
    function consultaVideojuegoCarrousel($conexion){
		$consulta = "SELECT idVideojuego, Imagen FROM videojuego ORDER BY rand() LIMIT 3";
		$resultado = mysqli_query($conexion, $consulta);
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
	function insertarVideojuegoCarrito($conexion,$idCesta,$idCliente,$Cantidad,$PrecioItem,$idProducto){
		$consulta = "INSERT IGNORE cesta(idCesta, idCliente) values ('$idCesta','$idCliente')";
		$resultado = mysqli_query($conexion,$consulta);
		$consulta2="INSERT INTO item (Cantidad, PrecioItem, idCesta, tipo, id) values ('$Cantidad','$PrecioItem','$idCesta',1,$idProducto)";
		$resultado2=mysqli_query($conexion,$consulta2);
		$consulta3="update productos set Stock=Stock-$Cantidad where idProductos='$idProducto'";
		$resultado3=mysqli_query($conexion,$consulta3);
		$precioT=$PrecioItem*$Cantidad;
		$consulta4="UPDATE `cesta` SET `PrecioTotal`=`PrecioTotal`+$precioT where `cesta`.`idCesta`='$idCesta'";
		$resultado4=mysqli_query($conexion,$consulta4);
		return $resultado4;
	}
	function eliminarJuegoCesta($conexion,$idItem,$idJuego,$precio,$cantidad,$idCesta){
		$consulta = "DELETE FROM item WHERE id=$idItem";
		$resultado = mysqli_query($conexion, $consulta);
		$consulta1 = "UPDATE cesta SET PrecioTotal=PrecioTotal-($cantidad*$precio) WHERE idCesta='$idCesta'";
		$resultado1 = mysqli_query($conexion, $consulta1);
		$consulta2 = "UPDATE productos SET Stock=Stock+$cantidad WHERE idProductos=$idJuego";
		$resultado2 = mysqli_query($conexion, $consulta2);
		return $resultado;
	}
	function consultaPrecioCesta($conexion,$idCesta){
		$consulta = "SELECT PrecioTotal from cesta WHERE idCesta=$idCesta";
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
		$consulta = "SELECT * FROM videojuego WHERE Titulo= '$Titulo'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//crea un nuevo videojuego 
	function nuevoVideojuego($conexion, $Titulo, $Compania, $Publicacion, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO videojuego VALUES (default, '$Titulo', '$Compania', '$Publicacion', '$Descripcion', '$nombreImg')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para obtener datos del videojuegos
	function infoVideojuegosEdit($conexion, $idVideojuego){
		$consulta = "SELECT * FROM videojuego WHERE idVideojuego= '$idVideojuego'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para obtener datos del videojuegos
	function eliminarVideojuego($conexion, $idVideojuego){
		$consulta = "DELETE FROM videojuego WHERE idVideojuego= '$idVideojuego'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para editar un videojuego
	function editarVideojuego($conexion, $Compania, $Publicacion, $Descripcion, $imagen, $Titulo){
		$consulta = "UPDATE videojuego SET Compania = '$Compania', Publicacion = '$Publicacion', Descripcion = '$Descripcion', Imagen = '$imagen'  WHERE (Titulo = '$Titulo')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que agrega un nuevo producto
	function nuevoVideojuegoPlataforma($conexion, $idVideojuego, $idPlataforma, $Stock, $Precio){
		$consulta = "INSERT INTO productos VALUES (default, '$idVideojuego', '$idPlataforma', '$Stock', '$Precio')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	// eliminar un producto
	function eliminarVideojuegoPlataforma($conexion, $idProductos){
		$consulta = "DELETE FROM productos WHERE idProductos= '$idProductos'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	// eliminar un producto
	function editarVideojuegoPlataforma($conexion, $idVideojuego, $idPlataforma, $Stock, $Precio, $idProductos){
		$consulta = "UPDATE productos SET idVideojuego = '$idVideojuego', idPlataforma = '$idPlataforma', Stock = '$Stock', Precio = '$Precio'  WHERE (idProductos = '$idProductos')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
?>
