<?php
    require "../BD/conector_bd.php";
    require "../BD/DAOVideojuegos.php";

    ini_set('display_errors', 1);

    //Recogemos los valores del formulario.
    $idProductos=($_GET['idProductos']);
    $Stock = $_POST["Stock"];
    $Precio = $_POST["Precio"];
    $idPlataforma = $_POST["Plataforma"];
    $idVideojuego = $_POST["Videojuego"];

    $conexion = conectar(false);
    $insertar = editarVideojuegoPlataforma($conexion, $idVideojuego, $idPlataforma, $Stock, $Precio, $idProductos);
    mysqli_num_rows($insetar);
    header ('Location: ../Admin.php');
?>
