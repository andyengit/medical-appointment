<main>
    <div class="container">

        <h2>CITAS</h2>
        <div class="ui grid">
            <div class="four wide column">
                <div class="ui vertical fluid tabular menu">
                    <a class="active item">
                        Proximas
                    </a>
                    <a href="<?=base_url()?>patient/appointmentslast" class="item">
                        Historial
                    </a>
                </div>
            </div>
            <div class="twelve wide stretched column">
                <div class="ui segment">
                    <?php if (isset($_SESSION['appointmentsList'])) { ?>
                        <table class="ui  blue selectable celled  table">
                            <thead>
                                <tr>
                                    <th><b>ID</b></th>
                                    <th>Paciente</th>
                                    <th>Dia</th>
                                    <th>Hora</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
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
                                            <button class="ui blue  button">O</button>
                                        </td>
                                        <td><button class="ui blue button">
                                                X
                                            </button>
                                        </td>
                                    </tr>
                            <?php }
                            } else echo "<h3>" . $_SESSION['errors']['appointmentEmpty'] . "</h3>";?>
                            </tbody>
                        </table>
                        
                </div>
            </div>
        </div>
    </div>