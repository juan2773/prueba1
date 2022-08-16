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
		 <script src ="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
		 <script type="text/javascript">
	         const { jsPDF } = window.jspdf;
	       </script>
	<script src="js/materialize.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
            <li><a href="index.php">Inicio</a></li>
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
						Buscar agente
					</h2>
					<p class="teal-text">Ingrese los datos solicitados en el buscador para iniciar la búsqueda.</p>
            <div class="row">
              <form action="" method="POST">
              <div class="input-field col s6">
								<i class="material-icons left white-text prefix">search</i>
	              <input type="text" required name="PalabraClave" class="autocomplete white-text">
	              <label for="buscar">Apellido y Nombre del agente...</label>
              </div>
              </form>
          </div>
          <?php

        if(!empty($_POST)){

          $aKeyword = explode(" ", $_POST['PalabraClave']);

          $consulta = "SELECT * FROM personal WHERE apellido LIKE '%" . $aKeyword[0] . "%' OR nombre like '%" . $aKeyword[0] . "%'";
          //$consulta = $consulta . "AND personal_id=id AND juntaCalif_id=id AND id_func=id ORDER BY anio DESC LIMIT 0, 1";
          //$consulta = $consulta . "ORDER";
          $resultado = $conexion->prepare($consulta);
          $resultado->execute();
          $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

					if($data == null){
						echo "<div class='row'>
								    <div class='col s12 m5'>
								      <div class='card-panel teal'>
								        <span class='white-text'>No se encontró el registro en la base de datos!.
								        </span>
								      </div>
								    </div>
								  </div>";

					}

          foreach($data as $row) {
          ?>
          <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel transparent lighten-5 z-depth-3">
              <div class="row valign-top">
                <div class="col s2">
                  <?php
                  if(file_exists(__DIR__."/images/$row[legajo]/$row[dni].jpg")){
                    echo "<img src='images/$row[legajo]/$row[dni].jpg' alt='' class='circle responsive-img materialboxed'>";
									} else {
										echo "<img src='images/perfil-del-usuario.png' alt='' class='circle responsive-img'>";
									}
                  ?>
                </div>
                <div class="col s10">
                  <span class="white-text">
                    <p><span style="display:none"><?php echo $row['id'] ?></span>
										<span class="green-text  text-teal accent-2">APELLIDO Y NOMBRE:&nbsp;</span><?php echo $row['apellido']; ?>&nbsp;<?php echo $row['nombre']; ?>
                    &nbsp;<span class="green-text  text-teal accent-2">CUIL:</span>&nbsp;<?php echo $row['cuil']; ?></p>
                    <p><span class="green-text  text-teal accent-2">CUADRO JERÁRQUICO:</span>&nbsp;<?php echo $row['cuadro_jerarquico'] ?>
										<span class="green-text  text-teal accent-2">FECHA DE INGRESO:</span>&nbsp;<?php echo $row['fingreso'] ?></p>
										<p><span class="green-text  text-teal accent-2">PRESTA SCIO. EN:</span>&nbsp;<?php echo $row['unidad'] ?>
										<span class="green-text  text-teal accent-2">CELULAR:</span>&nbsp;<?php echo $row['celular'] ?>
									  <span class="green-text  text-teal accent-2">LEGAJO:</span>&nbsp;<?php echo $row['legajo'] ?></p>
                  </span>
                </div>
              </div>
							<ul class="collapsible" style="border-color: transparent">
							    <li>
							      <div class="collapsible-header transparent white-text" style="border-color: transparent"><i class="material-icons">list</i>
											<span class="red-text text-lighten-2">Más datos del agente</span></div>
							      <div class="collapsible-body transparent white-text" style="border-color: transparent">
											<p><span class="green-text  text-teal accent-2">D.N.I:</span>&nbsp;<?php echo $row['dni'] ?>
												 <span class="green-text  text-teal accent-2">VIVE EN:</span>
												<?php
												$id = $row['id'];
								        $consulta = "SELECT calle, numero FROM personal, domicilio WHERE id = '$id' AND personal_id=id ORDER BY fechaDom DESC LIMIT 0, 1";

								        $resultado = $conexion->prepare($consulta);
								        $resultado->execute();
								        $data_domicilio=$resultado->fetch(PDO::FETCH_ASSOC);?>

        								<?php echo $data_domicilio['calle'] ?>&nbsp;<?php echo $data_domicilio['numero'] ?>
													&nbsp;-&nbsp;<?php echo $row['localidad'] ?></p>
													<?php
													$consulta = "SELECT grado_junta, esc, juntaCalif_id, revista FROM personal, juntacalificacion WHERE id = '$id' AND juntaCalif_id=id ORDER BY anio DESC LIMIT 0, 1";

									        $resultado = $conexion->prepare($consulta);
									        $resultado->execute();
									        $data_juntaC=$resultado->fetch(PDO::FETCH_ASSOC);
													?>
												<p><span class="green-text  text-teal accent-2">JERARQUÍA:&nbsp;</span><?php echo $data_juntaC['grado_junta'] ?>&nbsp; <?php echo $data_juntaC['esc'] ?>
												   <span class="green-text  text-teal accent-2">REVISTA:&nbsp;</span><?php echo $data_juntaC['revista'] ?>&nbsp;
												 </p>
												<?php
												$consulta = "SELECT * FROM personal, funcion WHERE id = '$id' AND id_func=id ORDER BY fechaf DESC LIMIT 0, 1";

												$resultado = $conexion->prepare($consulta);
												$resultado->execute();
												$dat_f=$resultado->fetch(PDO::FETCH_ASSOC);
												?>
												<p><span class="green-text  text-teal accent-2">FUNCIÓN:&nbsp;</span><?php echo $dat_f['funcion'] ?></p>
										</div>
							    </li>
								</ul>
								<a href="#" class="btn-floating btn-small waves-effect waves-light red lighten-1 tooltipped" data-tooltip="Nuevo Agente"><i class="material-icons">add</i></a>
								<a href="sit_rev.php?id=<?php echo $row['id'] ?>" target="_blank" class="btn-floating btn-small waves-effect waves-light teal accent-4 tooltipped"
								data-tooltip="Descargar Situación de revista"><i class="material-icons">assignment_ind</i></a>
            </div>
          </div>
        <?php }} ?>
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
  <script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript">

//const { jsPDF } = window.jspdf;

$('#descargar_pdf_<?php echo $row['id'] ?>').on('click', function(){

  var pdf = new jsPDF('p', 'cm', 'a4');

  var hoy = new Date();
  //var hoy = ("00" + (hoy.getDate())).slice(-2) + "/" + ("00" + (hoy.getMonth() + 1)).slice(-2) + "/" + hoy.getFullYear();

  pdf.setFont('helvetica');
  pdf.setFontSize(8);


  pdf.setFontSize(26);
  pdf.setTextColor( 185, 119, 14 );
  pdf.setFont('helvetica','bold');
  pdf.text(9, 3,'<?php echo $row['apellido'] ?>');
  pdf.text(9, 4,'<?php echo $row['nombre'] ?>');
  pdf.setTextColor(66, 73, 73);

  pdf.setLineWidth(0.03);
  pdf.setDrawColor(185, 119, 14);
  pdf.line(9,7.9,20,7.9);

  /*pdf.setLineWidth(0.03);
  pdf.setDrawColor(185, 119, 14);
  pdf.line(9,14.9,20,14.9);*/

  pdf.setFontSize(18);
  pdf.setTextColor(185, 119, 14);
  //pdf.text(9, 5.8, 'FICHA PERSONAL');
  pdf.setFontSize(18);
  pdf.setTextColor(185, 119, 14);
  pdf.text(9,7.8, 'SITUACIÓN DE REVISTA');
  //pdf.text(9,14.8, 'DATOS INSTITUCIONALES');
  pdf.setFont('helvetica','bold');

  //DATOS PERSONALES DEL AGENTE
  pdf.setFontSize(10);
  pdf.setTextColor(66, 73, 73);
  pdf.text(9, 9.5, 'LEGAJO:');
  pdf.text(9, 10.2, 'CUADRO JERÁRQUCIO:' );
  pdf.text(9, 10.9, 'CUIL:' );
  pdf.text(9, 11.6, 'DOMICILIO:' );
  pdf.text(9, 12.3, 'LOCALIDAD:' );
  pdf.text(9, 13, 'CELULAR:' );
  pdf.text(9, 13.7, 'FECHA DE INGRESO:' );
  pdf.text(9, 14.4, 'JERARQUÍA:' );
  pdf.text(9, 15.1, 'ESCALAFÓN:' );
  pdf.text(9, 15.8, 'REVISTA:' );
  pdf.text(9, 16.5, 'ÚLTIMO DESTINO:' );
  pdf.text(9, 17.2, 'FUNCIÓN:' );
  pdf.text(9, 17.9, 'FELICITACIONES:')
  pdf.text(9, 18.6, 'SANCIONES:')

  //DATOS INSTITUCIONALES DEL AGENTE
  //pdf.text(9, 16.1, 'LEGAJO:');
 // pdf.text(9, 16.6, 'FECHA DE INGRESO:' );
  /*pdf.text(9, 17.1, 'JERARQUÍA:' );
  pdf.text(9, 17.6, 'UNIDAD DE DESTINO:' );
  pdf.text(9, 18.1, 'FUNCIÓN:' );
  pdf.text(9, 18.6, 'REVISTA:' );
  pdf.text(9, 19.1, 'F.U.A.:' );
  pdf.text(9, 19.6, 'TRASLADOS:' );*/
  //pdf.text(1, 14, 'Escalafon:' );

  //DATOS PERSONALES
  pdf.setFont('helvetica','normal');
  pdf.setFontSize(9);
  pdf.setTextColor(100);
  pdf.text(10.7, 9.5,'<?php echo $row['legajo'] ?>');
  pdf.text(13.2, 10.2,'<?php echo $row['cuadro_jerarquico'] ?>');
  pdf.text(10.1, 10.9, '<?php echo $row['cuil'] ?>');
  pdf.text(11.1, 11.6, '<?php echo $data_domicilio['calle'] ?>'+" "+ '<?php echo $data_domicilio['numero'] ?>');
  pdf.text(11.3, 12.3, '<?php echo $row['localidad'] ?>');
  pdf.text(10.9, 13, '<?php echo $row['celular'] ?>');
  pdf.text(12.8, 13.7, '<?php echo $row['fingreso'] ?>');
  pdf.text(11.4, 14.4, '<?php
                          $id = $row['id'];
                          $id_junta = $data_juntaC['juntaCalif_id'];

                          $consulta = "SELECT * FROM personal, juntacalificacion WHERE id='$id' AND juntaCalif_id='$id_junta' ORDER BY anio DESC LIMIT 0, 1";

                          $resultado = $conexion->prepare($consulta);
                          $resultado->execute();
                          $datajuntaC=$resultado->fetch(PDO::FETCH_ASSOC);
                          //var_dump($dato);

                          echo $data_juntaC['grado_junta'];

                        ?>');
  pdf.text(11.5, 15.1, '<?php echo $data_juntaC['esc'] ?>' );
  pdf.text(10.9, 15.8, '<?php echo $data_juntaC['revista'] ?>' );
  pdf.text(12.3, 16.5, '<?php echo $row['unidad'] ?>' );
  pdf.text(10.9, 17.2, '<?php
                        $id = $row['id'];
                        //$id_func = $datos['id_func'];
                        $consulta = "SELECT * FROM personal, funcion WHERE id = '$id' AND id_func=id ORDER BY fechaf DESC LIMIT 0, 1";

                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $datof=$resultado->fetch(PDO::FETCH_ASSOC);
                        echo $datof['funcion'];
                        //error_log($datof['funcion'], 3,"error.log" );
                        ?>' );
  pdf.text(12.2, 17.9, '<?php
                            $id = $row['id'];
                            $consulta = "SELECT COUNT(*) AS result FROM personal, felicitaciones WHERE id='$id' AND agenteFelicitacion=id";
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();
                            $dato=$resultado->fetch(PDO::FETCH_ASSOC);
                            echo $dato['result'];

                            ?>' +' EN SU CARRERA');

  pdf.text(11.3, 18.6, '<?php
                        $id = $row['id'];
                        $consulta = "SELECT COUNT(*) AS cuenta FROM personal, sanciones WHERE id='$id' AND sancionAgente=id";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $dato=$resultado->fetch(PDO::FETCH_ASSOC);
                        echo $dato['cuenta'];

                        ?>' +' EN SU CARRERA');

  //RECTANGULO - CUBRE FOTO
  pdf.setDrawColor(242, 243, 244);
  pdf.setFillColor(242, 243, 244);
  pdf.rect(0.5, 4, 7.5, 24,'FD')

  //RECTANGULO FONDO
  pdf.setDrawColor(66, 73, 73);
  pdf.setFillColor(66, 73, 73);
  pdf.rect(0.5, 1, 7.5, 5.8,'FD');

  //RECTANGULO FINO
  pdf.setDrawColor(66, 73, 73);
  pdf.setFillColor(66, 73, 73);
  pdf.rect(1, 24, 0.3, 2,'FD');

  //RECTANGULO FINO_02
  pdf.setDrawColor(185, 119, 14);
  pdf.setFillColor(185, 119, 14);
  pdf.rect(20.6, 7, 0.4, 21,'FD');

  pdf.setFont("helvetica", "bold");
  pdf.setFontSize(10);
  pdf.setTextColor(185, 119, 14);
  pdf.text(1.5, 24.3, 'SISTEMA DE PERSONAL', 'left');
  pdf.setFontSize(8);
  pdf.setFont('helvetica','normal');
  pdf.setTextColor(100);
  pdf.text(1.5, 25, 'Dirección General de Tecnologías,', 'left');
  pdf.text(1.5, 25.3, 'Comunicaciones y Seguridad Electrónica', 'left');
  pdf.text(1.5, 25.6,'Dirección de Informática', 'left');
  pdf.text(1.5, 25.9,'División Desarrollo de Software', 'left');

  pdf.addImage("images/" + <?php echo $row['legajo'] ?> + "/" + <?php echo $row['dni'] ?> + ".jpg", 1, 1.6, 6.5 , 4.6);
  pdf.addImage("/symfony3.4/informatica/web/img/fono.png","PNG", 1.3, 9, 0.5, 0.5);
  pdf.addImage("/symfony3.4/informatica/web/img/placeholders.png","PNG", 1.3, 9.7, 0.5, 0.5);
  pdf.text(2, 9.3, '(0342) - 4573021', 'left');
  pdf.text(2, 10, 'San Jeronimo 1170 - CP (3000) - Santa Fe', 'left');
  //pdf.addImage(logo_santa_fe, "PNG", 9.5, 0.5, 2, 2);
  //pdf.addImage(firma, "JPEG", 8, 22, 6.98,4.32);

  //pdf.setLineWidth(0.02);
  //pdf.line(9,28,20,28);

  pdf.setFont('helvetica','normal');
  pdf.setFontSize(8);
  //pdf.text(17, 28.5, 'Página 1 de 1');

  pdf.save('personal_'+ <?php echo $row['legajo'] ?> +'.pdf');
});

document.addEventListener('DOMContentLoaded', function(){
		M.AutoInit();
});
	</script>

</body>
</html>
