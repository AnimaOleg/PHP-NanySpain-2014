<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES"><head>
		<title>Index</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
		<link rel="stylesheet" type="text/css" href="estilo_menu.css"/>
		<link rel="stylesheet" type="text/css" href="estilo_iframe_reg.css"/></head>
	<body>
		<div class="contenedor">
			<div class="cabecera">
				<div class="head_shader">
					<?php include 'loguin.php'; ?>
				</div>

				<div class="cabeza">
					<?php include 'menu.php'; ?>
				</div>
				
				<div class="head_shader"></div>
			</div>
			
			<div class="contenido_principal">
				<div class="indice">
					<div class="escalon">
						<h3>Error en el loguin</h3>
						<form action="funciones.php" method="post">
							Nombre de Usuario <input type="text" name="username" class="log" required>
							<br>
							Password <input type="password" name="password" class="log" required>
							<br>
							<br>
							<input type="submit" name="loguin" value="loguin">
							<input type="button" value="registro" class="log_bot" onclick="window.location='registro.php';"></input>
						</form>
					</div>
					<div class="escalon">
						<form action="funciones.php" method="post">
							Tu Usuario <input type="password" name="password" class="log" required>
							<br>
							Tu e-Mail <input type="text" name="email" class="log" required>
							<br>
							<br>
							<input type="submit" name="recoverPASS" value="recuperar contraseña">
						</form>
					</div>
				</div>
			</div>
			
			<div class="pie">
				<div class="head_shader"></div>
					<br>
					<div class="pie_contenido">Developed by Oleg T. © 2013</div>
					<br>
				<div class="head_shader"></div>
			</div>
		</div>
	</body>
</html>
