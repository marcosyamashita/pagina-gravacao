    <?php
        session_start();

        if(!$_SESSION['usuario']){
            header('Location: index.php');
            exit();

        }

        //echo $_SESSION['usuario'];

        $con = mysqli_connect('127.0.0.1', 'root', '', 'pagina-gravacao');

        if (!$con) {
            echo "Não foi possivel se conectar ao BD!" . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        }

        $query = "SELECT nomusuario FROM usuario WHERE nomusuario = ". $_SESSION['usuario'];

    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Asap&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Visualização de Gravações</title>

    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        html, body {
            background: #d9e0e0;
        }

        .header {
            padding: 20px;
            background: #003641;
            width: 100%;
            height: 100%;
            color: white;
            font-family: 'Asap', sans-serif;
            font-size: 55%;
            text-align: left;
        }

        #logo {
            font-size: 20px;
        }

        .content {
            width: 100%;
            position: fixed;
            background: #d9e0e0;
            font-family: 'Asap', sans-serif;
        }

        .container{
            visibility: hidden;
            opacity: 0;
            transition: visibility= .6s, opacity= .5s;
        }

        .container:target{
            position: fixed;
            visibility: visible;
            opacity: 1;
        }

        .btn{
            width: 100px;
            display: block;
            background: rgb(131, 128, 128);
            padding: 5px;
            text-align: center;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
        }

        .container{
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
        }
        .modal-corpo{
            width: 1520px;
            height: 1900px;
            color: #fff;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            overflow: hidden;
        }
        .modal-corpo p{
            padding: 10px;
            font-size: 20px;
        }
        .fechar{
            font-size: 25px;
            position: fixed;
            right: 0;
            background: rgb(100, 100, 100);
            padding: 4.5px;
            text-decoration: none;
            color: #fff;
        }

        #frame { 
            position: fixed;
            width: 98%; 
            height:98%;
            left: 0;
            padding: 1%;
            -ms-zoom: 0.7; 
            -moz-transform: scale(0.7); 
            -moz-transform-origin: 0px 0; 
            -o-transform: scale(0.7); 
            -o-transform-origin: 0 0; 
            -webkit-transform: scale(1.0); 
            -webkit-transform-origin: 0 0;
            
        }

        .footer {
            width: 100%;
            padding: 1%;
            background: #003641;
            color: white;
            text-align: center;
            font-family: 'Asap', sans-serif;
            bottom: 0;
            position: fixed;
        }

        .header h5 {
            position: absolute;
            text-align: right;
            right: 0;
            padding: 30px;
        }

        .header a {
            text-decoration: none;
            color:  gray;
            padding-left: 40px;
        }

        .header a:hover{
            color:rgb(214, 66, 66);
        }


    </style>

            <script>
                function pauseVid(){
                    document.getElementById('frame').src = ""
                }

                function playVid(){
                    document.getElementById('frame').src = "https://conf.crediembrapa.com.br/playback/presentation/2.0/playback.html?meetingId=183f0bf3a0982a127bdb8161e0c44eb696b3e75c-1584985740664"
                }
            </script>

</head>
<body>
    <div class="header">
        <h5>Bem-vindo: <?php echo $_SESSION['usuario']?> <a href="logout.php">Sair</a></h5>
        <img src="logo_letra_branca.png" alt="logo_sicoob">
        <!--<p id="logo">CrediEmbrapa</p> -->
    </div>
    <div class="content">
        <br>
        <h4 id="nome">Gravações Salas de Conferencias - BBB</h4>
        <br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope"col">Nome da Sala</th>
                    <th scope"col">Data e hora</th>
                    <th scope"col">Descrição/Pauta</th>
                    <th scope"col">Link da Gravação</th>
                </tr>
            </thead>
            <tbody>
                <!--PARA ADICIONAR NOVO REGISTRO COMEÇAR COPIAR APARTIR DAQUI!!!-->
                <tr>
                    <th scope="row">Reunião - STI</th>
                    <th>01/01/0000 - Inicio: 15:00</th>
                    <th>Reunião Atualização Sistema de OS</th>
                    <th>
                        <a href="#abrir" class="btn" onclick="playVid()">Gravação</a>
                          <div class="container" id="abrir">

                            <div class="modal-corpo">
                                <a href="#" class="fechar" id="fechar" onclick="pauseVid()">X</a>
                                <p><iframe id="frame" src="https://conf.crediembrapa.com.br/playback/presentation/2.0/playback.html?meetingId=183f0bf3a0982a127bdb8161e0c44eb696b3e75c-1584985740664" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></p>
                            </div>
                          </div>  
                </tr>    
                <!-- COPIAR ATE AQUI-->

            </tbody>
        </table>
          

    <div>
        
        <br>
    </div>
</body>
</html>