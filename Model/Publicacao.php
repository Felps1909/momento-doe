<?php
namespace Model;

include_once "Database/connect.php";
include_once "Model/Usuario.php";

use Database\Connect;
use Model\Usuario;

class Publicacao{
    public $id_publi;
    public $desc_publi;
    public $url_foto_publi;
    public $data_hora_publi;
    public $cod_status_publi;
    public $id_usuario;


    public function cadastrarPublicacao(){
        $query= Connect::getInstance()->prepare("INSERT INTO publicacao (desc_publi, id_usuario, url_foto_publi)
        values(:d,:idu, :ft)
    ");
      $query->bindValue(":d",$this->desc_publi);
      $query->bindValue(":ft",$this->url_foto_publi);
      $query->bindValue(":idu",$_SESSION['id_usuario']);
      return $query->execute();
    }

    public function getUsuario(){
        $usuario = new Usuario();
        return $usuario->buscarDados("id_usuario = {$this->id_usuario}")[0];
        
        
    }

    
    public function buscarDados($condition = null)
    {
      
        
        $this->data_hora_publi= implode("-",array_reverse(explode("/",$this->data_hora_publi)));
        $array= [];
        if(is_null($condition)){
            $query = Connect::getInstance()->query( "SELECT P.* from publicacao P where P.cod_status_publi = 1;");
        }else{
            $query = Connect::getInstance()->query( "SELECT P.* from publicacao P where $condition");
        }
        foreach($query->fetchAll() as $p){
            $publicacao = new Publicacao();
            $publicacao->id_publi = $p['id_publi'];
            $publicacao->desc_publi = $p['desc_publi'];
            $publicacao->url_foto_publi = $p['url_foto_publi'];
            $publicacao->data_hora_publi = $p['data_hora_publi'];
            $publicacao->cod_status_publi = $p['cod_status_publi'];
            $publicacao->id_usuario = $p['id_usuario'];
            
            $array[] = $publicacao;
        }
        return $array;
    }
}
