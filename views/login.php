<div class="ui container">
    <div class="ui segment">
<h4 class="ui dividing">Iniciar sesión</h4>


<?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) : ?>
    <div class='ui attached negative message'>
        <ul class='list'>
            <?php foreach ($_SESSION["errors"] as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <br>
<?php endif ?>

<?php if (isset($_SESSION['messComp'])) : ?>
    <div class="ui attached success message">
        <p><?= $_SESSION['messComp'] ?></p>
    </div>
<?php endif ?>
<form class="ui form" method="POST" action="<?= base_url() ?>user/validateLogin">
    <div class="field fluid">
        <label>Cédula de Identidad</label>
        <input type="number" name="ci" placeholder="Ejemplo - 12345678">
    </div>
    <div class="field">
        <label>Contraseña</label>
        <input type="password" name="password" placeholder="Contraseña">
    </div>
    <button class="ui button basic " type="submit">Entrar</button>

</form>
<br>
<p>¿No tienes una cuenta? <a href="<?= base_url() ?>user/register">Registrarte</a></p>
