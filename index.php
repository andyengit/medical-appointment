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
<section class="modulos">
	<form method="POST" action="controllers/register.php" id="register-form">
        <label for="name">Nombre:</label>
        <input 
            class="data" type="text" id="name" name="name" 
            value="<?= $_SESSION['name'] ? $_SESSION['name'] : '' ?>"
        > 
        <?php
        if(isset($_SESSION["nameErr"])):?>
            <strong class="alert_red"><?= $_SESSION["nameErr"] ?></strong>
        <?php 
        endif;
        ?>

        <label for="lastname">Apellido:</label>
        <input 
            class="data" type="text" id="lastname" name="lastname" 
            value="<?= $_SESSION['lastName'] ? $_SESSION['lastName'] : '' ?>"
        >
        <?php
        if(isset($_SESSION["lastNameErr"])):?>
            <strong class="alert_red"><?= $_SESSION["lastNameErr"] ?></strong>
        <?php 
        endif;
        ?>
        
        <label for="CI">Cedula de Identidad:</label>
        <input 
            class="data" type="text" id="CI" name="CI" 
            value="<?= $_SESSION['ci'] ? $_SESSION['ci'] : '' ?>"
        >
        <?php
        if(isset($_SESSION["ciErr"])):?>
            <strong class="alert_red"><?= $_SESSION["ciErr"] ?></strong>
        <?php 
        endif;
        ?>


        <label for="email">Correo Electrónico:</label>
        <input 
            class="data" type="email" id="email" name="email" 
            value="<?= $_SESSION['email'] ? $_SESSION['email'] : '' ?>"
        >
        <?php
        if(isset($_SESSION["emailErr"])):?>
            <strong class="alert_red"><?= $_SESSION["emailErr"] ?></strong>
        <?php 
        endif;
        ?>

        <label for="password">Contraseña:</label>
        <input class="data" type="password" id="password" name="password">
        <?php
        if(isset($_SESSION["passwordErr"])):?>
            <strong class="alert_red"><?= $_SESSION["passwordErr"] ?></strong>
        <?php 
        endif;
        ?>

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