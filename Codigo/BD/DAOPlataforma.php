<?php
	//funcion para el carrousel de las plataformas
	function consultarPlataformaCarrousel($conexion){
		$consulta = "SELECT idPlataforma, ImagenP FROM plataforma ORDER BY rand() LIMIT 3";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
	function consultaItem($conexion,$idCesta){
		$consulta = "select * from item where idCesta='$idCesta'";
		$resultado = mysqli_query($conexion,$consulta);
		return $resultado;
	}
	function insertarPlataformaCarrito($conexion,$idCesta,$idCliente,$Cantidad,$PrecioItem,$idProducto){
		$consulta = "INSERT IGNORE cesta(idCesta, idCliente) values ('$idCesta','$idCliente')";
		$resultado = mysqli_query($conexion,$consulta);
		$consulta2="INSERT INTO item (Cantidad, PrecioItem, idCesta, tipo, id) values ('$Cantidad','$PrecioItem','$idCesta',0,$idProducto)";
		$resultado2=mysqli_query($conexion,$consulta2);
		$consulta3="update plataforma set Stock=Stock-$Cantidad where idPlataforma='$idProducto'";
		$resultado3=mysqli_query($conexion,$consulta3);
		$precioT=$PrecioItem*$Cantidad;
		$consulta4="UPDATE `cesta` SET `PrecioTotal`=`PrecioTotal`+$precioT where `cesta`.`idCesta`='$idCesta'";
		$resultado4=mysqli_query($conexion,$consulta4);
		return $resultado4;
	}
	function eliminarPlataformaCesta($conexion,$idItem,$idPlataforma,$precio,$cantidad,$idCesta){
		$consulta = "DELETE FROM item WHERE `item`.`id`=$idItem";
		$resultado = mysqli_query($conexion, $consulta);
		$consulta1 = "UPDATE cesta SET PrecioTotal= PrecioTotal-($cantidad*$precio)  WHERE idCesta=$idCesta";
		$resultado1 = mysqli_query($conexion, $consulta1);
		$consulta2 = "UPDATE plataforma SET StockP=StockP+$cantidad WHERE idPlataforma=$idPlataforma";
		$resultado2 = mysqli_query($conexion, $consulta2);
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
	//funcion para mostrar la informacion de la plataformas
	function muestraPlataforma($conexion, $idPlataforma){
		$consulta = "SELECT * FROM `plataforma`WHERE idPlataforma=$idPlataforma";
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
		$consulta = "UPDATE plataforma SET Lanzamiento = '$lanzamiento', PrecioP = '$precioP', StockP = '$stockP', DescripcionP = '$DescripcionP', ImagenP = '$imagenP' , Logo = '$logo' WHERE (Nombre = '$nombre');";
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
