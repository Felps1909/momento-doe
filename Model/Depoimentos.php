<?php
namespace Model;

include_once "Database/connect.php";
include_once "Model/Usuario.php";

use Database\Connect;
use Model\Usuario;

class Depoimentos
{
    public $cod_depoimentos;
    public $desc_conteudo_depoimentos;
    public $data_hora_depoimentos;
    public $cod_status_depoimentos;
    public $id_usuario;

    public function getUsuario()
    {
        $usuario = new Usuario();
        return $usuario->buscarDados("id_usuario = {$this->id_usuario}")[0];
    }
    public function buscarDados($condition = null)
    {
        $this->data_hora_depoimentos= implode("-",array_reverse(explode("/",$this->data_hora_depoimentos)));
        $array=[];

        if(is_null($condition)){
            $query = Connect::getInstance()->query( "SELECT Dep.* from depoimentos Dep where Dep.cod_status_depoimentos = 1;");
        }else{
            $query = Connect::getInstance()->query("SELECT Dep.* from depoimentos Dep where $condition");
        }

        foreach($query->fetchAll() as $dep){
            $depoimento = new Depoimentos();
            $depoimento->cod_depoimentos = $dep['cod_depoimentos'];
            $depoimento->desc_conteudo_depoimentos = $dep['desc_conteudo_depoimentos'];
            $depoimento->data_hora_depoimentos = $dep['data_hora_depoimentos'];
            $depoimento->cod_status_depoimentos = $dep['cod_status_depoimentos'];
            $depoimento->id_usuario = $dep['id_usuario'];
            $array[] = $depoimento;
        }
        return $array;
    }
    
    public function cadastrarDepoimento()
    {
        $query = Connect::getInstance()->prepare("INSERT INTO depoimentos(desc_conteudo_depoimentos,  id_usuario)
            values(:dsc, :idu)
        ");
        $query->bindValue(":dsc", $this->desc_conteudo_depoimentos);
        $query->bindValue(":idu", $_SESSION['id_usuario']);
        return $query->execute();
        
    }
    public function salvarDados(){
        if(is_null($this->id_usuario)){

            $query = Connect::getInstance()->prepare("INSERT INTO depoimentos(desc_conteudo_depoimentos,  id_usuario)
            values(:dsc, :idu)
        ");
            $query->bindValue(":dsc", $this->desc_conteudo_depoimentos);
            $result = $query->execute();
            $this->id_usuario = Connect::getInstance()->lastInsertId();
            
            return $result;
        }
    }
}