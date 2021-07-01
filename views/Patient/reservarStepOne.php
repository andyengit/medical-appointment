<main class="mid">
    <div class="cont">
        <div>
            <h2>Reserva tu cita médica</h2>
        </div>
        <!--    STEPS   -->
        <div class="ui ordered steps">
            <div class="active step">
                <div class="content">
                    <div class="title">Búsqueda</div>
                    <div class="description">Selecciona el donde y cuando</div>
                </div>
            </div>
            <div class="step">
                <div class="content">
                    <div class="title">Disponibilidad</div>
                    <div class="description">Selecciona la hora y el médico</div>
                </div>
            </div>
            <div class="step">
                <div class="content">
                    <div class="title">Confirmación</div>
                    <div class="description">¡ Reservación lista!</div>
                </div>
            </div>
        </div>
        <!--    FORM  -->
        <form class="ui form" method="GET" action="<?=base_url()?>patient/stepTwo">
            <div class="fields">
                <div class="six wide field">
                    <label>Especialidad</label>
                    <select class="ui search dropdown" name="Especialidad">
                        <option value="">Seleccionar</option>
                        <?php foreach ($_SESSION['specialities'] as $specialities){?>
                            <option value="<?=$specialities[0]?>"><?=$specialities[1]?></option> 
                        <?php } ?>
                    </select>
                </div>
                <div class="six wide field">
                    <label>Fecha</label>
                    <input name="fecha" type="date" min="<?= date('Y-m-d', time()) ?>">
                </div>
            </div>
            <div class="fields">
                <div class="field">

                </div>
            </div>
            <button class="ui button primary" type="submit">Buscar</button>
        </form>
    </div>