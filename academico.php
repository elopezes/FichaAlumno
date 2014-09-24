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
				<h2>Información Académica</h2>
			</hgroup>
		</header>
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
				$result = mysqli_query($con, "SELECT contacts.first_name, contacts.last_name, contacts_cstm.uc_matricula_c,contacts_cstm.uc_tipoingreso_c,
                             contacts_cstm.uc_diasaula_c,uc_fechaultingaula_c 
                             FROM `contacts_cstm`, `contacts` 
                             WHERE contacts.id=contacts_cstm.id_c and contacts.id ='{$identificador1}'");

				$resultacademico = mysqli_query($con, "SELECT * 
                                    FROM `iacad_infoacademica_contacts_c`, `iacad_infoacademica_cstm`,`contacts`, `iacad_infoacademica` 
									WHERE iacad_infoacademica_cstm.id_c=iacad_infoacademica_contactsiacad_infoacademica_idb and
									contacts.id=iacad_infoacademica_contactscontacts_ida and 
									iacad_infoacademica.id= iacad_infoacademica_contacts_c.iacad_infoacademica_contactsiacad_infoacademica_idb and
									contacts.id ='{$identificador1}'and iacad_infoacademica_cstm.uc_programa_c like 'Lic%' ");

				$resultacademico2 = mysqli_query($con, "SELECT * 
                                    FROM `iacad_infoacademica_contacts_c`, `iacad_infoacademica_cstm`,`contacts`, `iacad_infoacademica` 
									WHERE iacad_infoacademica_cstm.id_c=iacad_infoacademica_contactsiacad_infoacademica_idb and
									contacts.id=iacad_infoacademica_contactscontacts_ida and 
									iacad_infoacademica.id= iacad_infoacademica_contacts_c.iacad_infoacademica_contactsiacad_infoacademica_idb and
									contacts.id ='{$identificador1}'and (iacad_infoacademica_cstm.uc_programa_c like 'Cur%' or
									iacad_infoacademica_cstm.uc_programa_c like 'Dip%') ");

				while ($row = mysqli_fetch_array($result)) {
					echo '<div style="position:relative; border: 1px solid gray;width:750px;height:700px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:-6px -8px 9px 0px gray;">';
					echo "<br><br>";
					echo '<div style="position:absolute; top:20px;margin-left:5px; border: 1px solid gray;width:700px;height:130px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:relative;top:-20px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Resumen Académico</span>';
					echo '<div style="position:absolute;left:-30px;text-align:right;font-type:Arial;font-size:14px; width:150px; color:black;">';
					echo 'Nombre:';
					echo '<br><br>';
					echo 'Matrícula:';
					echo '<br><br>';
					echo 'Tipo de Ingreso:';
					echo '</div>';
					echo '<div style="position:relative;left:110px;text-align:left;font-type:Arial;font-size:14px; width:100; color:gray;">';
					echo utf8_encode($row['first_name']);
					echo "<br><br>";
					echo utf8_encode($row['uc_matricula_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_tipoingreso_c']);
					echo "<br><br>";
					echo "</div>";
					echo '<div style="position:absolute;top:40px;left:300px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;height:200px">';
					echo 'Apellidos:';
					echo '<br><br>';
					echo 'Último Ingreso al Aula:';
					echo '<br><br>';
					echo 'Días sin Acceso al Aula:';
					echo '<br><br>';
					echo '</div>';
					echo '<div style="position:absolute;left:520px;text-align:left;font-type:Arial;font-size:14px; width:100; color:gray;top:40px;">';
					echo utf8_encode($row['last_name']);
					echo "<br><br>";
					echo utf8_encode($row['uc_fechaultingaula_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_diasaula_c']);
					echo '</div>';
					echo '<a class="boton formaboton" href="http://localhost/sugar/aulavirtual.php?id=';
					echo base64_encode($identificador1);
					echo '"';
					echo ' target=_blank">';
					echo 'Aula Virtual</a>';
					echo "</div>";
				}
				echo '<span style="position:relative;left:25px;top:180px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Licenciaturas</span>';
				echo '<table cellspacing=7 style="position:relative;padding-bottom:2px;top:200px;font-size:10px;text-align:center;border:1px solid green;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:-6px -8px 9px 0px gray;">
<tr>
<th>Programa</th>
<th>Asignatura</th>
<th>Clave</th>
<th>Cuatrimestre</th>
<th>Ciclo</th>
<th>Calificación</th>
<th>Profesor</th>
<th>Estado</th>
</tr>';
				while ($row1 = mysqli_fetch_array($resultacademico)) {
					echo "<tr>";
					echo "<td>" . utf8_encode($row1['uc_programa_c']) . "</td>";
					echo "<td>" . utf8_encode($row1['name']) . "</td>";
					echo "<td>" . utf8_encode($row1['uc_cvemateria_c']) . "</td>";
					echo "<td>" . utf8_encode($row1['uc_cuatrimestre_c']) . "</td>";
					echo "<td>" . utf8_encode($row1['uc_ciclo_c']) . "</td>";
					echo "<td>" . utf8_encode($row1['uc_calificacion_c']) . "</td>";
					echo "<td>" . utf8_encode($row1['uc_profesor_c']) . "</td>";
					echo "<td>" . utf8_encode($row1['uc_statusmateria_c']) . "</td>";
					echo '</tr>';
				}
				echo '</table>';
				echo '<span style="position:relative;left:25px;top:220px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Extensión Académica</span>';
				echo '<table cellspacing=7 style="position:relative;padding-bottom:2px;top:250px;font-size:10px;text-align:center;border:1px solid green;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:-6px -8px 9px 0px gray;">
<tr>
<th>Programa</th>
<th>Asignatura</th>
<th>Clave</th>
<th>Cuatrimestre</th>
<th>Ciclo</th>
<th>Calificación</th>
<th>Profesor</th>
<th>Estado</th>
</tr>';
				while ($row2 = mysqli_fetch_array($resultacademico2)) {
					echo "<tr>";
					echo "<td>" . utf8_encode($row2['uc_programa_c']) . "</td>";
					echo "<td>" . utf8_encode($row2['name']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_cvemateria_c']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_cuatrimestre_c']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_ciclo_c']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_calificacion_c']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_profesor_c']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_statusmateria_c']) . "</td>";
					echo '</tr>';
				}
				echo '</table>';
				/*Línea para desplegar el valor del Id, Sirve para ver que el parámetro que se está*/
				/*enviando desde el URL esté pasando de manera correcta*/
				/*echo "<span style='position:absolute; top:750px;'> Id: $identificador1</span>";*/
				mysqli_close($con);
				?>
			</section>
		</article>
		<footer>
			<p>
				Edgar A López Estrada. Todos los Derechos Reservados.
			</p>
		</footer>

	</body>
</html>
