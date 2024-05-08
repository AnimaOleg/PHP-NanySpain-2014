<div id="menu1">
	<ul class="nav">
		<li><a href="index.php"></a></li>
		<?php if(isset($_SESSION['logged'])){ ?>
			<?php if($_SESSION['tipoUsuario']=="cuidadores"){?>
				<li><a href="serv_ninios.php">Jovenes</a></li>
				<li><a href="serv_ancianos.php">3ª Edad</a></li>
			<?php }else  if($_SESSION['tipoUsuario']=="ninos"){?>
				<li><a href="serv_cuidadores.php">Cuidadores</a></li>
			<?php }else if($_SESSION['tipoUsuario']=="ancianos"){?>
				<li><a href="serv_cuidadores.php">Cuidadores</a></li>
			<?php } ?>
		<?php }else{ ?>
			<li><a href="serv_cuidadores.php">Cuidadores</a></li>
			<li><a href="serv_ninios.php">Jovenes</a></li>
			<li><a href="serv_ancianos.php">3º Edad</a></li>
	<?php } ?>
		<li><a href="galeria.php">Galeria</a></li>
		<li><a href="servicios.php">Servicios</a></li>
		<li><a href="contacto.php">Contacto</a></li>
	
	</ul>
</div>