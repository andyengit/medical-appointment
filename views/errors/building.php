<main>
    <div class="cont">
    
        <p class="error404">ERROR</p>
        <p class="error404">En Construcción</p>
        <i class="ui massive icon cogs blue"></i>
        <a href="<?php echo  base_url() . ($_SESSION['globalRol'] == 'User' ? "" : $_SESSION['globalRol'] . "/inicio") ?>">
            <button class="ui button primary container error404">VOLVER</button>
        </a>
        
    </div>
    