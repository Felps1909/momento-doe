<?php
    require_once "menu.php";
    use Source\Model\Rank;
    use Source\Model\Depoimentos;
    $rank = new Rank();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Oswald|Roboto&display=swap" rel="stylesheet">
    <title>O que você pode doar?</title>
</head>

<main>
    
    <div class="div-home">
        <img class="img-home" src="imagens/HOME2.png" alt="">
        <h1 class="p1">O que você</h1>
        <h2 class="p2">pode doar hoje?</h2>
        <a href = "doacoes.php"><button>QUERO AJUDAR</button></a>
        <h2 class="p3">Nos ajude</h2>
        <h2 class="p4">a ajudar</h2>
        <h2 class="p5">outros</h2>
    </div>

    <img class="logomomento" src="imagens/logomomento.png" alt="Logo Momento Doe">

    <div class="motivacao">
        <div class="oque">
            <h3>O que é uma doação?</h3>
             <img src="imagens/oqueedoacao.png">
            <p>Uma doação acontece quando alguém (doador) opta por doar algo à alguma pessoa ou ONG, que esteja necessitando de algum recurso.</p>
        </div>

        <div class="oque">
            <h3>Por que doar?</h3>
             <img src="imagens/porquedoar.png">
            <p>Quem se sujeita a ajudar alguém através da doação, sente-se satisfeito em fazer o bem e presenciar a gratidão de quem recebe. Além disso, estará ajudando quem realmente necessita de algum recurso.</p>
        </div>
        <img class="velhacadeira" src="imagens/velhacadeira.png">
        <div class="oque">
            <h3>O que são ONGs?</h3>
             <img src="imagens/oquesaoongs.png">
            <p>São organizações não governamentais, que não possuem fins lucrativos. Elas desempenham um papel muito importante, pois oferecem projetos e serviços variados, a fim de ajudar a sociedade em vários aspectos.</p>
        </div>
    </div>
    <div class="depoimento-home">
        <h4>Depoimentos</h4>
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
                                <img src="imagens/usuario.png" class="ft-pessoa">
                                <p class="nome">'.$usuario->nome_usuario.'</p>
                                <p>'.$depoimentos->desc_conteudo_depoimentos.'</p>
                    
                            </div>
                    
                        </div>';
                }
            }

        ?>
            
           
        </section>
    </div>
    <div class="grandes-herois">
        <h4>Grandes Heróis</h4>
        
        <?php 

        $classificados = $rank->buscarRank();

            function exibirNota($nota){
                $i = 0;
                $estrela = '';
                while($i != 5)
                {
                    if($nota <= $i) {
                        $estrela.='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="32px" fill="gray" style="margin-left: 0px;"><polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>';
                    } else {
                        $estrela.='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="32px" fill="#7053a3" style="margin-left: 0px;"><polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>';
                    }
                    $i++;
                }
                return $estrela;
            }
            if(count($classificados)){

                foreach($classificados as $i => $usuario){
                    echo '
               <div class="us-rank" ' . ($i == 2 ? 'style="width: 100%;"' : '')  . '>
                    <img class ="coroa" src="imagens/coroaouro.png">
                    <img class = "ft_us_rank" src="imagens/usuario.png">
                    <p class="nome">'.$usuario['nome_usuario'].'</p>
                    <p class="nota">'.exibirNota(5 - $i).'</p>
               </div>';
                }
            }else{
              echo '
               <div class="us-rank" style="width: 100%;">
                    <p class="nome">Não há ranking no momento</p>
               </div>';   
            }
            ?>
           <h4 class="pode-doar">O que você pode doar?</h4>
           <img  class ="imgdoar" src="imagens/oquevcpodoar.png">
    </div>
</main>


<?php
    require_once "footer.php";
?>
