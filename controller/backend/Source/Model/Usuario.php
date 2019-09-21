<?php
namespace Source\Model;

use Source\Database\Connect;

class Usuario
{
    public function buscarDados()
    {
        $query = Connect::getInstance()->query("SELECT * FROM usuario LIMIT 2");
        $res = $query->fetchAll();
        return $res;
    }

    public function cadastrarUsuario($nome_usuario, $senha_usuario, $email_usuario, $tel_usuario)
    {
        //VERIFICAÇÃO DE USUARIO, VERIFICA SE JA N HÁ USUARIO CADASTRADO

        $query = Connect::getInstance()->prepare("SELECT id_usuario from usuario where email_usuario = :e");
        $query->bindValue(":e",$email_usuario);
        $query->execute();
        
        if($query->rowCount()>0){
            return false;
        
        }else{
            $query = Connect::getInstance()->prepare("INSERT INTO usuario (nome_usuario, senha_usuario,email_usuario, tel_usuario)
            values(:n,:s,:e,:t)
        ");

            $query->bindValue(':n',$nome_usuario);
            $query->bindValue(':s',$senha_usuario);
            $query->bindValue(':e',$email_usuario);
            $query->bindValue(':t',$tel_usuario);
            $query->execute();
            return true;

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

}