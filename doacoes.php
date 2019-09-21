<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="view/css/styleDoacoes.css" rel="stylesheet" type="text/css">

    <title>Doações - Momento Doe</title>
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

        <section>
            <img id="img" src="view/imagens/doacao.png">
            <div class="dep">
                <h2>DOAÇÕES</h2>
                <br>
                <div id="span1">
                    <span>Faça sua parte</span>
                    <br>
                    <span>Também!</span>
                    <br>
                </div>
                <!--BOTAO-->
                <div class="peca">
                    <a href="doacao.php" id="ajuda">DOAR</a>
                </div>
                <!-- BOTAO-->
                <br>
                <div id="span2">
                    <span>Essas pessoas já estão</span>
                    <br>
                    <span>Fazendo o bem!</span>
                </div>
                <h1 id="coments">Comentários </h1>
        </section>
        </article>
        </main>
        <div id="final">
            <footer id="rodape">
                <a href="#">Depoimentos</a>
                <a href="#">Doações</a>
                <a href="#">Home</a>
                <a href="#">Ongs</a>
                <a href="#">Perfil</a>
                <a href="#">Ranking</a>
                <a href="#">Quem somos</a>
                <p>&copy; Todos os Direitos Reservados</p>
            </footer>
        </div>
        </div>
</body>

</html>