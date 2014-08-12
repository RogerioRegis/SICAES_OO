<?php

session_start();

if (isset($_POST['loagado']) && isset($_POST['logado']) == true) {

    header('location: ./index.php');
} else {

    unset($_SESSION['login']);
    unset($_SESSION['senha']);

    session_destroy();

    header('location: ..login.php');
}
