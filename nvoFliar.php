<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();



//var_dump($_REQUEST);
//die();

//$guardar = isset($_REQUEST['guardar'])
if(isset($_REQUEST['guardarFliar'])){

  //Var_dump($_REQUEST);
  //die();

  $apellido_fliar = $_REQUEST['apellido_fliar'];
  $nombre_fliar = $_REQUEST['nombre_fliar'];
  $fnacimiento_fliar = $_REQUEST['fnacimiento_fliar'];
  $dni_fliar = $_REQUEST['dni_fliar'];
  $a_cargo = $_REQUEST['a_cargo'];
  $vinculo = $_REQUEST['vinculo'];
  $fdefuncion = $_REQUEST['fdefuncion'];
  $asignacionfliar = $_REQUEST['asignacionfliar'];
  $nupcias = $_REQUEST['nupcias'];
  $fcasamiento = $_REQUEST['fcasamiento'];
  $fdivorsio = $_REQUEST['obj'];
  $obj = $_REQUEST['obj'];
  $id_agente = $_REQUEST['id_agente'];

  $consulta = "INSERT INTO familia (apellido_fliar, nombre_fliar, fnacimiento_fliar, dni_fliar, a_cargo, vinculo, fdefuncion, asignacionfliar, nupcias,
               fcasamiento, fdivorsio, obj, id_agente)
               VALUES ('$apellido_fliar', '$nombre_fliar', '$fnacimiento_fliar', '$dni_fliar', '$a_cargo', '$vinculo', '$fdefuncion','$asignacionfliar', '$nupcias',
               '$fcasamiento', '$fdivorsio', '$obj', '$id_agente')";

  //var_dump($consulta);
  //die();

  $resultado = $conexion->prepare($consulta);
  $resultado->execute();

}

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
		 <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
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
<body>
	<section class="section-hero">
		<div class="hero">
			<div class="container">
				<div class="container-hero">
					<h2 class="title-hero">
						<br>
					FAMILIAR DEL AGENTE
					</h2>
					<p class="teal-text">Formulario para ingresar un nuevo registro.</p>
          <?php
          $legajo = $_GET["legajo"];

          $consulta = "SELECT * FROM personal WHERE legajo=$legajo";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

                //var_dump($data);
                //die();
                foreach ($data as $row) {
                  $id = $row['id'];
                }
            ?>

  <div class="row">
    <form method="post" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name="apellido_fliar" id="apellido_fliar" type="text" class="validate white-text" value="" required>
          <label for="apellido_fliar">Apellido</label>
        </div>
        <div class="input-field col s6">
          <input name="nombre_fliar" id="nombre_fliar" type="text" class="validate white-text" value="" required>
          <label for="dni">Nombre</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="fnacimiento_fliar" id="fnacimiento_fliar" type="date" class="validate white-text" value="" required>
          <label for="apellido">Fecha de Nacimiento</label>
        </div>
        <div class="input-field col s6">
          <input name="dni_fliar" id="dni_fliar" type="text" class="validate white-text"  value="" required>
          <label for="nombre">D.N.I.</label>
        </div>
      </div>
      <div class="row white-text">
        <div class="input-field col s3">
          <select name="a_cargo" id="a_cargo" class="browser-default transparent white-text">
            <option value="">A Cargo</option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
          </select>
        </div>
        <div class="input-field col s6">
          <input name="vinculo" id="vinculo" type="text" class="validate white-text"  value="" required>
          <label for="nombre">Vínculo</label>
        </div>
        <div class="input-field col s3">
          <input name="fdefuncion" id="fdefuncion" type="date" class="validate white-text" value="">
          <label for="fdefuncion">Fecha de Defunción</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <select name="asignacionfliar" id="asignacionfliar" class="browser-default transparent white-text">
            <option value="">Asignación Fliar.</option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
          </select>
        </div>
        <div class="input-field col s6">
          <input name="nupcias" id="nupcias" type="text" class="validate white-text" value="">
          <label for="nupcias">Nupcias</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="fcasamiento" id="fcasamiento" type="date" class="validate white-text" value="">
          <label for="fcasamiento">Fecha de Casamiento</label>
        </div>
        <div class="input-field col s6">
          <input name="fdivorsio" id="fdivorsio" type="date" class="validate white-text" value="">
          <label for="fdivorsio">Fecha de Divorsio</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="obj" id="obj" type="text" class="validate white-text" value="">
          <label for="obj">Objeto</label>
        </div>
        <div class="input-field col s6">
          <input name="id_agente" id="id_agente" type="text" class="validate white-text" value="<?php echo $row['id'] ?>">
          <label for="id_agente">Id del Agente</label>
        </div>
      </div>


			<div class="row">
        <button type="submit" class="btn waves-effect waves-light" name="guardarFliar" value="guardarFliar" style="margin-bottom: 15px;"><i class="material-icons left">save</i>Guardar</button>
        <a href="index.php" class="btn waves-effect waves-light red"  style="margin-bottom: 15px;" type="submit"><i class="material-icons left">reply</i>Cancelar</a>
        </div>
    </form>
  </div>
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
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
    /*document.addEventListener('DOMContentLoaded', function(){
        M.AutoInit();
    });*/
    </script>
</body>
