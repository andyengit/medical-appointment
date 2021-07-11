<div class="ui container">
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui vertical fluid tabular menu">
                <a class="item" href="<?= base_url() ?>center/inicio">
                    Inicio
                </a>
                <a class="item" href="<?= base_url() ?>center/report">
                Status y reportes
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
                                <a class="active item">
                                    Especialidad
                                </a>
                                <a class="item" href="<?= base_url() ?>center/registerDoctor">
                                    Doctores
                                </a>
                            </div>
                        </div>
                        <div class="twelve wide stretched column">
                            
                                <form class="ui form" method="POST" action="<?= base_url() ?>center/insertSpeciality" id="specialities-form">
                                    <h2>Añade una especialidad</h2>
                                    <div class="fields">
                                        <div class="two fields">
                                            <div class="twelve wide field">
                                                <input type="text" name="name" id="name">
                                            </div>
                                            <div class="field">
                                                <button class="ui button primary basic" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <table class="ui blue table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Especialidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($_SESSION['specialitiesList'] as $key) {
                                            echo "<tr>";
                                            echo "<th>" . $key[0] . "</th>";
                                            echo "<th>" . $key[1] . "</th>";
                                            echo "</tr>";
                                        } ?>
                                    </tbody>
                                </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>