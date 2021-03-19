<?php

	
	/*$ldap_con = ldap_connect("ldap://10.6.8.5", 389)
        or die("Não foi possivel conectar ao servidor LDAP");

	if (isset($_POST["ldapLogin"])) {

        $ldap_dn = "uid=".$_POST["usuario"].",dc=crediembrapa,dc=local";
        $ldap_password = $_POST["senha"];

        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

        //if(ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
        $ldapbind = @ldap_bind($ldap_con, $ldap_dn, $ldap_password);

        if ($ldapbind) {

            echo "Autenticado!";
            //header('location: visualizagravacao.html');

        } else {
            echo "Invalid user/pass or other errors!";
        }
    }*/


	
	$ldap_con = ldap_connect("ldap://10.6.8.5:389");

	ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

    if (isset($_POST["ldapLogin"])) {

    $ldap_dn = "CN=usuario.servico,CN=Users,DC=crediembrapa,DC=local";
	$ldap_password = "Credi%2018";

	if(ldap_bind($ldap_con,$ldap_dn,$ldap_password))
		echo "Authenticated";
	else
		echo "Invalid Credential";

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
