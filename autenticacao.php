<?php
session_start();

	
	$ldap_con = ldap_connect("ldap://10.6.8.5:389");

	ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

    if (isset($_POST["ldapLogin"])) {

        $ldap_dn = "CN=usuario.servico,CN=Users,DC=crediembrapa,DC=local";
        $ldap_password = "Credi%2018";

        if(ldap_bind($ldap_con,$ldap_dn,$ldap_password)) {
            //echo "Authenticated";
            $_SESSION['usuario'] = $_POST['usuario'];
            header('Location: visualizagravacao.php');
            exit();
        }else {
            echo "Dados invalidos";
            unset($_SESSION['nao_autenticado']);
        }
		

    }    
	
?>

<html>
    <head>
        <title>Gravações - BBB</title>
    </head>
    <body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Usuário:</td>
                <td><input type="text" name="usuario" maxlength="50"></td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td><input type="password" name="senha" maxlength="50"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="ldapLogin" value="Entrar"></td>
            </tr>
        </table>
    </form>
    </body>
</html>
