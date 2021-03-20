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
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


        <style>
            #form {
                padding: 60px;
                background-color: #003641;
                color: white;
                border-radius: 20px;
                box-shadow: 10px 7px 6px gray;
            }

            #logo {
                margin-top: 10px;
                margin-bottom: 50px;
            }

            #desc{
                font-size: 13px;
                margin-top: 0px;
                margin-bottom: 50px;
            }


        </style>
    </head>
    <body>
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center" id="formulario">
            <form action="" method="post" class="col-4" id="form">
                <img src="logo_letra_branca.png" alt="logo_sicoob" id="logo">
                <h5 id="desc">Portal de Visualizaçoes de Gravações BBB</h5>
                <div class="form-group">
                    <label for="usuario">Usuário:</label>
                        <input type="text" name="usuario" maxlength="50" class="form-control">
                </div>        
                <div class="form-group">
                    <label for="senha">Senha:</label>    
                        <input type="password" name="senha" maxlength="50" class="form-control">
                </div>       
                <br/> 
                <div class="form-group">
                        <input type="submit" name="ldapLogin" value="Entrar" class="btn btn-primary">
                </div>
            </form>
            
    </div>
    </div>
    </body>
</html>