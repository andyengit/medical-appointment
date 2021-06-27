<main class="mid">
    <div class="cont">
        <div>
            <h2>Reserva tu cita médica</h2>
        </div>
        <!--    STEPS   -->
        <div class="ui ordered steps">
            <div class="active step">
                <div class="content">
                    <div class="title">Busqueda</div>
                    <div class="description">Selecciona el donde y cuando</div>
                </div>
            </div>
            <div class="step">
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
        <form class="ui form">
            <div class="fields">
                <div class="six wide field">
                    <label>Especialidad</label>
                    <select class="ui search dropdown" name>
                        <option value="">Seleccionar</option>
                        <option value="1">Médicina general</option>
                        <option value="2">Cirujano</option>
                        <option value="3">Internista</option>
                    </select>
                </div>
                <div class="six wide field">
                    <label>Centro Medico</label>
                    <select class="ui search dropdown" name>
                        <option value="">Seleccionar</option>
                        <option value="">Centro</option>
                        <option value="">Este</option>
                        <option value="">El Cuji</option>
                        <option value="">San jancinto</option>
                    </select>
                </div>
            </div>
            <div class="fields">
                <div class="field">
                    <label>Fecha</label>
                    <input type="date" min="<?= date('Y-m-d', time()) ?>">
                </div>
            </div>
            <button class="ui button primary" type="submit">Buscar</button>
        </form>
    </div>