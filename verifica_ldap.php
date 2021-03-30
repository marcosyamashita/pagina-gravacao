<?php

set_time_limit(0);

function valida_ldap($srv, $usr, $pwd)
{

    $ldap_server = $srv;
    $auth_user = $usr;
    $auth_pass = $pwd;

    // Tenta se conectar com o servidor
    if (!($connect = @ldap_connect($ldap_server))){
        return FALSE;
    }

    // Tenta autenticar no servidor
    if (!($bind = @ldap_bind($connect, $auth_user, $auth_pass))) {
        // se nao validar retorna false
        return FALSE;
    } else {
        // se validar retorna true
        return TRUE;
    }

} // fim funcao conectar ldap

$dominio = "@crediembrapa.local";
$usu = $_REQUEST['usuario'].$dominio;
$senha = $_REQUEST['senha'];
$ip_server = "10.6.8.5";

if (valida_ldap($ip_server, $usu, $senha)) {
    echo "usuario autenticado<br>";

    session_start();
    $_SESSION['usuario'] = $_POST['usuario'];
    //echo $_SESSION['usuario'];
    header("Location: visualizagravacao.php");

}else {
    echo "<head><script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>";
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'></head>";
    echo "<div class='container'>";
    echo "<div class='row h-100 justify-content-center align-items-center'>";
    echo "<form style='padding: 60px;background-color: #003641;color: white;border-radius: 20px;box-shadow: 10px 7px 6px gray;' class='col-4'>";
    echo "<img src='logo_letra_branca.png' alt='logo_sicoob' style='margin-top: 10px;margin-bottom: 50px;'>";
    echo "<h5 id='desc' style='font-size: 13px;margin-top: 0px;margin-bottom: 50px;'>Portal de Visualizaçoes de Gravações BBB</h5>";
    echo "<h1 id='desc' style='font-size: 21px;margin-top: 0px;margin-bottom: 50px; color: red;'>Usuário ou senha Invalidos!</h1>";
    echo "<br><input type='button' value='voltar' class='btn btn-primary' onclick='location.href=\"index.php\";'>";
    echo "</div>";
    echo "</form>";
}

?>