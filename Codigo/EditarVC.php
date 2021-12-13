<?php
    session_start();
    error_reporting(0);
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<?php
    require "./BD/conector_bd.php";
    require "./BD/DAOPlataforma.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Plataforma</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <div class="contenedor">
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./admin/Editar_plataforma.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">

                    <h1 class="col-8 text-center">Editar Plataforma</h1>

                    <?php
                        $conexion = conectar(false);
                        $idPlataforma=($_GET['idPlataforma']);
                        $consulta= infoPlataforma($conexion, $idPlataforma);
                        while($fila=mysqli_fetch_array($consulta)){
                    ?>

                    <div class="form-group col-8 col-md-5">
                        <label for="nombre" class="visually-hidden">Nombre</label>
                        <input id="nombre" type="text" class="form-control" name="nombre" value="<?php echo $fila['Nombre']?>" required readonly>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Lanzamiento" class="visually-hidden">Lanzamiento</label>
                        <input id="Lanzamiento" type="date" class="form-control" name="Lanzamiento"  value="<?php echo $fila['Lanzamiento']?>" required>
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="Precio" class="visually-hidden">Precio</label>
                        <input id="Precio" type="number" class="form-control" name="Precio"  value="<?php echo $fila['PrecioP']?>" required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Stock" class="visually-hidden">Stock</label>
                        <input id="Stock" type="number" class="form-control" name="Stock" value="<?php echo $fila['StockP']?>" required>
                    </div>  

                    <div class="form-group col-8 col-md-5">
                        <label for="DescripcionP" class="visually-hidden">Descripcion</label>
                        <input id="DescripcionP" type="text" name="DescripcionP" class="form-control" value="<?php echo $fila['DescripcionP']?>" required>
                    </div>

                    <div class="form-group col-8 col-md-5">    
                        <label for="imagen" class="visually-hidden">imagen</label>
                        <input id="imagen" type="file" class="form-control-file" name="imagen" value="<?php echo $fila['ImagenP']?>" required >
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="logo" class="visually-hidden">Logo</label>
                        <input id="logo" type="file" class="form-control-file" name="logo" placeholder="Logo" value="<?php echo $fila['Logo']?>" required>
                    </div>

                    <?php 
                        }
                    ?>

                    <button class="col-5 col-md-4 btn btn-primary" type="submit">Editar</button>
                    <p class="mt-5 mb-3 text-muted"></p>

                </div>
            </form>
        </main>
        </div>
    <?php include './inc/footer.php'; ?>
</body>
</html>