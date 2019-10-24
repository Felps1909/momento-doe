<?php
    
    require_once "menu.php";
    use  Source\Model\TipoDoacao;
    use  Source\Model\Doacoes;
    use  Source\Model\UploadImage;

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

     <div class="div-ongs">
         <h1 class="h1O">ONGs</h1>
        <img src="imagens/ongs.png" class = "img-ongs">
        <p class="p1O">Ajude-nos a fazer<p>
        <p class="p2O">O bem<p>
        <button onClick="Mudarestado()">Peça Ajuda</button>
        <p class="p3O">Veja o que essas ONGs estão</p>
        <p class="p4O">Precisando<p>    
    
    <!-- <div class="div-doacao">
         <h1>DOAÇÕES</h1>
      
        <p class="pd1">Faça sua Parte<p>
        <p class="pd2">Também!<p>
        <button onClick="Mudarestado()">DOAR</button>
        <p class="pd3">Essas pessoas já estão</p>
        <p class="pd4">Fazendo o bem<p> -->

            <div id="doar" class="doar hidden">
                <form method="post" enctype="multipart/form-data">
                <select name="tipo_doa">
                    <option>Tipo Doações<option>
                    <option name="tipo_doa" value="1">Tempo<option>
                    <option name="tipo_doa" value="2">Roupa<option>
                    <option name="tipo_doa" value="3">Comida<option>
                    <option name="tipo_doa" value="4">Dinheiro<option>
                    <option name="tipo_doa" value="5">Outros<option>
                </select>
                    <textarea name="desc_doacao">
                     Peça Ajuda aqui
                    </textarea>
                    
                    <label class="btn-foto" for='selecao-arquivo'>Selecione uma imagem para doação</label>
                    <input id='selecao-arquivo' type='file' name="url_foto_doacao">
                    <input class ="btn-doar" type = "submit" name="Enviar">
                </form>
            </div>
    </div>
    <div class="filtro">
        <button onClick="Mudarestado2()">Filtro</button>
    </div>
    <div id="filtro" class="itens-filtro hidden">
        <a href="?q=1"><figure class="tempo">
            <img src="imagens/tempo.png">
            <figcaption>Tempo</figcaption>
        </figure></a>
        <a href="?q=2"><figure class="roupa">
            <img src="imagens/roupas.png">
            <figcaption>Roupas</figcaption>
        </figure></a>
        <a href="?q=3"><figure class="comida">
            <img src="imagens/comida.png">
            <figcaption>Comida</figcaption>
        </figure>
         <a href="?q=4"><figure class="dinheiro">
            <img src="imagens/dinheiro.png">
            <figcaption>Dinheiro</figcaption>
        </figure> </a>
     
         <a href="?q=5"><figure class="outros">
            <img src="imagens/outros.png">
            <figcaption>Outros</figcaption>
        </figure> </a>
         <a href="doacoes.php"><figure class="limpar">
            <figcaption>Limpar Filtro</figcaption>
        </figure> </a>
           
    </div>
    <div class ="doacao">
        <?php

        
            $doacao = new Doacoes();
            if(isset($_GET['q'])){
                 $dados = $doacao->buscarDados("cod_status_doacao = 1 and id_tipo_doa = ".$_GET['q']);

            }else{
                $dados = $doacao->buscarDados("cod_status_doacao = 1");
            }  
            
            if(count($dados) > 0){
            foreach($dados as $i => $doacao){
                $usuario = $doacao->getUsuario();          
                echo' <div class="doacoes2"><img src="'.$usuario->url_foto_usuario.'" class="ft-usuario">
                        <p class = "nome-usuario">'.$usuario->nome_usuario.'</p>
                        <img src ="' . (is_null($doacao->url_foto_doacao) ? 'imagens/imgdefault.png' : $doacao->url_foto_doacao) . '" class = "img-desc-doacao">
                        <p class="desc-doacao">'.$doacao->desc_doacao.'<p></div>';
                }
            }else{
                echo "Não há Solicitaçoes no momento!";
            }
        ?>
    
       
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
    <?php

       $doacao = new Doacoes();
      if(isset($_POST['desc_doacao'])){
        $id_tipo_doa = (int)$_POST['tipo_doa'];
        $desc_doacao = addslashes($_POST['desc_doacao']);
        $url_foto_doacao = $_FILES;

        
        $upload = new UploadImage($_FILES['url_foto_doacao'],  "imagens/doacao/");
        $response = $upload->salvar();
        
       
        if(!empty($id_tipo_doa) && !empty($desc_doacao) && $response['success']){ 
            $doacao->id_tipo_doa = $id_tipo_doa;
            $doacao->desc_doacao = $desc_doacao;
            $doacao->url_foto_doacao = $response['url'];

            $doacao->cadastrarDoacao();
          
            echo"<script>";
            echo "alert('Doação realizada com sucesso!')";
            echo"</script>" ;    
    
      }else{
        echo"<script>";
        echo "alert('Preencha todos os Campos!')";
        echo"</script>" ; 
      }
    }

    ?>
</main>
<?php
    require_once "footer.php";
?>
<!-- <!DOCTYPE html>
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
         <h1 class="h1O">ONGs</h1>
        <img src="imagens/ongs.png" class = "img-ongs">
        <p class="p1O">Ajude-nos a fazer<p>
        <p class="p2O">O bem<p>
        <a href = "doacoes.php"><button>PEÇA AJUDA</button></a>
        <p class="p3O">Veja o que essas ONGs estão</p>
        <p class="p4O">Precisando<p>    
    </div>


 <div class="filtro">
        <button onClick="Mudarestado2()">Filtro</button>
    </div>
    <div id="filtro" class="itens-filtro hidden">
    <figure class="tempo">
        <img src="imagens/tempo.png">
        <figcaption>Tempo</figcaption>
    </figure>
    <figure class="roupa">
        <img src="imagens/roupas.png">
        <figcaption>Roupas</figcaption>
    </figure>
    <figure class="comida">
        <img src="imagens/comida.png">
        <figcaption>Comida</figcaption>
    </figure>
    <figure class="dinheiro">
        <img src="imagens/dinheiro.png">
        <figcaption>Dinheiro</figcaption>
    </figure>
 
    <figure class="outros">
        <img src="imagens/outros.png">
        <figcaption>Outros</figcaption>
    </figure>
</div>  


    <script>    
        function Mudarestado2(el2) {
            document.getElementById("filtro").classList.toggle("hidden");
        }
    </script>
    <div class="publicacoes">
        <img class="us" src="imagens/usuario.png">
        <p>Adulto Salvação</p>
        <img class="pessoa" src="imagens/pessoa.jpg">
        <p class="desc">Estamos precisando de roupas infantis de frio
             para nossos adultos e queremos muito sua ajuda. Ajude nossas adultos!</p>
        
    </div>
</main>

<footer id="footOng">
    <div class="rodapeOng">
        &copy; Momento Doe 2019
    </div>
</footer>
        --> 
