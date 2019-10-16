<?php
    
    require_once "menu.php";
?>
    <!--<main>
    <div id="imgQ">
        <img class="imgq" src="view/imagens/quemsomos.png" alt="Quem Somos">
    </div>
    </main>-->

    <div id="container">
    <picture>            
        <source
            media="(max-width:480px)"
            srcset="view/imagens/quemsomos.png"
        />

        <source
            media="(max-width:343px)"
            srcset="view/imagens/quemsomos.png"
        />

        <source
            media="(min-width:320px)"
            srcset="view/imagens/quemsomos.png"
        />

        <img class="imgq" src="view/imagens/quemsomos.png" alt="Quem Somos">
    </picture>
    </div>





<footer id="footQue">
    <div class="rodapeQue">
        &copy; Momento Doe 2019
    </div>
</footer>
       


