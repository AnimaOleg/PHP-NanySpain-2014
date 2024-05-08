<?php
	/* By http://php-estudios.blogspot.com */
	
	//Se establece la conexión a la base de datos.
	$mysql_usuario = "oleg";
	$mysql_password = "olegario";
	$mysql_host = "localhost";
	$mysql_database = "nanyspain";
	
	$conexion = mysql_connect($mysql_host, $mysql_usuario, $mysql_password, true);
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db($mysql_database, $conexion) || die('No pudo conectarse: '.mysql_error());
	
	//Preparar la consulta
	$consulta = "SELECT * FROM usuarios where idusuario='".$_GET['perfil']."'";
	//Ejecutar la consulta
	$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
	
	//Extraer fila a fila con un búcle while
	while($fila = mysql_fetch_assoc($resultado)){
		$div = "<div class='elemento'>";
		$div .= "<img src='clientes/".$_GET["tipo"]."/".$fila["foto"]."'></img>";
		$div .= "<span class='informacion0'>".$fila["nombre"]." ".$fila["apellidos"]."</span><br>";
		$div .= "<span class='informacion1'>".$fila["disponibilidad"]." - ".$fila["pueblo"].", ".$fila["provincia"]."</span>";
		$div .= "<p>".$fila["descripcion"]."</p>";
		$div .= "<span class='informacion2'>".$fila["precio"]."</span> | ";
		$div .= "<span class='informacion2'>".$fila["experiencia"]."</span> | ";
		$div .= "<span class='informacion2'>".$fila["edad"]."</span>";
		$div .= "</div>";
		//Se muestra la div con los resultados de la consulta
		echo $div;
	}
	//Cerrar la conexión
	mysql_close($conexion);
	
?>