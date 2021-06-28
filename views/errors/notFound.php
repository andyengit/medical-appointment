<main>
    <div class="cont">
    
        <p class="error404">ERROR</p>
        <p class="error404">No se ha encontrado la pagina que buscas.</p>
        <img class="container ui image medium" src="<?= base_url() ?>assets/img/404.svg">
        <a href="<?php echo  base_url() . ($_SESSION['globalRol'] == 'User' ? "" : $_SESSION['globalRol'] . "/inicio") ?>">
            <button class="ui button primary container error404">VOLVER</button>
        </a>
        
    </div>
    