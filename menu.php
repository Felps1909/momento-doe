<?php
     require_once "vendor/autoload.php";
     session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="view/imagens/logomomento.png">
    <link rel="stylesheet" media="screen and (min-width:481px)" href="view/css/estilo_mensagemHome.css">
    <link href="view/css/style.css" rel="stylesheet" type="text/css">
    
</head>
<body>
    <div id="container">
        <header>
            <article>
                <section>
                    <div id="myNav" class="overlay">
                         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                            &times;
                        </a>
                    <div class="overlay-content">
                        <hr>
                        <a href="login.php">Login</a>
                        <hr>
                        <a href="cadastro.php">Cadastro</a>
                        <hr>
                        <a href="#">Ranking</a>
                        <hr>
                        <a href="quem-somos.php">Quem Somos</a>
                        <hr>
                        <a href="depoimentos.php">Depoimentos</a>
                    </div>
                    </div>
                    
                    <script>
                        function openNav() {
                            document.getElementById("myNav").style.width = "100%";
                        }   

                        function closeNav() {
                            document.getElementById("myNav").style.width = "0%";
                        }
                    </script>
               </section>
               <section class="menucima">
                    <span id="bars" onclick="openNav()">&#9776;</span> 

                    <a href="index.php"><img class="logo-menu" src="view/imagens/logodomenu.png"></a>

                    <img class="btn-perfil" src="view/imagens/perfil.png">
                </section>
            </article>
            <article>
                <section>
                <div class="opac_submenu">
                    <div class="submenu">
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="doacoes.php">DOAÇÃO</a></li>
                            <li><a href="ongs.php">ONGS</a></li>
                        </ul>
                    </div>
                </div>
                </section>
            </article>
        </header>