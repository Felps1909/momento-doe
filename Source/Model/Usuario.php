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
        if($this->id_tipo_us == 1){
            if(!$this->validarCNPJ()){

                return [
                    'success'=>false,
                    'message'=>"Cnpj Invalido."
                ];
            }
        } else {
            if(!$this->validarCPF()){
                
                return [
                    'success'=>false,
                    'message'=>"Cpf invalido."
                ];
            }
        }
        //VERIFICAÇÃO DE USUARIO, VERIFICA SE JA N HÁ USUARIO CADASTRADO
        // $this->data_nascimento = implode("-",array_reverse(explode("/",$this->data_nascimento)));
        if(is_null($this->id_usuario)){

            $query = Connect::getInstance()->prepare("INSERT INTO usuario (nome_usuario, senha_usuario,tel_usuario,email_usuario,
            url_foto_usuario,cod_status_usuario, id_tipo_us, id_doc)
            values(:n,:s,:t,:e,:f,:status,:codtip, :iddoc)");

            $query->bindValue(':n',$this->nome_usuario);
            $query->bindValue(':s',$this->senha_usuario);
            $query->bindValue(':t',$this->tel_usuario);
            $query->bindValue(':e',$this->email_usuario);
            $query->bindValue(':f',$this->url_foto_usuario);
            $query->bindValue(':status',$this->cod_status_usuario);
            $query->bindValue(':codtip',$this->id_tipo_us);
            $query->bindValue(':iddoc',$this->id_doc);
            // $query->bindValue(':d',$this->data_nascimento);
            $result = $query->execute();
            $this->id_usuario = Connect::getInstance()->lastInsertId();
            
 
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
            
            $result =  $query->execute();

             
                   
        }
        if($result){
            return [
                'success'=>true,
                'message'=>"Sucesso!"
            ];
        }else{
            return [
                'success'=>false,
                'message'=>"Não foi possivel executar a ação!"
            ];
        }
           
    }

    public function getTipoUsuario(){
    $query = Connect::getInstance()->query("SELECT * FROM tipo_usuario where id_tipo_us = {$this->id_tipo_us}");
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
            $usuario->id_tipo_us = $u['id_tipo_us'];
            $usuario->id_doc = $u['id_doc'];
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
            if($query->execute()){
                $id = $db->lastInsertId();
            }

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
  function validarCPF() {

	// Verifica se um número foi informado
	if(empty($this->id_doc)) {
		return false;
	}

	// Elimina possivel mascara
	$cpf = preg_replace("/[^0-9]/", "", $this->id_doc);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cpf) != 11) {
		return false;
	}
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false;
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
}
function validarCNPJ() {

	// Verifica se um número foi informado
	if(empty($this->id_doc)) {
		return false;
	}

	// Elimina possivel mascara
	$cnpj = preg_replace("/[^0-9]/", "", $this->id_doc);
	$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cnpj) != 14) {
		return false;
	}
	
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cnpj == '00000000000000' || 
		$cnpj == '11111111111111' || 
		$cnpj == '22222222222222' || 
		$cnpj == '33333333333333' || 
		$cnpj == '44444444444444' || 
		$cnpj == '55555555555555' || 
		$cnpj == '66666666666666' || 
		$cnpj == '77777777777777' || 
		$cnpj == '88888888888888' || 
		$cnpj == '99999999999999') {
		return false;
		
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
	 
		$j = 5;
		$k = 6;
		$soma1 = "";
		$soma2 = "";

		for ($i = 0; $i < 13; $i++) {

			$j = $j == 1 ? 9 : $j;
			$k = $k == 1 ? 9 : $k;

			$soma2 += ($cnpj{$i} * $k);

			if ($i < 12) {
				$soma1 += ($cnpj{$i} * $j);
			}

			$k--;
			$j--;

		}

		$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
		$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

		return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));
	 
	}
}

}