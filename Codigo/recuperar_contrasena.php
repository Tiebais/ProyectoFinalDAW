<?php
    session_start();
    error_reporting(0);
    if ($_SESSION['Rol']=="usuario" || $_SESSION['Rol']=="admin" ){
        //Si el usuario ya esta logueado
        header ('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Consolas</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <div class="contenedor">
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./usuarios/recuperar_contrasena.php" id="loginform" onsubmit="return validar();">
                <div class="container row justify-content-center">

                    <h1 class="col-8 d-flex justify-content-center">Recuperar contrasena</h1>

                    <div class="form-group col-8 col-md-5">
                        <label for="usuario" class="visually-hidden">Usuario</label>
                        <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" required>
                        <span id="errorUsuario">Introduce un usuario valido</span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="DNI" class="visually-hidden">DNI</label>
                        <input id="DNI" type="text" class="form-control" name="DNI" placeholder="DNI" required>
                        
                    </div>
                    
                    <button class="col-5 col-md-4 btn btn-primary" type="submit">Recuperar contrasena</button>
                    <p class="mt-5 mb-3 text-muted"></p>
                    
                    <span class="col-12 text-center" id="errorFormulario"></span>
                </div>
            </form>
        </main>
        <script src="./js/recuperar_contrasena.js"></script>
    <?php include './inc/footer.php'; ?>
</body>
</html>
