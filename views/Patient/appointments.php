<main>
    <div class="container">

        <h2>CITAS</h2>

        </form>
        <table class="ui  blue selectable celled  table">
            <thead>
                <tr>
                    <th><b>Nombre</b></th>
                    <th>Apellido</th>
                    <th>CI</th>
                    <th>Hora</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['appointmentsList'] as $key){?>
                <tr>
                    <td><?=$key[1]?></td>
                    <td><?=$key[2]?></td>
                    <td><?=$key[3]?></td>
                    <td><?=$key[4]?></td>
                    <td>
                        <button class="ui blue  button">O</button>
                    </td>
                    <td><button class="ui blue button">
                            X
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>