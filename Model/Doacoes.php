<?php
namespace Model;

include_once "Database/connect.php";
include_once "Model/TipoDoacao.php";
include_once "Model/Usuario.php";

use Database\Connect;
use Model\TipoDoacao;
use Model\Usuario;

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
            $query = Connect::getInstance()->query( "SELECT D.* from doacao D where D.cod_status_doacao = 1;");
        }else{
            $query = Connect::getInstance()->query( "SELECT D.* from doacao D where $condition");
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
    $query = Connect::getInstance()->query("SELECT * FROM tipo_doacao where id_tipo_doa = {$this->id_tipo_doa }");
        $td = $query->fetchAll()[0];
        $id_tipo_doacao = new TipoDoacao();
        $id_tipo_doacao->id_tipo_doa = $td['id_tipo_doa'];
        $id_tipo_doacao->desc_tipo_doa = $td['desc_tipo_doa'];
        $id_tipo_doacao->cod_status_tipo_doa = $td['cod_status_tipo_doa'];

        return $id_tipo_doacao;
    }   
    public function getUsuario(){
        $usuario = new Usuario();
        return $usuario->buscarDados("id_usuario = {$this->id_usuario}")[0];
        
        
    }
    public function cadastrarDoacao() 
    {

            $query= Connect::getInstance()->prepare("INSERT INTO doacao (desc_doacao, id_tipo_doa,id_usuario, url_foto_doacao)
            values(:d,:idt, :idu, :ft)
        ");
        $query->bindValue(":d",$this->desc_doacao);
        $query->bindValue(":idt",$this->id_tipo_doa);
        $query->bindValue(":ft",$this->url_foto_doacao);
        $query->bindValue(":idu",$_SESSION['id_usuario']);
        return $query->execute();
        
    }
    public function deletarDoacao(){
        $query= Connect::getInstance()->prepare("DELETE * from doacao where cod_status_doacao = 0
        ");
        return $query;
    }
}