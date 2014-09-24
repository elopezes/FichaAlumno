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
				<h2>Perfil</h2>
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
					echo '<div style="position:relative; border: 1px solid gray;width:750px;height:1800px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:-6px -8px 9px 0px gray;">';
					echo "<br><br>";
					/*Aqui inicia la sección de Datos Personales*/
					echo '<div style="position:absolute; top:735px;margin-left:5px; border: 1px solid gray;width:700px;height:250px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:relative;top:-20px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Datos Personales</span>';
					echo '<div style="position:absolute;left:0px;text-align:right;font-type:Arial;font-size:14px; width:150px; color:black;top:30px;">';
					/*echo '<span style="position:absolute; top:-40px; left:50px;font-weight:bold">Nombre:</span>';*/
					echo '<span style="position:absolute;top:-740px;left:20px;"><strong>Nombre:</strong></span>';
					echo '<br><br>';
					echo 'Género:';
					echo '<br><br>';
					echo '¿Posee algún tipo de discapacidad?:';
					echo '<br><br>';
					echo '¿De qué tipo?:';
					echo '<br><br>';
					echo 'No. de dependientes económicos:';
					echo '</div>';
					echo '<div style="position:relative;left:160px;text-align:left;font-type:Arial;font-size:14px; width:200; color:gray;top:-10px;">';
					echo '<span style="position:relative;top:-740px;left:-90px;">';
					echo utf8_encode($row['first_name']);
					echo ' ';
					echo utf8_encode($row['last_name']);
					echo '</span>';
					echo "<br><br>";
					echo '<span style="position:relative;top:0px; left:0px;">';
					echo utf8_encode($row['uc_genero_c']);
					echo "<br><br><br>";
					echo utf8_encode($row['uc_discapacidad_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_tipodiscapacidad_c']);
					echo "<br><br><br>";
					echo utf8_encode($row['uc_depeconomics_c']);
					echo "<br><br>";
					echo '</span>';
					echo "</div>";
					echo '<div style="position:absolute;top:30px;left:380px;text-align:right;font-type:Arial;font-size:14px; width:150px; color:black;">';
					echo '<span style="position:absolute;top:-740px; left:-100px;">';
					echo '<strong>';
					echo 'Matrícula:';
					echo '</strong>';
					echo '</span>';
					echo '<br><br>';
					echo 'Fecha de Nac.:';
					echo '<br><br>';
					echo 'C.U.R.P:';
					echo '<br><br>';
					echo '<span style="position:relative; font-weight:bold; left:80px;">Lugar de Nacimiento</span>';
					echo '<br><br>';
					echo 'País:';
					echo '<br><br>';
					echo 'Estado/Provincia:';
					echo '<br><br>';
					echo 'Deleg/Mpio:';
					echo '</div>';
					echo '<div style="position:absolute;left:550px;text-align:left;font-type:Arial;font-size:14px; width:100; color:gray;top:30px;">';
					echo '<span style="position:absolute;top:-740px;left:-190px">';
					echo utf8_encode($row['uc_matricula_c']);
					echo '</span>';
					echo "<br><br>";
					echo utf8_encode($row['uc_fechanac_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_curp_c']);
					echo "<br><br><br><br>";
					echo utf8_encode($row['uc_lugnacestado_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_lugnacpais_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_lugnacdelmuni_c']);
					echo '</div>';
					echo "</div>";

					/*Aqui termina la sección de Datos Personales*/

					/*Aqui Inicia la sección de Comunicación*/
					echo '<div style="position:absolute; top:70px;margin-left:5px; border: 1px solid gray;width:700px;height:400px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Comunicación</span>';
					
					/*Inicia Teléfonos Admisiones*/
					echo '<div style="position:relative; top:20px;margin-left:0px; border: 1px solid green;width:350px;height:150px;border-radius: 10px;">';
					echo '<div style="position:relative;top:40px;left:-70px;text-align:right;font-type:Arial;font-size:14px; width:200px;color:black;">';
					echo '<span style="position:absolute;top:-35px;font-type:Verdana; font-size:12px; color:gray; font-weight:bold;">Admisiones</span>';
					echo 'Tel. Casa o Fijo:';
					echo '<br><br>';
					echo 'Celular:';
					echo '<br><br>';
					echo 'Tel. laboral:';
					echo '<br><br>';
					echo '</div>';
					echo '</div>';
					/*Finaliza Teléfonos Admisiones*/
					/*Inicia Teléfonos Sugar*/
					echo '<div style="position:relative; top:25px;margin-left:0px; border: 1px solid green;width:350px;height:230px;border-radius: 10px;">';
					echo '<div style="position:relative;top:35px;left:-70px;text-align:right;font-type:Arial;font-size:14px; width:200px;color:black;">';
					echo '<span style="position:absolute;top:-30px;left:90px;font-type:Verdana; font-size:12px; color:gray; font-weight:bold;">Sugar</span>';
					echo 'Tel. Casa o Fijo 2:';
					echo '<br><br>';
					echo 'Celular 2:';
					echo '<br><br>';
					echo 'Tel. laboral 2:';
					echo '<br><br>';
					echo 'Tel. Casa o Fijo 3:';
					echo '<br><br>';
					echo 'Celular 3:';
					echo '<br><br>';
					echo 'Tel. laboral 3:';
					echo '<br><br>';
					echo '</div>';
					echo '</div>';		
					echo '<div style="position:absolute;left:170px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:80px;">';
					echo utf8_encode($row['phone_home']);
					echo "<br><br>";
					echo utf8_encode($row['phone_mobile']);
					echo "<br><br>";
					echo utf8_encode($row['phone_work']);
					echo "<br><br><br><br><br>";
					echo utf8_encode($row['phone_home']);
					echo "<br><br>";
					echo utf8_encode($row['phone_mobile']);
					echo "<br><br>";
					echo utf8_encode($row['phone_work']);
					echo "<br><br>";
					echo utf8_encode($row['phone_home']);
					echo "<br><br>";
					echo utf8_encode($row['phone_mobile']);
					echo "<br><br>";
					echo utf8_encode($row['phone_work']);
					echo '</div>';
					/*Finaliza Teléfonos Sugar*/
					/*Inicia Sección redes sociales*/
					echo '<div style="position:absolute; top:40px;margin-left:360px; border: 1px solid green;width:350px;height:385px;border-radius: 10px;">';
					echo '<div style="position:absolute;top:100px;left:-70px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'E-mail Principal:';
					echo '<br><br>';
					echo 'E-mail Alternativo:';
					echo '<br><br>';
					echo 'Facebook:';
					echo '<br><br>';
					echo 'Skype:';
					echo '<br><br>';
					echo 'Twitter:';
					echo '<br><br>';
					echo 'Linkedin:';
					echo '<br><br>';
					echo '</div>';
					echo '<div style="position:absolute;margin-left:-430px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:50px;left:570px;top:100px;">';
					echo utf8_encode($row['uc_correoelectronico_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_correoelectronicoalt_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_facebook_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_skype_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_twitter_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_linkedin_c']);
					echo "<br><br>";					
					echo '</div>';
					/*Termina sección de redes sociales*/
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					/*Aqui termina la sección de Comunicación*/

					/*Sección Domicilio Particular*/
					echo '<div style="position:absolute; top:690px;margin-left:25px; border: 1px solid gray;width:700px;height:160px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Domicilio Particular</span>';
					echo '<div style="position:relative;top:20px;left:-5px;text-align:right;font-type:Arial;font-size:14px; width:100px; color:black;">';
					echo 'Estado/Provincia:';
					echo '<br><br>';
					echo 'Deleg./Mpio:';
					echo '<br><br>';
					echo 'C. Postal:';
					echo '<br><br>';
					echo 'Calle:';
					echo '<br><br>';
					echo 'Colonia:';
					echo '<br><br>';
					echo '<div style="position:absolute;left:120px;text-align:left;font-type:Arial;font-size:14px; width:250px; color:gray;top:0px;">';
					echo utf8_encode($row['primary_address_state']);
					echo "<br><br>";
					echo utf8_encode($row['uc_delmunidirprincipal_c']);
					echo "<br><br>";
					echo utf8_encode($row['primary_address_postalcode']);
					echo "<br><br>";
					echo utf8_encode($row['primary_address_street']);
					echo "<br><br>";
					echo utf8_encode($row['uc_coloniadirprincipal_c']);
					echo '</div>';
					echo '<div style="position:absolute;top:0px;left:350px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'País:';
					echo '<br><br>';
					echo 'Ciudad/Población:';
					echo '<br><br>';
					echo 'Referencia ubicación:';
					echo '<br><br>';
					echo '</div>';
					echo '<div style="position:absolute;left:515px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;left:570px;">';
					echo utf8_encode($row['primary_address_country']);
					echo "<br><br>";
					echo utf8_encode($row['primary_address_city']);
					echo "<br><br>";
					echo utf8_encode($row['uc_refdomparticular_c']);
					echo "<br><br>";
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					/*Termina Sección Domicilio Particular*/
					/*Inicia sección de Información Laboral*/
					echo '<div style="position:absolute; top:1205px;margin-left:25px; border: 1px solid gray;width:700px;height:250px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Información Laboral</span>';
					echo '<div style="position:relative;top:20px;left:-20px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Trabajas actualmente?:';
					echo '<br><br>';
					echo 'Jornada laboral:';
					echo '<br><br>';
					echo 'Nombre de la Empresa:';
					echo '<br><br>';
					echo 'Giro de la Empresa:';
					echo '<br><br>';
					echo 'Tipo de puesto:';
					echo '<br><br>';
					echo 'Antigüedad:';
					echo '<br><br>';
					echo 'Salario Mensual:';
					echo '<br><br>';
					echo '<div style="position:absolute;left:210px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;">';
					echo utf8_encode($row['uc_trabajaactualmente_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_jornadalaboral_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_nombreempresa_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_giroempresa_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_tipopuesto_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_antiguedad_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_salario_c']);
					echo "<br><br>";
					echo '</div>';
					echo '<div style="position:absolute;top:0px;left:200px;text-align:right;font-type:Arial;font-size:14px; width:350px; color:black;">';
					echo 'País:';
					echo '<br><br>';
					echo 'Estado/Provincia:';
					echo '<br><br>';
					echo 'Deleg/Mpio:';
					echo '<br><br>';
					echo 'C. Postal:';
					echo '<br><br>';
					echo 'Calle:';
					echo '<br><br>';
					echo 'Colonia:';
					echo '<br><br>';
					echo '</div>';
					echo '<div style="position:absolute;margin-left:0px;text-align:left;font-type:Arial;font-size:14px; width:150px; color:gray;top:0px;left:570px;">';
					echo utf8_encode($row['alt_address_country']);
					echo "<br><br>";
					echo utf8_encode($row['alt_address_state']);
					echo "<br><br>";
					echo utf8_encode($row['uc_delegacionalterna_c']);
					echo "<br><br>";
					echo utf8_encode($row['alt_address_postalcode']);
					echo "<br><br>";
					echo utf8_encode($row['alt_address_street']);
					echo "<br><br>";
					echo utf8_encode($row['uc_coloniadiralterna_c']);
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					/*Termina sección de Información Laboral*/
					/*Inicia sección de Información Académica*/
					echo '<div style="position:absolute; top:1505px;margin-left:25px; border: 1px solid gray;width:700px;height:155px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Información Académica</span>';
					echo '<div style="position:relative;top:20px;left:-20px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Último grado de Estudios:';
					echo '<br><br>';
					echo 'Última fecha de Estudios:';
					echo '<br><br>';
					echo 'Institución Educativa:';
					echo '<br><br>';
					echo 'Promedio Bachillerato:';
					echo '<br><br>';
					echo 'Promedio Licenciatura:';
					echo '<div style="position:absolute;left:210px;text-align:left;font-type:Arial;font-size:14px; width:200px; color:gray;top:0px;">';
					echo utf8_encode($row['uc_ultgradoestudios_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_ultfechagradoestudios_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_insteducativa_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_prombachillerato_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_promediolicenciatura_c']);
					echo "<br><br>";
					echo '</div>';
					echo '<div style="position:absolute;top:0px;left:170px;text-align:right;font-type:Arial;font-size:14px; width:350px; color:black;">';
					echo 'Estado/Provincia:';
					echo '<br><br>';
					echo 'País:';
					echo '<br><br>';
					echo 'Deleg/Mpio:';
					echo '</div>';
					echo '<div style="position:absolute;margin-left:-40px;text-align:left;font-type:Arial;font-size:14px; width:200px; color:gray;top:0px;left:570px;">';
					echo utf8_encode($row['uc_estadoprovinciaestudios_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_paisestudios_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_delmuniestudios_c']);
					echo "<br><br>";
					echo '</div>';
					echo '</div>';
					echo '</div>';					
					echo '</div>';
					/*Termina sección de Información Académica*/
                   /*Inicia sección de Referencia Personal*/
					echo '<div style="position:absolute; top:1710px;margin-left:25px; border: 1px solid gray;width:700px;height:155px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:absolute;top:5px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Referencia Personal</span>';
					echo '<div style="position:relative;top:20px;left:-20px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;">';
					echo 'Nombre:';
					echo '<br><br>';
					echo 'E-mail:';
					echo '<br><br>';
					echo 'Parentesco:';
					echo '<br><br>';
					echo 'Grado de Estudios:';
					echo '<br><br>';
					echo '<div style="position:absolute;left:210px;text-align:left;font-type:Arial;font-size:14px; width:200px; color:gray;top:0px;">';
					echo utf8_encode($row['uc_refpersonal_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_mailrefper_c']);
					echo "<br><br>";
					echo utf8_encode($row['oc_parentescorefper_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_gradoestudiosrefper_c']);
					echo "<br><br>";
					echo '</div>';
					echo '<div style="position:absolute;top:0px;left:170px;text-align:right;font-type:Arial;font-size:14px; width:350px; color:black;">';
					echo 'Estado/Provincia:';
					echo '<br><br>';
					echo 'País:';
					echo '<br><br>';
					echo 'Deleg/Mpio:';
					echo '</div>';
					echo '<div style="position:absolute;margin-left:-40px;text-align:left;font-type:Arial;font-size:14px; width:200px; color:gray;top:0px;left:570px;">';
					echo utf8_encode($row['uc_estadoprovinciaestudios_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_paisestudios_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_delmuniestudios_c']);
					echo "<br><br>";
					echo '</div>';
					echo '</div>';
					echo '</div>';
					/*Termina sección de información académica*/
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
			