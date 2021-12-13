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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuevo Videojuego y Plataforma</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <div class="contenedor">
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./admin/Nuevo_videojuegoyplataforma.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">

                    <h1 class="col-8 text-center">Nuevo Videojuego y Plataforma</h1>

                    <div class="form-group col-8 col-md-5">
                        <label for="Stock" class="visually-hidden">Stock</label>
                        <input id="Stock" type="number" class="form-control" name="Stock" placeholder="Stock"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Precio" class="visually-hidden">Precio</label>
                        <input id="Precio" type="number" class="form-control" name="Precio" placeholder="Precio"  required>
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
                            echo '<option value='.$fila['idPlataforma'].'>'.$fila['Nombre'].'</option>';
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
                                echo '<option value='.$fila['idVideojuego'].'>'.$fila['Titulo'].'</option>';
                            }
                        ?>
                    </select>

                    <button class="col-5 col-md-4 btn btn-primary" type="submit">Registrar nuevo videojuego en su plataforma</button>
                    <p class="mt-5 mb-3 text-muted"></p>

                </div>
            </form>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>