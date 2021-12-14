<?php
    require "../BD/conector_bd.php";
    require "../BD/DAOPlataforma.php";

    //Recogemos los valores del formulario.
    $nombre = $_POST["nombre"];
    $lanzamiento = $_POST["Lanzamiento"];
    $precioP = $_POST["Precio"];
    $stockP = $_POST["Stock"];
    $descripcionP = $_POST["Descripcion"];

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

    //lanzamos la consulta para saber si existe el usuario, email o contraseña
    $consultaNombre = consultaNombre($conexion, $nombre);

    if(mysqli_num_rows($consultaNombre) == 1){
        echo'<script type="text/javascript">
        alert("Ese nombre ya existe");
        window.location.href="../NuevoVC.php";
        </script>';
    } else {
        $insertar = nuevaPlataforma($conexion, $nombre, $lanzamiento, $precioP, $stockP, $descripcionP, $nombreImg, $nombreLogo);
        mysqli_num_rows($insetar);
        header ('Location: ../admin.php');
    }
?>
