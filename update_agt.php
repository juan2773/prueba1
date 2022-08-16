<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personal S.P.S.F.</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobbile-web-app-capable" content="yes">
	<meta name="apple-mobbile-web-app-title" content="">

	<link rel="icon" href="images/personas.png">
	<!--=====================================
	Marcado HTML5
	======================================-->

	<meta name="title" content="USERS">
	<meta name="description" content="Administración de usuarios">
	<meta name="keyword" content="suers, perfil, web">
	<!--=====================================
	   CSS STYLES
	   ======================================-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/main.css">

	<!--=====================================
	   JAVASCRIPT SCRIPTS
	   ======================================-->
	<script src="js/materialize.min.js"></script>
<body>
	<!--=====================================
	  HEADER
	   ======================================-->
	<header class="navbar-fixed index-1">
		<nav class="teal lighten-1">
			<div class="container">
				<div class="nav-wrapper">
					<a href="#!" class="brand-logo left">
						<img src="images/LOGOPROV.png" width="40">
					</a>
					<a href="#" data-target="nav-movil" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
                    	<li><a href="personal.php">Personal</a></li>
						<li><a href="legajo.php">Legajos</a></li>
						<li><a href="login.php" class="waves-effect waves-light btn  red darken-1">Login</a></li>
					</ul>
				</div>

			</div>
		</nav>

		<ul class="sidenav" id="nav-movil">
			<li><a href="#">Articulos</a></li>
		    <li><a href="#" class="waves-effect waves-light btn  red darken-1">Login</a></li>
		</ul>
	</header>

	<!--=====================================
	   HERO
	   ======================================-->

	<section class="section-hero">
		<div class="hero">
			<div class="container">
				<div class="container-hero">
					<h2 class="title-hero">
						<br>
						DIRECCIÓN GENERAL DE PERSONAL
					</h2>
          <?php
          if(isset($_REQUEST['guardar'])){
            $id = $_REQUEST['id'];
            $legajo = $_REQUEST['legajo'];
            $apellido = $_REQUEST['apellido'];
            $nombre = $_REQUEST['nombre'];
            $genero = $_REQUEST['genero'];
            $dni = $_REQUEST['dni'];
            $fnacimiento = $_REQUEST['fnacimiento'];
            $pais = $_REQUEST['pais'];
            $provincia = $_REQUEST['provincia'];
            $departamento = $_REQUEST['departamento'];
            $localidad = $_REQUEST['localidad'];
            $celular = $_REQUEST['celular'];
            $telefono = $_REQUEST['telefono'];
            $cuil = $_REQUEST['cuil'];
            $unidad = $_REQUEST['unidad'];
            $fingreso = $_REQUEST['fingreso'];
            $cuadro_jerarquico = $_REQUEST['cuadro_jerarquico'];
            $sciomilitar = $_REQUEST['sciomilitar'];
            $fincorporacion = $_REQUEST['fincorporacion'];
            $fbaja = $_REQUEST['fbaja'];
            $aptitudalcanzada = $_REQUEST['aptitudalcanzada'];
            $exceptuado = $_REQUEST['exceptuado'];
            $especialidad = $_REQUEST['especialidades_aptitudes'];
            $ordenmerito = $_REQUEST['ordenmerito'];
            $idiomas = $_REQUEST['idiomas'];
            $sabenadar = $_REQUEST['sabenadar'];
            $automotores = $_REQUEST['automotores'];
            $estudiosciviles = $_REQUEST['estudiosciviles'];
            $estudiosmilitares = $_REQUEST['estudiosmilitares'];


          $consulta = "UPDATE personal SET legajo='$legajo', apellido='$apellido', nombre='$nombre', genero='$genero', dni='$dni', fnacimiento='$fnacimiento',
                     pais='$pais', provincia='$provincia', departamento='$departamento', localidad='$localidad',
                     celular='$celular', telefono='$telefono', cuil='$cuil', unidad='$unidad', fingreso='$fingreso', cuadro_jerarquico='$cuadro_jerarquico',
                     sciomilitar='$sciomilitar', fincorporacion='$fincorporacion', fbaja='$fbaja', aptitudalcanzada='$aptitudalcanzada',
                     exceptuado='$exceptuado', especialidades_aptitudes='$especialidad', ordenmerito='$ordenmerito',
                     idiomas='$idiomas', sabenadar='$sabenadar', automotores='$automotores', estudiosciviles='$estudiosciviles',
                     estudiosmilitares='$estudiosmilitares' WHERE id='$id' ";
                     //var_dump($consulta);
                     //die();

          $resultado = $conexion->prepare($consulta);
          $resultado->execute();

          echo "<div class='row'>
                  <div class='col s12 m5'>
                    <div class='card-panel teal'>
                      <span class='white-text'>Los datos se modificaron correctamete...
                      </span>
                    </div>
                  </div>
                </div>";

          }
           ?>

				</div>
			</div>
		</div>
	</section>

	<footer class="black">
		<div class="container">
			<p class="copy">
				&copy; Todos los derechos reservados - D.I.C.S.E.
			</p>
		</div>
	</footer>


	<div class="scrolltop scrolltop-dark"></div>
	<script src="js/app.js"></script>
</body>
