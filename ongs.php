<?php

    require_once "menu.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Ongs - Momento Doe</title>
</head>
<style>
    body{
        background-color: #e1e1ff;
    }
</style>
<main>
    <div class="div-ongs">
         <h1>ONGs</h1>
        <!-- <img src="view/imagens/doacao.png" class = "img-doacao"> -->
        <p>Ajude-nos a fazer<p>
        <p>O bem<p>
        <a href = "doacoes.php"><button>PEÇA AJUDA</button></a>
        <p>Veja o que essas ONGs estão</p>
        <p>Precisando<p>

            
    </div>
    <div class="filtro">
        <button onClick="Mudarestado2()">Filtro</button>
    </div>
    <div id="filtro" class="itens-filtro hidden">
    <figure class="tempo">
        <img src="view/imagens/tempo.png">
        <figcaption>Tempo</figcaption>
    </figure>
    <figure class="roupa">
        <img src="view/imagens/roupas.png">
        <figcaption>Roupas</figcaption>
    </figure>
    <figure class="comida">
        <img src="view/imagens/comida.png">
        <figcaption>Comida</figcaption>
    </figure>
    <figure class="dinheiro">
        <img src="view/imagens/dinheiro.png">
        <figcaption>Dinheiro</figcaption>
    </figure>
 
    <figure class="outros">
        <img src="view/imagens/outros.png">
        <figcaption>Outros</figcaption>
    </figure>

</div>  
    <script>    
        function Mudarestado2(el2) {
            document.getElementById("filtro").classList.toggle("hidden");
        }
    </script>
    <div class="publicacoes">
        <img class="us" src="view/imagens/usuario.png">
        <p>Adulto Salvação</p>
        <img class="pessoa" src="view/imagens/pessoa.jpg">
        <p class="desc">Estamos precisando de roupas infantis de frio
             para nossos adultos e queremos muito sua ajuda. Ajude nossas adultos!</p>
        
    </div>
</main>
<?php
        require_once "footer.php";
?>
 
