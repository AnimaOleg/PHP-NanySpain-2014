<meta http-equiv="Content-type" content="text/html;charset=utf-8"/>
<?php
	session_start();
	//Funcion para conectarse
	function connecta($consulta){
		$conexion = mysql_connect("localhost","oleg","olegario") or die ("Fallo en el establecimiento de la conexión");
		mysql_select_db("nanyspain", $conexion) or die("Error en la selección de la base de datos");
		$result = mysql_query ($consulta, $conexion) or die("Error en la consulta SQL CONECTA: ".mysql_error());
		return $result;
	}
	//Comprueba si ya existe el usuario o el dni
	function registra($consulta){
		$conexion = mysql_connect("localhost","oleg","olegario") or die ("Fallo en el establecimiento de la conexión");
		mysql_select_db("nanyspain", $conexion) or die("Error en la selección de la base de datos");
		$result = mysql_query ($consulta, $conexion) or die("Error en la consulta SQL REGISTRA: ".mysql_error());

		$data=mysql_fetch_assoc($result);
		return $data['total'];
		mysql_close($conexion);
	}
	function datecheck($input,$format=""){
        $separator_type= array("/","-",".");
        foreach ($separator_type as $separator) {
            $find= stripos($input,$separator);
            if($find<>false){	$separator_used= $separator;	}
        }
        $input_array= explode($separator_used,$input);
        if ($format=="mdy"){	return checkdate($input_array[0],$input_array[1],$input_array[2]);
        }elseif($format=="ymd"){	return checkdate($input_array[1],$input_array[2],$input_array[0]);
        }else{	return checkdate($input_array[1],$input_array[0],$input_array[2]);	}
        $input_array=array();
    }
	//Comprobar e-mail
	function checkEmail($email){
		if(preg_match_all("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
			list($username,$domain)=explode('@',$email);
			echo $username."\n".$domain."<br>";
			if(!checkdnsrr($domain,'MX')) {
				return false;
			} return true;
		}	return false;
	}
	
	
	
	//REGISTRO
	if(isset($_POST['registro'])){
		header("Location: registro.php");
	}
	
	if(isset($_POST['loguin'])){
		$dbHost = "localhost";
		$dbUser = "oleg";            //Usuario de la base de datos
		$dbPass = "olegario";            //Contraseña de la base de datos
		$dbDatabase = "nanyspain";    //Nombre de la base de datos
	 
		$db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database.");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db($dbDatabase, $db)or die("Couldn't select the database.");
		
		$usr = mysql_real_escape_string($_POST['username']);
		//$pas = hash('sha256', mysql_real_escape_string($_POST['password']));
		$pas=$_POST['password'];
		$sql = mysql_query("SELECT * FROM usuarios WHERE usuario='$usr' AND password='$pas'", $db) or die(mysql_error());
	
		if(mysql_num_rows($sql) == 1){
			$row = mysql_fetch_array($sql);
			session_start();
			$_SESSION['username'] = $row['usuario'];
			$_SESSION['logged'] = TRUE;
			$_SESSION['tipoUsuario']=$row['tipoUsuario'];
			header("Location: index.php");
			exit;
		}else{
			header("Location: error_loguin.php");
			exit;
		}
	}else if(isset($_POST['sesionOFF'])){
		// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
		// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}
		$_SESSION = array();
		session_destroy();

		header("Location: index.php");
	}else if(isset($_POST['registrar'])){
			$tipoUsuario=$_POST['tipoUsuario'];
			$_SESSION['tipoUsuario']=$tipoUsuario;
			$usuario=$_POST['usuario'];
			$_SESSION['usuario']=$usuario;
			$password=$_POST['password'];
			$_SESSION['password']=$password;
			$password2=$_POST['password2'];
			$_SESSION['password2']=$password2;
			$email=$_POST['email'];
			$_SESSION['email']=$email;
			$nombre=$_POST['nombre'];
			$_SESSION['nombre']=$nombre;
			$apellidos=$_POST['apellidos'];
			$_SESSION['apellidos']=$apellidos;
			$nacimiento=$_POST['nacimiento'];
			$_SESSION['nacimiento']=$nacimiento;
			$direccion=$_POST['direccion'];
			$_SESSION['direccion']=$direccion;
			$dni=$_POST['dni'];
			$_SESSION['dni']=$dni;
			$telefono=$_POST['telefono'];
			$_SESSION['telefono']=$telefono;
			$provincia=$_POST['provincia'];
			$pueblo=$_POST['pueblo'];
			
			$_SESSION['usuario_nombre']=$usuario;
			$codPostal=$_POST['codPostal'];
			$_SESSION['codPostal']=$codPostal;
			
			$precio=$_POST['precio'];
			$_SESSION['precio']=$precio;
			$experiencia=$_POST['experiencia'];
			$_SESSION['experiencia']=$experiencia;
			$edad=$_POST['edad'];
			$_SESSION['edad']=$edad;
			$descripcion=$_POST['descripcion'];
			$_SESSION['descripcion']=$descripcion;
			$rest = substr("".$_FILES['foto']['type'], 6);
			$foto=$_POST['usuario'].".".$rest;
			
			
			$_SESSION['existe_usuario']=false;
			$_SESSION['existe_dni']=false;
			$_SESSION['allright']=false;
			
			$_SESSION['error_usuario']=true;
			$_SESSION['error_password']=true;
			$_SESSION['error_password2']=true;
			$_SESSION['error_email']=false;
			$_SESSION['error_telefono']=true;
			$_SESSION['error_nombre']=true;
			$_SESSION['error_foto']=false;
			$_SESSION['error_apellidos']=true;
			$_SESSION['error_nacimiento']=true;
			$_SESSION['error_direccion']=false;
			$_SESSION['error_dni']=true;
			$_SESSION['error_codPostal']=true;
			
			$_SESSION['error_precio']=false;
			$_SESSION['error_experiencia']=false;
			$_SESSION['error_edad']=false;
			$_SESSION['error_disponibilidad']=false;
			$_SESSION['error_descripcion']=false;
			
			$allright=true;
			$superUsu=false;
			$activo=true;
			$username="";

			//comprobaciones de campos
			if(strlen($usuario)>=4){
				$_SESSION['error_usuario']=false;
			}else{
				$allright=false;
				$_SESSION['usuario']=$usuario;
				$_SESSION['usuario_nombre']=$usuario;
				$_SESSION['error_usuario']=true;
			}
			if(strlen($password)>=6){
				$_SESSION['error_password']=false;
			}else{
				$allright=false;
				$_SESSION['password']=$password;
				$_SESSION['error_password']=true;
			}
			if($password==$password2){
				$_SESSION['error_password2']=false;
			}else{
				$allright=false;
				$_SESSION['password2']=$password2;
				$_SESSION['error_password2']=true;
			}
			
			
			if(checkEmail($email)==true){
				$_SESSION['error_email']=false;
			}else{
				$allright=false;
				$_SESSION['email']=$email;
				$_SESSION['error_email']=true;
			}
			if(strlen($nombre)>=3){
				$_SESSION['error_nombre']=false;
			}else{
				$allright=false;
				$_SESSION['nombre']=$nombre;
				$_SESSION['error_nombre']=true;
			}
			if(strlen($apellidos)>=3){
				$_SESSION['error_apellidos']=false;
			}else{
				$allright=false;
				$_SESSION['apellidos']=$apellidos;
				$_SESSION['error_apellidos']=true;
			}
			if(strlen($dni)==9){
				$_SESSION['error_dni']=false;
			}else{
				$allright=false;
				$_SESSION['dni']=$dni;
				$_SESSION['error_dni']=true;
			}
			
			if(datecheck($nacimiento)){
				$_SESSION['error_nacimiento']=false;
			}else{
				$allright=false;
				$_SESSION['nacimiento']=$nacimiento;
				$_SESSION['error_nacimiento']=true;
			}
			if(strlen($telefono)==9){
				$_SESSION['error_telefono']=false;
			}else{
				$allright=false;
				$_SESSION['telefono']=$telefono;
				$_SESSION['error_telefono']=true;
			}
			if(is_numeric($telefono)){
				$_SESSION['error_telefono']=false;
			}else{
				$allright=false;
				$_SESSION['telefono']=$telefono;
				$_SESSION['error_telefono']=true;
			}
			if(strlen($codPostal)==5){
				$_SESSION['error_codPostal']=false;			
			}else{
				$allright=false;
				$_SESSION['codPostal']=$codPostal;
				$_SESSION['error_codPostal']=true;
			}
			
			
			//Registrar si todos los campos cumplen el formato
			if($allright==true){
				if(registra("select count(*) as total from usuarios where usuario='".$usuario."'")==0){
					if(registra("select count(*) as total from usuarios where dni='".$dni."'")==0){
						$_SESSION['error_registro']=false;
						
						//session_start();
						$_SESSION['username'] = $usuario;
						$_SESSION['logged'] = TRUE;
						
						$nacimiento2=date("Y-m-d", strtotime($nacimiento));
						
						$conexion = mysql_connect("localhost","oleg","olegario") or die ("Fallo en el establecimiento de la conexión");
						mysql_select_db("nanyspain", $conexion) or die("Error en la selección de la base de datos");
						mysql_query("SET NAMES 'utf8'");
						$sqlMaxUsu = mysql_query("SELECT max(idusuario) as id_usuario from usuarios", $conexion) or die(mysql_error());
						
						if(mysql_num_rows($sqlMaxUsu) == 1){
							$row = mysql_fetch_array($sqlMaxUsu);
							$idusuarioMax=$row['id_usuario'];
							$idusuarioMax+=1;
						}
						//mysql_close($conexion2);
						
						$consulta="insert into usuarios(idusuario,dni,usuario,password,email,nombre,apellidos,nacimiento,direccion,telefono,codPostal,provincia, pueblo,tipoUsuario,activo, superUsu, precio, experiencia, edad, descripcion, foto)
						values('".$idusuarioMax."','".$dni."','".$usuario."','".$password."','".$email."','".$nombre."','".$apellidos."','".$nacimiento2."','".$direccion."', '".$telefono."','".$codPostal."','".$provincia."','".$pueblo."','".$tipoUsuario."', '1', '0', '".$precio."', '".$experiencia."', '".$edad."', '".$descripcion."', '".$foto."')";
						
						
						if($_POST['lunes_viernes'] == '1')
						   $disp1=1;
						else	$disp1=0;
						if($_POST['fines'] == '1')
						   $disp2=1;
						else	$disp2=0;
						if($_POST['toda_semana'] == '1')
						   $disp3=1;
						else	$disp3=0;
						if($_POST['manianas'] == '1')
						   $disp4=1;
						else	$disp4=0;
						if($_POST['tardes'] == '1')
						   $disp5=1;
						else	$disp5=0;
						if($_POST['noches'] == '1')
						   $disp6=1;
						else	$disp6=0;
						
						
						$sqlMaxDisp=mysql_query("select max(id_disp) as id_disp from disponibilidad");
						if(mysql_num_rows($sqlMaxDisp) == 1){
							$row2 = mysql_fetch_array($sqlMaxDisp);
							$sqlMaxDisp=$row2['id_disp'];
							$sqlMaxDisp+=1;
						}
						$consulta2="insert into disponibilidad(id_disp, dni_usuario, lunes_viernes, vie_sab_dom, toda_semana, manianas, tardes, noches)
						values('".$sqlMaxDisp."','".$dni."', ".$disp1.", ".$disp2.", ".$disp3.", ".$disp4.", ".$disp5.", ".$disp6.")";
						
						
						if(!mysql_query($consulta2, $conexion)){
							 die("Error en la consulta SQL REGISTRO 1: ".mysql_error());
						}else{
							if(!mysql_query ($consulta, $conexion)){
								 die("Error en la consulta SQL REGISTRO 2: ".mysql_error());
							}else{
								$para      = $email;
								$titulo    = 'Registro NanySpain';
								$mensaje   = 'Bienvenido a NanySpain, estos son sus credenciales:<br>
												Usuario:'.$usuario.'<br>Contraseña:'.$password;
								$cabeceras = 'From: contacto@nanyspain.es' . "\r\n" .
									'Reply-To: contacto@nanyspain.es' . "\r\n" .
									'X-Mailer: PHP/' . phpversion();
								mail($para, $titulo, $mensaje, $cabeceras);
								
								
								$uploadedfileload="true";
								$uploadedfile_size=$_FILES[foto][size];
								
								if ($_FILES[foto][size]>200000){
									$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
									$uploadedfileload="false";
								}
								if (!($_FILES[foto][type] =="image/jpg" OR $_FILES[foto][type] =="image/gif" OR $_FILES[foto][type] =="image/png" OR $_FILES[foto][type] =="image/jpeg")){
									$msg=$msg." Tu archivo debe ser JPG, GIF o PNG.<BR>";
									$uploadedfileload="false";
								}
								list($img,$tipo)=explode("/", $_FILES[foto][type]);
								if($uploadedfileload=="true"){
									if(move_uploaded_file ($_FILES[foto][tmp_name], "clientes/".$tipoUsuario."/".$usuario.".".$tipo)){
										echo "Ha sido subido satisfactoriamente";
									}else{echo "Error al subir el archivo";}
								}else{echo $msg;}
							}
						}
						mysql_close($conexion);
						header("Location: index.php");
					}else{
						$_SESSION['existe_dni']=true;
						$_SESSION['error_registro']=true;
						$_SESSION['allright']=false;
						$_SESSION['usuario']='';
						echo "<script language='javascript'>alert('existe DNI');</script>"; 
						header("Location: registro.php");
					}
				}else{
					$_SESSION['existe_usuario']=true;
					$_SESSION['error_registro']=true;
					$_SESSION['allright']=false;
					$_SESSION['usuario']='';
					echo "<script language='javascript'>alert('existe Usuario');</script>"; 
					header("Location: registro.php");
				}
			}else{
				$_SESSION['error_registro']=true;
				$_SESSION['allright']=false;
				$_SESSION['usuario']='';
				echo "<script language='javascript'>alert('algun campo del formulario está mal');</script>"; 
				header("Location: registro.php");
			}
	}else if(isset($_POST['conectar'])){
		$usuario=$_POST['usuarioConectado'];
		
		$conexion = mysql_connect("localhost","oleg","olegario") or die ("Fallo en el establecimiento de la conexión");
		mysql_select_db("nanyspain", $conexion) or die("Error en la selección de la base de datos");
		
		$max = "select max(idTrabajo) as idTrabajo from conectar";
		$resultado3 = mysql_query($max, $conexion) or die(mysql_error("error max"));
		if(mysql_num_rows($resultado3) == 1){
			$fila3 = mysql_fetch_assoc($resultado3);
			echo $fila3['idTrabajo']."<br>";
			$max_fin=$fila3['idTrabajo']+1;
		}
		
		$dni1 = "SELECT dni FROM usuarios where usuario='".$_SESSION['username']."'";
		$resultado = mysql_query($dni1, $conexion) or die(mysql_error());
		if(mysql_num_rows($resultado) == 1){
			$fila = mysql_fetch_assoc($resultado);
			echo $fila['dni']."<br>";
			$dni1_fin=$fila['dni'];
		}
		
		$dni2 = "SELECT dni FROM usuarios where usuario='".$usuario."'";
		$resultado2 = mysql_query($dni2, $conexion) or die(mysql_error());
		if(mysql_num_rows($resultado2) == 1){
			$fila2 = mysql_fetch_assoc($resultado2);
			echo $fila2['dni']."<br>";
			$dni2_fin=$fila2['dni'];
		}
		
		$consulta="insert into conectar(idtrabajo,dni1, dni2, dia, hora, tiempoTotal)
		values('".$max_fin."','".$dni1_fin."','".$dni2_fin."', '1111/11/11', '11:11:11','11:11:11')";

		mysql_query ($consulta, $conexion) or die(mysql_error("error insertando"));
		mysql_close($conexion);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else if(isset($_POST['guardar_conectar'])){
		$quienBorro = $_POST['usuario_conectado'];
		$quienBorra = $_POST['usuario_sesion'];
		
		$fecha2 = $_POST['anyo']."/".$_POST['mes']."/".$_POST['dia'];
		$tiempo2 = $_POST['hora'].":".$_POST['minutos'].":00";
		$tiempoTotal2 = $_POST['horaTotal'].":".$_POST['minutosTotal'].":00";
		echo $fecha2."<br>".$tiempo2."<br>".$tiempoTotal2;
		
		$conexion = mysql_connect("localhost", "oleg", "olegario", true);
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("nanyspain", $conexion) || die('No pudo conectarse: '.mysql_error());
		
		$consulta0="select dni from usuarios where usuario='".$quienBorra."'";
		$res0 = mysql_query($consulta0, $conexion) or die(mysql_error("Error consulta BORRAUSUARIO1"));
		if(mysql_num_rows($res0) == 1){
			$fila0 = mysql_fetch_assoc($res0);
			$quienBorra_X=$fila0['dni'];
		}
		
		$consulta1="select dni from usuarios where usuario='".$quienBorro."'";
		$res1 = mysql_query($consulta1, $conexion) or die(mysql_error("Error consulta BORRAUSUARIO2"));
		if(mysql_num_rows($res1) == 1){
			$fila1 = mysql_fetch_assoc($res1);
			$quienBorro_X=$fila1['dni'];
		}
		
		$consulta2 = "update conectar  set dia='".$fecha2."', hora='".$tiempo2."', tiempoTotal='".$tiempoTotal2."'
					  where dni1 = '".$quienBorra_X."' and dni2='".$quienBorro_X."'";
					  
		if(!mysql_query($consulta2, $conexion)){
			die("<br>Error:<br><br> ".mysql_error());
		}
		mysql_close($conexion);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else if(isset($_POST['eliminar_conectar'])){
		$quienBorro = $_POST['usuario_conectado'];
		$quienBorra = $_POST['usuario_sesion'];
		
		$conexion = mysql_connect("localhost", "oleg", "olegario", true);
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("nanyspain", $conexion) || die('No pudo conectarse: '.mysql_error());
		
		$consulta0="select dni from usuarios where usuario='".$quienBorra."'";
		$res0 = mysql_query($consulta0, $conexion) or die(mysql_error("Error consulta BORRAUSUARIO1"));
		if(mysql_num_rows($res0) == 1){
			$fila0 = mysql_fetch_assoc($res0);
			echo $fila0['dni'];
			$quienBorra_X=$fila0['dni'];
		}
		
		$consulta1="select dni from usuarios where usuario='".$quienBorro."'";
		$res1 = mysql_query($consulta1, $conexion) or die(mysql_error("Error consulta BORRAUSUARIO2"));
		if(mysql_num_rows($res1) == 1){
			$fila1 = mysql_fetch_assoc($res1);
			echo $fila1['dni'];
			$quienBorro_X=$fila1['dni'];
		}
		
		$consulta0 = "delete from conectar where dni1 = '".$quienBorra_X."' and dni2 = '".$quienBorro_X."'";
		$usuario = mysql_query($consulta0, $conexion) or die(mysql_error());
		mysql_close($conexion);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else if(isset($_POST['perfilUsuario'])){
		header('Location: perfil.php');
	}else if(isset($_POST['guardarPerfil'])){
		$conexion = mysql_connect("localhost", "oleg", "olegario", true);
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("nanyspain", $conexion) || die('No pudo conectarse: '.mysql_error());
		
		$consulta = "update usuarios set
					password='".$_POST['password']."', nombre='".$_POST['nombre']."',
					apellidos='".$_POST['apellidos']."', nacimiento='".$_POST['nacimiento']."',
					direccion='".$_POST['direccion']."', telefono='".$_POST['telefono']."',
					precio='".$_POST['precio']."', experiencia='".$_POST['experiencia']."',
					edad='".$_POST['edad']."', 	descripcion='".$_POST['descripcion']."',
					codPostal='".$_POST['codPostal']."', 	provincia='".$_POST['provincia']."',
					pueblo='".$_POST['pueblo']."'
					where usuario='".$_SESSION['username']."'";
					 
		mysql_query($consulta, $conexion) or die(mysql_error());
		mysql_close($conexion);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{    //Si no se ha mandado nada, volvemos al index o la página del login
		header("Location: error.php");
		exit;
	}
?>