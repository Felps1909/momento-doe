<?php
require_once "vendor/autoload.php";
use Source\Model\Rank;
$rank = new Rank();

 $dados = $rank->buscarRank();
 //var_dump($dados);

 if(count($dados) > 0){
     for($i=0; $i<count($dados);$i++){
       
         foreach ($dados[$i] as $k => $v) {
             if($k != "id_rank" && $k != "id_usuario")
                 echo "<pre>".$v."<pre>";
             
         }
         
     }
 }