<?php
	require "./BD/conector_bd.php";
	require "./BD/DAOPlataforma.php";
	require "./BD/DAOVideojuegos.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>VideoJuegos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <?php include './inc/link.php'; ?>
</head>
<body>
   <div class="contenedor">
    <?php include './inc/nav.php'; ?>
        <main>
        <div class="container-fluid row justify-content-center">
            <?php
                $conexion = conectar(true);
                //Lanzamos la consulta
                $consulta= consultaPlataformaVideojuego($conexion);
            ?>
            <div class="dropdown col-12 row mb-5 justify-content-center">
                <h1 class="col-12 mb-5 text-center">VideoJuegos</h1>
                <button class="btn btn-primary btn-raised dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Seleccione una plataforma &nbsp;
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php 
                        while($fila=mysqli_fetch_array($consulta)){
                            echo '
                                <a class="dropdown-item" href="videojuegos.php?categ='.$fila['idPlataforma'].'">'.$fila['Nombre'].'</a>
                            ';
                        }
                    ?>
                </div>
            </div>
            <?php
                
                //Lanzamos la consulta
                $idPlataforma=($_GET['categ']);
                $consulta= datosVideojuegos($conexion, $idPlataforma);
                while($fila=mysqli_fetch_array($consulta)){
            ?>
            <div class="card col-md-4 col-lg-3 col-xl-2 mx-1 my-1">
                <img class="card-img-top mx-1 my-4" src="./img/Videojuegos/<?php echo $fila['Imagen'];?>" style="width: 90%; height: 150px">
                <div class="card-body">
                    <h4 class="card-title text-center"><?php echo $fila['Titulo']; ?></h4>
                    <p class="card-text text-center"><?php echo $fila['Precio']; ?>€</p>
                    <p class="text-center">
                        <a href="infoVideojuegos.php?idProductos=<?php echo $fila['idProductos']; ?>" class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
                    </p>
                </div>
            </div>

            <?php
                }
            ?>
        </main>
	</div>
    <?php include './inc/footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</html>
