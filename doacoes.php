<?php
    require_once "vendor/autoload.php";
    require_once "menu.php";
?>

<head>
   
 <title>Doaçoes</title>

</head>
<style>
    body{
        background-color: #f5f5ff;
    }
</style>
<main>
    <div class="div-doacao">
         <h1>DOAÇÕES</h1>
        <!-- <img src="view/imagens/doacao.png" class = "img-doacao"> -->
        <p>Faça sua Parte<p>
        <p>Também!<p>
        <button onClick="Mudarestado()">DOAR</button>
        <p>Essas pessoas já estão</p>
        <p>Fazendo o bem<p>

            <div id="doar" class="doar hidden">
                <form method="post">
                    <textarea name="doacao">
            escreva sua doação aqui!
                    </textarea>
                    <input type="file" name="img-doacao">
                    <label class="btn-foto" for='selecao-arquivo'>Selecione uma imagem para doação</label>
                    <input id='selecao-arquivo' type='file'>
                    <input class ="btn-doar" type = "submit" name="Enviar">
                </form>
            </div>
    </div>
    <div class="filtro">
        <button onClick="Mudarestado2()">Filtro</button>
    </div>
    <div id="filtro" class="itens-filtro hidden">
        <p>Roupa</p>
    </div>
    <script>    
        function Mudarestado(el) {
            document.getElementById("doar").classList.toggle("hidden");
        }
        function Mudarestado2(el2) {
            document.getElementById("filtro").classList.toggle("hidden");
        }
    </script>
    
</main>
<?php
    require_once "footer.php";
?>