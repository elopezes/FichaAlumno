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
				<h2>Órdenes</h2>
			</hgroup>
		</header>

		<article>
			<section>
				<!--Inicia Sección del Logo UTEL -->
				<div class="logo"></div>

				<!--Termina Sección del logo UTEL -->

				<?php
				$url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
				echo '<br><br><br><br>';
				/*echo "<strong>$url_actual</strong>";*/
				$identificador1 = ($_GET['id']);

				$con = mysqli_connect("localhost", "root", "", "sugar");

				// Check connection
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$result = mysqli_query($con, "SELECT * 
				                              FROM dfin_detallefinanciero, dfin_detallefinanciero_contacts_c,
				                              ord01_ordenes_dfin_detallefinanciero_c, ord01_ordenes 
				                              WHERE dfin_detallefinanciero.id=dfin_detallefinanciero_contacts_c.dfin_detallefinanciero_contactsdfin_detallefinanciero_idb and
				                              dfin_detallefinanciero_contacts_c.dfin_detallefinanciero_contactsdfin_detallefinanciero_idb=ord01_ordenes_dfin_detallefinanciero_c.ord01_ordenes_dfin_detallefinancierodfin_detallefinanciero_ida
				                              and ord01_ordenes_dfin_detallefinanciero_c.ord01_ordenes_dfin_detallefinancieroord01_ordenes_idb=ord01_ordenes.id and
				                              ord01_ordenes.name ='{$identificador1}'");

				$result1 = mysqli_query($con, "SELECT * 
				                            FROM ord01_ordenes, cupbe_cuponesybecas_ord01_ordenes_c, 
				                            cupbe_cuponesybecas WHERE ord01_ordenes.id=cupbe_cuponesybecas_ord01_ordenes_c.cupbe_cuponesybecas_ord01_ordenesord01_ordenes_ida and
				                            cupbe_cuponesybecas_ord01_ordenescupbe_cuponesybecas_idb=cupbe_cuponesybecas.id and
				                            cupbe_cuponesybecas.name ='{$identificador1}'");

				$result2 = mysqli_query($con, "SELECT * 
				                              FROM ord01_ordenes, ord01_ordenes_contacts_c, pag01_pagos_ord01_ordenes_c, pag01_pagos 
				                              WHERE ord01_ordenes.id=ord01_ordenes_contacts_c.ord01_ordenes_contactsord01_ordenes_idb and 
				                              ord01_ordenes_contacts_c.ord01_ordenes_contactsord01_ordenes_idb=pag01_pagos_ord01_ordenes_c.pag01_pagos_ord01_ordenesord01_ordenes_ida and 
				                              pag01_pagos_ord01_ordenes_c.pag01_pagos_ord01_ordenespag01_pagos_idb=pag01_pagos.id and
				                              pag01_pagos.name='{$identificador1}' order by uc_descripcionpago");

				echo '<span style="position:relative;left:15px;top:-10px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Órdenes</span>';
				echo '<table cellspacing=20 style="position:relative;padding-bottom:2px;left:10px;top:10px;font-size:10px;text-align:center;border:1px solid green;border-radius: 10px;padding:5px 5px 5px 5px;box-shadow:-6px -8px 9px 0px gray;">
<tr>
<th>No. Orden</th>
<th>Ciclo</th>
<th>Fecha Orden</th>
<th>Inscripción</th>
<th>Estado</th>
<th>Opción de Pago</th>
<th>Total</th>
</tr>';

				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . utf8_encode($row['name']) . "</td>";
					echo "<td>" . utf8_encode($row['uc_ciclo']) . "</td>";
					echo "<td>" . utf8_encode($row['uc_fechaorden']) . "</td>";
					echo "<td>" . utf8_encode($row['uc_inscripcion']) . "</td>";
					echo "<td>" . utf8_encode($row['uc_estado']) . "</td>";
					echo "<td>" . utf8_encode($row['uc_opcionpago']) . "</td>";
					echo "<td>" . utf8_encode($row['uc_total']) . "</td>";
					echo '</tr>';
				}

				echo '</table>';
				echo '<span style="position:relative;left:15px;top:25px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Cupones y Becas</span>';
				echo '<table cellspacing=20 style="position:relative;padding-bottom:2px;left:10px;top:50px;font-size:10px;text-align:center;border:1px solid green;border-radius: 10px;padding:5px 150px 5px 150px;box-shadow:-6px -8px 9px 0px gray;">
<tr>
<th>No. Orden</th>
<th>Clave</th>
<th>% Real Aplicado</th>
<th>Fecha Aplicación</th>
</tr>';

				while ($row1 = mysqli_fetch_array($result1)) {
					echo "<tr>";
					echo "<td>" . utf8_encode($row1['name']) . "</td>";
					echo "<td>" . utf8_encode($row1['uc_clavecupon']) . "</td>";
					echo "<td>" . utf8_encode($row1['uc_porccupon']) . "</td>";
					echo "<td>" . utf8_encode($row1['uc_fechaaplicacion']) . "</td>";
					echo '</tr>';
				}

				echo '</table>';

				echo '<span style="position:relative;left:15px;top:60px;font-type:Verdana; font-size:16px; color:black; font-weight:bold;">Pagos</span>';
				echo '<table cellspacing=20 style="position:relative;padding-bottom:2px;left:10px;top:80px;font-size:10px;text-align:center;border:1px solid green;border-radius: 10px;padding:5px 100px 5px 100px;box-shadow:-6px -8px 9px 0px gray;">
<tr>
<th>Descripción</th>
<th>Fecha Límite Pago</th>
<th>Total</th>
<th>Pagado</th>
<th>Saldo</th>
<th>Referencia</th>
</tr>';
				while ($row2 = mysqli_fetch_array($result2)) {
					echo "<tr>";
					echo "<td>" . utf8_encode($row2['uc_descripcionpago']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_fechalimitepago']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_totalpago']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_pagado']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_saldo']) . "</td>";
					echo "<td>" . utf8_encode($row2['uc_referencia']) . "</td>";
					echo '</tr>';
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
				<!--Edgar A López Estrada. Todos los Derechos Reservados.-->
			</p>
		</footer>

	</body>
</html>
