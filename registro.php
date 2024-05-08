<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES"><head>
		<title>Index</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
		<link rel="stylesheet" type="text/css" href="estilo_menu.css"/>
		<link rel="stylesheet" type="text/css" href="estilo_iframe_reg.css"/>
</head>
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
			<div class="ruta"><a href="index.php">NanySpain</a> >> Registro</div>
		</div>
	</div>
	
	<div class="contenido_principal">
		<div class="indice">
			<form name="form" method="post" action="funciones.php" class="registro" enctype="multipart/form-data">
				<h2 class="join-free">Entra gratis para ver mas sobre Veronica.</h2>
				<div class="get-started">Registrate ahora mismo! Es rapidisimo.</div>
					
				<label for="reasonToEnroll" class="fromLabel">¿Qué te gustaria hacer?</label>
				<div class="btn-group">
					<input type="radio" id="radio1" name="tipoUsuario" value="cuidadores" checked>
					   <label for="radio1">Registrarse como Cuidador</label>
					<input type="radio" id="radio2" name="tipoUsuario"value="ninos">
					   <label for="radio2">Poner en cuidados a un Niño</label>
					<input type="radio" id="radio3" name="tipoUsuario" value="ancianos">
					   <label for="radio3">Poner en cuidados a un Anciano</label>
				</div>
				
				
				<label class="fromLabel">Usuario</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="Alex" class="formulario" name="usuario" autofocus  value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['usuario_nombre'];}?>"/>
				<span class="error"><?php if(!empty($_SESSION['usuario_nombre']) && ($_SESSION['error_usuario'])==true){ echo "<span class='nonull'>Al menos 4 carácteres</span><br>";}?></span>
				<?php if(!empty($_SESSION['error_registro']) && ($_SESSION['existe_usuario'])==true){ echo "<span class='nonull'>Ese usuario ya existe</span><br>";}?>
				
				<label class="fromLabel">Contraseña</label>
				<span class="nonull">*</span>
				<input type="password" placeholder="******" class="formulario" name="password"  value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['password'];}?>"/>
				<?php if(!empty($_SESSION['password']) && ($_SESSION['error_password'])==true) echo "<span class='nonull'>Almenos a 6 carácteres</span><br>"; ?>
				
				<label class="fromLabel">Repetir Contraseña</label>
				<span class="nonull">*</span>
				<input type="password" placeholder="******" class="formulario" name="password2"  value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['password2'];}?>"/>
				<?php if(!empty($_SESSION['password2']) && ($_SESSION['error_password2'])==true) echo "<span class='nonull'>No coinciden las contraseñas</span><br>"; ?></span>
				
				
				
				<?php
					//enctype="multipart/form-data": es necesario para subir archivos, crea la forma que permite explorar en su búsqueda en el equipo local.
				?>
				<div class="uploadFile">
					<label class="fromLabel">Fotografia</label>
					<span class="nonull">* Max 200Kb</span>
					<br>
					<input type="hidden" name="MAX_FILE_SIZE" value="200000" />
					<input type="file" name="foto"/>
					<!--
					<input type="submit" value="Subir archivo" name="subirFoto"/>
					-->
				</div>
				
				
				
				<!-- Cambiando algo de las Sesiones de usuario, se me ha fastidiado la validacion del email -->
				<label class="fromLabel">E-mail</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="antonio.jose@gmail.com" class="formulario" name="email"  value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['email'];}?>"/>
				<?php if(!empty($_SESSION['email']) && ($_SESSION['error_email'])==true) echo "<span class='nonull'>email inválido</span><br>"; ?></span>
				
				<label class="fromLabel">Nombre</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="Alex" class="formulario" name="nombre"  value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['nombre'];}?>"/>
				<?php if(!empty($_SESSION['nombre']) && ($_SESSION['error_nombre'])==true) echo "<span class='nonull'>Almenos a 3 carácteres</span><br>"; ?>
				
				<label class="fromLabel">Apellidos</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="Tortajada Amoros" class="formulario" name="apellidos"  value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['apellidos'];}?>"/>
				<?php if(!empty($_SESSION['apellidos']) && ($_SESSION['error_apellidos'])==true) echo "<span class='nonull'>Almenos 3 carácteres</span><br>"; ?>
				
				
				<label class="fromLabel">Nacimiento</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="01-01-1990" class="formulario" name="nacimiento"  value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['nacimiento'];}?>"/>
				<?php if(!empty($_SESSION['nacimiento']) && ($_SESSION['error_nacimiento'])==true) echo "<span class='nonull'>nacimiento mal escrito</span><br>"; ?>
			
				
				<label class="fromLabel">Direccion</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="Escribe tu dirección" class="formulario" name="direccion"  value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['direccion'];}?>"/>
				<?php if(!empty($_SESSION['direccion']) && ($_SESSION['error_direccion'])==true) echo "<span class='nonull'>direccion incompleta</span><br>"; ?>
				
				
				<label class="fromLabel">DNI</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="73009954N" class="formulario" name="dni"  maxlength="9" value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['dni'];}?>"/>
				<?php if(!empty($_SESSION['dni']) && ($_SESSION['error_dni'])==true) echo "<span class='nonull'>DNI erroneo, 8 dígitos y una letra</span>"; ?>
				<?php if(!empty($_SESSION['error_registro']) && ($_SESSION['existe_dni'])==true) echo "<span class='nonull'>Ya está registrado ese dni</span><br>"; ?>
				
				<label class="fromLabel">Teléfono</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="669241551" class="formulario" name="telefono"  maxlength="9" value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['telefono'];}?>"/>
				<?php if(!empty($_SESSION['telefono']) && ($_SESSION['error_telefono'])==true) echo "<span class='nonull'>teléfono con 9 dígitos</span><br>"; ?>
				
				
				<label class="fromLabel">Precio</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="5€/hora" class="formulario" name="precio"  maxlength="10" value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['precio'];}?>"/>
				<?php if(!empty($_SESSION['precio']) && ($_SESSION['error_precio'])==true) echo "<span class='nonull'>max 10 carácteres</span><br>"; ?>
				
				
				<label class="fromLabel">Experiencia</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="¿cuaál es tu experiencia?¿cuánto tiempo?" class="formulario" name="experiencia"  maxlength="15" value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['experiencia'];}?>"/>
				<?php if(!empty($_SESSION['experiencia']) && ($_SESSION['error_experiencia'])==true) echo "<span class='nonull'>máximo 15 carácteres</span><br>"; ?>
				
				
				<label class="fromLabel">Edad</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="28 años" class="formulario" name="edad"  maxlength="7" value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['edad'];}?>"/>
				<?php if(!empty($_SESSION['edad']) && ($_SESSION['error_edad'])==true) echo "<span class='nonull'>máximo 7 carácteres</span><br>"; ?>
				
				
				<label class="fromLabel">Disponibilidad</label><br>
				<input type="checkbox" name="lunes_viernes" value="1">Lunes a Viernes<br>
				<input type="checkbox" name="fines" value="1">Viernes,Sabado y Domingo<br>
				<input type="checkbox" name="toda_semana" value="1">Toda la semana<br>
				<input type="checkbox" name="manianas" value="1">Mañanas<br>
				<input type="checkbox" name="tardes" value="1">Tardes<br>
				<input type="checkbox" name="noches" value="1">Noches<br>
				
				<label class="fromLabel">Descripcion</label>
				<span class="nonull">*</span>
				<textarea type="text" placeholder="Escribe aquí tu descripción" class="formulario1" name="descripcion"  cols="47" rows="2" maxlength="255" value="<?php if(!empty($_SESSION['error_registro']) && $_SESSION['error_registro']==true){ echo $_SESSION['descripcion'];}?>"></textarea>
				<?php if(!empty($_SESSION['descripcion']) && ($_SESSION['error_descripcion'])==true) echo "<span class='nonull'>máximo 150 carácteres</span><br>"; ?>
				<br>
				
				<label class="fromLabel">Provincia</label>
				<span class="nonull">*</span>
				<select id="provincia" name="provincia" >
					<option value='' selected>- Seleccione - </option>
					<?php
						$consulta="select distinct provincia from provincias";
						$conexion = mysql_connect("localhost","oleg","olegario") or die ("Fallo en el establecimiento de la conexión");
						mysql_select_db("nanyspain", $conexion) or die("Error en la selección de la base de datos");
						mysql_query("SET NAMES 'utf8'");
						$result = mysql_query($consulta, $conexion) or die("Error en la consulta SQL: ".mysql_error());
						
						while($fila=mysql_fetch_array($result)){
								echo '<option value="'.$fila["provincia"].'">'.$fila["provincia"].'</option>';
						}mysql_close($conexion);
					?>
				</select>
				
				<br>
				
				<label class="fromLabel">Ciudad</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="Algemesí" id="pueblo" name="pueblo" maxlength="15" class="formulario2"></input>
				
				<label class="fromLabel">C.P.</label>
				<span class="nonull">*</span>
				<input type="text" placeholder="46680" class="formulario2" name="codPostal" id="codPostal" maxlength="5"/>
				
				
				<div id="apply-job" class="apply-job-ct">
					<div class="form-group">
						<label for="sitterService" class="fromLabel">Soy</label>
						
						<select name="sitterService" class="form-control">
							<option selected="selected" value=""></option>
							<option value="babysitter">Babysitter</option>
							<option value="nanny">Nanny</option>
							<option value="familyCare">Child Care Center</option>
							<option value="familyCare">Family Child Care (In-Home Daycare)</option>
							<option value="specialNeeds">Special Needs Provider</option>
							<option value="tutoring">Tutor</option>
							<option value="tutoring">Private Lesson Instructor</option>
							<option value="seniorCare">Senior Care Provider</option>
							<option value="homeCare">Nurse</option>
							<option value="petCare">Pet Care Provider</option>
							<option value="housekeeping">Housekeeper</option>
							<option value="careGigs">Errands &amp; Odd Jobs Provider</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<input name="sitterServiceOther" maxlength="50" class="formulario" placeholder="Por favor, especifica" type="text" style="display:none"/>
				</div>
	
	
	
				
				<div class="form-group">
					<label for="howDidYouHearAboutUs" class="fromLabel">¿Cómo nos has conocido?</label>
					<select name="howDidYouHearAboutUs" class="form-control">
						<option selected="selected" value=""></option>
						<option value="webSearch">Buscador Web (Google, etc)</option>
						<option value="webSiteAd">Publicidad Web</option>
						<option value="billboard">Valla Publicitaria</option>
						<option value="transportAd">Publididad en transporte</option>
						<option value="TvAd">Anuncio TV</option>
						<option value="FriendsFamily">Amigos o Familiares</option>
						<option value="socialOnline">Comunidad Online(Facebook, Twitter, etc)</option>
						<option value="emailAd">Email</option>
						<option value="radioAd">Radio Ad</option>
						<option value="pressAd">Prensa (TV, Periodicos, Revistas, Blogs, etc.)</option>
						<option value="groupMember">Grupo de miembros</option>
						<option value="other">Otro</option>
					</select>
				</div>
	
				
				<div class="form-group">
					<input name="howDidYouHearAboutUsOther" maxlength="50" class="formulario" placeholder="Por favor,especifica" type="text" style="display:none"/>
				</div>
				
				
				
				
				
				<div class="legal-text">
					Clicando "Entrar ahora," estás de acuerdo con nuestros
					<br>
					<span><a href="terminos_de_uso.txt" class="link">Terminos de Uso</a></span>
					y
					<span><a href="politica_privacidad.html" class="link">Politica Privacidad</a></span>.
				</div>
				
				<div>
					<input type="submit" name="registrar" value="registrar" class="join-now-btn"/>
				</div>
			</form>
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
</body></html>