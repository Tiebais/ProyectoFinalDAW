<?php
    session_start();
    error_reporting(0);
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nueva Plataforma</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <div class="contenedor">
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./admin/Nueva_plataforma.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">

                    <h1 class="col-8 text-center">Nueva Plataforma</h1>

                    <div class="form-group col-8 col-md-5">
                        <label for="nombre" class="visually-hidden">Nombre</label>
                        <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Lanzamiento" class="visually-hidden">Lanzamiento</label>
                        <input id="Lanzamiento" type="date" class="form-control" name="Lanzamiento" placeholder="Lanzamiento"  required>
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="Precio" class="visually-hidden">Precio</label>
                        <input id="Precio" type="number" class="form-control" name="Precio" placeholder="Precio" required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Stock" class="visually-hidden">Stock</label>
                        <input id="Stock" type="number" class="form-control" name="Stock" placeholder="Stock" required>
                    </div>  

                    <div class="form-group col-8 col-md-5">
                        <label for="Descripcion" class="visually-hidden">Descripcion</label>
                        <input id="Descripcion" type="text" class="form-control" name="Descripcion" placeholder="Descripcion" required>
                    </div>

                    <div class="form-group col-8 col-md-5">    
                        <label for="imagen" class="visually-hidden">Imagen</label>
                        <input id="imagen" type="file" class="form-control-file" name="imagen" required >
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="logo" class="visually-hidden">Logo</label>
                        <input id="logo" type="file" class="form-control-file" name="logo" required>
                    </div>

                    <button class="col-5 col-md-4 btn btn-primary" type="submit">Registrar nueva plataforma</button>
                    <p class="mt-5 mb-3 text-muted"></p>

                </div>
            </form>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>
