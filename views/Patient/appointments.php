<main>
    <div class="container">

        <h2>CITAS</h2>
        <div class="ui grid">
            <div class="four wide column">
                <div class="ui vertical fluid tabular menu">
                    <a class="active item">
                        Próximas
                    </a>
                    <a href="<?= base_url() ?>patient/appointmentslast" class="item">
                        Historial
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
                <?php if (isset($_SESSION['appointmentsList'])) { ?>
                    <div class="ui segment">
                        <table class="ui  blue selectable celled  table">
                            <thead>
                                <tr>
                                    <th><b>CÓDIGO</b></th>
                                    <th>Doctor</th>
                                    <th>Día</th>
                                    <th>Hora</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['appointmentsList'] as $key) { ?>
                                    <tr>

                                        <td><?= $key[0] ?></td>
                                        <td>Dr/a. <?= $key[1] . " " . $key[2] ?></td>
                                        <td><?= $key[3] ?></td>
                                        <td><?= $key[4] ?></td>
                                        <td>
                                            <form method="POST" action="<?= base_url() ?>patient/appointmentDel">
                                                <input type="hidden" value="<?= $key[0] ?>" name="id">
                                                <button type="submit" class="ui blue button">X</button>
                                            </form>
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>