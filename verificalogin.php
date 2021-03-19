<?php


if(!$_SESSION['usuario']) {
    header('Location: autenticacao.php');
    exit();
}