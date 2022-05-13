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
    require "./BD/DAOVideojuegos.php";
    $idProductos=$_GET['idProductos'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Videojuego y Plataforma</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <div class="contenedor">
    <?php include './inc/nav.php'; ?>
    <main>
        <form name="formulario" method="post" action="./admin/Editar_videojuegoYplataforma.php?idProductos=<?php echo $idProductos ?>" id="loginform" enctype="multipart/form-data">
            <div class="container row justify-content-center">

                <h1 class="col-8 text-center">Editar Videojuego y su plataforma</h1>

                <?php
                    $conexion = conectar(false);
                    $consulta= infoVideojuegos($conexion, $idProductos);
                    while($filaP=mysqli_fetch_array($consulta)){
                    $idPlataforma = $filaP['idPlataforma'];
                    $idVideojuego = $filaP['idVideojuego'];
                ?>

                <div class="form-group col-8 col-md-5">
                    <label for="Stock" class="visually-hidden">Stock</label>
                    <input id="Stock" type="number" class="form-control" name="Stock" value="<?php echo $filaP['Stock']?>"  required>
                </div>

                <div class="form-group col-8 col-md-5">
                    <label for="Precio" class="visually-hidden">Precio</label>
                    <input id="Precio" type="number" class="form-control" name="Precio" value="<?php echo $filaP['Precio']?>"  required>
                </div>

                <!--Consolas/Plataforma-->
                <?php
                    $conexion = conectar(false);
                    //Lanzamos la consulta
                    $consulta= consultaPlataformaVideojuego($conexion);
                ?>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="Plataforma">
                <?php 
                    while($fila=mysqli_fetch_array($consulta)){
                        echo '<option value="'.$fila["idPlataforma"].'"';
                        if($fila['idPlataforma']==$idPlataforma ) {
                              echo "selected";
                        }
                        echo ">".$fila['Nombre']."</option>";
                    }
                ?>
                </select>
                
                <!--Videojuegos-->
                <?php
                    $conexion = conectar(false);
                    //Lanzamos la consulta
                    $consulta= consultaVideojuegos($conexion)
                ?>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="Videojuego">
                    <?php 
                        while($fila=mysqli_fetch_array($consulta)){
                            echo '<option value="'.$fila["idVideojuego"].'"';
                            if($fila['idVideojuego']==$idVideojuego ) {
                                  echo "selected";
                            }
                            echo ">".$fila['Titulo']."</option>";
                        }
                    ?>
                </select>

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
