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
					<div class="ruta"><a href="index.php">NanySpain</a> >> <a href="<?php echo "serv_".$_GET["tipo"].".php";?>"><?php echo $_GET["tipo"] ?></a> >> Perfil</div>
				</div>
			</div>
			
			<div class="contenido_principal">
				<div class="indice">
					<div class="escalon">
						<?php include 'mostrar_perfil.php';?>
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


<?php
/*
 $sql = "SELECT u.usuario, u.contrasena, u.idcliente, c.nombre cliente " .
    " FROM usuario u, cliente c ".
    " WHERE c.id=u.idcliente and usuario='" . $txtusuario . "'";
  $sqlResultado = mysql_query($sql);
  $row = mysql_fetch_array($sqlResultado);
  $contrasena = $row["contrasena"];
  $idcliente = $row["idcliente"];				
				
   if ($contrasena == md5($txtcontrasena))
   {				   
     //establecermos las variables de sesión
     $_SESSION["nombre_usuario"] = $row["usuario"];
	  $_SESSION["nombre_cliente"] = $row["cliente"];
  }
  */
?>