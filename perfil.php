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
					<?php
						$conexion = mysql_connect("localhost", "oleg", "olegario", true);
						mysql_query("SET NAMES 'utf8'");
						mysql_select_db("nanyspain", $conexion) || die('No pudo conectarse: '.mysql_error());
						
						$consulta0 = "select * from usuarios where usuario = '".$_SESSION['username']."'";
						$resultado = mysql_query($consulta0, $conexion) or die(mysql_error());
						$fila = mysql_fetch_assoc($resultado);
						
						echo "<form action='./../../funciones.php' method='post'>
								<label class='fromLabel'>Contraseña</label>
									 <input type='text' value='".$fila['password']."' name='password' class='formulario'/>
								<label class='fromLabel'>Nombre</label>
									<input type='text' value='".$fila['nombre']."' name='nombre' class='formulario'/>
								<label class='fromLabel'>Apellidos</label>
									<input type='text' value='".$fila['apellidos']."' name='apellidos' class='formulario'/>
								<label class='fromLabel'>Nacimiento</label>
									<input type='text' value='".$fila['nacimiento']."' name='nacimiento' class='formulario'/>
								<label class='fromLabel'>Dirección</label>
									<input type='text' value='".$fila['direccion']."' name='direccion' class='formulario'/>
								<label class='fromLabel'>Teléfono</label>
									<input type='text' value='".$fila['telefono']."' name='telefono' class='formulario'/>
								<label class='fromLabel'>Precio</label>
									<input type='text' value='".$fila['precio']."' name='precio' class='formulario' />
								<label class='fromLabel'>Experiéncia</label>
									<input type='text' value='".$fila['experiencia']."' name='experiencia' class='formulario'/>
								<label class='fromLabel'>Edad</label>
									<input type='text' value='".$fila['edad']."' name='edad' class='formulario' />
								<label class='fromLabel'>Descripción</label><br>
									<textarea type='text' class='formulario1' name='descripcion' cols='48' rows='3' maxlength='255'>".$fila['descripcion']."</textarea><br>
								<label class='fromLabel'></label>
									CodPostal <input type='text' value='".$fila['codPostal']."' name='codPostal' class='formulario'/>
								<label class='fromLabel'>Provincia</label>
									<input type='text' value='".$fila['provincia']."' name='provincia' class='formulario'/>
								<label class='fromLabel'>Pueblo</label>
									<input type='text' value='".$fila['pueblo']."' name='pueblo' class='formulario'/>
								<label class='fromLabel'>Tipo de Usuario</label>
									<input type='text' value='".$fila['tipoUsuario']."' name='tipoUsuario' class='formulario' disabled/>
								<input type='submit' name='guardarPerfil' value='Guardar Datos' class='botonLogin'/>
							</form>";
						mysql_close($conexion); ?>
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