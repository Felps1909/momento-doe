<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="view/css/style.css" rel="stylesheet" type="text/css">
    
    <title>Depoimentos</title>
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
                        <a href="#">Login</a>
                        <hr>
                        <a href="#">Cadastro</a>
                        <hr>
                        <a href="#">Ranking</a>
                        <hr>
                        <a href="#">Quem Somos</a>
                        <hr>
                        <a href="#">Depoimentos</a>
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

                    <img class="logo-menu" src="view/imagens/logodomenu.png">

                    <img class="btn-perfil" src="view/imagens/perfil.png">
                </section>
            </article>
            <article>
                <section>
                <div class="opac_submenu">
                    <div class="submenu">
                        <ul>
                            <li><a href="login.php">Home</a></li>
                            <li><a href="cadastro.php">Doacao</a></li>
                            <li><a href="#u25">Ongs</a></li>
                            
                        </ul>
                    </div>
                </div>
                </section>
            </article>
        </header>