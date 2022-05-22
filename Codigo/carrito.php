<?php
    session_start();
    error_reporting(0);
    if (!$_SESSION['Rol']=="usuario" || !$_SESSION['Rol']=="admin" ){
        //Si el usuario ya esta logueado
        header ('Location: index.php');
        exit;
    }
	require "./BD/conector_bd.php";
	require "./BD/DAOPlataforma.php";
  require "./BD/DAOVideojuegos.php";
  $conexion = conectar(false);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Carrito</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <div class="contenedor">
    <?php include './inc/nav.php'; ?>
        <main>
        <div class="site-wrap">
    <div class="site-section">
      <div class="container">
        <?php if (isset($_POST['anadirConsola'])) {
           $resultado=insertarPlataformaCarrito($conexion,$_SESSION['idUsuario'],$_SESSION['idUsuario'],$_POST['cantidad'],$_POST['precioConsola'],$_POST['idConsola']);
          if ($resultado) {
            echo "Se añadio correctamente";
          }


        }
        if (isset($_POST['anadirJuego'])) {
          $resultado1=insertarVideojuegoCarrito($conexion,$_SESSION['idUsuario'],$_SESSION['idUsuario'],$_POST['cantidad'],$_POST['precioJuego'],$_POST['idProducto']);
          if ($resultado1) {
            echo "Se añadio correctamente";
          }


        }
         ?>
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              
                <?php
                    $conItem=consultaItem($conexion,$_SESSION['idUsuario']);
                    if (mysqli_num_rows($conItem)>0) {
                      while ($item=mysqli_fetch_assoc($conItem)) {
                        if ($item['tipo']==0) {
                          $id=$item['id'];
                          
                          $plat=muestraPlataforma($conexion, $id);
                          $plataforma=mysqli_fetch_assoc($plat);
                          echo $id."-".$plataforma['ImagenP'];
                          ?>
                          <div class="card mb-12" >
                            <div class="row no-gutters">
                              <div class="col-md-4">
                                <img class="col-12" src="./img/Plataforma/Imagenes/<?php echo $plataforma['ImagenP'] ?>">
                              </div>
                              <div class="col-md-3">
                                <div class="card-body">
                                  <h5 class="card-title"><?php echo $plataforma['Nombre']; ?></h5>
                                  <p class="card-text"><b>Precio: </b><?php echo $plataforma['PrecioP'] ?><b> Euros X <?php echo $item['Cantidad'] ?></b><b>=</b><?php echo $plataforma['PrecioP']*$item['Cantidad']; ?><b> Euros</b></p>
                                  <form action="carrito.php" method="post">
                                    <input type="hidden" name="idItem"  value="<?php echo $item['id']; ?>">
                                    <input type="hidden" name="idCesta"  value="<?php echo $_SESSION['idUsuario']; ?>">
                                    <input type="hidden" name="precioElim"  value="<?php echo $item['PrecioItem']; ?>">
                                    <input type="hidden" name="cantidadEli"  value="<?php echo $item['Cantidad']; ?>">
                                    <input type="hidden" name="idConsola" value="<?php echo $juego['idPlataforma']; ?>">
                                    <input type="submit" id="botones" class="btn btn-primary btn-lg py-3 btn-block" value="Eliminar" name="eliminaConsola">
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          <?php
                          }elseif ($item['tipo']==1) {
                            $id=$item['id'];
                          
                          $Jue=infoVideojuegos($conexion, $id);
                          $juego=mysqli_fetch_assoc($Jue);
                          echo $id."-".$juego['ImagenP'];
                          ?>
                          <div class="card mb-12" >
                            <div class="row no-gutters">
                              <div class="col-md-4">
                                <img class="col-12" src="./img/Videojuegos/<?php echo $juego['Imagen'] ?>">
                              </div>
                              <div class="col-md-3">
                                <div class="card-body">
                                  <h5 class="card-title"><?php echo $juego['Titulo']; ?></h5>
                                  <p class="card-text"><b>Precio: </b><?php echo $juego['Precio'] ?><b> Euros X <?php echo $item['Cantidad'] ?></b><b>=</b><?php echo $juego['Precio']*$item['Cantidad']; ?><b> Euros</b></p>
                                  <form action="carrito.php" method="post">
                                    <input type="hidden" name="idItemJ"  value="<?php echo $item['id']; ?>">
                                    <input type="hidden" name="idCestaJ"  value="<?php echo $_SESSION['idUsuario']; ?>">
                                    <input type="hidden" name="precioElimJ"  value="<?php echo $item['PrecioItem']; ?>">
                                    <input type="hidden" name="cantidadEliJ"  value="<?php echo $item['Cantidad']; ?>">
                                    <input type="hidden" name="idJuego" value="<?php echo $juego['idProductos']; ?>">
                                    <input type="submit" id="botones" class="btn btn-primary btn-lg py-3 btn-block" value="Eliminar" name="eliminarJuego">
                                  </form>
                              </div>
                              </div>
                            </div>
                          </div>

                          <?php
                          }
                        
                      }
                    }
                    $precioTotal=consultaPrecioCesta($conexion,$_SESSION['idUsuario']);
                    $precio=mysqli_fetch_assoc($precioTotal);
                    if (isset($_POST['eliminaConsola'])) {
                      $resulElim1=eliminarPlataformaCesta($conexion,$_POST['idItem'],$_POST['idConsola'],$_POST['precioElim'],$_POST['cantidadEli'],$_POST['idCesta']);
                      if ($resulElim1) {
                        echo "Se elimino correctamente";
                      }
                    }
                    if (isset($_POST['eliminarJuego'])) {
                      $resulElim=eliminarJuegoCesta($conexion,$_POST['idItemJ'],$_POST['idJuego'],$_POST['precioElimJ'],$_POST['cantidadEliJ'],$_POST['idCestaJ']);
                      if ($resulElim) {
                        echo "Se elimino correctamente";
                      }
                    }

                ?>
                  
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">

          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">PRECIO</h3>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo $precio['PrecioTotal'] ?></strong>
                  </div>
                </div>
		<div class="col-12 col-sm-6">
                      echo '<br>
		      <a href="consolas.php" class="btn btn-lg btn-primary btn-raised btn-block"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar a la tienda</a>
	 	</div>'; 
                
            </div>
          </div>
        </div>
      </div>
    </div>
        </main>
    <?php include './inc/footer.php'; ?>
    </div>
</body>
</html>
