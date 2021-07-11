<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/estetos.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/semantic.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css?ts=<?=time()?>">
    <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script src="https://kit.fontawesome.com/28d6ce3668.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/javascript/semantic.js"></script>
    <title>REVEMED</title>

</head>

<body>
    <!--HEADER-->
    
    <header class="topHeader">
        <div class="logo">
            <h1>REVEMED</h1>
        </div>
        <div class="divi">
            <ul>
                <li><a href="<?php echo  base_url() . ($_SESSION['globalRol'] == 'User' ? "" : $_SESSION['globalRol'] . "/inicio") ?>">INICIO</a></li>
            </ul>
        </div>
        <div class="cuenta">
            <?php
            if ($_SESSION['logIn'] == false) { ?>
                <a href="<?= base_url() ?>user/login"><button class="ui tiny primary button">ENTRAR</button></a>
                <a href="<?= base_url() ?>user/register"><button class="ui inverted tiny primary button">REGISTRARSE</button></a>
                <?php
            } else {
                if ($_SESSION['globalRol'] == 'center') { ?>
                    <div class="ui grid centered">
                        <i class="ui user icon"></i>
                        <span>Admin Revemed (<a href="<?= base_url() . $_SESSION['globalRol'] ?>/LogOut">Cerrar Sesión</a>)</span>
                    <?php } else { ?>
                        <div class="ui grid centered">
                            <i class="ui user icon"></i>
                            <span><?= $_SESSION['name'] . " " . $_SESSION['lastname'] ?> (<a href="<?= base_url() . $_SESSION['globalRol'] ?>/LogOut">Cerrar Sesión</a>)</span>
                    <?php
                }
            }
                    ?>
                        </div>
                    </div>
    </header>
    