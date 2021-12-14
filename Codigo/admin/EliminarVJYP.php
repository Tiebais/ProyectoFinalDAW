<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<?php
    require "../BD/conector_bd.php";
    require "../BD/DAOVideojuegos.php";
    $conexion = conectar(false);
    $idProductos = ($_GET['idProductos']);
    $sql = eliminarVideojuegoPlataforma($conexion, $idProductos);
    mysqli_num_rows($sql);	
    header ('Location: ../admin.php');
?>
