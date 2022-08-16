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
					ACTUALIZAR REGISTRO
					</h2>
					<p>Formulario de edición.</p>

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
          $legajo = $row['legajo'];
          $apellido = $row['apellido'];
          $nombre = $row['nombre'];
          $genero = $row['genero'];
          $dni = $row['dni'];
          $fnacimiento = $row['fnacimiento'];
          $pais = $row['pais'];
          $provincia = $row['provincia'];
          $departamento = $row['departamento'];
          $localidad = $row['localidad'];
          $celular = $row['celular'];
          $telefono = $row['telefono'];
          $cuil = $row['cuil'];
          $unidad = $row['unidad'];
          $fingreso = $row['fingreso'];
          $cuadro_jerarquico = $row['cuadro_jerarquico'];
          $sciomilitar = $row['sciomilitar'];
          $fincorporacion = $row['fincorporacion'];
          $fbaja = $row['fbaja'];
          $aptitudalcanzada = $row['aptitudalcanzada'];
          $exceptuado = $row['exceptuado'];
          $especialidad = $row['especialidades_aptitudes'];
          $ordenmerito = $row['ordenmerito'];
          $idiomas = $row['idiomas'];
          $sabenadar = $row['sabenadar'];
          $automotores = $row['automotores'];
          $estudiosciviles = $row['estudiosciviles'];
          $estudiosmilitares = $row['estudiosmilitares'];
        }

   ?>
	 <!--- Formulario para subir la foto -->
	 <div class="row col s6">
		 <form method="post" action="#" enctype="multipart/form-data">
					 <?php
									 if(file_exists(__DIR__."/images/$legajo/$dni.jpg")){
										 echo "<img src='images/$legajo/$dni.jpg' width='230'>";
									 } else {
										 echo "<img src='images/perfil-del-usuario.png' width='230'>";
									 }
									 ?>
							 <div class="form-group">
									 <input type="file" class="btn primary btn-small" style="width:120px;" name="image" id="image">
									 <input type="button" class="btn blue upload btn-small"  value="Subir foto">
							 </div>
			 </form>
	 </div>
	 <!--- Fin del form -->
  <div class="row">
    <form action="update_agt.php" method="post" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <input  id="legajo" name="legajo" type="text" class="validate white-text" value="<?php echo $legajo ?>" required>
          <label for="legajo">Legajo</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input  id="apellido" name="apellido" type="text" class="validate white-text" value="<?php echo $apellido ?>" required>
          <label for="apellido">Apellido</label>
        </div>
        <div class="input-field col s6">
          <input id="nombre" name="nombre" type="text" class="validate white-text"  value="<?php echo $nombre ?>" required>
          <label for="nombre">Nombres</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <select id="genero" name="genero" class="browser-default transparent white-text">
            <option value=" <?php echo $genero ?>"><?php echo $genero ?></option>
            <option value="1">Femenino</option>
            <option value="2">Masculino</option>
            <option value="3">Otro</option>
          </select>
        </div>
        <div class="input-field col s6">
          <input id="dni" name="dni" type="text" class="validate white-text" value="<?php echo $dni ?>" required>
          <label for="dni">D.N.I.</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="fnacimiento" name="fnacimiento" type="date" class="validate white-text" value="<?php echo $fnacimiento ?>" required>
          <label for="fnacimiento">Fecha de Nacimiento</label>
        </div>
        <div class="input-field col s6">
          <input id="pais" name="pais" type="text" class="validate white-text" value="<?php echo $pais ?>">
          <label for="pais">País</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="provincia" name="provincia" type="text" class="validate white-text" value="<?php echo $provincia ?>">
          <label for="provincia">Provincia</label>
        </div>
        <div class="input-field col s6">
          <input id="departamento" name="departamento" type="text" class="validate white-text" value="<?php echo $departamento ?>">
          <label for="dpto">Departamento</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="localidad" name="localidad" type="text" class="validate white-text" value="<?php echo $localidad ?>" required>
          <label for="localidad">Localidad</label>
        </div>
        <div class="input-field col s6">
          <input id="celular" name="celular" type="text" class="validate white-text" value="<?php echo $celular ?>">
          <label for="cel">Celular</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="telefono" name="telefono" type="text" class="validate white-text" value="<?php echo $telefono ?>">
          <label for="telefono">Teléfono</label>
        </div>
        <div class="input-field col s6">
          <input id="cuil" name="cuil" type="text" class="validate white-text" required value="<?php echo $cuil ?>">
          <label for="cuil">CUIL</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="unidad" name="unidad" type="text" class="validate white-text" value="<?php echo $unidad ?>" required>
          <label for="unidad">Unidad</label>
        </div>
        <div class="input-field col s6">
          <input id="fingreso" name="fingreso" type="date" class="validate white-text" value="<?php echo $fingreso ?>" required>
          <label for="fingreso">Fecha de Ingreso</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="cuadro_jerarquico" name="cuadro_jerarquico" type="text" class="validate white-text" value="<?php echo $cuadro_jerarquico ?>">
          <label for="cuadro_jerarquico">Cuadro Jerárquico</label>
        </div>
        <div class="input-field col s6">
          <input id="sciomilitar" name="sciomilitar" type="text" class="validate white-text" value="<?php echo $sciomilitar ?>">
          <label for="sciomilitar">Scio. Militar</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="fincorporacion" name="fincorporacion" type="date" class="validate white-text" value="<?php echo $fincorporacion ?>">
          <label for="fincorporacion">Fecha de incorporación</label>
        </div>
        <div class="input-field col s6">
          <input id="fbaja" name="fbaja" type="date" class="validate white-text" value="<?php echo $fbaja ?>">
          <label for="fbaja">Baja</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="aptitudalcanzada" name="aptitudalcanzada" type="text" class="validate white-text" value="<?php echo $aptitudalcanzada ?>">
          <label for="aptitudalcanzada">Aptitud Alcanzada</label>
        </div>
        <div class="input-field col s6">
          <input id="exceptuado" name="exceptuado" type="text" class="validate white-text" value="<?php echo $exceptuado ?>">
          <label for="exceptuado">Exceptuado</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="especialidades_aptitudes" name="especialidades_aptitudes" type="text" class="validate white-text" value="<?php echo $especialidad ?>">
          <label for="especialidad">Especialidad</label>
        </div>
        <div class="input-field col s6">
          <input id="ordenmerito" name="ordenmerito" type="text" class="validate white-text" value="<?php echo $ordenmerito ?>">
          <label for="ordenmerito">Orden de Mérito</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="idiomas" name="idiomas" type="text" class="validate white-text" value="<?php echo $idiomas ?>">
          <label for="idiomas">Idiomas</label>
        </div>
        <div class="input-field col s6">
          <input id="sabenadar" name="sabenadar" type="text" class="validate white-text" value="<?php echo $sabenadar ?>">
          <label for="sabenadar">Sabe Nadar</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="automotores" name="automotores" type="text" class="validate white-text" value="<?php echo $automotores ?>">
          <label for="automotores">Autos que Conduce</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="estudiosciviles" name="estudiosciviles" type="text" class="validate white-text" value="<?php echo $estudiosciviles ?>">
          <label for="estudiosciviles">Estudios Civiles</label>
        </div>
        <div class="input-field col s6">
          <input id="estudiosmilitares" name="estudiosmilitares" type="text" class="validate white-text" value="<?php echo $estudiosmilitares ?>">
          <label for="estudiosciviles">Estudios Militares</label>
        </div>
      </div>
			<div class="row">
        <button name="guardar" class="btn waves-effect waves-light" type="submit"><i class="material-icons left">save</i>Guardar</button>
        <a href="legajo.php" class="btn waves-effect waves-light red" type="submit"><i class="material-icons left">reply</i>Cancelar</a>
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
</body>


	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script src="js/app.js"></script>
	<script>
	document.addEventListener('DOMContentLoaded', function(){
			M.AutoInit();
	</script>
</body>
</html>
