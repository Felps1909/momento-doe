<?php
    require_once "menu.php";
   @session_start();
   if(!isset($_SESSION["id_usuario"])){ 
    header("Location: login.php"); 
    exit; 
} 

?>
<main >
    <div class="info-usuario">
        <figure>
            <figcaption>Felipe Medeiros</figcaption>
            <img src="imagens/usuario.png">
        </figure>
        <a href="#">Editar Perfil</a>
    </div>
    <div id="grid_container">
        <div><h3><a href="">Doações</a></h3></div>
        <div><h3><a href="">Depoimentos</a></h3></div>
        <div><h3><a href="U25">Ranking</a></h3></div>
    </div>

    <div id="grid_container2">
         <div id="icon1"><a href=""><img src="imagens/coracao.png"></a></div>
         <div id="icon2"><a href=""><img src="imagens/depoimentosicon.png"></a></div>
         <div id="icon3"><a href="U25"><img src="imagens/rankign.png"></a></div>
    </div>
  
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
