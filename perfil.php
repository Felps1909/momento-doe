<?php
    require_once "menu.php";
   @session_start();
   if(!isset($_SESSION["id_usuario"])){
    session_destroy(); 
    header("Location: login.php"); 
    exit; 
} 
use Source\Model\Usuario;

?>
<main >
   <?php
    $usuario = new Usuario();
    $id = $_SESSION['id_usuario'];
     $dadosUsuario = $usuario->buscarDados("id_usuario = {$id}");
        if(count($dadosUsuario) > 0){
        
            foreach ($dadosUsuario as $usuario) {
                
                echo '  <div class="info-usuario">
                <figure>
                    <figcaption>'.$usuario->nome_usuario.'</figcaption>
                    <img src ="' . (is_null($usuario->url_foto_usuario) ? 'imagens/usuario.png' : $usuario->url_foto_usuario) . '">
                </figure>
                <a href="editarperfil.php?i='.$usuario->id_usuario.'">Editar Perfil</a>
            </div>';
            }
        }
   
   ?>

  
    <!-- <div id="grid_container">
        <div><h3>Doações</h3></div>
        <div><h3>Depoimentos</h3></div>
        <div><h3>Ranking</h3></div>
    </div>

    <div id="grid_container2">
         <div id="icon1"><img src="imagens/coracao.png"></div>
         <div id="icon2"><img src="imagens/depoimentosicon.png"></div>
         <div id="icon3"><img src="imagens/rankign.png"></div>
    </div> -->
  
    <div class="actions-perfil">
        <p class="txt-perfil">Agora que você já faz parte dessa corrente do bem:</p>

         <img class="boneco1" src="imagens/boneco3roxo.png">
         <img class="boneco2" src="imagens/boneco1roxo.png">   
         <img class="boneco3" src="imagens/boneco2roxo.png"> 
    </div>   
    <div class="div-balao1">  
         <img class="balao1" src="imagens/balaozinho.png" alt="balaoconversa">
         <p class="ajudar">Que tal ajudar alguém?</p>   
         <a href="doacoes.php"><button>DOAR</button></a>                
    </div>
    <div  class="div-balao2">    
         <img class="balao2" src="imagens/balaozinho2.png" alt="balaoconversa">
         <span class="depoimentar">Já fez sua parte? 
             Dê um depoimento e incentive outros a ajudar!</span>
             <a href="depoimentos.php"><button>DAR DEPOIMENTO</button></a> 
    </div>

</main>
