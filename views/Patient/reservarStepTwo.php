<div class="ui container centered grid">
    <div class="ui segment">
        <a href="<?= base_url() ?>patient/stepOne">
            <button class="ui basic button primary">
                <i class="icon angle double left"></i>
                Atrás
            </button>
        </a><h2>Reserva tu cita médica</h2>
        
        <!--    STEPS   -->
        <!--    STEPS   -->
        <!--    STEPS   -->
        <!--    STEPS   -->
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
        <div class="ui container centered grid">
        
            <div class="ui ordered steps">
                <div class="completed step">
                    <div class="content">
                        <div class="title">Búsqueda</div>
                        <div class="description">Selecciona el donde y cuando</div>
                    </div>
                </div>
                <div class="active step">
                    <div class="content">
                        <div class="title">Disponibilidad</div>
                        <div class="description">Selecciona la hora y el médico</div>
                    </div>
                </div>
                <div class="step">
                    <div class="content">
                        <div class="title">Confirmación</div>
                        <div class="description">¡Reservacion lista!</div>
                    </div>
                </div>
            </div>
        </div>
        <!--    FORM  -->
        <!--    FORM  -->
        <!--    FORM  -->
        <!--    FORM  -->
        <br><br><br>
        <?php if ($_SESSION['docInfo'] != NULL) { ?>
            <div class="ui centered grid">
                <table class="ui very basic collapsing celled table">


                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Horarios</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['docInfo'] as $key) { ?>
                            <tr>
                                <td>
                                    <h4 class="ui image header">
                                        <i class="user md icon ui rounded "></i>
                                        <div class="content">Dr. <?= $key[0] . " " . $key[1] ?><div class="sub header"><?= $key[7] ?></div>
                                        </div>
                                    </h4>
                                </td>
                                <td>
                                    <div class="ui list">
                                        <p>de:<a> <?= $key[4] ?></a></p>
                                        <p>Hasta:<a> <?= $key[5] ?></a></p>
                                        <br>
                                        <p>Precio: <a>$<?= formatMoney($key[6]) ?></a></p>
                                    </div>
                                </td>
                                <td>
                                    <form class="ui form" method="GET" action="<?= base_url() ?>patient/stepThree">
                                        <div class="field">
                                            <select class="ui search dropdown" name="Hora">
                                                <?php
                                                $tempTimeIn =  strtotime($key[4]);
                                                $tempTimeOut = strtotime($key[5]);
                                                $tempstart = $tempTimeIn;
                                                while ($tempstart < $tempTimeOut) {
                                                    echo '<option value="' . $tempstart . '">' . date("H:i", $tempstart) . "</option>";
                                                    $tempstart += 1800;
                                                }
                                                ?>
                                            </select>
                                            <br>
                                        </div>
                                        <input type="hidden" name="Doc" value="<?= $key[8] ?>">
                                        <div class="field">
                                            <button href="Sds" class="ui button primary" type="submit">RESERVAR</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            <?php } else echo "<div><h2>No hay Doctores Disponibles</h2></div>?>"; ?>

            </div>
            <br>