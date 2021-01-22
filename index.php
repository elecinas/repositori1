<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>calco wireframe</title>
		<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet"> 
	</head>
	<body>
		<?php include 'header.php';?><!--El codi PHP que enllaça amb l'arxiu que conté el header--->
		<nav>
			<ul>
				<li><a href="#">Primero</a></li>
				<li><a href="#">Segundo</a></li>
				<li><a href="#">Tercero</a></li>
				<li><a href="#">Cuarto</a></li>
				<li><a href="#">Quinto</a></li>
			</ul>
		</nav>
		<aside>
			<div id="dest1" class="destacado">
				<h3>Primer destacat</h3>
				<input style="cursor: pointer" type="button" value="accedir" onclick="window.location.href='#'">
				<!--s'han creat botons que funcionen mitjançant javascript--->
				<!--les imatges que apareixerán a sota el destacat son decoratives, així que s'han posat mitjançant css--->
			</div>
			<div id="dest2" class="destacado">
				<h3>Segon destacat</h3>
				<input style="cursor: pointer" type="button" value="accedir" onclick="window.location.href='#'">
			</div>
			<div id="dest3" class="destacado">
				<h3>Tercer destacat</h3>
				<input style="cursor: pointer" type="button" value="accedir" onclick="window.location.href='#'">
			</div>
		</aside>
		<article>
			<div class="principal">
				<div class="modulo">
					<img src="img/agricultur.jpg" alt="imagen de agricultura" width="180">
					<h2>Artículo</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pellentesque odio at tellus blandit, at facilisis erat ornare. Aenean eu eros congue dui tincidunt pulvinar nec non ipsum.</p>
					<input class="leermas" style="cursor: pointer" type="button" value="Veure més" onclick="window.location.href='#'">
				</div>
				<div class="modulo">
					<img src="img/hornet.jpg" alt="imagen de una abeja" width="180">
					<h2>Otro artículo más</h2>
					<p>Ut pellentesque odio at tellus blandit, at facilisis erat ornare. Aenean eu eros congue dui tincidunt pulvinar nec non ipsum. Nam gravida dolor in ipsum gravida pulvinar.</p>
					<input class="leermas" style="cursor: pointer" type="button" value="Veure més" onclick="window.location.href='#'">
				</div>
				<div class="modulo">
					<img src="img/lens.jpg" alt="imagen de una lente" width="180">
					<h2>Y otro más</h2>
					<p>Ut pellentesque odio at tellus blandit, at facilisis erat ornare. Aenean eu eros congue dui tincidunt pulvinar nec non ipsum.</p>
					<input class="leermas" style="cursor: pointer" type="button" value="Veure més" onclick="window.location.href='#'">
				</div>
			</div>
		</article>
		<?php include 'footer.php';?>

	</body>
</html>