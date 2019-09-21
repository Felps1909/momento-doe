<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/css/styleOngs.css" media="screen and (min-width:320px)" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/logomomento.png">

    <title>Ongs - Momento Doe</title>
</head>

<body>
    <div id="container">
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
        <!--fim box home-->

        <main>
            <article>
                <section>
                    <img id="img" src="view/imagens/ongs.png">
                    <div class="dep">
                        <h2>ONGs</h2>
                        <br>
                        <span>Ajude-nos a fazer</span>
                        <br>
                        <span>o bem</span>
                        <!--BOTAO-->
                        <div class="peca">
                            <a href="doacao.php" id="ajuda">Peça Ajuda</a>
                        </div>
                        <!-- BOTAO-->
                        <br>
                        <div id="span2">
                            <span class="span2">Veja o que essas Ongs estão</span>
                            <br>
                            <span class="span2">precisando</span>
                        </div>
                        <br>

                    </div>
                    <h1 id="coments">Comentários de ongs</h1>
                </section>
            </article>
        </main>
        <div id="final">
            <footer id="rodape">
                <a href="depoimentos.php">Depoimentos</a>
                <a href="doacoes.php">Doações</a>
                <a href="index.php">Home</a>
                <a href="ongs.php">Ongs</a>
                <a href="perfil.php">Perfil</a>
                <a href="#">Ranking</a>
                <a href="quem-somo.php">Quem somos</a>
                <p>&copy; Todos os Direitos Reservados</p>
            </footer>
        </div>
    </div>
</body>

</html>