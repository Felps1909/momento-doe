<?php
namespace Source\Model;

use Source\Database\Connect;

class Usuario
{
    public function buscarDados() //Seleciona Dados Do Usuario
    {
        $query = Connect::getInstance()->query("SELECT U.*, TU.desc_tipo_us from usuario U LEFT JOIN tipo_usuario TU ON TU.cod_tipo_us = U.cod_tipo_us where U.cod_status_usuario = 1");
        $res = $query->fetchAll();
        return $res;
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