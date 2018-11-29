<?php
//if(iss)
session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <title>Projektu galerija</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<!--    https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js-->
    <!-- <link rel="stylesheet" type="text/css" href="./stylesheets/gallery.css"> -->
    <link rel="stylesheet" type="text/css" href="../sass/style.css">
</head>
<body>
<nav id="navigation" class="navbar navbar-expand-sm navbar-dark fixed-top py-0">
    <a class="navbar-brand" href="#"><img class="nav-icon" srcset="../images/icon-1x.png 1x, ../images/icon-2x.png 2x">   Projektų galerija</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navLinks">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navLinks">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="#" class="nav-link scroll" data-toggle="tooltip" data-placement="bottom" title="Jau greitai !">Pagrindinis</a></li>
            <li class="nav-item"><a href="/public/" class="nav-link scroll">Galerija</a></li>
            <li class="nav-item"><a href="/public/sendmailform.php" class="nav-link scroll">Susisiekite</a></li>
        </ul>
        <ul class="navbar-nav">
            <?php if(isset($_SESSION['id'])){
            echo '<li class="nav-item"><a href="/public/newform.php" class="nav-link scroll">Naujas projektas</a></li>';
            }?>
            <!-- <li class="nav-item"><a href="#third" class="nav-link scroll">ABOUT</a></li>
            <li class="nav-item"><a href="#fourth" class="nav-link scroll">CONTACT</a></li> -->
        </ul>
        <ul class="navbar-nav">
            <?php if(isset($_SESSION['id'])){
                echo "<li class='nav-item'><a href='#' class='nav-link welcome' data-toggle='tooltip' data-placement='bottom' title='Paduodu tau admino galias'>Sveika sugrįžus, Lina</a></li>";
            }?>
            <?php if(isset($_SESSION['id'])){
            echo "<li class='nav-item'><a href='/public/logout.php' class='nav-link scroll'>Atsijungti</a></li>";
            } else{ echo "<li class='nav-item'><a href='/public/login.php' class='nav-link scroll'>Prisijungti</a></li>";}?>
        </ul>
    </div>
</nav>