<?php
	require "./BD/conector_bd.php";
	require "./BD/DAOPlataforma.php";
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
        <div class="container">
            <div class="row">
                <div class="page-header">
                </div>
                <?php
                    $conexion = conectar(false);
                    $idPlataforma=($_GET['idPlataforma']);
                    $productoinfo= infoPlataforma($conexion, $idPlataforma);
                    while($fila=mysqli_fetch_array($productoinfo)){
                ?>  
                    <h1 class="col-12 text-center mb-2">Información de producto</h1>

                    <div class="col-12 col-sm-6">
                        <br><br><br>
                        <img style="width:600px; height:300px" class="img-fluid img-thumbnail rounded" alt="Consolas" src="./img/Plataforma/Imagenes/<?php echo $fila['ImagenP'];?>">
                    </div>
                    
                    <div class="col-12 col-sm-6">
                        <br><br>
                        <h4><strong>Fecha de Lanzamiento: </strong><?php echo $fila['Lanzamiento']; ?></h4><br>
                        <h4><strong>Nombre: </strong><?php echo $fila['Nombre']; ?></h4><br>
                        <h4><strong>Precio: </strong><?php echo $fila['PrecioP']; ?>€</h4><br>
                        <h4><strong>Cantidad: </strong><?php echo $fila['StockP']; ?></h4><br>
                        <?php
                        if($fila['StockP']>=1){
                            if($_SESSION['Rol']!=""){
                                echo '<form action="carrito.php" method="POST" class="FormCatElec" data-form="">
                                    <input type="hidden" value="'.$fila['CodigoProd'].'" name="codigo">
                                    <label class="text-center"><small>Agrega la cantidad de productos que añadiras al carrito de compras (Maximo '.$fila['StockP'].' productos)</small></label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" value="1" min="1" max="'.$fila['StockP'].'" name="cantidad">
                                        <input type="hidden" name="idConsola" value="'.$fila['idPlataforma'].'">
                                        <input type="hidden" name="precioConsola" value="'.$fila['PrecioP'].'">
                                    </div>
                                    <input type="submit" class="btn btn-lg btn-primary btn-raised btn-block" name="anadirConsola" value="Añadir al carrito">
                                </form>
                                <div class="ResForm"></div>';
                            }else{
                                echo '<p class="text-center"><small>Para agregar productos al carrito de compras debes iniciar sesion</small></p><br>';
                                echo '<a href="login.php" class="btn btn-lg btn-raised btn-info btn-block" ><i class="fa fa-user"></i>&nbsp;&nbsp; Iniciar sesion</a>';
                            }
                        }else{
                            echo '<p class="text-center text-danger lead">No hay existencias de este producto</p><br>';
                        }
                        echo '<br>
                        <a href="consolas.php" class="btn btn-lg btn-primary btn-raised btn-block"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar a la tienda</a>
                    </div>'; 
                    ?>   

                    <div class="col-12 mt-5">
                        <h4><strong>Descripción: </strong><?php echo $fila['DescripcionP']; ?></h4><br>
                    <div>
                <?php
                    }   
                ?>
            </div>
        </div>
        </main>
    <?php include './inc/footer.php'; ?>
    </div>
</body>
</html>
