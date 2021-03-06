<?php
    
    require_once "menu.php";
    include_once "Model/TipoDoacao.php";
    include_once "Model/Doacoes.php";
    include_once "Model/UploadImage.php";
    include_once "Model/TipoUsuario.php";

    use Model\TipoDoacao;
    use Model\Doacoes;
    use Model\UploadImage;
    use Model\TipoUsuario;
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
        <p class="pd1">Faça sua Parte<p>
        <p class="pd2">Também!<p>
        <?php
            if(@$_SESSION['id_tipo_us'] == TipoUsuario::PESSOA){
                echo'<button onClick="Mudarestado()">DOAR</button>';
            }
        
        ?>
        <p class="pd3">Essas pessoas já estão</p>
        <p class="pd4">Fazendo o bem<p>

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
                     escreva sua doação aqui!
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
                
                    if($usuario->getTipoUsuario()->id_tipo_us == TipoUsuario::PESSOA){
                        echo' <div class="doacoes2"><img src="'.$usuario->url_foto_usuario.'" class="ft-usuario">
                        <p class = "nome-usuario">'.$usuario->nome_usuario.'</p>
                        <img src ="' . (is_null($doacao->url_foto_doacao) ? 'imagens/imgdefault.png' : $doacao->url_foto_doacao) . '" class = "img-desc-doacao">
                        <p class="desc-doacao">'.$doacao->desc_doacao.'<p></div>
                        '.(@$_SESSION['id_tipo_us'] == TipoUsuario::ONG ? '<a href="perfil.php?i='.$usuario->id_usuario.'  ">Entre Contato</a>':'').'
                        ';
                    }
               
                }
            }else{
                echo "Não há doaçoes no momento!";
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
        
       
        if(!empty($id_tipo_doa) && !empty($desc_doacao) ){ 
            $doacao->id_tipo_doa = $id_tipo_doa;
            $doacao->desc_doacao = $desc_doacao;
            $doacao->url_foto_doacao = @$response['url'];

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