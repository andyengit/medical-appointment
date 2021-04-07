<?php
session_start();

require_once "VARS.php";
require_once "view/head.php";

if(isset($_SESSION["register"]) && $_SESSION["register"]) {
    $register = true;
    session_destroy();
    $_SESSION = null;
}   
?>

<!--CONTENIDO-->
<hr>
<h4>Formulario Registro</h4>
<section class="modulos">
	
	<form method="POST" action="controllers/register.php" id="register-form">
        <input 
			class="data"
			placeholder="Ingrese su Nombre"
            type="text" id="name" name="name" 
        >
        <?php
        if(isset($_SESSION["nameErr"])):?>
            <strong class="alert_red"><?= $_SESSION["nameErr"] ?></strong>
        <?php 
        endif;
        ?>

        <input 
            class="data"
			placeholder="Ingrese su Apellido"
			type="text" id="lastname" name="lastname" 
        >
        <?php
        if(isset($_SESSION["lastNameErr"])):?>
            <strong class="alert_red"><?= $_SESSION["lastNameErr"] ?></strong>
        <?php 
        endif;
        ?>
        
        <input 
            class="data"
			placeholder="Ingrese su Cedula de Identidad"
			type="text" id="CI" name="CI" 
        >
        <?php
        if(isset($_SESSION["ciErr"])):?>
            <strong class="alert_red"><?= $_SESSION["ciErr"] ?></strong>
        <?php 
        endif;
        ?>

        <input 
            class="data"
			placeholder="Ingrese su Correo Electrónico"
			type="email" id="email" name="email" 
        >
        <?php
        if(isset($_SESSION["emailErr"])):?>
            <strong class="alert_red"><?= $_SESSION["emailErr"] ?></strong>
        <?php 
        endif;
        ?>

        <input class="data" placeholder="Ingrese su Contraseña" type="password" id="password" name="password">
        <?php
        if(isset($_SESSION["passwordErr"])):?>
            <strong class="alert_red"><?= $_SESSION["passwordErr"] ?></strong>
        <?php 
        endif;
        ?>

		<p>Estoy de Acuerdo con <a href="#">Terminos y Condiciones</a></p>

        <input class="botons" type="submit" value="Regístrate">
		
		<p><a href="#">¿Ya tengo una cuenta?</a></p>
    </form>

    <?php
    if(isset($register) && $register):?>
        <strong class="alert_green">Registro completado correctamente.</strong>
    <?php 
        endif;
    ?>

</section>

<?php require_once "view/foot.php";