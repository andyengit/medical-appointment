<!DOCTYPE html>
<html lang="ES">
	<head>
		<meta charset="utf-8"/>
		<title>REVEMED</title>
		<link rel="icon" type="img/png" href="view/img/estetos.png">
		<link rel="stylesheet" type="text/css" href="view/css/estilaso.css">
		<link rel="stylesheet" type="text/css" href="view/css/normalize.css">
		<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<script src="https://kit.fontawesome.com/28d6ce3668.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<header>
		<main class="body">
			<!--HEADER-->
			<div class="header">
					<span><img src="view/img/icon.png" alt="REVEMED"></span>
					<h1>REVEMED</h1>
			</div>
			<!--NOTICIAS-->
			<section class="noticia">
				<div class="sombra"></div>
				<div class="contenedor">
					<img src="view/img/noticia.jpg" />
					<div class="contenedor-text">
						<b>TU NUEVO PORTAL PARA AGENDAR CITAS MÉDICAS</b>
						<p>CON TUS DOCTORES Y CENTROS MÉDICOS DE TU PREFERENCIA</p>
					</div>
				</div>
			</section>
			<!--NAVEGACION-->
			<section class="nav-menu" >
				<div class="nav-sel"><a href="index.php"><span><img src="view/img/casa.png"></span><b>INICIO</b></a></div>
				<div class="nav-sel"><a href="index.php?go=reservar"><span><img src="view/img/Calendario.png"></span><b>RESERVAR CITA</b></a></div>
				<div class="nav-sel"><a href="index.php?go=examenes"><span><img src="view/img/jeringa.png" alt=""></span><b>RESERVAR EXÁMENES</b></a></div>
				<div class="nav-sel"><a href="index.php?go=resultados"><span><img src="view/img/libro.png" alt=""></span><b>CONSULTAR CITA</b></a></div>
				<div class="nav-sel"><a href="index.php?go=nosotros"><span><img src="view/img/doc.png" alt=""></span><b>CONÓCENOS</b></a></div>
			</section>
		</main>
		</header>
		<!--CONTENIDO-->
		<hr>
		<section class="modulos">
			<div>
				<?php
					$mvc = new MvcController;
					$mvc->enlaces();
				?>
			</div>
		</section>
		<!--FOOTER-->
		<footer>
			<div class="footer-img">
				<img src="view/img/estetos.png" alt="">
			</div>
			<div>
				<ul class="footer-accesos">
					<li><a href="index.php">INICIO</a></li>
				</ul>
			</div>
			<div>
				<ul class="footer-integrantes">
					<b>INTEGRANTES:</b>
					<li><a href="https://aulabqto.iujoac.org.ve/user/view.php?id=2148&course=1180">Anderson Armeya</a></li>
					<li><a href="https://aulabqto.iujoac.org.ve/user/view.php?id=2694&course=1180">Maria Vanessa Barboza</a></li>
					<li><a href="https://aulabqto.iujoac.org.ve/user/view.php?id=2354&course=1180">Miguel Gozaine</a></li>
					<li><a href="https://aulabqto.iujoac.org.ve/user/view.php?id=2568&course=1180">Nataly Megurdijian</a></li>
				</ul>
			</div>
		</footer>
	</body>
</html>