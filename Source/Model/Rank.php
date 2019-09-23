<?php
namespace Source\Model;

use Source\Database\Connect;

class Rank
{
   public function buscarRank()
   {
        $query = Connect::getInstance()->query("SELECT U.*, COUNT(D.id_doacao) AS total
        FROM usuario U
        LEFT JOIN doacao D ON D.id_usuario = U.id_usuario
        GROUP BY U.id_usuario HAVING total > 0 LIMIT 3");
        $res = $query->fetchAll();
        return $res;
        
       
   }
   
}