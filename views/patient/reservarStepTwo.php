<main class="mid">
    <div class="cont">
        <div>
            <h2>Reserva tu cita médica</h2>
        </div>
        <!--    STEPS   -->
        <!--    STEPS   -->
        <!--    STEPS   -->
        <!--    STEPS   -->
        <div class="ui ordered steps">
            <div class="completed step">
                <div class="content">
                    <div class="title">Busqueda</div>
                    <div class="description">Selecciona el donde y cuando</div>
                </div>
            </div>
            <div class="active step">
                <div class="content">
                    <div class="title">Disponibilidad</div>
                    <div class="description">Selecciona la Hora y el médico</div>
                </div>
            </div>
            <div class="step">
                <div class="content">
                    <div class="title">Confirmacion</div>
                    <div class="description">¡Reservacion lista!</div>
                </div>
            </div>
        </div>
        <!--    FORM  -->
        <!--    FORM  -->
        <!--    FORM  -->
        <!--    FORM  -->
        <br><br><br>
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
                <?php  foreach ($_SESSION['userDocInfo'] as $key){?>
                    <tr>
                        <td>
                            <h4 class="ui image header">
                                <i class="user md icon ui rounded "></i>
                                <div class="content">Dr. <?= $key[2]." ".$key[3] ?><div class="sub header">Cirujano</div>
                                </div>
                            </h4>
                        </td>
                        <td>
                            <div class="ui list">
                                <a class="item">6:00</a>
                                <a class="item">7:00</a>
                                <a class="item">8:00</a>
                            </div>
                        </td>
                        <td>
                            <form class="ui form">
                                <div class="field">
                                    <label>Centro Medico</label>
                                    <select class="ui search dropdown" name>
                                        <option value="">6:00</option>
                                        <option value="">7:00</option>
                                        <option value="">8:00</option>
                                    </select>

                                </div>
                                <div class="field">
                                    <button class="ui button primary" type="submit">RESERVAR</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
  