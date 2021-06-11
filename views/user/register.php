<?php 

session_start();

if(isset($_SESSION["register"]) && $_SESSION["register"]) {
    $register = true;
    session_destroy();
    $_SESSION = null;
}   
?>

<section class="body">
   
    <div class="cont">

        <h2>Registro</h2>

        <?php if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
            <div class='ui attached negative message'>
                <ul class='list'>
                <?php foreach($_SESSION["errors"] as $error): ?>
                        <li><?=$error?></li>
                <?php endforeach ?>
                </ul>
            </div>
            <br>
        <?php endif ?>

        <?php if(isset($register) && $register): ?>
            <div class="ui attached success message">
                <p>Registro de usuario completado.</p>
            </div>
        <?php endif ?>

        <form class="ui form" method="POST" action="index.php?controller=user&&action=validate" id="register-form">
        
                <div class="fields">
                    <div class="field">
                        <label>Nombres</label>
                        <input type="text" placeholder="Nombres" id="name" name="name" 
                            value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>"
                        >
                    </div>
                    <div class="field">
                        <label>Apellidos</label>
                        <input type="text" placeholder="Apellidos" id="lastName" name="lastName" 
                            value="<?= isset($_SESSION['lastName']) ? $_SESSION['lastName'] : '' ?>"
                        >
                    </div>
                    <div class="field">
                        <label>Cedula de Identidad</label>
                        <input type="number" placeholder="Cedula de Identidad" id="ci" name="ci" 
                            value="<?= isset($_SESSION['ci']) ? $_SESSION['ci'] : '' ?>"
                        >
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>Correo electronico</label>
                        <input type="email" placeholder="Correo electronico" id="email" name="email" 
                            value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>"
                        >
                    </div>
                    <div class="field">
                        <label>Contraseña</label>
                        <input type="password" placeholder="Contraseña" id="password" name="password">
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>Fecha de Nacimiento</label>
                    <input type="date" name="birthDate" id="birthDate">
                </div>
                <div class="field">
                    <label>Número de teléfono</label>
                    <input type="number" name="phone" id="phone">
                </div>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" tabindex="0">
                    <label>Acepto los terminos y condiciones.</label>
                </div>
            </div>
            <button class="ui button primary basic" type="submit">Submit</button>
        </form>
                
        <br>
        <p>¿Ya tienes una cuenta? <a href="index.php?controller=user&action=login">Ingresar</a></p>
        
    </div>
</section>

<?php 

session_destroy();
$_SESSION = null;
