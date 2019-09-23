<?php
    require_once "menu.php";
    // var_dump($_SESSION);
?>
<main>
     <div class="div-depoimento">
         <h1>DEPOIMENTOS</h1>
        <!-- <img src="view/imagens/doacao.png" class = "img-doacao"> -->
        <p>Inspire outras pessoas<p>
        <p>A fazer o bem<p>
        <button onClick="Mudarestado()" class="dar-depoimento">DAR DEPOIMENTO</button>
        <p>Dê seu depoimento!</p>
        <p>Conte-nos como foi fazer o bem!<p>

            <div id="doar" class="doar hidden">
                <form method="post">
                    <textarea name="depoimento">
            Escreva aqui seu depoimento!
                    </textarea>
                    <input type="file" name="img-doacao">
                   
                    <input class ="btn-doar" type = "submit" name="Enviar">
                </form>
            </div>
    </div>
    
    <script>    
        function Mudarestado(el) {
            <?php if(isset($_SESSION['id_usuario'])){ ?>
            document.getElementById("doar").classList.toggle("hidden");
            <?php } else { ?>
            alert("Você precisa estar logado");
            
            <?php } ?>
        }
        
    </script>
    
    <article>
        <section class="depo-postite">
            <div class="postite">
                <div class="itenspost">

                <img src="view/imagens/postite.png">
                <img src="view/imagens/usuario.png" class="ft-pessoa">
                <p class="nome">Ana Laura</p>
                <p>Gostei de realizar a doaçao</p>
                
                </div>
                
            </div>
            <div class="postite">
                <img src="view/imagens/postite.png">
                <img src="view/imagens/usuario.png" class="ft-pessoa">
                <p class="nome">Ana Laura</p>
                <p>Gostei de realizar a doaçao</p>
            </div>
        </section>

    </article>
</main>
<?php
    require_once "footer.php";
?>