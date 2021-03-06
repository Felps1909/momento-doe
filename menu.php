<?php
    @session_start();
    require_once "Model/Depoimentos.php";
    require_once "Model/Doacoes.php";
    require_once "Model/Rank.php";
    require_once "Model/TipoDoacao.php";
    require_once "Model/TipoUsuario.php";
    require_once "Model/UploadImage.php";
    require_once "Model/Usuario.php";
    require_once "Model/Publicacao.php";
   
    //  require_once "vendor/autoload.php";
     
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/logomomento.png">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    
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
                        <?php
                            if(isset($_SESSION['id_usuario'])){
                                echo '<hr>';
                                echo '<a href="Logout.php">Sair</a>';
                                echo '<hr>';
                                echo ' <a href="#">Ranking</a>';
                                echo '<hr>';
                                echo '<a href="quem-somos.php">Quem Somos</a>';
                                echo '<hr>';
                                echo '<a href="depoimentos.php">Depoimentos</a>';
                                echo '<hr>';
                            }else{

                            
                        ?>
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
                        <?php } ?>
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

                    <a href="index.php"><img class="logo-menu" src="imagens/logodomenu.png"></a>

                    <a href="perfil.php"><img class="btn-perfil" src="imagens/perfil.png"></a>
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
        <div class="exibmsg">
        <p>Desculpe! Momento Doe esta disponivel somente para mobile.<p>
        <img class="img-msg" src="imagens/logomomento.png">
        </div>  
    </body>
</html>