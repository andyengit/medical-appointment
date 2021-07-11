<div class="ui container">
    <div class="ui segment">

        <h2>CITAS</h2>
        <div class="ui grid">
            <div class="four wide column">
                <div class="ui vertical fluid tabular menu">
                    <a class="active item">
                        Proximas
                    </a>
                    <a href="<?= base_url() ?>doc/appointmentslast" class="item">
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
                <div class="ui segment">
                    <?php if (isset($_SESSION['appointmentsList'])) { ?>
                        <table class="ui  blue selectable celled  table">
                            <thead>
                                <tr>
                                    <th><b>ID</b></th>
                                    <th>Paciente</th>
                                    <th>Dia</th>
                                    <th>Hora</th>
                                    <th>¿Culminó?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['appointmentsList'] as $key) { ?>
                                    <tr>
                                        <td><?= $key[0] ?></td>
                                        <td><?= $key[1] . " " . $key[2] ?></td>
                                        <td><?= $key[3] ?></td>
                                        <td><?= $key[4] ?></td>
                                        <td>
                                            <form method="POST" action="<?= base_url() ?>doc/appointmentUpdate">
                                                <input type="hidden" value="<?= $key[0] ?>" name="id">
                                                <button type="submit" class="ui blue button"><i class="ui icon check white"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php }
                            } else echo "<h3>" . $_SESSION['errors']['appointmentEmpty'] . "</h3>"; ?>
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
