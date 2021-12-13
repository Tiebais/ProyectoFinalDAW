<?php
    require "../BD/conector_bd.php";
    require "../BD/DAOPlataforma.php";

    //Recogemos los valores del formulario.
    $nombre = $_POST["nombre"];
    $lanzamiento = $_POST["Lanzamiento"];
    $precioP = $_POST["Precio"];
    $stockP = $_POST["Stock"];
    $descripcionP = $_POST["DescripcionP"];

    //imagen
    $nombreImg = $_FILES['imagen']['name'];
    $archivoImg = $_FILES['imagen']['tmp_name'];
    $rutaImg ="../img/Plataforma/Imagenes";
    $rutaImg =$rutaImg."/".$nombreImg;

    move_uploaded_file($archivoImg,$rutaImg);

    //logo
    $nombreLogo = $_FILES['logo']['name'];
    $archivoLogo = $_FILES['logo']['tmp_name'];
    $rutaLogo ="../img/Plataforma/Logos";
    $rutaLogo =$rutaLogo."/".$nombreLogo;

    move_uploaded_file($archivoLogo,$rutaLogo);

    $conexion = conectar(false);
    $insertar = editarPlataforma($conexion, $lanzamiento, $precioP, $stockP, $descripcionP, $nombreImg, $nombreLogo, $nombre);
    mysqli_num_rows($insertar);
    header ('Location: ../Admin.php');
?>