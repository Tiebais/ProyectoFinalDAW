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
	<meta charset="UTF-8">
    <title>Iniciar Sesion</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <div class="contenedor">
    <?php include './inc/nav.php'; ?>
    
    <main>       
        <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-6">
                <div class="form-signin">
                    <form name="formulario" method="post" action="./usuarios/comprobar_usuario.php" id="loginform" class="form-horizontal">
                        <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>
                        
                        <label for="Usuario" class="visually-hidden">Usuario</label>
                        <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" required>

                        <label for="Password" class="visually-hidden">Contrasena</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Contrasena" required>
                        <p class="mt-5 mb-3 text-muted"></p>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesion</button>
                        <p class="mt-5 mb-3 text-muted"></p>

                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div style="padding: 50px 0px " class="row justify-content-center">

                    <h3 class="row justify-content-center">No estas registrado?</h3>
                    <a href="registro.php" class="col-8 btn btn-lg btn-primary" role="button">Registrarse</a>

                    <h3 class="row justify-content-center">Olvidaste la contrasena?</h3>
                    <a href="recuperar_contrasena.php" class="col-8 btn btn-lg btn-primary" role="button">Recuperar contrasena</a>

                </div>
            </div>
        </div>
    </div>
    </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>
