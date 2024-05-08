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
					<div class="ruta"><a href="index.php">NanySpain</a> >> Cuidadores</div>
				</div>
			</div>
			
			<div class="contenido_principal">
				<div class="indice">
				
					<?php if(isset($_SESSION['logged'])){
						include 'conectar.php';
					}	?>
					
					<div class="elemento">
						<p>Buscar por Disponibilidad<p>
						<form method="post" action="serv_cuidadores.php" class="form">
							<label><input type="radio" name="busquedaRadio" value="lunes_viernes">Lunes a Viernes</input></label><br>
							<label><input type="radio" name="busquedaRadio" value="vie_sab_dom">Viernes,Sabado y Domingo</input></label><br>
							<label><input type="radio" name="busquedaRadio" value="toda_semana">Toda la semana</input></label><br>
							<label><input type="radio" name="busquedaRadio" value="manianas">Mañanas</input></label><br>
							<label><input type="radio" name="busquedaRadio" value="tardes">Tardes</input></label><br>
							<label><input type="radio" name="busquedaRadio" value="noches">Noches</input></label><br>
							<input type="submit" name="busqueda" value="busqueda" class="botonLogin"></input>
						</form>
					</div>
					
					<?php include 'mostrar_cuidadores.php'; ?>
						
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
