<!doctype html>
<html>
	<head>
		<title>Ficha del Alumno</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="estilos.css" />
	</head>

	<body >
		<header>
			<hgroup>
				<br>
				<h1>Ficha del Alumno</h1>
				<br>
				<h2>Información General</h2>
			</hgroup>
		</header>

		<!--<nav>
		<ul>
		<li><a href="#">Generales</a></li>
		<li><a href="http://localhost/sugar/perfil.php">Perfil</a></li>
		<li><a href="http://localhost/sugar/academico.php">Información Académica</a></li>
		<li><a href="http://localhost/sugar/financiero.php">Información Financiera</a></li>
		<li><a href="http://localhost/sugar/doctos.php">Documentos</a></li>
		<li><a href="http://localhost/sugar/acuerdos.php">Acuerdos</a></li>

		</ul>
		</nav>-->

		<article>
			<section>
				<!--Inicia Sección del Logo UTEL -->
				<div class="logo"></div>

				<!--Termina Sección del logo UTEL -->

				<?php

				$url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
				/*echo "<strong>$url_actual</strong>";*/
				$identificador1 = base64_decode($_GET['id']);

				echo '<br>';
				echo '<nav>';
				echo '<ul>';
				/*echo '<li><a href="';echo$url_actual;echo'">';echo'Generales</a></li>';*/
				echo '<li><a href="http://localhost/sugar/destinover7.php?id=';
				echo base64_encode($identificador1);
				echo '"';
				echo ' target=_self">';
				echo 'General</a></li>';

				echo '<li><a href="http://localhost/sugar/aulavirtual.php?id=';
				echo base64_encode($identificador1);
				echo '"';
				echo ' target=_self">';
				echo 'Aula Virtual</a></li>';
				echo '<li><a href="http://localhost/sugar/perfil.php?id=';
				echo base64_encode($identificador1);
				echo '"';
				echo ' target=_self">';
				echo 'Perfil</a></li>';
				echo '<li><a href="http://localhost/sugar/academico.php?id=';
				echo base64_encode($identificador1);
				echo '"';
				echo ' target=_self">';
				echo 'Historial Académico</a></li>';
				echo '<li><a href="http://localhost/sugar/financiero.php?id=';
				echo base64_encode($identificador1);
				echo '">';
				echo 'Financiero</a></li>';
				echo '<li><a href="http://localhost/sugar/doctos.php?id=';
				echo base64_encode($identificador1);
				echo '">';
				echo 'Documentos</a></li>';
				echo '</ul>';
				echo '</nav>';

				$con = mysqli_connect("localhost", "root", "", "sugar");

				// Check connection
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$result = mysqli_query($con, "SELECT *
							 FROM `contacts_cstm`, `contacts` 
                             WHERE contacts.id=contacts_cstm.id_c  and contacts.id ='{$identificador1}'");

				while ($row = mysqli_fetch_array($result)) {

					/*Inicia caja contenedor general*/
					echo '<div style="position:relative; border: 1px solid gray;width:750px;height:1200px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:-6px -8px 9px 0px gray;">';
					echo "<br><br>";
					/*Aqui inicia la sección de Resumen General*/
					echo '<div style="position:absolute; top:60px;margin-left:5px; border: 1px solid gray;width:700px;height:250px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:relative;top:-20px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Resumen General</span>';
					echo '<div style="position:absolute;left:-30px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;top:10px;">';
					echo '<span style="position:absolute; top:-40px; left:50px;font-weight:bold">Nombre:</span>';
					echo '<br><br>';
					echo 'Modalidad:';
					echo '<br><br>';
					echo 'Programa:';
					echo '<br><br>';
					echo 'Ciclo de Venta:';
					echo '<br><br>';
					echo 'Fecha Ciclo de Venta:';
					echo '<br><br>';
					echo 'Ciclo de Ingreso:';
					echo '<br><br>';
					echo 'Fecha Ciclo de Ingreso:';
					echo '<br><br>';
					echo 'Grupo Origen:';
					echo '</div>';
					echo '<div style="position:relative;left:160px;text-align:left;font-type:Arial;font-size:14px; width:200; color:gray;top:-30px;">';
					echo '<span style="position:absolute; top:-40px;left:-90px;">';
					echo utf8_encode($row['first_name']);
					echo ' ';
					echo utf8_encode($row['last_name']);
					echo '</span>';
					echo "<br><br>";
					echo utf8_encode($row['uc_modalidad_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_programa_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_cicloventa_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_fechacicloventa_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_ciclo_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_fechaciclo_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_grupoorigen_c']);
					echo "</div>";
					echo '<div style="position:absolute;top:10px;left:380px;text-align:right;font-type:Arial;font-size:14px; width:150px; color:black;">';
					echo '<span style="position:absolute; top:-40px;left:75px;">Matrícula:</span>';
					echo '<br><br>';
					echo 'Estado Inscripción:';
					echo '<br><br>';
					echo 'Estado Alumno:';
					echo '<br><br>';
					echo 'Tipo de Ingreso:';
					echo '<br><br>';
					echo 'Tutor:';
					echo '</div>';
					echo '<div style="position:absolute;left:550px;text-align:left;font-type:Arial;font-size:14px; width:100; color:gray;top:10px;">';
					echo '<span style="position:absolute; top:-40px;left:0px;">';
					echo utf8_encode($row['uc_matricula_c']);
					echo '</span>';
					echo "<br><br>";
					echo utf8_encode($row['uc_estadoinscripcion_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_estadoalumno_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_tipoingreso_c']);
					echo "<br><br>";
					echo utf8_encode($row['assigned_user_id']);
					echo '</div>';
					echo "</div>";

					/*Aqui termina la sección de Resumen General*/

					/*Aqui Inicia la sección de Resumen Académico*/
					echo '<div style="position:absolute; top:360px;margin-left:5px; border: 1px solid gray;width:700px;height:180px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Resumen Académico</span>';
					echo '<div style="position:relative;top:40px;left:-50px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Promedio:';
					echo '<br><br>';
					echo 'Ciclos Cursados:';
					echo '<br><br>';
					echo 'Último Ingreso al Aula:';
					echo '<br><br>';
					echo 'Tipo de Jornada:';
					echo '<br><br>';
					echo 'Días sin acceso al aula:';
					echo '<div style="position:absolute;left:210px;text-align:left;font-type:Arial;font-size:14px; width:200px; color:gray;top:0px;">';
					echo utf8_encode($row['uc_promediogral_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_cicloscursados_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_fechahoraultingaula_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_jornada_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_diassinaccesoaula_c']);
					echo '</div>';
					echo '<div style="position:absolute;top:0px;left:350px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Asignaturas Cursadas:';
					echo '<br><br>';
					echo 'Por cursar:';
					echo '<br><br>';
					echo 'Asignaturas aprobadas:';
					echo '<br><br>';
					echo 'No aprobadas:';
					echo '<br><br>';
					echo 'Materias Actuales:';
					echo '<br><br>';					
					echo '</div>';
					echo '<div style="position:absolute;left:515px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;left:570px;">';
					echo utf8_encode($row['uc_asignaturascursadas_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_asignaturasporcursar_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_asignaturasaprobadas_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_asignaturasnoaprobadas_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_materiasactuales_c']);
					echo '</div>';

					echo '</div>';
					echo '</div>';
					echo '</div>';
					/*Aqui termina la sección de Resumen Académico*/

					/*Seción de Resumen Financiero*/

					echo '<div style="position:absolute; top:760px;margin-left:25px; border: 1px solid gray;width:700px;height:150px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Resumen Financiero</span>';
					echo '<div style="position:relative;top:20px;left:-50px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Descuento Total %:';
					echo '<br><br>';
					echo 'Fecha de último pago:';
					echo '<br><br>';
					echo 'Días de Atraso:';
					echo '<br><br>';
					echo 'Beca:';
					echo '<br><br>';
					echo '<div style="position:absolute;left:210px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;">';
					echo utf8_encode($row['uc_descuentototal_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_fechaultpago_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_diasatraso_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_beca_c']);
					echo "<br><br>";
					echo '</div>';
					echo '<div style="position:absolute;top:0px;left:350px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Saldo Licenciatura $:';
					echo '<br><br>';
					echo 'Estado Mora:';
					echo '<br><br>';
					echo 'Referencia:';
					echo '<br><br>';
					echo '</div>';
					echo '<div style="position:absolute;left:515px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;left:570px;">';
					echo utf8_encode($row['uc_saldolicenciatura_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_estadomora_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_referencia_c']);
					echo "<br><br>";
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					/*Termina Sección de Resumen Financiero*/

					/*Inicia sección de Resumen de Documentos*/
					echo '<div style="position:absolute; top:960px;margin-left:25px; border: 1px solid gray;width:700px;height:100px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Resumen Documentos</span>';
					echo '<div style="position:relative;top:20px;left:-20px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Docs. Físicos pendientes:';
					echo '<br><br>';
					echo 'Docs. Digitales pendientes:';
					echo '<br><br>';
					echo '<div style="position:absolute;left:210px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;">';
					echo utf8_encode($row['uc_doctosfisicospendientes_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_doctosdigitalespendientes_c']);
					echo "<br><br>";
					echo '</div>';
					echo '<div style="position:absolute;top:0px;left:260px;text-align:right;font-type:Arial;font-size:14px; width:350px; color:black;">';
					echo 'Certificado de estudios de bachillerato:';
					echo '<br><br>';
					echo 'Acta de Nacimiento:';
					echo '<br><br>';
					echo '</div>';
					echo '<div style="position:absolute;margin-left:50px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;left:570px;">';
					echo utf8_encode($row['uc_estadocertbachiller_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_estadoactanac_c']);
					echo "<br><br>";
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';

					/*Termina sección de Resumen de Documentos*/

					/*Inicia sección de Interacción*/
					echo '<div style="position:absolute; top:1110px;margin-left:25px; border: 1px solid gray;width:700px;height:100px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Interacción</span>';
					echo '<div style="position:relative;top:20px;left:-20px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Fecha de última Interacción:';
					echo '<br><br>';
					echo 'Quien contactó:';
					echo '<br><br>';
					echo '<div style="position:absolute;left:210px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;">';
					echo utf8_encode($row['uc_fechaultinteraccion_c']);
					echo "<br><br>";
					echo utf8_encode($row['assigned_user_id']);
					echo "<br><br>";
					echo '</div>';
					echo '<div style="position:absolute;top:0px;left:150px;text-align:right;font-type:Arial;font-size:14px; width:350px; color:black;">';
					echo 'Tipo de Interacción:';
					echo '<br><br>';
					echo 'Asunto:';
					echo '<br><br>';
					echo '</div>';
					echo '<div style="position:absolute;margin-left:-60px;text-align:left;font-type:Arial;font-size:14px; width:200px; color:gray;top:0px;left:570px;">';
					echo utf8_encode($row['uc_tipointeraccion_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_asuntointeraccion_c']);
					echo "<br><br>";
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					/*Termina sección de Interacción*/
					/*Inicia sección de Datos de Registro*/
					echo '<div style="position:absolute; top:1260px;margin-left:25px; border: 1px solid gray;width:700px;height:100px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Información de Registro en Admisiones</span>';
					echo '<div style="position:relative;top:20px;left:-20px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Registrado por:';
					echo '<br><br>';
					echo 'Grupo:';
					echo '<br><br>';
					echo '<div style="position:absolute;left:210px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;">';
					echo utf8_encode($row['uc_registradopor_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_grupo_c']);
					echo "<br><br>";
					echo '</div>';
					echo '<div style="position:absolute;top:0px;left:150px;text-align:right;font-type:Arial;font-size:14px; width:350px; color:black;">';
					echo 'Fecha de registro:';
					echo '<br><br>';
					echo 'Origen:';
					echo "<br><br>";
					echo '</div>';
					echo '<div style="position:absolute;margin-left:-60px;text-align:left;font-type:Arial;font-size:14px; width:200px; color:gray;top:0px;left:570px;">';
					echo utf8_encode($row['uc_fecharegistro_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_origen_c']);
					echo "<br><br>";
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';

					/*Termina sección de Datos de Registro*/

					echo "</div>";
					/*Termina caja contenedor general*/

				}

				/*Línea para desplegar el valor del Id, Sirve para ver que el parámetro que se está*/
				/*enviando desde el URL esté pasando de manera correcta*/
				/*echo "<strong>Id:$identificador1</strong>";*
				mysqli_close($con);

				?>
				</section>
				<!--<section>
				<header>
				<h1>Sección Perfil</h1>
				</header>
				<p>Sección Perfil</p>

				</section>-->
				<!--<section>
				<header>
				<h1>Sección Información Académica</h1>
				</header>
				<p>Sección Información Académica</p>
				</section>-->
				<!--<section>
				<header>
				<h1>Sección Información Financiera</h1>
				</header>
				<p>Sección Información Financiera</p>
				</section>-->
				<!--<section>
				<header>
				<h1>Sección Documentos</h1>
				</header>
				<p>Sección Información Documentos</p>
				</section>-->
				<!--<section>
				<header>
				<h1>Sección Información Acuerdos</h1>
				</header>
				<p>Sección Información Acuerdos</p>
				</section>-->
				</article>
				<footer>
				<p>
				Edgar A. López Estrada. Derechos Reservados
				</p>
				</footer>

				</body>
				</html>
			