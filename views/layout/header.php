<html lang="ES">

<head>
    <meta charset="utf-8" />
    <title>REVEMED</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/estetos.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/semantic.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css?ts=<?= time() ?>">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script src="https://kit.fontawesome.com/28d6ce3668.js" crossorigin="anonymous"></script>
    <script src="assets/javascript/semantic.js"></script>
</head>

<body>
    <!--HEADER-->
    <header class="topHeader">
        <div class="logo">
            <h1>REVEMED</h1>
        </div>
        <div class="divi">
            <ul>
                <li><a href="<?php echo  base_url(). ($_SESSION['globalRol'] == 'User' ? "" : $_SESSION['globalRol']."/inicio") ?>">INICIO</a></li>
            </ul>
        </div>
        <div class="cuenta">
            <?php
                if($_SESSION['logIn'] == false){?>
                    <a href="<?= base_url() ?>user/login"><button class="ui tiny primary button">ENTRAR</button></a>
                    <a href="<?= base_url() ?>user/register"><button class="ui inverted tiny primary button">REGISTRARSE</button></a>
            <?php 
                }else {?>
                <i class="ui user icon"></i>
                <span><?=$_SESSION['ci']?></span>
                <p>(<a href="<?=base_url().$_SESSION['globalRol']?>/LogOut">LogOut</a>)</p>
                <?php
             }
             ?>

            
            
            
        </div>
    </header>
