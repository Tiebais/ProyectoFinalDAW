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
    require "./BD/DAOVideojuegos.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Videojuego</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <div class="contenedor">
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./admin/Editar_videojuego.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">

                    <h1 class="col-8 text-center">Editar Videojuego</h1>

                    <?php
                        $conexion = conectar(false);
                        $idVideojuego=($_GET['idVideojuego']);
                        $consulta= infoVideojuegosEdit($conexion, $idVideojuego);
                        while($fila=mysqli_fetch_array($consulta)){
                    ?>

                    <div class="form-group col-8 col-md-5">
                        <label for="Titulo" class="visually-hidden">Titulo</label>
                        <input id="Titulo" type="text" class="form-control" name="Titulo" value="<?php echo $fila['Titulo']?>" required readonly>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Compañia" class="visually-hidden">Compañia</label>
                        <input id="Compañia" type="text" class="form-control" name="Compañia" value="<?php echo $fila['Compañia']?>" required>
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="Publicacion" class="visually-hidden">Publicacion</label>
                        <input id="Publicacion" type="da" class="form-control" name="Publicacion" value="<?php echo $fila['Publicacion']?>" required>
                    </div>

                    <div class="form-group col-8 col-md-5">    
                        <label for="imagen" class="visually-hidden">Imagen</label>
                        <input id="imagen" type="file" class="form-control-file" name="imagen" value="<?php echo $fila['Imagen']?>" required >
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Descripcion" class="visually-hidden">Descripcion</label>
                        <input id="Descripcion" type="text" class="form-control" name="Descripcion" value="<?php echo $fila['Descripcion']?>" required>
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