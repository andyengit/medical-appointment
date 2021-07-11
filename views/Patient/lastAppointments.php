<div class="ui container">
    <div class="ui segment">

        <h2>CITAS</h2>
        <div class="ui grid">
            <div class="four wide column">
                <div class="ui vertical fluid tabular menu">
                    <a href="<?=base_url()?>patient/appointments" class="item">
                        Próximas
                    </a>
                    <a class="active item">
                        Historial
                    </a>
                </div>
            </div>
            <div class="twelve wide stretched column">
                <div class="ui segment">
                    <?php if (isset($_SESSION['appointmentsLastList'])) { ?>
                        <table class="ui  blue selectable celled  table">
                            <thead>
                                <tr>
                                    <th><b>CÓDIGO</b></th>
                                    <th>Doctor</th>
                                    <th>Día</th>
                                    <th>Hora</th>
                                    <th>Asistencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['appointmentsLastList'] as $key) { ?>
                                    <tr>
                                        <td><?= $key[0] ?></td>
                                        <td>Dr/a. <?= $key[1] . " " . $key[2] ?></td>
                                        <td><?= $key[3] ?></td>
                                        <td><?= $key[4] ?></td>
                                        <td><?php if ($key[5] == 1 && $key[6] == 0 ){
                                        echo '<i class="ui clock grey icon"></i>';
                                            
                                        }else if($key[5] == 0 && $key[6] == 1 ){
                                        echo '<i class="ui check green icon"></i>';
                                        }else echo '<i class="ui x red icon"></i>';?></td>
                                    </tr>
                            <?php }
                            }else echo "<h3>" . $_SESSION['errors']['appointmentEmpty'] . "</h3>"; ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
