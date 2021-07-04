<main class="mid">
    <div class="cont">

        <h4 class="ui dividing">Administrador</h4>
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
        <form class="ui form" method="POST" action="<?= base_url() ?>user/adminLogin">
            <div class="field fluid">
                <label>Nombre de usuario</label>
                <input type="text" name="nameAdmin" maxlength="6">
            </div>
            <div class="field">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña">
            </div>
            <button class="ui button basic " type="submit">Entrar</button>
        </form>
    </div>