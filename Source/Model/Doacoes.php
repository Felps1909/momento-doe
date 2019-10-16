<?php
namespace Source\Model;

use Source\Database\Connect;
use Source\Model\TipoDoacao;
use Source\Model\Usuario;

class Doacoes
{
    public $id_doacao;
    public $desc_doacao;
    public $url_foto_doacao;
    public $data_hora_doa;
    public $cod_status_doacao;
    public $id_usuario;
    public $id_tipo_doa;

  

    public function buscarDados($condition = null)
    {
      
        
        $this->data_hora_doa= implode("-",array_reverse(explode("/",$this->data_hora_doa)));
        $array= [];
        if(is_null($condition)){
            $query = Connect::getInstance()->query( "SELECT D.*, TD.desc_tipo_doa from doacao D 
            LEFT JOIN tipo_doacao TD ON TD.id_tipo_doa = D.id_tipo_doa where D.cod_status_doacao = 'A';");
        }else{
            $query = Connect::getInstance()->query( "SELECT D.*, TD.desc_tipo_doa from doacao D 
            LEFT JOIN tipo_doacao TD ON TD.id_tipo_doa = D.id_tipo_doa where $condition");
        }
        foreach($query->fetchAll() as $d){
            $doacao = new Doacoes();
            $doacao->id_doacao = $d['id_doacao'];
            $doacao->desc_doacao = $d['desc_doacao'];
            $doacao->url_foto_doacao = $d['url_foto_doacao'];
            $doacao->data_hora_doacao = $d['data_hora_doacao'];
            $doacao->cod_status_doacao = $d['cod_status_doacao'];
            $doacao->id_usuario = $d['id_usuario'];
            $doacao->id_tipo_doa = $d['id_tipo_doa'];
            $array[] = $doacao;
        }
        return $array;
    }

 
 
    public function getTipoDoacao(){
        $query = Connect::getInstance()->query("SELECT * FROM tipo_doacao where id_tipo_doa = $this->id_tipo_doa ");
        $td = $query->fetchAll()[0];
        $id_tipo_doacao = new TipoDoacao;
        $id_tipo_doacao->id_tipo_doa = $td['id_tipo_doa'];
        $id_tipo_doacao->desc_tipo_doa = $td['desc_tipo_doa'];
        $id_tipo_doacao->cod_status_tipo_doa = $td['cod_status_tipo_doa'];

        return $id_tipo_doacao;
    }

    public function cadastrarDoacao($desc_doacao, $id_tipo_doa) //$url_foto_doacao)
    {
            $query= Connect::getInstance()->prepare("INSERT INTO doacao (desc_doacao, id_tipo_doa)
            values(:d,:idt)
        ");
        $query->bindValue(":d",$desc_doacao);
        $query->bindValue(":idt",$id_tipo_doa);
        return $query->execute();
        
    }
}