<?php
namespace Source\Model;

use Source\Database\Connect;

class Usuario
{
    public $id_usuario;
    public $nome_usuario;
    public $senha_usuario;
    public $tel_usuario;
    public $email_usuario;
    public $url_foto_usuario;
    public $cod_status_usuario;
    public $cod_tipo_us;
    public $data_nascimento;

    public function buscarDados($condition = null) //Seleciona Dados Do Usuario
    {
        $array = [];
        if(is_null($condition)){
            $query = Connect::getInstance()->query("SELECT U.*, TU.desc_tipo_us from usuario U LEFT JOIN tipo_usuario TU ON TU.cod_tipo_us = U.cod_tipo_us where U.cod_status_usuario = 1");
        } else {
            $query = Connect::getInstance()->query("SELECT * from usuario where $condition");
        }
        foreach($query->fetchAll() as $u){
            $usuario = new Usuario();
            $usuario->id_usuario = $u['id_usuario'];
            $usuario->nome_usuario = $u['nome_usuario'];
            $usuario->senha_usuario = $u['senha_usuario'];
            $usuario->tel_usuario = $u['tel_usuario'];
            $usuario->email_usuario = $u['email_usuario'];
            $usuario->url_foto_usuario = $u['url_foto_usuario'];
            $usuario->cod_status_usuario = $u['cod_status_usuario'];
            $usuario->cod_tipo_us = $u['cod_tipo_us'];
            $usuario->data_nascimento = $u['data_nascimento'];
            $array[] = $usuario;
        }
        return $array;
    }

    public function cadastrarUsuario($nome_usuario, $senha_usuario, $email_usuario, $data_usuario, $tipo_usuario) //Inserção 
    {
        //VERIFICAÇÃO DE USUARIO, VERIFICA SE JA N HÁ USUARIO CADASTRADO
        $data_usuario = implode("-",array_reverse(explode("/",$data_usuario)));

        $query = Connect::getInstance()->prepare("SELECT id_usuario from usuario where email_usuario = :e");
        $query->bindValue(":e",$email_usuario);
        $query->execute();
        
        if($query->rowCount()>0){
            return false;
        
        }else{
            $query = Connect::getInstance()->prepare("INSERT INTO usuario (nome_usuario, senha_usuario,email_usuario, data_nascimento, cod_tipo_us)
            values(:n,:s,:e,:d,:t)
        ");

            $query->bindValue(':n',$nome_usuario);
            $query->bindValue(':s',$senha_usuario);
            $query->bindValue(':e',$email_usuario);
            $query->bindValue(':d',$data_usuario);
            $query->bindValue(':t',$tipo_usuario);
            return $query->execute();
            

        }
    }

    public function logarUsuario($email_usuario, $senha_usuario)
    {
        $query = Connect::getInstance()->prepare("SELECT id_usuario from usuario where 
        email_usuario = :e and senha_usuario= :s");
        
        $query->bindValue(':e',$email_usuario);
        $query->bindValue(':s',$senha_usuario);
        $query->execute();

        if($query->rowCount()>0){
            
            $dados = $query->fetch();
            // session_start();
            $_SESSION['id_usuario'] = $dados['id_usuario'];


           
            
            return true;
        }else{
            return false;
        }
    }
    public function excluirUsuario()
    {
       
    }   

}