<?php
    require "./BD/conector_bd.php";
    require "./BD/DAOPlataforma.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="img/png" href="./img/logoGO.png">
    <title>Consolas</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php include './inc/nav.php'; ?>
    <div class="contenedor">
        <main>
            <div class="container-fluid row justify-content-center">
                <h1 class="col-12 text-center mb-5">Consolas</h1>
                <?php
                    $conexion = conectar(false);
                    $consulta= consultarPlataforma($conexion);
                    while($fila=mysqli_fetch_array($consulta)){
                ?>
                <div class="card col-md-4 col-lg-3 col-xl-2 mx-1 my-1">
                    <img class="card-img-top mx-1 my-4" src="./img/Plataforma/Imagenes/<?php echo $fila['ImagenP'];?>" style="width: 90%; height: 150px">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?php echo $fila['Nombre']; ?></h4>
                        <p class="card-text text-center"><?php echo $fila['PrecioP']; ?>€</p>
                        <p class="text-center">
                            <a href="infoConsolas.php?idPlataforma=<?php echo $fila['idPlataforma']; ?>" class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
                        </p>
                    </div>
                </div>

                <?php
                    }
                ?>
            </div>
        </main>
    </div>
    <?php include './inc/footer.php'; ?>
</body>
</html>