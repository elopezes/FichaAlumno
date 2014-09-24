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
				<h2>Documentos del Alumno</h2>
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
				$identificador1 =base64_decode($_GET['id']);
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
				$result = mysqli_query($con, "SELECT contacts.first_name, contacts.last_name, contacts_cstm.uc_matricula_c,contacts_cstm.uc_matricula_c,contacts.phone_home,
                             contacts.phone_mobile,contacts.phone_work, contacts.primary_address_street, contacts.primary_address_city, contacts.primary_address_postalcode,
							 primary_address_country, contacts_cstm.uc_correoelectronico_c,contacts_cstm.uc_correoelectronicoalt_c,contacts_cstm.uc_tipoingreso_c, contacts_cstm.uc_ciclo_c,
							 contacts_cstm.uc_fechainiciociclo_c, contacts_cstm.uc_tipoinscripcion_c, contacts_cstm.uc_horarioatn_c, contacts_cstm.uc_promo_c,
							 contacts_cstm.uc_genero_c, contacts_cstm.uc_nacionalidad_c, contacts_cstm.uc_fechanac_c, contacts_cstm.uc_trabajaactualmente_c,
							 contacts_cstm.uc_estadoalumno_c, contacts.assigned_user_id, contacts_cstm.uc_grupo_c,contacts_cstm.uc_origen_c,
							 contacts.date_entered,contacts.date_modified
							 
                             FROM `contacts_cstm`, `contacts` 
                             WHERE contacts.id=contacts_cstm.id_c and contacts.id ='{$identificador1}'");
				while ($row = mysqli_fetch_array($result)) {
					echo '<div style="position:relative; border: 1px solid gray;width:750px;height:700px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:-6px -8px 9px 0px gray;">';
					echo "<br><br>";
					echo '<div style="position:absolute; top:20px;margin-left:5px; border: 1px solid gray;width:700px;height:200px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:relative;top:90px;left:190px;font-type:Verdana; font-size:26px; color:#A52A2A; font-weight:bold;">Sección en construcción</span>';
					echo '</div>';
					echo '<div style="position:absolute; top:300px;margin-left:5px; border: 1px solid gray;width:700px;height:150px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:relative;top:70px;left:190px;font-type:Verdana; font-size:26px; color:#A52A2A; font-weight:bold;">Sección en construcción</span>';
					echo '</div>';
					echo "</div>";
				}
                /*Línea para desplegar el valor del Id, Sirve para ver que el parámetro que se está*/
				/*enviando desde el URL esté pasando de manera correcta*/
                /*echo "<strong>Id:$identificador1</strong>";*/
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
				Edgar A López Estrada. Todos los Derechos Reservados.
			</p>
		</footer>

	</body>
</html>
