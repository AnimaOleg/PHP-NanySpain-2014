<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES"><head>
		<title>Index</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
		<link rel="stylesheet" type="text/css" href="styles/jflow.style.css"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/jquery-1.11.1.min.js"></script>
		<script src="scripts/jflow.plus.min.js" type="text/javascript"></script>
		<script type="text/javascript">$(document).ready(function(){
				$("#myController").jFlow({
					controller: ".jFlowControl", // must be class, use . sign
					slideWrapper : "#jFlowSlider", // must be id, use # sign
					slides: "#mySlides",  // the div where all your sliding divs are nested in
					selectedWrapper: "jFlowSelected",  // just pure text, no sign
					effect: "flow", //this is the slide effect (rewind or flow)
					width: "940px",  // this is the width for the content-slider
					height: "300px",  // this is the height for the content-slider
					duration: 400,  // time in milliseconds to transition one slide
					pause: 5000, //time between transitions
					prev: ".jFlowPrev", // must be class, use . sign
					next: ".jFlowNext", // must be class, use . sign
					auto: true	
			});});</script></head>
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
					<div class="ruta"><a href="index.php">NanySpain</a> >> Galeria</div>
				</div>
			</div>
			
			<div class="contenido_principal">
				<div class="indice">
					<div id="sliderContainer">
					
						<div id="mySlides">
							<div id="slide1" class="slide">
								<img src="images/jflow-sample-slide1.jpg" alt="Slide 1 jFlow Plus" />
								<div class="slideContent">
									<h3>¿Te sugiere algo?</h3>
									<p>Los sistemas dan su máximo rendimiento</p>
								</div>
							</div>
							<div id="slide2" class="slide">
								<img src="images/jflow-sample-slide2.jpg" alt="Slide 2 jFlow Plus" />
								<div class="slideContent">
									<h3>Vistas históricas</h3>
									<p>Con la participación de nuestros productos</p>
								 </div>
							</div>
							<div id="slide3" class="slide">
								<img src="images/jflow-sample-slide3.jpg" alt="Slide 3 jFlow Plus" />
								<div class="slideContent">
									<h3>Maravillas atlánticas</h3>
									<p>Calidad de imágen</p></div>
							</div>
							<div id="slide4" class="slide">
								<img src="images/jflow-sample-slide4.jpg" alt="Slide 3 jFlow Plus" />
								<div class="slideContent">
									<h3>Panorámicas</h3>
									<p>Al alcance de la tecnología</p>
								</div>
							</div>
						</div>
		
						<div id="myController">
						   <span class="jFlowControl">1</span>
						   <span class="jFlowControl">2</span>
						   <span class="jFlowControl">3</span>
						   <span class="jFlowControl">4</span>
						</div>

						<div class="jFlowPrev"></div>
						<div class="jFlowNext"></div>
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





	
					
					
					