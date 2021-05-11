<section class="body">
            <div class="cont">
<?php if(isset($_SESSION["register"]) && $_SESSION["register"]) {
    $register = true;
    session_destroy();
    $_SESSION = null;
}   
?>

<hr>
<section class="modulos">
    <h2>Registro</h2>

	<form method="POST" action="controllers/register.php" id="register-form">
        <label for="name">Nombre:</label>
        <input 
            class="data" type="text" id="name" name="name" 
            value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>"
        > 
        <?php
        if(isset($_SESSION["nameErr"])):?>
            <strong class="alert_warning"><?= $_SESSION["nameErr"] ?></strong>
        <?php 
        endif;
        ?>

        <label for="lastname">Apellido:</label>
        <input 
            class="data" type="text" id="lastname" name="lastname" 
            value="<?= isset($_SESSION['lastName']) ? $_SESSION['lastName'] : '' ?>"
        >
        <?php
        if(isset($_SESSION["lastNameErr"])):?>
            <strong class="alert_warning"><?= $_SESSION["lastNameErr"] ?></strong>
        <?php 
        endif;
        ?>
        
        <label for="CI">Cedula de Identidad:</label>
        <input 
            class="data" type="text" id="CI" name="CI" 
            value="<?= isset($_SESSION['ci']) ? $_SESSION['ci'] : '' ?>"
        >
        <?php
        if(isset($_SESSION["ciErr"])):?>
            <strong class="alert_warning"><?= $_SESSION["ciErr"] ?></strong>
        <?php 
        endif;
        ?>


        <label for="email">Correo Electrónico:</label>
        <input 
            class="data" type="email" id="email" name="email" 
            value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>"
        >
        <?php
        if(isset($_SESSION["emailErr"])):?>
            <strong class="alert_warning"><?= $_SESSION["emailErr"] ?></strong>
        <?php 
        endif;
        ?>

        <label for="password">Contraseña:</label>
        <input class="data" type="password" id="password" name="password">
        <?php
        if(isset($_SESSION["passwordErr"])):?>
            <strong class="alert_warning"><?= $_SESSION["passwordErr"] ?></strong>
        <?php 
        endif;
        ?>

        <input class="botons" type="submit" value="Regístrate">

        <p><a href="#">¿Ya tengo una cuenta?</a></p>

        <?php
        if(isset($register) && $register):?>
            <strong class="alert_success">Registro completado correctamente.</strong>
        <?php 
            endif;
        ?>
    </form>

    

</section>