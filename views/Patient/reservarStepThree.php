<main>
    <div class="cont">
        <div>
            <a href="<?= base_url() ?>patient/stepTwo?Especialidad=<?=$_SESSION['appointment']['specialities']?>&fecha=<?=$_SESSION['appointment']['date']?>">
                <button class="ui basic button primary">
                    <i class="icon angle double left"></i>
                    Atrás
                </button>
            </a>
            <h2>Reserva tu cita médica</h2>
        </div>
        <!--    STEPS   -->
        <div class="ui ordered steps">
            <div class="completed step">
                <div class="content">
                    <div class="title">Búsqueda</div>
                    <div class="description">Selecciona el donde y cuando</div>
                </div>
            </div>
            <div class="completed step">
                <div class="content">
                    <div class="title">Disponibilidad</div>
                    <div class="description">Selecciona la hora y el médico</div>
                </div>
            </div>
            <div class=" active step">
                <div class="content">
                    <div class="title">Confirmación</div>
                    <div class="description">¡Reservación lista!</div>
                </div>
            </div>
        </div>
        <!--    FORM  -->
        <br><br>
        <div class="ui centered grid">
            <form action="<?= base_url() ?>patient/stepOk" method="POST">
                <div class="ui card">
                    <div class="content">
                        <a class="header"><?= $_SESSION['appointment']['specialitiesName'] ?></a>
                        <div class="meta">
                            <span class="date"><?= date('d/m/Y', strtotime($_SESSION['appointment']['date'])) ?></span>
                        </div>
                        <div class="description">
                            <?= $_SESSION['appointment']['name'] ?>
                        </div>
                    </div>
                    <div class="extra content">
                        <i class="edit icon"> </i>Hora - <?= $_SESSION['appointment']['time'] ?>
                    </div>
                    <input type="hidden" name="Doc" value="<?= $_GET['Doc'] ?>">
                    <input type="hidden" name="Hora" value="<?= $_GET['Hora'] ?>">
                    <button type="submit" class="ui button primary">CONFIRMAR</button>

                </div>
            </form>
        </div>

    </div>