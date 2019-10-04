<?php
namespace Source\Model;

use Source\Database\Connect;
use Source\Model\TipoUsuario;

class Usuario
{
    public $id_usuario;
    public $nome_usuario;
    public $senha_usuario;
    public $tel_usuario;
    public $email_usuario;
    public $url_foto_usuario;
    public $cod_status_usuario = 1;
    public $id_tipo_us;
    public $id_doc;
    // public $data_nascimento;

    public function salvarDados()
    {
        //VERIFICAÇÃO DE USUARIO, VERIFICA SE JA N HÁ USUARIO CADASTRADO
        // $this->data_nascimento = implode("-",array_reverse(explode("/",$this->data_nascimento)));
        if(is_null($this->id_usuario)){

            $query = Connect::getInstance()->prepare("INSERT INTO usuario (nome_usuario, senha_usuario,tel_usuario,email_usuario,
            url_foto_usuario,cod_status_usuario, id_tipo_us)
            values(:n,:s,:t,:e,:f,:status,:codtip,:d)");

            $query->bindValue(':n',$this->nome_usuario);
            $query->bindValue(':s',$this->senha_usuario);
            $query->bindValue(':t',$this->tel_usuario);
            $query->bindValue(':e',$this->email_usuario);
            $query->bindValue(':f',$this->url_foto_usuario);
            $query->bindValue(':status',$this->cod_status_usuario);
            $query->bindValue(':codtip',$this->id_tipo_us);
            // $query->bindValue(':d',$this->data_nascimento);
            $result = $query->execute();
            $this->id_usuario = Connect::getInstance()->lastInsertId();

            return $result;
        }else{
            $query = Connect::getInstance()->prepare("UPDATE usuario set nome_usuario = :n, senha_usuario = :s,
               tel_usuario = :t ,email_usuario = :e, url_foto_usuario = :f, cod_status_usuario = :status , id_tipo_us = :codtip    where id_usuario = :uid
                ");

            $query->bindValue(':uid',$this->id_usuario);
            $query->bindValue(':n',$this->nome_usuario);
            $query->bindValue(':s',$this->senha_usuario);
            $query->bindValue(':t',$this->tel_usuario);
            $query->bindValue(':e',$this->email_usuario);
            $query->bindValue(':f',$this->url_foto_usuario);
            $query->bindValue(':status',$this->cod_status_usuario);
            $query->bindValue(':codtip',$this->id_tipo_us);
            // $query->bindValue(':d',$this->data_nascimento);
            
            return $query->execute();

             
                   
        }
           
    }

    public function getTipoUsuario(){
        $query = Connect::getInstance()->query("SELECT * FROM tipo_usuario where cod_tipo_us = $this->id_tipo_us");
        $t = $query->fetchAll()[0];

        $tipo_usuario = new TipoUsuario();
        $tipo_usuario->id_tipo_us = $t['id_tipo_us'];
        $tipo_usuario->desc_tipo_us = $t['desc_tipo_us'];
        $tipo_usuario->cod_status_tipo_us = $t['cod_status_tipo_us'];

        return $tipo_usuario;
    }

    public function buscarDados($condition = null) //Seleciona Dados Do Usuario
    {
        $array = [];
        if(is_null($condition)){
            $query = Connect::getInstance()->query("SELECT U.*, TU.desc_tipo_us from usuario U LEFT JOIN tipo_usuario TU ON TU.id_tipo_us = U.id_tipo_us where U.cod_status_usuario = 1");
        } else {
            $query = Connect::getInstance()->query("SELECT U.*, TU.desc_tipo_us from usuario U LEFT JOIN tipo_usuario TU ON TU.id_tipo_us = U.id_tipo_us where $condition");
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
            $usuario->cod_tipo_us = $u['id_tipo_us'];
            $usuarip->$id_doc = $u['id_doc'];
            // $usuario->data_nascimento = $u['data_nascimento'];
            $array[] = $usuario;
        }
        return $array;
    }

    public function cadastrarUsuario($nome_usuario, $senha_usuario, $email_usuario, $tipo_usuario, $id_doc) //Inserção 
    {
        //VERIFICAÇÃO DE USUARIO, VERIFICA SE JA N HÁ USUARIO CADASTRADO
        // $data_usuario = implode("-",array_reverse(explode("/",$data_usuario)));

        $query = Connect::getInstance()->prepare("SELECT id_usuario from usuario where email_usuario = :e");
        $query->bindValue(":e",$email_usuario);
        $query->execute();
        
        if($query->rowCount()>0){
            return false;
        
        }else{
            $query = Connect::getInstance()->prepare("INSERT INTO usuario (nome_usuario, senha_usuario,email_usuario, id_tipo_us, id_doc)
            values(:n,:s,:e,:t, :d)
        ");

            $query->bindValue(':n',$nome_usuario);
            $query->bindValue(':s',$senha_usuario);
            $query->bindValue(':e',$email_usuario);
            // $query->bindValue(':d',$data_usuario);
            $query->bindValue(':t',$tipo_usuario);
            $query->bindValue(':d',$id_doc);
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
            
            $_SESSION['id_usuario'] = $dados['id_usuario'];


           
            
            return true;
        }else{
            return false;
        }
    }
  

}