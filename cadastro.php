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
    <link rel="stylesheet" media="screen and (min-width: 320px)" href="view/css/styleCadastro.css" />
    <link rel="stylesheet" media="screen and (max-width: 480px)" href="view/css/480pxCadastro.css" />
    <link rel="shortcut icon" type="image/x-icon" href="view/imagens/logomomento.png">
    <title>Cadastro - Momento Doe</title>
</head>

<body>
     <?php
        if(isset($_POST['nome_usuario'])){
            
            $nome_usuario = addslashes($_POST['nome_usuario']);
            $senha_usuario = addslashes($_POST['senha_usuario']);
            $email_usuario = addslashes($_POST['email_usuario']);
			$data_usuario = addslashes($_POST['data_usuario']);
			$tipo_usuario = (int)$_POST['tipos'];
            //$tel_usuario = addslashes($_POST['tel_usuario']);
            
            if(!empty($nome_usuario) && !empty($senha_usuario)
             && !empty($email_usuario) && !empty($data_usuario) && !empty($tipo_usuario)){

                if(!$usuario->cadastrarUsuario($nome_usuario, $senha_usuario,
                $email_usuario,  $data_usuario, $tipo_usuario)){
                    echo "Email ja esta Cadastrado";
                }

            }else{
                echo "Prencha todos os campos";
            }
        }
    ?>
    <div id="inicio">
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
        <!--fim box home-->



        <!--botoes cadastro e login-->
        <div id="u1" class="as_default primary_button" style="cursor: pointer;">
            <div id="u1_div" class tabindex="0"></div>
            <div id="u1_text" class="text">
                <p>
                    <a href="cadastro.php">
                        <span>Cadastro</span>
                    </a>
                </p>
            </div>
        </div>

        <div id="u2" class="ax-default primary_button" style="cursor: pointer;">
            <div id="u2_div" class tabindex="0"></div>
            <div id="u2_text" class="text">
                <p>
                    <a href="login.php">
                        <span>Login</span>
                    </a>
                </p>
            </div>
        </div>
        <!--fim dos botoes cadastro e login-->


         <!--Formulario de cadastro padrão -->
         <form action="" method="post" id="formulario_cad">
         <div class="botoes">
             <input class="ongs" type="radio" name="tipos" value="1"> ONGs
             <input class="empresa" type="radio" name="tipos" value="2"> EMPRESA
             <input class="pessoa" type="radio" name="tipos" value="3"> PESSOA
         </div>
        

         <label>Nome:</label>
         <input type="text" name="nome_usuario" class="botao_form">
         

         <label>E-mail</label>
         <input type="text" name="email_usuario" class="botao_form">
         

         <label>Senha:</label>
         <input type="password" name="senha_usuario" class="botao_form">
         

         <label>Data de nascimento:</label>
         <input type="date" name="data_usuario" value="data" class="botao_form">
         

         <input type="submit" name="enviar" value="Enviar" id="enviar">
     </form>
    </div>
</body>

</html>