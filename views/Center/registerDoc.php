<div class="ui container">
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui vertical fluid tabular menu">
                <a class="item" href="<?= base_url() ?>center/inicio">
                    Inicio
                </a>
                <a class="item">
                    Status
                </a>
                <a class="item">
                    Doctores
                </a>
                <a class="active item" href="<?= base_url() ?>center/registerSpeciality">
                    Registros
                </a>
                <a class="item">
                    Opciones
                </a>
            </div>
        </div>
        <div class="twelve wide stretched column">
            <div class="ui segment">
                <div class="ui center aligned segment">

                    <div class="ui grid">
                        <div class="four wide column">
                            <div class="ui vertical fluid tabular menu">
                                <a class="item" href="<?= base_url() ?>center/registerSpeciality">
                                    Especialidad
                                </a>
                                <a class="active item">
                                    Doctores
                                </a>
                            </div>
                        </div>
                        <div class="twelve wide stretched column">
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
                            <form class="ui form" method="POST" action="<?= base_url() ?>center/insertDoctor" id="register-form">
                                <h2>Añade un doctor</h2>
                                <div class="fields">
                                    <div class="field">
                                        <label>Nombres:</label>
                                        <input type="text" placeholder="Nombres" id="name" name="name" value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
                                    </div>
                                    <div class="field">
                                        <label>Apellidos:</label>
                                        <input type="text" placeholder="Apellidos" id="lastName" name="lastName" value="<?= isset($_SESSION['lastName']) ? $_SESSION['lastName'] : '' ?>">
                                    </div>
                                    <div class="field">
                                        <label>Cédula de Identidad:</label>
                                        <input type="number" placeholder="Cedula de Identidad" id="ci" name="ci" value="<?= isset($_SESSION['ci']) ? $_SESSION['ci'] : '' ?>">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Correo electrónico:</label>
                                        <input type="email" placeholder="Correo electronico" id="email" name="email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
                                    </div>
                                    <div class="field">
                                        <label>Contraseña:</label>
                                        <input type="password" placeholder="Contraseña" id="password" name="password">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Fecha de Nacimiento:</label>
                                        <input type="date" name="birthDate" id="birthDate" max="<?= date('Y-m-d', time()) ?>">
                                    </div>
                                    <div class="field">
                                        <label>Número de teléfono:</label>
                                        <input type="number" name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label for="state">Estado de residencia:</label>
                                        <select name="state" id="state"></select>
                                    </div>
                                    <div class="field">
                                        <label for="city">Ciudad:</label>
                                        <select name="city" id="city"></select>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="speciality">Especialidad:</label>
                                    <select class="ui fluid dropdown" name="speciality">
                                        <?php foreach ($_SESSION['specialitiesList'] as $key) echo '<option value="' . $key[0] . '">' . $key[1] . '</option>'; ?>
                                    </select>
                                </div>
                                <div class="three fields">
                                    <div class="field">
                                        <label for="speciality">Inicio de Jornada:</label>
                                        <input type="time" name="startTime">

                                    </div>
                                    <div class="field">
                                        <label for="speciality">Fin de jornada:</label>
                                        <input type="time" name="endTime">
                                    </div>
                                    <div class="field">
                                        <label for="cost">Precio: $</label>
                                        <input type="number" name="cost">
                                    </div>
                                </div>


                                <button class="ui button primary basic" type="submit">Registrarse</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/javascript/getAdresses.js"></script>