<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();



//var_dump($_REQUEST);
//die();

//$guardar = isset($_REQUEST['guardar'])
if(isset($_REQUEST['guardar'])){

  //Var_dump($_REQUEST);
  //die();

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
  $especialidades_aptitudes = $_REQUEST['especialidades_aptitudes'];
  $ordenmerito = $_REQUEST['ordenmerito'];
  $idiomas = $_REQUEST['idiomas'];
  $sabenadar = $_REQUEST['sabenadar'];
  $automotores = $_REQUEST['automotores'];
  $estudiosciviles = $_REQUEST['estudiosciviles'];
  $estudiosmilitares = $_REQUEST['estudiosmilitares'];

  $consulta = "INSERT INTO personal (legajo, apellido, nombre, genero, dni, fnacimiento, pais, provincia, departamento, localidad, celular, telefono,
               cuil, unidad, fingreso, cuadro_jerarquico, sciomilitar, fincorporacion, fbaja, aptitudalcanzada, exceptuado, especialidades_aptitudes,
               ordenmerito, idiomas, sabenadar, automotores, estudiosciviles, estudiosmilitares)
               VALUES ('$legajo', '$apellido', '$nombre', '$genero', '$dni', '$fnacimiento', '$pais', '$provincia','$departamento', '$localidad', '$celular', '$telefono', '$cuil', '$unidad',
               '$fingreso', '$cuadro_jerarquico','$sciomilitar', '$fincorporacion', '$fbaja', '$aptitudalcanzada', '$exceptuado','$especialidades_aptitudes',
               '$ordenmerito', '$idiomas', '$sabenadar', '$automotores', '$estudiosciviles', '$estudiosmilitares')";

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
     <script>
         $(document).ready(function() {
             $(".upload").on('click', function() {
                 var formData = new FormData();
                 var files = $('#image')[0].files[0];
                 formData.append('file',files);
                 $.ajax({
                     url: 'upload.php?legajo='+ document.getElementById("legajo").value + "&dni=" + document.getElementById("dni").value,
                     type: 'post',
                     data: formData,
                     contentType: false,
                     processData: false,
                     success: function(response) {
                         if (response != 0) {
                             $(".card-img-top").attr("src", response + "?img=" + Math.random());
                         } else {
                             alert('Formato de imagen incorrecto.');
                         }
                     }
                 });
                 return false;
             });
         });
         /*function enviarTexto(){
           var texto=document.getElementById("legajo").value;
           document.getElementById("legajo2").value=texto;
         }*/
   </script>

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
					NUEVO AGENTE
					</h2>
					<p>Formulario para ingresar un nuevo registro.</p>
  <!--- Formulario para subir la foto -->
  <div class="row col s6">
    <form method="post" action="nvoAgt.php" enctype="multipart/form-data">
          <img class="card-img-top" src="images/perfil-del-usuario.png" width="230">
              <div class="form-group">
                  <input type="file" class="btn primary btn-small" style="width:120px;" name="image" id="image">
                  <input type="button" class="btn blue upload btn-small"  value="Subir foto">
              </div>
      </form>
  </div>
  <!--- Fin del form -->
  <div class="row">
    <form method="post"  class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name="legajo" id="legajo" type="text" class="validate white-text" value="" required>
          <label for="legajo">Legajo</label>
        </div>
        <div class="input-field col s6">
          <input name="dni" id="dni" type="text" class="validate white-text" value="" required>
          <label for="dni">D.N.I.</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6">
          <input name="apellido" id="apellido" type="text" class="validate white-text" value="" required>
          <label for="apellido">Apellido</label>
        </div>
        <div class="input-field col s6">
          <input name="nombre" id="nombre" type="text" class="validate white-text"  value="" required>
          <label for="nombre">Nombres</label>
        </div>
      </div>
      <div class="row white-text">
        <div class="input-field col s6">
          <select name="genero" class="browser-default transparent white-text">
            <option value="">Seleccione Género</option>
            <option value="FEMENINO">Femenino</option>
            <option value="MASCULINO">Masculino</option>
            <option value="OTRO">Otro</option>
          </select>
        </div>
        <div class="input-field col s6">
          <input name="fnacimiento" id="fnacimiento" type="date" class="validate white-text" value="" required>
          <label for="fnacimiento">Fecha de Nacimiento</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="pais" id="pais" type="text" class="validate white-text" value="">
          <label for="pais">País</label>
        </div>
        <div class="input-field col s6">
          <input name="provincia" id="provincia" type="text" class="validate white-text" value="">
          <label for="provincia">Provincia</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="departamento" id="departamento" type="text" class="validate white-text" value="">
          <label for="departamento">Departamento</label>
        </div>
        <div class="input-field col s6">
          <input name="localidad" id="localidad" type="text" class="validate white-text" value="" required>
          <label for="localidad">Localidad</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="celular" id="celular" type="text" class="validate white-text" value="">
          <label for="celular">Celular</label>
        </div>
        <div class="input-field col s6">
          <input name="telefono" id="tel" type="text" class="validate white-text" value="">
          <label for="telefono">Teléfono</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="cuil" id="cuil" type="text" class="validate white-text" required value="">
          <label for="cuil">CUIL</label>
        </div>
        <div class="input-field col s6">
          <input name="unidad" id="unidad" type="text" class="validate white-text" value="" required>
          <label for="unidad">Unidad</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="fingreso" id="fingreso" type="date" class="validate white-text" value="" required>
          <label for="fingreso">Fecha de Ingreso</label>
        </div>
        <div class="input-field col s6">
          <input name="cuadro_jerarquico" id="cuadro_jerarquico" type="text" class="validate white-text" value="">
          <label for="cuadro_jerarquico">Cuadro Jerárquico</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="sciomilitar" id="sciomilitar" type="text" class="validate white-text" value="">
          <label for="sciomilitar">Scio. Militar</label>
        </div>
        <div class="input-field col s6">
          <input name="fincorporacion" id="fincorporacion" type="date" class="validate white-text" value="">
          <label for="fincorporacion">Fecha de incorporación</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="fbaja" id="fbaja" type="date" class="validate white-text" value="">
          <label for="fbaja">Baja</label>
        </div>
        <div class="input-field col s6">
          <input name="aptitudalcanzada" id="aptitudalcanzada" type="text" class="validate white-text" value="">
          <label for="aptitudalcanzada">Aptitud Alcanzada</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="exceptuado" id="exceptuado" type="text" class="validate white-text" value="">
          <label for="exceptuado">Exceptuado</label>
        </div>
        <div class="input-field col s6">
          <input name="especialidades_aptitudes" id="especialidades_aptitudes" type="text" class="validate white-text" value="">
          <label for="especialidad">Especialidad</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="ordenmerito" id="ordenmerito" type="text" class="validate white-text" value="">
          <label for="ordenmerito">Orden de Mérito</label>
        </div>
        <div class="input-field col s6">
          <input name="idiomas" id="idiomas" type="text" class="validate white-text" value="">
          <label for="idiomas">Idiomas</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="sabenadar" id="sabenadar" type="text" class="validate white-text" value="">
          <label for="sabenadar">Sabe Nadar</label>
        </div>
        <div class="input-field col s6">
          <input name="automotores" id="automotores" type="text" class="validate white-text" value="">
          <label for="automotores">Autos que Conduce</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="estudiosciviles" id="estudiosciviles" type="text" class="validate white-text" value="">
          <label for="estudiosciviles">Estudios Civiles</label>
        </div>
        <div class="input-field col s6">
          <input name="estudiosmilitares" id="estudiosmilitares" type="text" class="validate white-text" value="">
          <label for="estudiosmilitares">Estudios Militares</label>
        </div>
      </div>
			<div class="row">
        <button type="submit" class="btn waves-effect waves-light" name="guardar" value="guardar" style="margin-bottom: 15px;"><i class="material-icons left">add_circle_outline</i>Guardar</button>
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
