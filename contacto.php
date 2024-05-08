<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES"><head>
		<title>Index</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
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
				
				<div class="head_shader">
					<div class="ruta"><a href="index.php">NanySpain</a> >> Contacto</div>
				</div>
			</div>
			
			<div class="contenido_principal">
				<div class="indice">
					<p class="paragrafo">
						Contacte con nosotros, aporte ideas y sugerencias.
					</p>
					<div class="escalon">
						<div class="contactoDatos">
							<h3>Nany Spain</h3>
							Fax 962480232<br>
							Teléfono 669241551<br>
							Algemesí, Valencia<br>
							contacto@grupoinggenio.es
						</div>
						<img src="img/edificio.jpg" class="fotoEscalon"></img>
					</div>
					<div class="escalon">
						<div class="contactoDatos">
							<h3>Nany Spain Asistencia</h3>
							Teléfono 601241111<br>
							Algemesí, Valencia<br>
							soporte@grupoinggenio.es
						</div>
						<img src="img/soporte.jpg"  class="fotoEscalon"></img>
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