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
				<h2>Información Financiera</h2>
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
                             WHERE contacts.id=contacts_cstm.id_c and contacts.id ='{$identificador1}'");
				$result2 = mysqli_query($con, "select *
                                               from contacts, dfin_detallefinanciero_contacts_c, dfin_detallefinanciero_cstm, 
                                               dfin_detallefinanciero where contacts.id=dfin_detallefinanciero_contacts_c.dfin_detallefinanciero_contactscontacts_ida 
                                               and dfin_detallefinanciero_contacts_c.dfin_detallefinanciero_contactsdfin_detallefinanciero_idb=dfin_detallefinanciero_cstm.id_c
                                               and dfin_detallefinanciero.id= dfin_detallefinanciero_cstm.id_c and 
                                              contacts.id ='{$identificador1}'
                                               order by uc_fechapagodetalle_c desc");
				while ($row = mysqli_fetch_array($result)) {

					/*Inicia Sección Contenedor General*/
					echo '<div style="position:relative; border: 1px solid gray;width:750px;height:700px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:-6px -8px 9px 0px gray;">';
					/*Inicia Sección de Resumen Financiero*/
					echo '<div style="position:absolute; top:60px;margin-left:5px; border: 1px solid gray;width:700px;height:250px;border-radius: 10px;padding:20px 20px 20px 20px;box-shadow:7px 7px 5px 0px gray;">';
					echo '<span style="position:relative;top:-20px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Resumen Financiero</span>';
					echo '<div style="position:absolute;left:-30px;text-align:right;font-type:Arial;font-size:14px; width:200px; color:black;top:64px;">';
					echo '<span style="position:absolute; top:-95px; left:50px;font-weight:bold">Nombre:</span>';
					echo '<br><br>';
					echo 'Saldo Cubierto:';
					echo '<br><br>';
					echo 'Referencia:';
					echo '<br><br>';
					echo 'Fecha de Último Pago:';
					echo '</div>';
					echo '<div style="position:relative;left:160px;text-align:left;font-type:Arial;font-size:14px; width:200; color:gray;top:25px;">';
					echo '<span style="position:absolute; top:-95px;left:-90px;">';
					echo utf8_encode($row['first_name']);
					echo ' ';
					echo utf8_encode($row['last_name']);
					echo '</span>';
					echo "<br><br>";
					echo utf8_encode($row['uc_saldocubierto_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_referencia_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_fechaultpago_c']);
					echo "</div>";
					echo '<div style="position:absolute;top:10px;left:380px;text-align:right;font-type:Arial;font-size:14px; width:150px; color:black;">';
					echo '<span style="position:absolute; top:-40px;left:75px;">Matrícula:</span>';
					echo '<br><br>';
					echo 'Saldo Licenciatura:';
					echo '<br><br>';
					echo 'Descuento Total:';
					echo '<br><br>';
					echo 'Beca Académica:';
					echo '<br><br>';
					echo 'Días de Atraso:';
					echo '<br><br>';
					echo 'Estado Mora:';
					echo '<br><br>';
					echo 'Pagos Pendientes:';
					echo '</div>';
					echo '<div style="position:absolute;left:550px;text-align:left;font-type:Arial;font-size:14px; width:100; color:gray;top:10px;">';
					echo '<span style="position:absolute; top:-40px;left:0px;">';
					echo utf8_encode($row['uc_matricula_c']);
					echo '</span>';
					echo "<br><br>";
					echo utf8_encode($row['uc_saldolicenciatura_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_porcdescbeca_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_beca_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_diasatraso_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_estadomora_c']);
					echo "<br><br>";
					echo utf8_encode($row['uc_pagospendientes_c']);
					echo '</div>';

					/*Termina Sección Resumen Financiero*/

					echo "</div>";
					/*Termina Sección Contenedor General*/

				}

				echo '<span style="position:relative;left:25px;top:370px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Licenciaturas</span>';
				echo '<table cellspacing=20 style="position:relative;padding-bottom:2px;left:10px;top:350px;font-size:10px;text-align:center;border:1px solid green;border-radius: 10px;padding:5px 5px 5px 5px;box-shadow:-6px -8px 9px 0px gray;">
<tr>
<th>Clave</th>
<th>Descripción</th>
<th>Fecha</th>
<th>Cargo</th>
<th>Abono</th>
<th>Saldo</th>
</tr>';

				while ($row2 = mysqli_fetch_array($result2)) {
					if ((($row2['uc_concepto'])) == 'Orden') {
						echo "<tr>";
						echo '<td><a target="_new" href="http://localhost/sugar/ordenes.php?id=';
						echo utf8_encode($row2['name']);
						echo '">';
						echo utf8_encode($row2['uc_concepto']);
						echo " ";
						echo utf8_encode($row2['name']);
						echo "</a></td>";
						echo "<td>" . utf8_encode($row2['uc_descripcion_c']) . "</td>";
						echo "<td>" . utf8_encode($row2['uc_fechapagodetalle_c']) . "</td>";
						echo "<td>" . utf8_encode($row2['uc_cargo_c']) . "</td>";
						echo "<td>" . utf8_encode($row2['uc_abono_c']) . "</td>";
						echo "<td>" . utf8_encode($row2['uc_saldo_c']) . "</td>";
						echo '</tr>';

					} else {
						echo "<tr>";
						echo "<td>".utf8_encode($row2['uc_concepto']). " ".utf8_encode($row2['name']);
						echo "<td>" . utf8_encode($row2['uc_descripcion_c']) . "</td>";
						echo "<td>" . utf8_encode($row2['uc_fechapagodetalle_c']) . "</td>";
						echo "<td>" . utf8_encode($row2['uc_cargo_c']) . "</td>";
						echo "<td>" . utf8_encode($row2['uc_abono_c']) . "</td>";
						echo "<td>" . utf8_encode($row2['uc_saldo_c']) . "</td>";
						echo '</tr>';
					}

				}

				echo '</table>';
				/*Línea para desplegar el valor del Id, Sirve para ver que el parámetro que se está*/
				/*enviando desde el URL esté pasando de manera correcta*/
				/*echo "<strong>Id:$identificador1</strong>";*/

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
