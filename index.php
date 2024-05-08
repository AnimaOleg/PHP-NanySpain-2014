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
						<span class="lin_inv">¿A QUÉ ESPERAS?</span>
					</div>
					<div class="portada">
						<br>
						<img src="img/niña.jpg" class="imgIndex"></img>
						<img src="img/niñas.jpg" class="imgIndex"></img>
						<br>
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