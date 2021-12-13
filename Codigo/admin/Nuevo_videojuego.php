<?php
    require "../BD/conector_bd.php";
    require "../BD/DAOVideojuegos.php";

    //Recogemos los valores del formulario.
    $Titulo = $_POST["Titulo"];
    $Compañia = $_POST["Compañia"];
    $Publicacion = $_POST["Publicacion"];
    $Descripcion = $_POST["Descripcion"];

    //imagen
    $nombreImg = $_FILES['imagen']['name'];
    $archivoImg = $_FILES['imagen']['tmp_name'];
    $rutaImg ="../img/Videojuegos";
    $rutaImg =$rutaImg."/".$nombreImg;

    $conexion = conectar(false);

    //lanzamos la consulta para saber si existe el usuario, email o contraseña
    $consultaNombre = consultaTitulo($conexion, $Titulo);

    if(mysqli_num_rows($consultaNombre) == 1){
        echo'<script type="text/javascript">
        alert("Ese nombre ya existe");
        window.location.href="../admin.php";
        </script>';
    } else {
        $insertar = nuevoVideojuego($conexion, $Titulo, $Compañia, $Publicacion, $Descripcion, $nombreImg);
        mysqli_num_rows($insertar);
        header ('Location: ../admin.php');
    }
?>