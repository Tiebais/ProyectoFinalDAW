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

    move_uploaded_file($archivoImg,$rutaImg);

    $conexion = conectar(false);
    $insertar = editarVideojuego($conexion, $Compañia, $Publicacion, $Descripcion, $nombreImg, $Titulo);
    mysqli_num_rows($insetar);
    header ('Location: ../Admin.php');
?>