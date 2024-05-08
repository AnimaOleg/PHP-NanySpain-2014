<html><head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="estilo_conectar.css"/>
</head>
<body>
<div class="conectar">
	<h3>Trabajos</h3>
	<?php
	$mysql_usuario = "oleg";
	$mysql_password = "olegario";
	$mysql_host = "localhost";
	$mysql_database = "nanyspain";
	
	$conexion = mysql_connect($mysql_host, $mysql_usuario, $mysql_password, true);
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db($mysql_database, $conexion) || die('No pudo conectarse: '.mysql_error());
	
	//DNI DEL USUARIO_SESION
	$consulta0 = "select * from usuarios where usuario like '".$_SESSION['username']."'";
	$usuario = mysql_query($consulta0, $conexion) or die(mysql_error());
	$filaUsuario = mysql_fetch_assoc($usuario);
	$dniUsuario=$filaUsuario['dni'];
	
	if(mysql_num_rows($usuario) == 1){
		//PARA ESE USUARIO MIRAMOS QUE USUARIOS TIENE CONTRATADOS
		//DNI DEL USUARIO CONTRATADO
		$consulta = "SELECT * FROM conectar where dni1 ='".$dniUsuario."'";
		$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
		
		if(mysql_num_rows($resultado) >= 1){
			while($fila = mysql_fetch_assoc($resultado)){
				$dniUsuario2 = $fila['dni2'];
				
				//COMPROBAMOS EL USUARIO QUE TIENE CONTRATADO
				$consulta1 = "select * from usuarios where dni like '".$dniUsuario2."'";
				$usuario1 = mysql_query($consulta1, $conexion) or die(mysql_error());
				
				if(mysql_num_rows($usuario1) >= 1){
					//COGEMOS DATOS DEL USUARIO CONTRATADO
					while($filaUsuario1 = mysql_fetch_assoc($usuario1)){
						$fecha = explode("-", $fila['dia']);
						$hora =  explode(":", $fila['hora']);
						$dur = explode(":", $fila['tiempoTotal']);
						
						$div2 = "<div class='conectado'><form method='post' type='submit' action='funciones.php'>";
						$div2 .= "<label class='conectar_nombre'>".$filaUsuario1['nombre']." ".$filaUsuario1['apellidos'].", ".$filaUsuario1['tipoUsuario']."</label><br>";
						$div2 .= "<img src='clientes/".$filaUsuario1['tipoUsuario']."/".$filaUsuario1['foto']."'/><br>";
						
						$div2 .= "<label class='conectarTitulo'>FECHA</label><br>
						dia <input name='dia' class='conectarInput' value='".$fecha[2]."' size='1'/>
						mes <input name='mes' class='conectarInput' value='".$fecha[1]."' size='1'/>
						año <input name='anyo' class='conectarInput' value='".$fecha[0]."' size='3'/><br>";
						
						$div2 .= "<label class='conectarTitulo'>HORA</label><br>
						hora <input name='hora' class='conectarInput' value='".$hora[0]."' size='1'/>
						min <input name='minutos' class='conectarInput' value='".$hora[1]."' size='1'><br>";
						
						$div2 .= "<label class='conectarTitulo'>DURACIÓN</label><br>
						hora <input name='horaTotal' class='conectarInput' value='".$dur[0]."' size='1'/>
						min <input name='minutosTotal' class='conectarInput' value='".$dur[1]."' size='1'/><br>";
						
						$div2 .= "<input type='submit' name='eliminar_conectar' value='Eliminar' class='botonLogin'/>";
						$div2 .= "<input type='text' name='usuario_sesion' value='".$_SESSION['username']."' hidden/>";
						$div2 .= "<input type='text' name='usuario_conectado' value='".$filaUsuario1['usuario']."' hidden/>";
						$div2 .= "<input type='submit' name='guardar_conectar' value='Guardar' class='botonLogin'/><br>";
						$div2 .= "</form>";
						$div2 .= "</div>";
						echo $div2;
					}
				}
			}
		}else{
			echo "<br>No hay ningun registro<br>";
		}
	}else{
		echo "<br>No hay ningun registro para este usuario<br>";
	}
	mysql_close($conexion);
	?>
</div>
</body></html>