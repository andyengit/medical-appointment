<section class="body">
        
        <div class="cont">
<?php if(isset($_SESSION["register"]) && $_SESSION["register"]) {
    $register = true;
    session_destroy();
    $_SESSION = null;
}   
?>

    <h2>Registro</h2>
    <?php
        if(isset($_SESSION['errors']) && $_SESSION['errors']){
            echo '<div class="ui attached negative message">';
            echo '<ul class="list">';
            if($_SESSION["nameErr"] != "") echo '<li>'.$_SESSION['nameErr'].'</li>';
            if($_SESSION["lastNameErr"] != "") echo '<li>'.$_SESSION['lastNameErr'].'</li>';
            if($_SESSION["ciErr"] != "") echo '<li>'.$_SESSION['ciErr'].'</li>';
            if($_SESSION["emailErr"] != "") echo '<li>'.$_SESSION['emailErr'].'</li>';
            if($_SESSION["passwordErr"] != "") echo '<li>'.$_SESSION['passwordErr'].'</li>';
            echo '</ul></div><br>';
        }
    ?>
	<form class="ui form" method="POST" action="controllers/registerController.php" id="register-form">
    
            <div class="fields">
                <div class="field">
                    <label>Nombres</label>
                    <input type="text" placeholder="Nombres" id="name" name="name" 
                        value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>"
                    >
                </div>
                <div class="field">
                    <label>Apellidos</label>
                    <input type="text" placeholder="Apellidos" id="lastname" name="lastname" 
                        value="<?= isset($_SESSION['lastName']) ? $_SESSION['lastName'] : '' ?>"
                    >
                </div>
                <div class="field">
                    <label>Cedula de Identidad</label>
                    <input type="number" placeholder="Cedula de Identidad" id="CI" name="CI" 
                        value="<?= isset($_SESSION['ci']) ? $_SESSION['ci'] : '' ?>"
                    >
                </div>
            </div>
            <div class=" two fields">
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
        <div class="three fields">
            <div class="field">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="date" id="">
            </div>
            <div class="field">
                <label>Tlf Local</label>
                <input type="number" name="phone" id="phone">
            </div>
            <div class="field">
                <label>Tlf Movil</label>
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
    <p>¿Ya tienes una cuenta? <a href="index.php?go=login">Ingresar</a></p>
    
    </div>
</section>

    