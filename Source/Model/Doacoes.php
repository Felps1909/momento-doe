<?php
namespace Source\Model;

use Source\Database\Connect;

class Doacoes
{
    public function buscarDados()
    {
        $query = Connect::getInstance()->query("SELECT * FROM doacao
         ");
        $res = $query->fetchAll();
        return $res;
    }

    public function cadastrarDoacao($desc_doacao, $url_foto_doacao)
    {
        
            $query = Connect::getInstance()->prepare("INSERT INTO doacao (desc_doacao, url_foto_doacao)
            values(:d, :u)
        ");

            $query->bindValue(':d',$desc_doacao);
            $query->bindValue(':u',$url_foto_doacao);
            $query->execute();
            return true;
    }
}