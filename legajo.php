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
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
											<li><a href="index.php">Inicio</a></li>
                    	<li><a href="personal.php">Personal</a></li>
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

	<section class="section-hero" style="margin-top: 0rem;">
		<div class="hero">
			<div class="container">
                    <div class="row white-text"><br>
                        <div class="input-field col s2">
                            <form action="" onSubmit="return validarForm(this)" method="POST">
                            <label for="buscarLeg">Ingresar Nro. de legajo...</label>
                            <input type="text" name="legajo" class="autocomplete white-text">
                            <button class="btn-floating btn-large waves-effect waves-light" type="submit" value="Buscar" id="buscar" name="buscar">
                            <i class="material-icons right">search</i></button>
														<a href="nvoAgt.php" class="btn-floating btn-large waves-effect waves-light red lighten-2 btn tooltipped"
														data-tooltip="Nuevo Agente"><i class="material-icons">add</i></a>
                            </form>
                        </div>
												<div class="card-image background-position: right right">
													<!---  <img src="images/default-avatar.png"> -->
													<?php
														//$imgFija="<img src='images/default-avatar.png' width=280 height=220>";

														if(isset($_POST['buscar']))  {

															$buscar = $_POST['legajo'];

															$cons = "SELECT * FROM personal WHERE legajo like '$buscar'";
															$resul = $conexion->prepare($cons);
															$resul->execute();
															$datos=$resul->fetchAll(PDO::FETCH_ASSOC);

															if($datos == null){
																echo "<script>M.toast({html:'No se encontraron registros!!'})</script>";

															}

															$legajo = '0';
															$dni = '0';
															foreach ($datos as $dato) {

																$legajo = $dato['legajo'];
																$dni = $dato['dni'];

																// code...
															}

															 if(file_exists(__DIR__."/images/$legajo/$dni.jpg")){
																 	echo "<img src=images/$legajo/$dni.jpg width=280 height=220>";
															 }
															 else {
																	echo "<img src='images/perfil-del-usuario.png' width=220 height=220>";

															 }

															 }
															?>
												</div>

                </div>

				<div class="container-fondo">
                 <div class="card horizontal transparent white-text" style="margin-top: -20px;">
                        <div class="row">
                                <ul class="tabs transparent valign-wrapper" style="width: 1270px;">
                                    <li class="tab "><a href="#lnkPersonal" class="active"><span class="white-text">PERSONAL</span></a></li>
                                    <li class="tab"><a href="#lnkFamilia"><span class="white-text">FAMILIA</span></a></li>
                                    <li class="tab"><a href="#lnkDomicilio"><span class="white-text">DOMICILIO</span></a></li>
                                    <li class="tab"><a href="#lnkAntecedentes"><span class="white-text">ANTECEDENTES</span></a></li>
																		<li class="tab"><a href="#lnkAportes"><span class="white-text">APORTES</span></a></li>
																		<li class="tab"><a href="#lnkFunciones"><span class="white-text">FUNCIONES</spa></a></li>
																		<li class="tab"><a href="#lnkAltasBajasAscensos"><span class="white-text">ALTAS, BAJAS Y ASCENSOS</span></a></li>
																		<li class="tab"><a href="#lnkPases"><span class="white-text">PASES</span></a></li>
																		<li class="tab"><a href="#lnkSanciones"><span class="white-text">SANCIONES</span></a></li>
																		<li class="tab"><a href="#lnkFelicitaciones"><span class="white-text">FELICITACIONES</span></a></li>
																		<li class="tab"><a href="#lnkEmbargos"><span class="white-text">EMBARGOS</span></a></li>
																		<li class="tab"><a href="#lnkLicenciasOrd"><span class="white-text">LICENCIAS ORDINARIAS</span></a></li>
																		<li class="tab"><a href="#lnkCargosSup"><span class="white-text">CARGOS SUPERIORES</span></a></li>
																		<li class="tab"><a href="#lnkLicenciasExt"><span class="white-text">LICENCIAS EXTRAORDINARIAS</span></a></li>
																		<li class="tab"><a href="#lnkJunta"><span class="white-text">JUNTA DE CALIFICACIÓN</span></a></li>
                                </ul>
                        </div>

                      </div>
                      <div class="card z-depth-3 transparent">
                      <div class="card-content white-text">

												<!--=======================================================================
												   DATOS PERSONALES DEL AGENTE
												   ========================================================================-->

                        <div id="lnkPersonal">
                            <?php
                          if (isset($_POST['buscar']))
                            {

                            $buscar = $_POST["legajo"];


                            $consulta = "SELECT * FROM personal WHERE legajo like '$buscar'";

                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();
                            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

														if($data != null){
															echo "<section class='section-hero' style='margin-top:-15px;'>
															<a href='edit_agt.php?legajo=".$_POST['legajo']."' class='waves-effect waves-light light-blue darken-3 btn'><i class='material-icons left'>create</i>Editar</a>
															<a class='waves-effect waves-light blue-grey lighten-1 btn'><i class='material-icons left'>portrait</i>Situación de Revista</a>
																		</section>";
														}

                            foreach($data as $dat) {
                            ?>

                            <table class="highlight" style="margin-top: 5px;">
                                    <thead class="teal lighten-1">
                                    <tr>
                                        <th>LEGAJO</th>
                                        <th>APELLIDO</th>
                                        <th>NOMBRE</th>
                                        <th>GÉNERO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
																				<td style="display:none;"><?php echo $dat['id'] ?></td>
                                        <td><?php echo $dat['legajo'] ?></td>
                                        <td><?php echo $dat['apellido'] ?></td>
                                        <td><?php echo $dat['nombre'] ?></td>
                                        <td><?php echo $dat['genero'] ?></td>
                                    </tr>
                                    </tbody>
                                    <thead class="teal lighten-1">
                                    <tr>
                                        <th>D.N.I.</th>
                                        <th>FECHA DE NAC</th>
                                        <th>PAIS</th>
                                        <th>PROVINCIA</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $dat['dni'] ?></td>
                                        <td><?php echo $dat['fnacimiento'] ?></td>
                                        <td><?php echo $dat['pais'] ?></td>
                                        <td><?php echo $dat['provincia'] ?></td>
                                    </tr>
                                    </tbody>
                                    <thead class="teal lighten-1">
                                    <tr>
                                        <th>DEPARTAMENTO</th>
                                        <th>LOCALIDAD</th>
                                        <th>CELULAR</th>
                                        <th>TELÓFONO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $dat['departamento'] ?></td>
                                        <td><?php echo $dat['localidad'] ?></td>
                                        <td><?php echo $dat['celular'] ?></td>
                                        <td><?php echo $dat['telefono'] ?></td>
                                    </tr>
                                    </tbody>
                                    <thead class="teal lighten-1">
                                    <tr>
                                        <th>CUIL</th>
                                        <th>UNIDAD</th>
                                        <th>FECHA DE INGRESO</th>
                                        <th>CUADRO JERÁRQUICO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $dat['cuil'] ?></td>
                                        <td><?php echo $dat['unidad'] ?></td>
                                        <td><?php echo $dat['fingreso'] ?></td>
                                        <td><?php echo $dat['cuadro_jerarquico'] ?></td>
                                    </tr>
                                    </tbody>
                                    <thead class="teal lighten-1">
                                    <tr>
                                        <th>SCIO. MILITAR</th>
                                        <th>INCORPORACIÓN</th>
                                        <th>BAJA</th>
                                        <th>APTITUD ALCANZADA</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $dat['sciomilitar'] ?></td>
                                        <td><?php echo $dat['fincorporacion'] ?></td>
                                        <td><?php echo $dat['fbaja'] ?></td>
                                        <td><?php echo $dat['aptitudalcanzada'] ?></td>
                                    </tr>
                                    </tbody>
																		<thead class="teal lighten-1">
                                    <tr>
                                        <th>EXCEPTUADO</th>
                                        <th>ESPECIALIDAD</th>
                                        <th>ORDEN DE MÉRITO</th>
                                        <th>IDIOMAS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $dat['exceptuado'] ?></td>
                                        <td><?php echo $dat['especialidades_aptitudes'] ?></td>
                                        <td><?php echo $dat['ordenmerito'] ?></td>
                                        <td><?php echo $dat['idiomas'] ?></td>
                                    </tr>
                                    </tbody>
																		<thead class="teal lighten-1">
                                    <tr>
                                        <th>SABE NADAR</th>
                                        <th>AUTOS QUE CONDUCE</th>
                                        <th>ESTUDIOS CIVILES</th>
                                        <th>ESTUDIOS MILITARES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $dat['sabenadar'] ?></td>
                                        <td><?php echo $dat['automotores'] ?></td>
                                        <td><?php echo $dat['estudiosciviles'] ?></td>
                                        <td><?php echo $dat['estudiosmilitares'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php }
                                       ?>
                            </div>
							<!--==============================================================================
															 DATOS DE LOS FAMILIARES DEL AGENTE
								  ==============================================================================-->
                            <div id="lnkFamilia">
															<a href='nvoFliar.php?legajo="<?php echo $_POST['legajo']?>"' class='waves-effect waves-light blue-grey lighten-1 btn'><i class='material-icons left'>portrait</i>Registrar familiar</a>
															<?php

															$consulta = "SELECT f.* FROM familia as f INNER JOIN personal as p ON f.id_agente = p.id AND p.legajo LIKE '$buscar'";
															//var_dump($consulta);
															$resultado = $conexion->prepare($consulta);
															$resultado->execute();
															$dataF=$resultado->fetchAll(PDO::FETCH_ASSOC);

															foreach($dataF as $datF) {
															?>
															<table class="highlight">
	                                    <thead class="teal lighten-1">
	                                    <tr>
	                                        <th>APELLIDO</th>
	                                        <th>NOMBRE</th>
	                                        <th>FECHA DE NAC</th>
	                                        <th>DNI</th>
																					<th>A CARGO</th>
																					<th>VÍNCULO</th>
																					<th><?php
																					   if($datF['fdefuncion']!="0000-00-00"){
																						  echo "DEFUNCIÓN";
																					   }else{
																						  echo "";
																					}  ?></th>
																					<th>ASIG. FLIAR</th>
																					<th>NUPCIAS</th>
																					<th><?php
																								if($datF['fcasamiento']!="0000-00-00"){
																									echo "F. CASAMIENTO";
																								}else{
																									echo "";
																								}
																					?></th>
																					<th><?php
																								if($datF['fdivorsio']!="0000-00-00"){
																									echo "F. DIVORSIO";
																								}else{
																									echo "";
																								}
																					?></th>
																					<th>OBJETO</th>
																					<th><i class="small material-icons">drive_file_rename_outline</i></th>
	                                    </tr>
	                                    </thead>
	                                    <tbody>
	                                    <tr>
	                                        <td><?php echo $datF['apellido_fliar'] ?></td>
	                                        <td><?php echo $datF['nombre_fliar'] ?></td>
	                                        <td><?php echo $datF['fnacimiento_fliar'] ?></td>
	                                        <td><?php echo $datF['dni_fliar'] ?></td>
																					<td><?php echo $datF['a_cargo'] ?></td>
																					<td><?php echo $datF['vinculo']; ?></td>
																					<td> <?php
																								if($datF['fdefuncion']!="0000-00-00"){
																									echo $datF['fdefuncion'];
																								}else{
																									echo "";
																								}
																					?></td>
																					<td><?php echo $datF['asignacionfliar']; ?></td>
																					<td><?php echo $datF['nupcias']; ?></td>
																					<td><?php
																								if($datF['fcasamiento']!="0000-00-00"){
																									echo $datF['fcasamiento'];
																								}else{
																									echo "";
																								}
																					?></td>
																					<td><?php
																								if($datF['fdivorsio']!="0000-00-00"){
																									echo $datF['fdivorsio'];
																								}else{
																									echo "";
																								}
																					?></td>
																					<td><?php echo $datF['obj']; ?></td>
																					<td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a</td>
	                                    </tr>
	                                    </tbody>
																</table>
															<?php }
																		 ?>
														</div>
														<!--==============================================================================
																						 DOMICILIOS REGISTRADOS POR EL AGENTE
															  ==============================================================================-->
                            <div id="lnkDomicilio">
															<?PHP
																	$consultad = "SELECT d.* FROM domicilio as d INNER JOIN personal as p ON d.personal_id = p.id AND p.legajo LIKE '$buscar'";

					                        $resultado = $conexion->prepare($consultad);
					                        $resultado->execute();
					                        $dataD=$resultado->fetchAll(PDO::FETCH_ASSOC);

					                        foreach($dataD as $datasD) {
					                        ?>
															    <table class="highlight" style="margin-top: 5px;">
	                                    <thead class="teal lighten-1">
	                                    <tr>
	                                        <th>FECHA</th>
	                                        <th>LOCALIDAD</th>
																					<th>CALLE</th>
	                                        <th>NRO.</th>
	                                        <th>PISO</th>
																					<th>DPTO.</th>
																					<th>SECCIONAL</th>
																					<th>TELÉFONO</th>
																					<th><i class="small material-icons">drive_file_rename_outline</i></th>
	                                    </tr>
	                                    </thead>
	                                    <tbody>
	                                    <tr>
	                                        <td><?php echo $datasD['fechaDom'] ?></td>
	                                        <td><?php echo $datasD['localidad2'] ?></td>
	                                        <td><?php echo $datasD['calle'] ?></td>
	                                        <td><?php echo $datasD['numero'] ?></td>
																					<td><?php echo $datasD['piso'] ?></td>
																					<td><?php echo $datasD['departamento2'] ?></td>
																					<td><?php echo $datasD['seccional'] ?></td>
																					<td><?php echo $datasD['telefono2'] ?></td>
																					<td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a</td>
	                                    </tr>
	                                    </tbody>
																</table>
															<?php }
																		 ?>
														</div>
                            <div id="lnkAntecedentes">
															<?php
															 $consultaAnt = "SELECT a.* FROM antecedentes as a INNER JOIN personal as p ON a.agente_id = p.id AND p.legajo LIKE '$buscar'";

																$resultado = $conexion->prepare($consultaAnt);
																$resultado->execute();
																$dataAnt=$resultado->fetchAll(PDO::FETCH_ASSOC);

																foreach($dataAnt as $dataAnts) {
																				 ?>
																				 <table class="highlight" style="margin-top: 5px;">
					 																	<thead class="teal lighten-1">
					 																	<tr>
					 																			<th>FECHA</th>
					 																			<th>REFERENCIA</th>
					 																			<th>ESCRIBIENTE</th>
					 																			<th><i class="small material-icons">drive_file_rename_outline</i></th>
					 																	</tr>
					 																	</thead>
					 																	<tbody>
					 																	<tr>
					 																			<td><?php echo $dataAnts['fecha_ant'] ?></td>
					 																			<td><?php echo $dataAnts['referencia'] ?></td>
					 																			<td><?php echo $dataAnts['escribiente'] ?></td>
					 																			<td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a</td>
					 																	</tr>
					 																	</tbody>
					 														</table>
																		<?php }
																					 ?>
														</div>
														<div id="lnkAportes">
															<?php
															 $consultaAp = "SELECT ap.* FROM servicioscomputables as ap INNER JOIN personal as p ON ap.agenteId = p.id AND p.legajo LIKE '$buscar'";

															 $resultado = $conexion->prepare($consultaAp);
															 $resultado->execute();
															 $dataAp=$resultado->fetchAll(PDO::FETCH_ASSOC);

															 foreach($dataAp as $datasAp) {
															 ?>
															 <table class="highlight" style="margin-top: 5px;">
 																	<thead class="teal lighten-1">
 																	<tr>
 																			<th>SCIO. CUMPUTABLE</th>
 																			<th>MINISTERIO</th>
 																			<th>REPARTICIÓN</th>
 																			<th>DESDE</th>
 																			<th>HASTA</th>
 																			<th>SCIO. RECONOCIDO</th>
 																			<th>TOTAL DE AÑOS</th>
 																			<th><i class="small material-icons">drive_file_rename_outline</i></th>
 																	</tr>
 																	</thead>
 																	<tbody>
 																	<tr>
 																			<td><?php echo $datasAp['scioComputable'] ?></td>
 																			<td><?php echo $datasAp['ministerio'] ?></td>
 																			<td><?php echo $datasAp['reparticion'] ?></td>
 																			<td><?php echo $datasAp['desde'] ?></td>
 																			<td><?php echo $datasAp['hasta'] ?></td>
 																			<td><?php echo $datasAp['sciosReconocidos'] ?></td>
 																			<td><?php echo $datasAp['total_de_servicios'] ?></td>
 																			<td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a</td>
 																	</tr>
 																	</tbody>
 														</table>
 													<?php }
																?>
														</div>
														<div id="lnkFunciones">
															<?php
															$consultaf = "SELECT f.* FROM funcion as f INNER JOIN personal as p ON f.id_func = p.id AND p.legajo LIKE '$buscar'";

			                        $resultado = $conexion->prepare($consultaf);
			                        $resultado->execute();
			                        $dataf=$resultado->fetchAll(PDO::FETCH_ASSOC);

			                        foreach($dataf as $datasf) {
			                        ?>
															<table class="highlight" style="margin-top: 5px;">
																 <thead class="teal lighten-1">
																 <tr>
																		 <th>FECHA</th>
																		 <th>RESOLUCIÓN - ACTUACIÓN</th>
																		 <th>FUNCIÓN</th>
																		 <th>MOTIVO</th>
																		 <th>ACTUACIÓN</th>
																		 <th><i class="small material-icons">drive_file_rename_outline</i></th>
																 </tr>
																 </thead>
																 <tbody>
																 <tr>
																		 <td><?php echo $datasf['fechaf'] ?></td>
																		 <td><?php echo $datasf['resol_actuacion'] ?></td>
																		 <td><?php echo $datasf['funcion'] ?></td>
																		 <td><?php echo $datasf['motivo'] ?></td>
																		 <td><?php echo $datasf['actuacion'] ?></td>
																		 <td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
																 </tr>
																 </tbody>
													     </table>
												    <?php }
														    	?>
														</div>
														<div id="lnkAltasBajasAscensos">
														<?php
														  $consultaAba = "SELECT ac.* FROM alta_acenso_baja as ac INNER JOIN personal as p ON ac.idAgente = p.id AND p.legajo LIKE '$buscar'";

			                        $resultado = $conexion->prepare($consultaAba);
			                        $resultado->execute();
			                        $dataAba=$resultado->fetchAll(PDO::FETCH_ASSOC);

			                        foreach($dataAba as $datasAba) {
			                        ?>
															<table class="highlight" style="margin-top: 5px;">
																 <thead class="teal lighten-1">
																 <tr>
																		 <th>FECHA</th>
																		 <th>DECRETO - RESOLUCIÓN</th>
																		 <th>ACTUACIÓN</th>
																		 <th>GRADO</th>
																		 <th><i class="small material-icons">drive_file_rename_outline</i></th>
																 </tr>
																 </thead>
																 <tbody>
																 <tr>
																		 <td><?php echo $datasAba['fecha_aba'] ?></td>
																		 <td><?php echo $datasAba['dec_resol'] ?></td>
																		 <td><?php echo $datasAba['actuacion2'] ?></td>
																		 <td><?php echo $datasAba['grado_causa'] ?></td>
																		 <td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
																 </tr>
																 </tbody>
													     </table>
												    <?php }
														    	?>

														</div>
														<div id="lnkPases">
															<?php
															$consultaP = "SELECT pa.* FROM pases as pa INNER JOIN personal as p ON pa.idpase_pers = p.id AND p.legajo LIKE '$buscar'";

																$resultado = $conexion->prepare($consultaP);
																$resultado->execute();
																$dataPases=$resultado->fetchAll(PDO::FETCH_ASSOC);

																foreach($dataPases as $dataPase) {
																?>
																<table class="highlight" style="margin-top: 5px;">
																	 <thead class="teal lighten-1">
																	 <tr>
																			 <th>FECHA</th>
																			 <th>RESOLUCIÓN</th>
																			 <th>ACTUACIÓN</th>
																			 <th>DESDE</th>
																			 <th>HACIA</th>
																			 <th>CARGO</th>
																			 <th>MOTIVO</th>
																			 <th><i class="small material-icons">drive_file_rename_outline</i></th>
																	 </tr>
																	 </thead>
																	 <tbody>
																	 <tr>
																			 <td><?php echo $dataPase['fecha_pase'] ?></td>
																			 <td><?php echo $dataPase['resolucionp'] ?></td>
																			 <td><?php echo $dataPase['actuacion3'] ?></td>
																			 <td><?php echo $dataPase['de_unidad'] ?></td>
																			 <td><?php echo $dataPase['a_unidad'] ?></td>
																			 <td><?php echo $dataPase['cargo2'] ?></td>
																			 <td><?php echo $dataPase['motivo_pase'] ?></td>
																			 <td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
																	 </tr>
																	 </tbody>
														     </table>
													    <?php }
															    	?>

														</div>
														<div id="lnkSanciones">
															<?php
															$consultaS = "SELECT s.* FROM sanciones as s INNER JOIN personal as p ON s.sancionAgente = p.id AND p.legajo LIKE '$buscar'";

															 $resultado = $conexion->prepare($consultaS);
															 $resultado->execute();
															 $datoSan=$resultado->fetchAll(PDO::FETCH_ASSOC);

															 foreach($datoSan as $datoSa) {
															 ?>
															 <table class="highlight" style="margin-top: 5px;">
 																 <thead class="teal lighten-1">
 																 <tr>
 																		 <th>FECHA</th>
 																		 <th>EXPTE / RESOL</th>
 																		 <th>CLASE</th>
 																		 <th>DIAS</th>
 																		 <th>IMPUESTA POR</th>
 																		 <th>MOTIVO</th>
 																		 <th>ACTUACIÓN</th>
 																		 <th><i class="small material-icons">drive_file_rename_outline</i></th>
 																 </tr>
 																 </thead>
 																 <tbody>
 																 <tr>
 																		 <td><?php echo $datoSa['fecha_sancion'] ?></td>
 																		 <td><?php echo $datoSa['expte_resol'] ?></td>
 																		 <td><?php echo $datoSa['clase'] ?></td>
 																		 <td><?php echo $datoSa['dias'] ?></td>
 																		 <td><?php echo $datoSa['impuesta_por'] ?></td>
 																		 <td><?php echo $datoSa['motivo_sancion'] ?></td>
 																		 <td><?php echo $datoSa['actuacion4'] ?></td>
 																		 <td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
 																 </tr>
 																 </tbody>
 															 </table>
 														<?php }
 																	?>
														</div>
														<div id="lnkFelicitaciones">
															<?php
															$consultaFL = "SELECT fe.* FROM felicitaciones as fe INNER JOIN personal as p ON fe.agenteFelicitacion = p.id AND p.legajo LIKE '$buscar'";

															$resultado = $conexion->prepare($consultaFL);
															$resultado->execute();
															$datoFel=$resultado->fetchAll(PDO::FETCH_ASSOC);

															foreach($datoFel as $datoF) {
															 ?>
															 <table class="highlight" style="margin-top: 5px;">
 																<thead class="teal lighten-1">
 																<tr>
 																		<th>FECHA</th>
 																		<th>ACT./RESOL.</th>
 																		<th>ACTUACIÓN</th>
 																		<th>MOTIVO</th>
 																		<th>FELICITACIÓN/MENCIÓN</th>
 																		<th><i class="small material-icons">drive_file_rename_outline</i></th>
 																</tr>
 																</thead>
 																<tbody>
 																<tr>
 																		<td><?php echo $datoF['fecha_felicitacion'] ?></td>
 																		<td><?php echo $datoF['act_resol'] ?></td>
 																		<td><?php echo $datoF['actuacionF'] ?></td>
 																		<td><?php echo $datoF['motivoF'] ?></td>
 																		<td><?php echo $datoF['felicitacion_mencion'] ?></td>
 																		<td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
 																</tr>
 																</tbody>
 															</table>
 													 <?php }
 															 	?>
														</div>
														<div id="lnkEmbargos">
															<?php
															$consultaE = "SELECT e.* FROM embargos as e INNER JOIN personal as p ON e.embargo_id = p.id AND p.legajo LIKE '$buscar'";

															 $resultado = $conexion->prepare($consultaE);
															 $resultado->execute();
															 $datoEmb=$resultado->fetchAll(PDO::FETCH_ASSOC);

															 foreach($datoEmb as $datoE) {
																			 ?>
																			 <table class="highlight" style="margin-top: 5px;">
				 															 <thead class="teal lighten-1">
				 															 <tr>
				 																	 <th>DESDE</th>
				 																	 <th>HASTA</th>
																					 <th>DURACIÓN</th>
				 																	 <th>MONTO</th>
				 																	 <th>JUZGADO</th>
				 																	 <th>DEUDOR</th>
																					 <th>ORIGEN</th>
																					 <th>OBSERVACIONES</th>
				 																	 <th><i class="small material-icons">drive_file_rename_outline</i></th>
				 															 </tr>
				 															 </thead>
				 															 <tbody>
				 															 <tr>
				 																	 <td><?php echo $datoE['emb_desde'] ?></td>
				 																	 <td><?php echo $datoE['emb_hasta'] ?></td>
				 																	 <td><?php echo $datoE['duracion'] ?></td>
				 																	 <td><?php echo $datoE['monto'] ?></td>
				 																	 <td><?php echo $datoE['juzgado'] ?></td>
																					 <td><?php echo $datoE['deudor_fiador'] ?></td>
																					 <td><?php echo $datoE['origen_deuda'] ?></td>
																					 <td><?php echo $datoE['observaciones'] ?></td>
				 																	 <td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
				 															 </tr>
				 															 </tbody>
				 														 </table>
				 													<?php }
				 																?>
														</div>
														<div id="lnkLicenciasOrd">
														<?php
														$consultaLO = "SELECT l.* FROM licencias_ord as l INNER JOIN personal as p ON l.licenciaOrd = p.id AND p.legajo LIKE '$buscar'";

		                        $resultado = $conexion->prepare($consultaLO);
		                        $resultado->execute();
		                        $dataLo=$resultado->fetchAll(PDO::FETCH_ASSOC);

		                        foreach($dataLo as $dataL) {
														?>
														<table class="highlight" style="margin-top: 5px;">
														<thead class="teal lighten-1">
														<tr>
																<th>DESDE</th>
																<th>HASTA</th>
																<th>DURACIÓN</th>
																<th>AÑO</th>
																<th>ART.</th>
																<th>ACTUACIÓN (UO)</th>
																<th>ACT./RESOL.</th>
																<th>ARCHIVO</th>
																<th><i class="small material-icons">drive_file_rename_outline</i></th>
														</tr>
														</thead>
														<tbody>
														<tr>
																<td><?php echo $dataL['desde_lo'] ?></td>
																<td><?php echo $dataL['hasta_lo'] ?></td>
																<td><?php echo $dataL['duracion_de_dias'] ?></td>
																<td><?php echo $dataL['corresponde_anio'] ?></td>
																<td><?php echo $dataL['articulo_nro'] ?></td>
																<td><?php echo $dataL['act_unidad_origen'] ?></td>
																<td><?php echo $dataL['act_o_resol'] ?></td>
																<td><?php echo $dataL['img_actuacion'] ?></td>
																<td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
														</tr>
														</tbody>
													</table>
											 <?php }
													 	?>
														</div>
														<div id="lnkCargosSup">
														<?php
														$consultaCS = "SELECT cs.* FROM cargossuperiores as cs INNER JOIN personal as p ON cs.cargoSup_id = p.id AND p.legajo LIKE '$buscar'";

		                        $resultado = $conexion->prepare($consultaCS);
		                        $resultado->execute();
		                        $datoCsup=$resultado->fetchAll(PDO::FETCH_ASSOC);

		                        foreach($datoCsup as $datoCs) {
																 ?>
																 <table class="highlight" style="margin-top: 5px;">
			 													<thead class="teal lighten-1">
			 													<tr>
			 															<th>DESDE</th>
			 															<th>HASTA</th>
																		<th>RESOLUCIÓN</th>
			 															<th>CARGO/COMISIÓN</th>
			 															<th>ACTUACIÓN</th>
			 															<th><i class="small material-icons">drive_file_rename_outline</i></th>
			 													</tr>
			 													</thead>
			 													<tbody>
			 													<tr>
			 															<td><?php echo $datoCs['desde_carg'] ?></td>
			 															<td><?php echo $datoCs['hasta_carg'] ?></td>
			 															<td><?php echo $datoCs['resolucionCargo'] ?></td>
			 															<td><?php echo $datoCs['cargo_comision'] ?></td>
			 															<td><?php echo $datoCs['actuacionCargo'] ?></td>
			 															<td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
			 													</tr>
			 													</tbody>
			 												</table>
			 										 <?php }
			 												 	?>
														</div>
														<div id="lnkLicenciasExt">
														<?php
														$consultaLE = "SELECT le.* FROM licencias_ext as le INNER JOIN personal as p ON le.licenciaExt_id = p.id AND p.legajo LIKE '$buscar'";

		                        $resultado = $conexion->prepare($consultaLE);
		                        $resultado->execute();
		                        $datoLex=$resultado->fetchAll(PDO::FETCH_ASSOC);

		                        foreach($datoLex as $datoLe) {
																 ?>
																 <table class="highlight" style="margin-top: 5px;">
		 													 <thead class="teal lighten-1">
		 													 <tr>
		 															 <th>ACTUACIONES</th>
		 															 <th>DESDE</th>
		 															 <th>HASTA</th>
		 															 <th>TIEMPO</th>
		 															 <th>SUELDO</th>
																	 <th>ARTÍCULO</th>
																	 <th>DIAGNÓSTICO</th>
		 															 <th><i class="small material-icons">drive_file_rename_outline</i></th>
		 													 </tr>
		 													 </thead>
		 													 <tbody>
		 													 <tr>
		 															 <td><?php echo $datoLe['actuacionesLext'] ?></td>
		 															 <td><?php echo $datoLe['desde_le'] ?></td>
		 															 <td><?php echo $datoLe['hasta_le'] ?></td>
		 															 <td><?php echo $datoLe['duracionLe'] ?></td>
		 															 <td><?php echo $datoLe['sueldo'] ?></td>
																	 <td><?php echo $datoLe['art_nro'] ?></td>
																	 <td><?php echo $datoLe['diagnostico'] ?></td>
		 															 <td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
		 													 </tr>
		 													 </tbody>
		 												 </table>
		 											<?php }
		 														?>
														</div>
														<div id="lnkJunta">
														<?php
														$consultaJ = "SELECT j.* FROM juntacalificacion as j INNER JOIN personal as p ON j.juntaCalif_id = p.id AND p.legajo LIKE '$buscar'";

		                        $resultado = $conexion->prepare($consultaJ);
		                        $resultado->execute();
		                        $dataJunt=$resultado->fetchAll(PDO::FETCH_ASSOC);

		                        foreach($dataJunt as $dataJ) {
																 ?>
																 <table class="highlight" style="margin-top: 5px;">
		 													<thead class="teal lighten-1">
		 													<tr>
		 															<th>AÑO</th>
		 															<th>GRADO</th>
		 															<th>ESC</th>
		 															<th>REVISTA</th>
		 															<th>CALIFICACIÓN</th>
		 															<th>ORD. DE MER.</th>
																	<th>MOTIVO</th>
		 															<th>ACTUACIÓN</th>
		 															<th><i class="small material-icons">drive_file_rename_outline</i></th>
		 													</tr>
		 													</thead>
		 													<tbody>
		 													<tr>
		 															<td><?php echo $dataJ['anio'] ?></td>
		 															<td><?php echo $dataJ['grado_junta'] ?></td>
		 															<td><?php echo $dataJ['esc'] ?></td>
		 															<td><?php echo $dataJ['revista'] ?></td>
		 															<td><?php echo $dataJ['calificacion'] ?></td>
		 															<td><?php echo $dataJ['orden_merito'] ?></td>
		 															<td><?php echo $dataJ['motivo_junt'] ?></td>
																	<td><?php echo $dataJ['actuacionJ'] ?></td>
		 															<td><a class="btn-floating btn-small waves-effect light-blue darken-3"><i class="small material-icons">edit</i></a></td>
		 													</tr>
		 													</tbody>
		 												</table>
		 										 <?php }
		 												 }	?>
														</div>
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


	<div class="scrolltop scrolltop-dark"></div>
	<script src="js/app.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function(){
            M.AutoInit();
        });
        function validarForm(formulario)
    {
        if(formulario.legajo.value.length==0)
        { //¿Tiene 0 caracteres?
            formulario.legajo.focus();  // Damos el foco al control
            alert('No ingresó el Nro. de LEGAJO para iniciar la búsqueda!!'); //Mostramos el mensaje
            return false;
         } //devolvemos el foco
         return true; //Si ha llegado hasta aquí, es que todo es correcto
     }
    </script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
