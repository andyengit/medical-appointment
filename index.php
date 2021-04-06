<?php
require_once "VARS.php";
require_once "view/head.php";
?>

<!--CONTENIDO-->
<hr>
<section class="modulos">
	<form method="POST" action="controllers/UserController.php" id="register-form">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required> 

        <label for="lastname">Apellido:</label>
        <input type="text" id="lastname" name="lastname" required>
        
        <label for="CI">Cedula de Identidad:</label>
        <input type="text" id="CI" name="CI" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="Regístrate">
    </form>
</section>

<?php require_once "view/foot.php";