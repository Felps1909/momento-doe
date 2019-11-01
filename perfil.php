<?php
    @session_start();
   if(!isset($_SESSION["id_usuario"])){
    session_destroy(); 
    header("Location: login.php"); 
    exit; 
} 
require_once "menu.php";
use Model\Publicacao;
use Model\Usuario;
use Model\TipoUsuario;
use Model\UploadImage;
?>
<main>
<style>
    body{
        background-color: rgb(204, 163, 250);
    }

</style>
   <?php
    $usuario = new Usuario();
    
   if(isset($_GET['i'])){
        $id = $_GET['i'];
   }else{
        $id = $_SESSION['id_usuario']; 
   }
     
     $dadosUsuario = $usuario->buscarDados("id_usuario = {$id}");
     
        if(count($dadosUsuario) > 0){
        
            foreach ($dadosUsuario as $usuario) {
                $id_tipo_us = $usuario->getTipoUsuario()->id_tipo_us;
                echo '  <div class="info-usuario">
                <figure>
                    <figcaption>'.$usuario->nome_usuario.'</figcaption>
                    <img src ="' . (is_null($usuario->url_foto_usuario) ? 'imagens/usuario.png' : $usuario->url_foto_usuario) . '">
                </figure>
                '.(isset($_GET['i']) ?'':'<a href="editarperfil.php?i='.$usuario->id_usuario.'">Editar Perfil</a>').'
                <p class="contato">Contato: '. $usuario->email_usuario.'<p>
            </div>';
            }
        }
   
   ?>

    <div class="actions-perfil">
        <?php
            if(@$_SESSION['id_tipo_us'] == TipoUsuario::PESSOA){
                echo '<p class="txt-perfil">Agora que você já faz parte dessa corrente do bem:</p>';
            }

        ?>
    

         <img class="boneco1" src="imagens/boneco3roxo.png">
         <img class="boneco2" src="imagens/boneco1roxo.png">   
         <img class="boneco3" src="imagens/boneco2roxo.png"> 
      
    <?php
        
        if(!isset($_GET['i'])){

            if($id_tipo_us == TipoUsuario::ONG){
                echo"<div class='div-balao1'>  
                <p class='ajudar2'>Precisa de Algo há sempre alguem disposto a ajudar!</p>   
                <a  href='ongs.php'><button class='peca-ajuda'>Peça Ajuda</button></a> 
                <p class='ajudar3'>Mostre como sua ong esta ajudando o mundo</p>               
                </div>
               
               
                <div class='ong-inst' >
                <form method = 'post' enctype='multipart/form-data' >
                       <label class='ft-ong' for='selecao-arquivo'>
                           <img src='imagens/imgdefault.png'>
                       </label>
                       <input id='selecao-arquivo' type='file' name='url_foto_publi'>
                       <textarea class='desc-ong' name='desc_publi'>
    Descreva sua ong!
                       </textarea>
                       <input class ='btn-doar' type = 'submit' name='Enviar'> 
                </form>
           </div>
                "; 
                $publi = new Publicacao();

                if(isset($_POST['desc_publi'])){
                    $desc_publi = addslashes($_POST['desc_publi']);
                    $url_foto_publi = $_FILES;

                    $upload = new UploadImage($_FILES['url_foto_publi'],  "imagens/publicacao/");
                    $response = $upload->salvar();

                    if(!empty($desc_publi) && !empty($url_foto_publi)){
                        $publi->desc_publi = $desc_publi;
                        $publi->url_foto_publi = $response['url'];

                        $publi->cadastrarPublicacao();

                        echo"<script>";
                        echo "alert('Publicacao realizada com sucesso!')";
                        echo"</script>" ;   
                    }else{
                        echo"<script>";
                        echo "alert('Preencha todos os Campos!')";
                        echo"</script>" ; 
                      }
                }

                $dadosPubli = $publi->buscarDados("id_usuario = {$id}");

                if(count($dadosPubli)> 0){
                    foreach($dadosPubli as $publi){
                        echo' <div class="publi-ong">
                        <p class="descinst-ong">'.$publi->desc_publi.'<p>
                        <img src ="' . (is_null($publi->url_foto_publi) ? 'imagens/imgdefault.png' : $publi->url_foto_publi) . '" class = "img-inst-ong">
                        </div>';
                        
                    }
                }


            }else if( $id_tipo_us == TipoUsuario::PESSOA){

                echo'
                
                <div class="div-balao1">  
                <img class="balao1" src="imagens/balaozinho.png" alt="balaoconversa">
                <p class="ajudar">Que tal ajudar alguém?</p>   
                <a href="doacoes.php"><button>DOAR</button></a>                
                </div>'; 

                echo '<div  class="div-balao2">    
                <img class="balao2" src="imagens/balaozinho2.png" alt="balaoconversa">
                <span class="depoimentar">Já fez sua parte? 
                    Dê um depoimento e incentive outros a ajudar!</span>
                    <a href="depoimentos.php"><button>DAR DEPOIMENTO</button></a> 
                </div>';
            }
           
        }
        
       
  
    ?>
    </div>

</main>
