<?php
    
    require_once "menu.php";
        

?>

<head>
   
 <title>Doaçoes</title>

</head>
<style>
    body{
        background-color: #e1e1ff;
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
         function Mudarestado(el) {
            <?php if(isset($_SESSION['id_usuario'])){ ?>
            document.getElementById("doar").classList.toggle("hidden");
            <?php } else { ?>
            alert("Você precisa estar logado");
            
            <?php } ?>
        }
        function Mudarestado2(el2) {
            document.getElementById("filtro").classList.toggle("hidden");
        }
    </script>
    
</main>
<?php
    require_once "footer.php";
?>