<?php
	$conexion = mysql_connect("localhost", "oleg", "olegario", true);
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db("nanyspain", $conexion) || die('No pudo conectarse: '.mysql_error());

	if(isset($_POST['busqueda']) && isset($_POST['busquedaRadio']) != null){
		echo $_POST['busquedaRadio'];
		
		switch($_POST['busquedaRadio']){
			case 'lunes_viernes':
				$consulta1="select dni_usuario from disponibilidad where lunes_viernes='1'";
				$queRadio="lunes_viernes";
				break;
			case 'vie_sab_dom':
				$consulta1="select dni_usuario from disponibilidad where vie_sab_dom='1'";
				$queRadio="vie_sab_dom";
				break;
			case 'toda_semana':
				$consulta1="select dni_usuario from disponibilidad where toda_semana='1'";
				$queRadio="toda_semana";
				break;
			case 'manianas':
				$consulta1="select dni_usuario from disponibilidad where manianas='1'";
				$queRadio="manianas";
				break;
			case 'tardes':
				$consulta1="select dni_usuario from disponibilidad where tardes='1'";
				$queRadio="tardes";
				break;
			case 'noches':
				$consulta1="select dni_usuario from disponibilidad where noches='1'";
				$queRadio="noches";
				break;
			default:
				$queRadio="ninguno";
				$consulta1 = "SELECT * FROM usuarios where tipoUsuario='cuidadores'";
				break;
		}
		$resultado = mysql_query($consulta1, $conexion) or die(mysql_error());
		
		while($fila = mysql_fetch_assoc($resultado)){
			$consulta2= "select * from usuarios where dni='".$fila['dni_usuario']."' and tipoUsuario='cuidadores'";
			$resultado2 = mysql_query($consulta2, $conexion) or die(mysql_error());
			$disponibilidad="";
			
			//$fila2 = mysql_fetch_assoc($resultado2);
			while($fila2=mysql_fetch_assoc($resultado2)){
				$div = "<a href='serv_perfil.php?perfil=".$fila2["idusuario"]."&tipo=".$fila2["tipoUsuario"]."'>";
				$div .= "<div class='elemento'>";
				$div .= "<img src='./clientes/".$fila2["tipoUsuario"]."/".$fila2["foto"]."'></img>";
				$div .= "<span class='informacion0'>".$fila2["nombre"]." ".$fila2["apellidos"]."</span><br>";
				$div .= "<span class='informacion1'><br> ".$fila2["pueblo"].", ".$fila2["provincia"]."</span>";
				$div .= "<p>".$fila2["descripcion"]."</p>";
				$div .= "<span class='informacion2'>".$fila2["precio"]."</span> | ";
				$div .= "<span class='informacion2'>".$fila2["experiencia"]."</span> | ";
				$div .= "<span class='informacion2'>".$fila2["edad"]."</span>";
				
				
				if(isset($_SESSION['logged'])){
					$consulta2 = "SELECT tipoUsuario FROM usuarios where usuario='".$_SESSION['username']."'";
					$resultado2 = mysql_query($consulta2, $conexion);
					$fila2 = mysql_fetch_assoc($resultado2);
					if($fila2['tipoUsuario'] != "cuidadores"){
						$div .= "<form action='funciones.php' method='post'>
						<input type='submit' name='conectar' value='Conectar' class='botonLogin'></input>
						<input type='text' name='usuarioConectado' value='".$fila['usuario']."' hidden/></form>";
					}
				}
				
				$div .= "</div></a>";
				echo $div;
			}
		}
	}else{	
		$mysql_usuario = "oleg";
		$mysql_password = "olegario";
		$mysql_host = "localhost";
		$mysql_database = "nanyspain";
		
		$consulta = "SELECT * FROM usuarios where tipoUsuario='cuidadores'";
		$resultado = mysql_query($consulta, $conexion) or die(mysql_error());
		
		while($fila = mysql_fetch_assoc($resultado)){
			$dni_usu = $fila['dni'];
			$consulta2= "select * from disponibilidad where dni_usuario='".$dni_usu."'";
			$resultado2 = mysql_query($consulta2, $conexion) or die(mysql_error());
			$disponibilidad="";
			
			$fila2 = mysql_fetch_assoc($resultado2);
			
			if($fila2['lunes_viernes']==true){
				$disponibilidad .= "lunes y viernes || ";
			}
			if($fila2['vie_sab_dom']){
				$disponibilidad .= "viernes, sabado y domingo || ";
			}
			if($fila2['toda_semana']){
				$disponibilidad .= "toda la semana || ";
			}
			if($fila2['manianas']){
				$disponibilidad .= "mañanas || ";
			}
			if($fila2['tardes']){
				$disponibilidad .= "tardes || ";
			}
			if($fila2['noches']){
				$disponibilidad .= "noches || ";
			}
				
			$div = "<a href='serv_perfil.php?perfil=".$fila["idusuario"]."&tipo=".$fila["tipoUsuario"]."'>";
			$div .= "<div class='elemento'>";
			$div .= "<img src='clientes/".$fila["tipoUsuario"]."/".$fila["foto"]."'></img>";
			$div .= "<span class='informacion0'>".$fila["nombre"]." ".$fila["apellidos"]."</span><br>";
			$div .= "<span class='informacion1'>".$disponibilidad." <br> ".$fila["pueblo"].", ".$fila["provincia"]."</span>";
			$div .= "<p>".$fila["descripcion"]."</p>";
			$div .= "<span class='informacion2'>".$fila["precio"]."</span> | ";
			$div .= "<span class='informacion2'>".$fila["experiencia"]."</span> | ";
			$div .= "<span class='informacion2'>".$fila["edad"]."</span>";
			
			if(isset($_SESSION['logged'])){
				$consulta2 = "SELECT tipoUsuario FROM usuarios where usuario='".$_SESSION['username']."'";
				$resultado2 = mysql_query($consulta2, $conexion);
				$fila2 = mysql_fetch_assoc($resultado2);
				if($fila2['tipoUsuario'] != "cuidadores"){
					$div .= "<form action='funciones.php' method='post'><input type='submit' name='conectar' value='Conectar' class='botonLogin'></input><input type='text' name='usuarioConectado' value='".$fila['usuario']."' hidden/></form>";
				}
			}
			
			$div .= "</div></a>";
			echo $div;
		}
	}mysql_close($conexion);
?>