<html lang="ES">
	<head>
		<meta charset="utf-8"/>
		<title>REVEMED</title>
		<style rel="icon" type="img/png"> 
            <?php include_once($PATH."/view/img/estetos.png")?>
        </style>
		<style rel="stylesheet" type="text/css"> 
            <?php include_once($PATH."/view/css/styles.css")?>
        </style>
		<style rel="stylesheet" type="text/css">
            <?php include_once($PATH."/view/css/normalize.css")?>
        </style>
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
                            <p>CON LOS DOCTORES Y CENTROS MÉDICOS DE TU PREFERENCIA</p>
                        </div>
                    </div>
                </section>
                <!--NAVEGACION-->
                <section class="nav-menu">
                    <div class="nav-sel"><a href="index.php"><span><img src="view/img/casa.png"></span><b>INICIO</b></a></div>
                    <div class="nav-sel"><a href="index.php?go=reservar"><span><img src="view/img/Calendario.png"></span><b>RESERVAR CITA</b></a></div>
                    <div class="nav-sel"><a href="index.php?go=examenes"><span><img src="view/img/jeringa.png" alt=""></span><b>RESERVAR EXÁMENES</b></a></div>
                    <div class="nav-sel"><a href="view/modulos/resultados.php"><span><img src="view/img/libro.png" alt=""></span><b>CONSULTAR CITA</b></a></div>
                    <div class="nav-sel"><a href=""><span><img src="view/img/doc.png" alt=""></span><b>CONÓCENOS</b></a></div>
                </section>
            </main>
        </header>
        