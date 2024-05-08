<div class="div_busqueda">
	<?php if(!isset($_SESSION['logged'])){ ?>
		<form action="funciones.php" method="post">
			Usuario <input type="text" name="username" class="log" required placeholder="Name User"/>
			Password <input type="password" name="password" class="log" required placeholder="Password"/>
			<input type="submit" name="loguin" value="loguin" class="botonLogin"/>
			<input type="button" name="registro" value="registro" class="botonLogin" onclick="window.location='registro.php';"/>
		</form>
	<?php }else{ ?>
		<form method="post" action="funciones.php">
			<?php echo 'Welcome, '.$_SESSION['username']; ?>
			<input type="submit" value="Cerrar Sesion" name="sesionOFF" class='botonLogin'/>
			<input type="submit" value="Perfil" name="perfilUsuario" class='botonLogin'/>
		</form>
	<?php } ?>
</div>