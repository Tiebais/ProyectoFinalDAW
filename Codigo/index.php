<?php
	require "./BD/conector_bd.php";
	require "./BD/DAOPlataforma.php";
	require "./BD/DAOVideojuegos.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>GAME ON</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
	<div class="contenedor">
    <?php include './inc/nav.php'; ?>
        <main>
		<div class="container-fluid row justify-content-center">
			<!--Consolas-->
			<div class="col-xl-5">
				<h1>Consolas</h1>
				<div id="demo" class="carousel slide" data-ride="carousel">
				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>
					<div class="carousel-inner">
						<?php
							$conexion = conectar(false);
							$consulta = consultarPlataformaCarrousel($conexion);
							$i = 0;
							while($fila = mysqli_fetch_assoc($consulta))
							{
						?>
						<div class="carousel-item <?php echo ($i == 0) ? 'active' : '';?>">
							<img src="./img/Plataforma/Imagenes/<?php echo $fila['ImagenP'];?>" alt="Plataforma" style="width:100%; height:400px;">
						</div>
						<?php
								$i++;
							}
						?>
					</div>
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
			</div>
			<!--Videojuegos-->
			<div class="col-xl-5">
				<h1>Videojuegos</h1>
				<div id="demo2" class="carousel slide" data-ride="carousel">
					<ul class="carousel-indicators">
						<li data-target="#demo2" data-slide-to="0" class="active"></li>
						<li data-target="#demo2" data-slide-to="1"></li>
						<li data-target="#demo2" data-slide-to="2"></li>
					</ul>
					<div class="carousel-inner">
						<?php
							//Creamos la conexión a la BD.
							$conexion = conectar(false);
							//Lanzamos la consulta.
							$consulta = consultaVideojuegoCarrousel($conexion);
							$i = 0;
							while($fila = mysqli_fetch_assoc($consulta))
							{
						?>
						<div class="carousel-item <?php echo ($i == 0) ? 'active' : '';?>">
							<img src="./img/Videojuegos/<?php echo $fila['Imagen'];?>" alt="Videojuegos" style="width:100%; height:400px;">
						</div>
						<?php
								$i++;
							}
						?>
					</div>
						<a class="carousel-control-prev" href="#demo2" data-slide="prev">
							<span class="carousel-control-prev-icon"></span>
						</a>
						<a class="carousel-control-next" href="#demo2" data-slide="next">
							<span class="carousel-control-next-icon"></span>
					</a>
				</div>
			</div>
		</div>
        </main>
	</div>
    <?php include './inc/footer.php'; ?>
</body>
</html>
