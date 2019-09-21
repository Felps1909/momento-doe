<?php
namespace Source\Model;

use Source\Database\Connect;

class rank
{
   public function buscarRank()
   {
        $query = Connect::getInstance()->query("SELECT * FROM ranking LIMIT 10");
        $res = $query->fetchAll();
        return $res;      
   }

}