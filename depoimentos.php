<?php
    require_once "menu.php";  
    use Model\Usuario;
    use Model\TipoUsuario;      
    use Model\Depoimentos;

   
    
?>
<main>
     <div class="div-depoimento">
         <h1>DEPOIMENTOS</h1>
         <!-- <img src="imagens/depoimentos.jpg" class = "img-doacao">  -->
        <p>Inspire outras pessoas<p>
        <p>A fazer o bem<p>
        <?php
           

          if(@$_SESSION['id_tipo_us'] == TipoUsuario::PESSOA){
            echo '<button onClick="Mudarestado()" class="dar-depoimento">DAR DEPOIMENTO</button>';
          }     

       
        
        ?>
        <p>Dê seu depoimento!</p>
        <p>Conte-nos como foi fazer o bem!<p>

            <div id="doar" class="doar hidden">
                <form method="post">
                    <textarea name="desc_conteudo_depoimentos">
            Escreva aqui seu depoimento!
                    </textarea>
                   
                   
                    <input class ="btn-doar" type = "submit" name="Enviar">
                </form>
            </div>
    </div>
    <?php
        $depoimento = new Depoimentos();
        if(isset($_POST['desc_conteudo_depoimentos'])){
            $desc_conteudo_depoimentos = addslashes($_POST['desc_conteudo_depoimentos']);

            if(!empty($desc_conteudo_depoimentos)){
                $depoimento->desc_conteudo_depoimentos = $desc_conteudo_depoimentos;
                $depoimento->cadastrarDepoimento();
                
               

                echo"<script>";
                echo "alert('Depoimento realizado com sucesso!')";
                echo"</script>" ;    
            }else{
                echo"<script>";
                echo "alert('Preencha todos os Campos!')";
                echo"</script>" ; 
              }
        }

    ?>
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
        <?php
            $depoimentos = new Depoimentos();
            $dados = $depoimentos->buscarDados("cod_status_depoimentos = 1");

            if(count($dados)>0){
                foreach($dados as $i => $depoimentos){
                    $usuario = $depoimentos->getUsuario();
                    echo'<div class="postite">
                            <div class="itenspost">
    
                                <img src="imagens/postite.png">
                                 <img src ="' . (is_null($usuario->url_foto_usuario) ? 'imagens/usuario.png' : $usuario->url_foto_usuario) . '  " class="ft-pessoa"> 
                                <p class="nome">'.$usuario->nome_usuario.'</p>
                                <p>'.$depoimentos->desc_conteudo_depoimentos.'</p>
                    
                            </div>
                    
                        </div>';
                }
            }

        ?>
            
           
        </section>

    </article>
    
</main>
<?php
    require_once "footer.php";
?>