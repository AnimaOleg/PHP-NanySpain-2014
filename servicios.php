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
				
				<div class="head_shader">
					<div class="ruta"><a href="index.php">NanySpain</a> >> Servicios</div>
				</div>
			</div>
			
			<div class="contenido_principal">
				<div class="indice">
					<p class="paragrafo">
						Miles de personas de todas las edades buscan trabajo, y otras necesitan confiar en el cuidado de sus familiares, porque saben que nuestra eficacia está más que contrastada.
					</p>
					<div class="escalon">
						<label class="servicios">- Servicios de inscripción como Cuidador.</label>
						<br>
						<label class="servicios">- Servicios de cuidado a niños.</label>
						<br>
						<label class="servicios">- Servicios de cuidado a ancianos.</label>
						<br>
						<label class="servicios">- Totalmente gratuito, con todos los datos de contacto.</label>
					</div>
					
					<div class="escalon2">
						<img src="img/qualiR.jpg"></img>
						<img src="img/OCA ISO 9001 ENAC BAIXA.jpg"></img>
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