<?php
    require "../BD/conector_bd.php";
    require "../BD/DAOVideojuegos.php";

    ini_set('display_errors', 1);

    //Recogemos los valores del formulario.
    $Stock = $_POST["Stock"];
    $Precio = $_POST["Precio"];
    $idPlataforma = $_POST["Plataforma"];
    $idVideojuego = $_POST["Videojuego"];

    $conexion = conectar(true);
    $insertar = nuevoVideojuegoPlataforma($conexion, $idVideojuego, $idPlataforma, $Stock, $Precio);
    mysqli_num_rows($insertar);
    header ('Location: ../admin.php');
?>
