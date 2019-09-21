<?php
     require_once "vendor/autoload.php";
     use Source\Model\Usuario;
     
    $usuario = new Usuario();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (min-width:320px)" href="view/css/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="view/imagens/logomomento.png">
    <link rel=stylesheet media="screen and (max-width:480px)" href="view/css/480pxLogin.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Oswald|Roboto&display=swap" rel="stylesheet">
    <title>Login - Momento Doe</title>
    
</head>

<body>
    <?php
          if(isset($_POST['email_usuario'])){
            
       
        $senha_usuario = addslashes($_POST['senha_usuario']);
        $email_usuario = addslashes($_POST['email_usuario']);
       
        
        if(!empty($senha_usuario) && !empty($email_usuario)){
            if($usuario->logarUsuario($email_usuario, $senha_usuario)){
                // var_dump($_SESSION['id_usuario']);
                 header("location:perfil.php");
                
            } else{
                echo"email ou senha incorreta";
            }
                    
        }else{
             echo "preencha todos os campos";
         }
    }
   

    ?>
    <div id="inicio">


        <!--menu hamburguer-->
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
                            <a href="#u25">Ranking</a>
                            <hr>
                            <a href="quem-somos.php">Quem Somos</a>
                            <hr>
                            <a href="depoimentos.php">Depoimentos</a>
                            <hr>
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

                </section>

            </article>
        </header>
        <!--fim menu hamburguer-->


        <!--caixa roxa-->
        <div id="u0" class="ax_default box_1">
            <div id="u0_div">
            </div>
        </div>
        <!--fim caixa roxa-->


        <!--caixa box menu-->
        <div id="box1" class="ax_default box_1">
            <div id="box1_div" class=""></div>
        </div>
        <!--fim caixa box menu-->

        <!--perfil-->
        <div id="perfil" class="ax_default image" style="cursor: pointer;">
            <a href="perfil.php">
                <img id="perfil1" src="view/imagens/perfil.png" alt="Perfi">
            </a>
        </div>
        <!--fim do perfil-->

        <!--MINI LOGO NO MENU-->
        <div id="MINIlogo" class="ax_default image" style="cursor: pointer;">
            <a href="">
                <img id="MINIlogo1" src="view/imagens/logodomenu.png" alt="Momento Doe">
            </a>
        </div>
        <!--FIM DO MINI LOGO-->


        <!--box home-->
        <div id="u63" class="ax_default">
            <div id="u64" class="ax_default">

                <div id="u65" class="ax_default menu_item" style="cursor: pointer">
                    <div id="u65_div"></div>
                    <div id="u65_text" class="text">
                        <p id="cache0">
                            <a href="index.php">
                                <span id="cache1">HOME</span>
                            </a>
                        </p>
                    </div>
                </div>

                <div id="u66" class="ax_default menu_item" style="cursor: pointer">
                    <div id="u66_text" class="text">
                        <p id="cache2">
                            <a href="doacoes.php">
                                <span id="cache3">DOAÇÕES</span>
                            </a>
                        </p>
                    </div>
                </div>


                <div id="u67" class="ax_default menu_item" style="cursor: pointer">
                    <div id="u67_div"></div>
                    <div id="u67_text" class="text">
                        <p id="cache4">
                            <a href="ongs.php">
                                <span id="cache5">ONGS</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <table>
           <tr>
               <td>Nome</td>
           </tr>             

        </table>




        
</body>

</html>